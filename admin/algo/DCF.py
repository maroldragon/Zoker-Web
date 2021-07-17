#!/usr/bin/env python

import numpy as np
import chainer
from chainer import optimizers
import chainer.functions as F
import chainer.links as L
import codecs
import pandas as pd
import argparse
import pickle
import random
import sys

parser = argparse.ArgumentParser(description='Chainer example: MNIST')
parser.add_argument('--alpha', type=float, default="0.7",
                    help='The value of alpha')
parser.add_argument('--beta', type=float, default='0.004',
                    help='The beta of beta')
parser.add_argument('--lambda_val', type=float, default='0.2',
                    help='The value of lambda')
parser.add_argument('--corrupt_ratio', type=float, default='0.002',
                    help='The ratio for mSDA')
parser.add_argument('--Epoch', type=int, default='100',
                    help='The value of Epoch')
args = parser.parse_args()

############################
# data loading
############################
df_user = pd.read_csv('BX-Users.csv', sep=';', header=0, index_col=False)
df_train = pd.read_csv('BX-Book-Ratings.csv', sep=';', header=0, index_col=False)#.sort_values("User-ID")
df_item = pd.read_csv('BX_Books.csv', sep=';', header=0, index_col=False)
############################
# preprocessing
############################


def preprocessing(df, df_user, df_item):
    kategori_list = sorted(list(set(df_item["kategori"])))
    kategori_dict = {}
    for i in range(len(kategori_list)):
        kategori_dict[kategori_list[i]] = i

    num_item = df_item.shape[0]
    num_kategori = len(kategori_list)

    item_detail = pd.DataFrame(np.zeros([num_item, num_kategori]), columns=kategori_list)# information abount user
    for i in range(num_item):
        item_detail.iloc[i, kategori_dict[df_item["kategori"].iloc[i]]] = 1
    item_detail.index = df_item["isbn"]

##    print("item_detail")
##    print(item_detail)

##    item_detail = df_item[target_name]  # information about item
##    item_detail.index = df_item["item_id"]

    negara_list = sorted(list(set(df_user["negara"])))
    negara_dict = {}
    for i in range(len(negara_list)):
        negara_dict[negara_list[i]] = i

    provinsi_list = sorted(list(set(df_user["provinsi"])))
    provinsi_dict = {}
    for i in range(len(provinsi_list)):
        provinsi_dict[provinsi_list[i]] = i

    num_user = df_user.shape[0]
    num_negara = len(negara_list)
    num_provinsi = len(provinsi_list)

    kolom_user = negara_list + provinsi_list
##    print("kolom_user")
##    print(kolom_user)
    user_detail = pd.DataFrame(np.zeros([num_user, num_negara+num_provinsi]), columns=kolom_user)# information abount user
    for i in range(num_user):
        user_detail.iloc[i, negara_dict[df_user["negara"].iloc[i]]] = 1
        user_detail.iloc[i, provinsi_dict[df_user["provinsi"].iloc[i]] + num_negara] = 1

    user_detail.index = df_user["user_id"]
    user_detail["usia1-30"] = np.where(df_user["usia"] <= 30,1, 0)

##    print("user_detail")
##    print(user_detail)

    baris_rating = df_user["user_id"]
    user_id_dict = {}
    for i in range(len(baris_rating)):
        user_id_dict[baris_rating[i]] = i

    kolom_rating = df_item["isbn"]
    item_id_dict = {}
    for i in range(len(kolom_rating)):
        item_id_dict[kolom_rating[i]] = i

    num_kolom_rating = len(kolom_rating)

    rating_detail = pd.DataFrame(np.zeros([num_user, num_kolom_rating]), columns=kolom_rating)# rating matrix
    mask_detail = pd.DataFrame(np.zeros([num_user, num_kolom_rating]), columns=kolom_rating)# mask matrix

    rating_detail.index = baris_rating;
##    rating_detail.columns = df_item["item_id"]
    
    mask_detail.index = baris_rating
##    mask_detail.columns = df_item["item_id"]

    for i in range(df.shape[0]):
        rating_detail.loc[df["user_id"].iloc[i], df["item_id"].iloc[i]] = df["rating"].iloc[i]
        mask_detail.loc[df["user_id"].iloc[i], df["item_id"].iloc[i]] = 1

##    print("rating_detail")
##    print(rating_detail)
    
    return [item_detail, user_detail, rating_detail, mask_detail, baris_rating, kolom_rating]


[item_detail_train, user_detail_train, rating_detail_train, mask_detail_train, baris_rating_train, kolom_rating_train] = preprocessing(df_train,df_user,df_item)


############################
# Define parameters
############################
random.seed(1)
training_ratio = 0.5
num_item = df_train.shape[0]
[m, p] = user_detail_train.shape
[n, q] = item_detail_train.shape
d = 10
R = rating_detail_train
X = np.transpose(user_detail_train)
Y = np.transpose(item_detail_train)
X = np.asarray(X, dtype=np.float32)
Y = np.asarray(Y, dtype=np.float32)

tmp = list(range(num_item))
random.shuffle(tmp)
train_mask = tmp[0:int(training_ratio * len(tmp))]
test_mask = tmp[int(training_ratio * len(tmp))::]
non_zero_element = np.where(mask_detail_train == 1)

A = np.zeros([m, n])
A[non_zero_element[0][train_mask], non_zero_element[1][train_mask]] = 1

A_test = np.zeros([m, n])  # mask matrix for evaluation
A_test[non_zero_element[0][test_mask], non_zero_element[1][test_mask]] = 1


# normalization
R_mean = np.mean(np.asarray(R)[np.where(A == 1)])
R_std = np.std(np.asarray(R)[np.where(A == 1)])
R = (R - R_mean) / R_std
R = np.asarray(R, dtype=np.float32)

alpha = args.alpha
beta = args.beta
lambda_val = args.lambda_val
corrupt_ratio = args.corrupt_ratio  # the ratio for mSDA
Epoch = args.Epoch

np.random.seed(100)
W1 = np.random.rand(p, p).astype(np.float32)
P1 = np.random.rand(p, d).astype(np.float32)
W2 = np.random.rand(q, q).astype(np.float32)
P2 = np.random.rand(q, d).astype(np.float32)

############################
# Update rules
############################

def update_P1(W_1, X, U):
    U = U.data
    a = np.dot(np.transpose(U), U)
    b = np.dot(np.dot(W1, X), U)
    a = np.transpose(a)
    b = np.transpose(b)
    return np.transpose(np.linalg.solve(a, b)).astype(np.float32)

def update_P2(W2, Y, V):
    V = V.data
    a = np.dot(np.transpose(V), V)
    b = np.dot(np.dot(W2, Y), V)
    a = np.transpose(a)
    b = np.transpose(b)
    return np.transpose(np.linalg.solve(a, b)).astype(np.float32)

def update_W1(X, lambda_val, corrupt_ratio, P1, U, p):
    U = U.data
    S1 = (1 - corrupt_ratio) * np.dot(X, np.transpose(X))
    S1 += lambda_val * np.dot(P1, np.dot(np.transpose(U), np.transpose(X)))
    Q1 = (1 - corrupt_ratio) * np.dot(X, np.transpose(X))
    tmp = (1 - corrupt_ratio) * (1 - corrupt_ratio) * (np.ones([p, p]) - np.diag(np.ones([p]))) * np.dot(X, np.transpose(X))
    tmp += (1 - corrupt_ratio) * np.diag(np.ones([p])) * np.dot(X, np.transpose(X))
    Q1 += lambda_val * tmp
    return np.linalg.solve(Q1, S1).astype(np.float32)

def update_W2(Y, lambda_val, corrupt_ratio, P2, V, q):
    V = V.data
    S2 = (1 - corrupt_ratio) * np.dot(Y, np.transpose(Y))
    S2 += lambda_val * np.dot(P2, np.dot(np.transpose(V), np.transpose(Y)))
    Q2 = (1 - corrupt_ratio) * np.dot(Y, np.transpose(Y))
    tmp = (1 - corrupt_ratio) * (1 - corrupt_ratio) * (np.ones([q, q]) - np.diag(np.ones([q]))) * np.dot(Y, np.transpose(Y))
    tmp += (1 - corrupt_ratio) * np.diag(np.ones([q])) * np.dot(Y, np.transpose(Y))
    Q2 += lambda_val * tmp
    return np.linalg.solve(Q2, S2).astype(np.float32)


class Model(chainer.Chain):

    def __init__(self, m, n, d):
        super(Model, self).__init__()
        with self.init_scope():
            self.u = L.Linear(d, m)
            self.v = L.Linear(d, n)

    def obtain_value(self, ):
        u = self.u.W.data
        v = self.v.W.data
        return [u, v]
    def obtain_loss(self, lambda_val, P1, W1, X, P2, W2, Y, A, R, alpha, beta):
        loss = 0
        loss += lambda_val * F.sum(F.square(F.matmul(P1, F.transpose(self.u.W)) - F.matmul(W1, X)))
        loss += lambda_val * F.sum(F.square(F.matmul(P2, F.transpose(self.v.W)) - F.matmul(W2, Y)))
        loss += alpha * F.sum(F.square(A * (R - F.matmul(self.u.W, F.transpose(self.v.W)))))
        loss += beta * ((F.sum(F.square(self.u.W)) + F.sum(F.square(self.v.W))))
        return loss


# model definition
model = Model(m, n, d)
optimizer = optimizers.SGD(0.002)
optimizer.setup(model)
U = model.u.W
V = model.v.W

loss_temp = sys.maxsize
loss = model.obtain_loss(lambda_val, P1, W1, X, P2, W2, Y, A, R, alpha, beta)
model.zerograds()
print("epoch ", loss)
loss.backward()
optimizer.update()
U = model.u.W.data
V = model.v.W.data
index = 1

while(loss.data < loss_temp):
    loss_temp = loss.data
    W1 = update_W1(X, lambda_val, corrupt_ratio, P1, U, p) #np.asarray(w1).astype(np.float32)
    W2 = update_W2(Y, lambda_val, corrupt_ratio, P2, V, q) #np.asarray(w2).astype(np.float32)
    P1 = update_P1(W1, X, U) #np.asarray(p1).astype(np.float32)
    P2 = update_P2(W2, Y, V) #np.asarray(p2).astype(np.float32)
    model.zerograds()
    loss = model.obtain_loss(lambda_val, P1, W1, X, P2, W2, Y, A, R, alpha, beta)

    print("epoch ", loss)
    loss.backward()
    optimizer.update()
    U = model.u.W.data
    V = model.v.W.data
    if(index == Epoch):
        break
    index = index + 1

##for epoch in range(Epoch):
##    W1 = update_W1(X, lambda_val, corrupt_ratio, P1, U, p)
##    W2 = update_W2(Y, lambda_val, corrupt_ratio, P2, V, q)
##    P1 = update_P1(W1, X, U)
##    P2 = update_P2(W2, Y, V)
##    loss = model.obtain_loss(lambda_val, P1, W1, X, P2, W2, Y, A, R, alpha, beta)
##
##    model.zerograds()
##    loss = model.obtain_loss(lambda_val, P1, W1, X, P2, W2, Y, A, R, alpha, beta)
##    print("epoch", loss.data)
##    loss.backward()
##    optimizer.update()
##    U = model.u.W
##    V = model.v.W

output = [A,R,X,Y,W1,W2,P1,P2]
numU = np.array(U.data)
numV = np.array(V.data)
print("R")
result = np.matmul(numU,np.transpose(numV))
amin = np.amin(result)
amax= np.amax(result)
print(amin)
print(amax)

final = np.zeros([len(result),len(result[0])])
f = open("ratingPrediksi.csv", "a")
f.truncate(0)
f.write("user_id;item_id;rating\n")
for i in range(len(result)):
    for j in range(len(result[i])):
        final[i,j] = ((result[i,j]-amin)/(amax-amin))*(10-1)+1
        barisName = baris_rating_train[i]
        kolomName = kolom_rating_train[j]
        data = str(barisName)+";"+str(kolomName)+ ";" + str(final[i,j]) + "\n"
        f.write(data)

f.close()
##print("final")
##print(final)
##print(result)


with open('output.dump', 'wb') as f:
    pickle.dump(output, f)
