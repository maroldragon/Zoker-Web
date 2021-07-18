const dbRef = firebase.database().ref();
var user_id_all = ""
saveDataUserToCsv()
saveDataRatingToCsv()
function getNewPredictionRating(){
    $.ajax({
        url: './admin/algo/ratingPrediksi.csv',
        dataType: 'text',
      }).done(successFunction);
    
    function successFunction(csv) {
        let data = []
        let allTextLines = csv.split(/\r\n|\n/);
        for(let i=0;i<allTextLines.length;i++){
            let row = allTextLines[i].split(';');
            let col = []
            for(let j=0;j<row.length;j++){
                col.push(row[j]);
            }
            data.push(col);
        }
        // console.log(data);
        savePreditionRating(data);
    }
}

function savePreditionRating(data){
    let database = firebase.database();
    for(let i=1;i<data.length-1;i++){
        let isbn = (data[i][1]).substring(4)
        let userId = data[i][0]
        let prediksiRatingId = userId + "-" + isbn
        database.ref('ratingPrediksi/' + prediksiRatingId).set({
            idRatingPrediksi: prediksiRatingId,
            idBuku: isbn,
            idUser: userId,
            rating: (parseFloat(data[i][2])).toFixed(2)
        })
    }
}

function getNewPredictionRating(){
    $.ajax({
        url: 'algo/ratingPrediksi.csv',
        dataType: 'text',
      }).done(successFunction);
    
    function successFunction(csv) {
        let data = []
        let allTextLines = csv.split(/\r\n|\n/);
        for(let i=0;i<allTextLines.length;i++){
            let row = allTextLines[i].split(';');
            let col = []
            for(let j=0;j<row.length;j++){
                col.push(row[j]);
            }
            data.push(col);
        }
        // console.log(data);
        savePreditionRating(data);
    }
}

function savePreditionRating(data){
    let database = firebase.database();
    for(let i=1;i<data.length-1;i++){
        let isbn = (data[i][1]).substring(4)
        let userId = data[i][0]
        let prediksiRatingId = userId + "-" + isbn
        database.ref('ratingPrediksi/' + prediksiRatingId).set({
            idRatingPrediksi: prediksiRatingId,
            idBuku: isbn,
            idUser: userId,
            rating: (parseFloat(data[i][2])).toFixed(2)
        })
    }
}

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        console.log("You Login Now");
        var user = firebase.auth().currentUser;
        var userId = user.uid;
        user_id_all = userId;

        $("#menuGuest").addClass("d-none")
        $("#menuUser").removeClass("d-none")
        var usernameHeader = $("#linkProfilUser")

        dbRef.child("user").child(userId).get().then((snapshot) => {
        if (snapshot.exists()) {
            generateProfile(snapshot.val())
            generateEditProfile(snapshot.val())
            usernameHeader.text(snapshot.val().userName)
        } else {
            console.log("No data available");
        }
        }).catch((error) => {
            console.error(error);
        });
    } else {
        $("#menuUser").addClass("d-none")
        $("#menuGuest").removeClass("d-none")
        //console.log("You Not Login")
    }
});

function registerUser(){
    var email = $("#inputEmail").val();
    var password = $("#inputPassword").val();
    var passwordConfirm = $("#inputKonfirmasiPassword").val();
    if(password != passwordConfirm){
        swal("Error", "Password Tidak Sama", "error")
    }else {
        firebase.auth().createUserWithEmailAndPassword(email, password)
        .then((userCredential) => {
            // Signed in
            var user = userCredential.user;
            console.log(user)
            writeUserData(user.uid);
        })
        .catch((error) => {
            var errorCode = error.code;
            var errorMessage = error.message;
            // ..
        });
    }
}

function writeUserData(userId) {
    var namaDepan = $("#inputNamaDepan").val();
    var namaBelakang = $("#inputNamaBelakang").val();
    var userName = $("#inputUsername").val();
    var jenisKelamin = $("#inputJenisKelamin option:selected").val();
    var tempatLahir = $("#inputTempatLahir").val();
    var tanggalLahir = $("#inputTanggalLahir").val();
    var agama = $("#inputAgama option:selected").val();
    var hobi = $("#inputHobi").val();
    var negara = $("#inputNegara").val();
    var provinsi = $("#inputProvinsi").val();
    var kota = $("#inputKota").val();
    var alamat = $("#inputAlamat").val();
    var email = $("#inputEmail").val();
    var password = $("#inputPassword").val();
    let database = firebase.database();

    database.ref('user/' + userId).set({
        userId:userId,
        namaDepan: namaDepan,
        namaBelakang: namaBelakang,
        userName : userName,
        jenisKelamin : jenisKelamin,
        tempatLahir: tempatLahir,
        tanggalLahir: tanggalLahir,
        agama : agama,
        hobi : hobi,
        negara : negara,
        provinsi : provinsi,
        kota : kota,
        alamat : alamat,
        email : email,
        password: password
    }).then( () => {
        saveDataUserToCsv()
        swal("Success", "Registrasi Berhasil", "success").then(()=>{
            location.href = "./index.php"
        })
    });
}

function addCarousel(){
    var carousel = document.getElementById("carousel-book");
    carousel.innerHTML = ""
    var active = "active"
    dbRef.child("books").orderByChild('rating').limitToLast(3).on("value", function (snapshot) {
        snapshot.forEach(function(child) {
            carousel.innerHTML += "<div class='carousel-item " +  active + "'> <div class='row'>"+
              "<div class='col-lg-3 col-md-3 col-sm-5'>"+
                "<img src='"+ child.val().cover +"' class='carousel-img' alt='...' id='carouselImage'>"+
              "</div>"+
              "<div class='col-lg-9 col-md-9 col-sm-7 pos-middle'>"+
                "<div class='d-inline mt-4 mb-4'>"+
                  "<div class='carousel-highlight'>Populer</div>"+
                  "<div class='carousel-title' id='carouselJudul'>"+ child.val().judul +"</div>"+
                  "<div class='carousel-caption' id='carouselPenulis'>"+ child.val().penulis +"</div>"+
                  "<a href='detail_buku.php?isbn="+ child.val().isbn +"' class='btn btn-carousel form-control mt-3' id='carouselButton'>Lihat Buku</a>"+
                "</div> </div> </div> </div>";
                active = ""
        });
    }, function (errorObject) {
        console.log(errorObject) 
    });
}

function addNewBook(){
    var listBookNew = document.getElementById("listBookNew");
    listBookNew.innerHTML = ""
    dbRef.child("books").limitToFirst(6).on("value", function (snapshot) {
        snapshot.forEach(function(child) {
            listBookNew.innerHTML += "<div class='col-lg-2 col-md-4 col-sm-4 col-6'> <div class='card'>" +
              "<div class='card-rating'>"+
                "<i class='fas fa-star'></i><span id='newCardRating'>"+ child.val().rating +"</span>"+
              "</div>"+
              "<img src='"+ child.val().cover +"' class='card-img-top' alt='...' id='newCardImage'>"+
              "<div class='card-body'>"+
                "<a class='card-title' href='detail_buku.php?isbn="+ child.val().isbn +"' id='newCardJudul'>"+ child.val().judul +"</a>"+
                "<div class='card-text' id='newCardPenulis'>"+ child.val().penulis +"</div>"+
              "</div> </div> </div>"
        });
    }, function (errorObject) {
        console.log(errorObject) 
    });
}

function addRecommendBook(){
    var listBookRec = document.getElementById("listBookRecommend");
    listBookRec.innerHTML = ""
    firebase.auth().onAuthStateChanged(function(user) {
        let  dataBook = []
        if (user) {
            var user = firebase.auth().currentUser;
            var userId = user.uid;
            dbRef.child("ratingPrediksi").orderByChild("idUser").equalTo(userId).on("value", function (snapshot) {
                snapshot.forEach(function(child) {
                    var rate = ""+child.val().rating
                    dataBook.push(child)
                    // console.log(child.val());
                });
                
                dataBook.sort(function(a, b) {
                    return a.val().rating - b.val().rating;
                });

                for(var key=0;key<dataBook.length;key++){
                    generateRecommendBook(dataBook[key].val().idBuku, listBookRec);
                }
                
            }, function (errorObject) {
                console.log(errorObject) 
            });
        }
    })    
}

function generateRecommendBook(idBuku, listBookRec) {
    dbRef.child("books").orderByChild("isbn").equalTo(idBuku).on("value", function (snapshot) {
        snapshot.forEach(function(child) {
            listBookRec.innerHTML += "<div class='col-lg-2 col-md-4 col-sm-4 col-6'> <div class='card'>" +
            "<div class='card-rating'>"+
            "<i class='fas fa-star'></i><span id='recCardRating'>"+ child.val().rating +"</span>"+
            "</div>"+
            "<img src='"+ child.val().cover +"' class='card-img-top' alt='...' id='recCardImage'>"+
            "<div class='card-body'>"+
            "<a class='card-title' href='detail_buku.php?isbn="+ child.val().isbn +"' id='recCardJudul'>"+ child.val().judul +"</a>"+
            "<div class='card-text' id='recCardPenulis'>"+ child.val().penulis +"</div>"+
            "</div> </div> </div>"
        });
    }, function (errorObject) {
        console.log(errorObject) 
    });
}


function addKategoriBook(kategori){
    var listBookKat = document.getElementById("listBookKategori");
    listBookKat.innerHTML = ""
    var query = ""
    if(kategori != ""){
        query = dbRef.child("books").orderByChild('kategori').equalTo(kategori);
    }else {
        query = dbRef.child("books").orderByChild('kategori')
    }

    query.on("value", function (snapshot) {
        snapshot.forEach(function(child) {
            listBookKat.innerHTML += "<div class='col-lg-2 col-md-4 col-sm-4 col-6'> <div class='card'>" +
              "<div class='card-rating'>"+
                "<i class='fas fa-star'></i><span id='katCardRating'>"+ child.val().rating +"</span>"+
              "</div>"+
              "<img src='"+ child.val().cover +"' class='card-img-top' alt='...' id='katCardImage'>"+
              "<div class='card-body'>"+
                "<a class='card-title' href='detail_buku.php?isbn="+ child.val().isbn +"' id='katCardJudul'>"+ child.val().judul +"</a>"+
                "<div class='card-text' id='katCardPenulis'>"+ child.val().penulis +"</div>"+
              "</div> </div> </div>"
        });
    }, function (errorObject) {
        console.log(errorObject) 
    });
}

function addSearchBook(keyword){
    var listBookSearch = document.getElementById("listBookSearch");
    listBookSearch.innerHTML = ""
    var query = ""
    query = dbRef.child("books")
    var exist = false;
    $("#emptyPencarian").css("display", "block")
    query.on("value", function (snapshot) {
        snapshot.forEach(function(child) {
            if(child.val().judul.toLowerCase().includes(keyword.toLowerCase())){
                addDataSearch(listBookSearch, child)
                exist = true;
            }
        }).then(() => {
            console.log("SARA")
            if(!exist){
                listBookSearch.innerHTML = ""
            }
        });
    }, function (errorObject) {
        console.log(errorObject) 
    });
}

function addDataSearch(list, child){
    $("#emptyPencarian").css("display", "none")
    list.innerHTML += "<div class='col-lg-2 col-md-4 col-sm-4 col-6'> <div class='card'>" +
    "<div class='card-rating'>"+
      "<i class='fas fa-star'></i><span id='searchCardRating'>"+ child.val().rating +"</span>"+
    "</div>"+
    "<img src='"+ child.val().cover +"' class='card-img-top' alt='...' id='searchCardImage'>"+
    "<div class='card-body'>"+
      "<a class='card-title' href='detail_buku.php?isbn="+ child.val().isbn +"' id='searchCardJudul'>"+ child.val().judul +"</a>"+
      "<div class='card-text' id='searchCardPenulis'>"+ child.val().penulis +"</div>"+
    "</div> </div> </div>"
}

function simpanProfileUser(){
    let database = firebase.database();
    var namaDepan = $("#inputNamaDepan").val();
    var namaBelakang = $("#inputNamaBelakang").val();
    var username = $("#inputUsername").val();
    var jenisKelamin = $("#inputJenisKelamin").val();
    var tempatLahir = $("#inputTempatLahir").val();
    var tanggalLahir = $("#inputTanggalLahir").val();
    var agama = $("#inputAgama").val();
    var hobi = $("#inputHobi").val();
    var negara = $("#inputNegara").val();
    var provinsi = $("#inputProvinsi").val();
    var kota = $("#inputKota").val();
    var alamat = $("#inputAlamat").val();
    var user = firebase.auth().currentUser;
    var userId = user.uid;

    database.ref('user/' + userId + "/namaDepan").set(namaDepan)
    database.ref('user/' + userId + "/namaBelakang").set(namaBelakang)
    database.ref('user/' + userId + "/userName").set(username)
    database.ref('user/' + userId + "/jenisKelamin").set(jenisKelamin)
    database.ref('user/' + userId + "/tempatLahir").set(tempatLahir)
    database.ref('user/' + userId + "/tanggalLahir").set(tanggalLahir)
    database.ref('user/' + userId + "/alamat").set(alamat)
    database.ref('user/' + userId + "/agama").set(agama)
    database.ref('user/' + userId + "/hobi").set(hobi)
    database.ref('user/' + userId + "/alamat").set(alamat)
    database.ref('user/' + userId + "/negara").set(negara)
    database.ref('user/' + userId + "/provinsi").set(provinsi)
    database.ref('user/' + userId + "/kota").set(kota)
    swal("Selamat", "Berhasil di edit", "success");

}

function generateBookDetail(){
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            var user = firebase.auth().currentUser;
            var userId = user.uid;
            var isbnGet = (location.search.replace('?', '').split('='))[1];
            var judul = $("#textJudul")
            var kategori = $("#textKategori")
            var penulis = $("#textPenulis")
            var penerbit = $("#textPenerbit")
            var tahunTerbit = $("#textTahunTerbit")
            var textIsbn = $("#textIsbn")
            var ringkasan = $("#textRingkasan")
            var imageBuku = $("#imageBuku");
            var rating = $("#ratingBukuDetail")

            dbRef.child("books").orderByChild('isbn').equalTo(isbnGet).on("value", function (snapshot) {
                snapshot.forEach(function(child) {
                    judul.text(child.val().judul)
                    kategori.text(child.val().kategori)
                    penulis.text(child.val().penulis)
                    tahunTerbit.text(child.val().tahunTerbit)
                    penerbit.text(child.val().penerbit)
                    textIsbn.text(child.val().isbn)
                    ringkasan.text(child.val().deskripsi)
                    imageBuku.attr("src", child.val().cover)
                    rating.text((child.val().rating))
                });
            }, function (errorObject) {
                console.log(errorObject) 
            });

            dbRef.child("ratings").orderByChild('idRating').equalTo(userId+"-"+isbnGet).on("value", function (snapshot) {
                snapshot.forEach(function(child) {
                    $("#rate-"+parseInt(child.val().rating)).prop('checked', true)
                    console.log($("rate-"+ (child.val().rating)))
                    $("#ratingFeedback").text(parseInt(child.val().rating));
                    $("#inputUlasan").val(child.val().ulasan);
                    $("#buttonKirimUlasan").hide()
                });
            }, function (errorObject) {
                console.log(errorObject) 
            });

            dbRef.child("peminjaman").orderByChild('idPeminjaman').equalTo(userId+"-"+isbnGet).on("value", function (snapshot) {
                snapshot.forEach(function(child) {
                    $("#buttonPinjamBuku").text("Buku Sudah Dipinjam");
                    $("#buttonPinjamBuku").prop("disabled", true);
                });
            }, function (errorObject) {
                console.log(errorObject) 
            });

        }else{
            console.log("Belum login")
        }
    })
}
function savePinjamBuku(){
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            var isbnGet = (location.search.replace('?', '').split('='))[1];
            var user = firebase.auth().currentUser;
            var userId = user.uid;
            var bookId = isbnGet;
            var peminjamanId = userId+"-"+bookId;
            var date = new Date();
            let tanggal = new Date().toLocaleDateString();
            var status = "unfinished"
                
            dbRef.child("user").child(userId).get().then((snapshot) => {
            if (snapshot.exists()) {
                let database = firebase.database();
                database.ref('peminjaman/' + peminjamanId).set({
                    idPeminjaman : peminjamanId,
                    idBuku : bookId,
                    idUser : userId,
                    status : status,
                    tanggal : tanggal
                }).then(() => {
                    swal("Selamat", "Buku Berhasil Di Dipinjam", "success").then(function(){ 
                        location.href = "./buku_terpinjam.php"
                    });
                })
            } else {
                console.log("No data available");
            }
            }).catch((error) => {
                console.error(error);
            });
        } else {
            location.href = "./login.php"
        }
    });
}

function generateBukuTerpinjam() {
    firebase.auth().onAuthStateChanged(function(user) {
        if (user) {
            var isbnGet = (location.search.replace('?', '').split('='))[1];
            var user = firebase.auth().currentUser;
            var userId = user.uid;
            var bookId = isbnGet;
            var peminjamanId = userId+"-"+bookId;
            var date = new Date();
            var tanggal = date.getDay()+"/"+date.getMonth()+"/"+date.getFullYear;
            var status = "unfinished"
                
            $("#emptyPinjam").css("display", "block")
            var listBookTerpinjam = document.getElementById("listBookTerpinjam");
            listBookTerpinjam.innerHTML = ""

            dbRef.child("peminjaman").orderByChild("idUser").equalTo(userId).on("value", function (snapshot) {
                snapshot.forEach(function(child) {
                    generateDataTersimpan(child.val().idBuku, listBookTerpinjam)
                })
            });

        } else {
            console.log("You Not Login")
        }
    });
}

function generateDataTersimpan(bookId, listBookTerpinjam) {
    $("#emptyPinjam").css("display", "none")
    dbRef.child("books").orderByChild("isbn").equalTo(bookId).on("value", function (snapshot) {
        snapshot.forEach(function(child) {
            listBookTerpinjam.innerHTML += "<div class='col-lg-2 col-md-4 col-sm-4 col-6'> <div class='card'>" +
            "<div class='card-rating'>"+
                "<i class='fas fa-star'></i><span id='newCardRating'>"+ child.val().rating +"</span>"+
            "</div>"+
            "<img src='"+ child.val().cover +"' class='card-img-top' alt='...' id='newCardImage'>"+
            "<div class='card-body'>"+
                "<a class='card-title' href='detail_buku.php?isbn="+ child.val().isbn +"' id='newCardJudul'>"+ child.val().judul +"</a>"+
                "<div class='card-text' id='newCardPenulis'>"+ child.val().penulis +"</div>"+
                "<a href='baca_buku.php?read="+ child.val().isbn +"' class='btn btn-primary form-control' id='buttonBacaBuku'>Baca Buku</a>"+
            "</div> </div> </div>"
        });
    }, function (errorObject) {
        console.log(errorObject) 
    });
}

function generateProfile(snap) {
    $("#textNamaLengkap").text(snap.namaDepan + " " + snap.namaBelakang);
    $("#textUsername").text(snap.userName);
    $("#textJenisKelamin").text(snap.jenisKelamin);
    $("#textTempatLahir").text(snap.tempatLahir);
    $("#textTanggalLahir").text(snap.tanggalLahir);
    $("#textAgama").text(snap.agama);
    $("#textHobi").text(snap.hobi);
    $("#textAlamat").text(snap.alamat);
    $("#textKota").text(snap.kota);
    $("#textProvinsi").text(snap.provinsi);
    $("#textNegara").text(snap.negara);
    $("#textEmail").text(snap.email);
}

function generateEditProfile(snap) {
    $("#inputNamaDepan").val(snap.namaDepan);
    $("#inputNamaBelakang").val(snap.namaBelakang);
    $("#inputUsername").val(snap.userName);
    $("#inputJenisKelamin").val(snap.jenisKelamin);
    $("#inputTempatLahir").val(snap.tempatLahir);
    var mydate = convertTanggal(snap.tanggalLahir);
    $("#inputTanggalLahir").val(mydate);
    $("#inputAgama").val(snap.agama);
    $("#inputHobi").val(snap.hobi);
    $("#inputNegara").val(snap.negara);
    $("#inputProvinsi").val(snap.provinsi);
    $("#inputKota").val(snap.kota);
    $("#inputAlamat").val(snap.alamat);
    $("#inputEmail").val(snap.email);
}

function convertTanggal(str) {
    var date = new Date(str),
      mnth = ("0" + (date.getMonth() + 1)).slice(-2),
      day = ("0" + date.getDate()).slice(-2);
    return [date.getFullYear(), mnth, day].join("-");
  }

function readBook(){
    var isbn = (location.search.replace('?', '').split('='))[1];
    getFileByIsbn(isbn)
}

function getFileByIsbn(isbn){
    dbRef.child("books").orderByChild("isbn").equalTo(isbn).on("value", function (snapshot) {
        snapshot.forEach(function(child) {
            PDFObject.embed(child.val().file, "#viewBook");
        });
    }, function (errorObject) {
        console.log(errorObject) 
    });
}

$("#buttonSearch").click(function(e) {
    e.preventDefault()
    var search = $("#inputSearch").val();
    location.href = "./search.php?search=" + search;
})

function tambahkanUlasan(){
    var isbnGet = (location.search.replace('?', '').split('='))[1];
    var user = firebase.auth().currentUser;
    var userId = user.uid;
    var bookId = (location.search.replace('?', '').split('='))[1];
    var ratingId = userId + "-" + bookId
    var rate =  $("#ratingFeedback").text()
    var ulasanValue = $("#inputUlasan").val();
    let database = firebase.database();
    let tanggal = new Date().toLocaleDateString();
    
    dbRef.child("peminjaman").child(userId+"-"+isbnGet).get().then((snapshot) => {
        if (snapshot.exists()) {
            database.ref('ratings/' + ratingId).set({
                idRating: ratingId,
                idBuku : bookId,
                idUser : userId,
                ulasan: ulasanValue,
                rating : rate,
                tanggal : tanggal
            }).then(() => {
                saveDataRatingToCsv()
                swal("Terima Kasih", "Rating Berhasil Dikirim", "success").then(function(){ 
                    location.href = "./detail_buku.php?isbn="+bookId
                });
            });
        }else{
            swal("Error", "Lakukan Peminjaman terlebih Dahulu", "error")
        }
    })

// function saveDataRatingToCsv(){
//     var dataRating = []
//     const dbRef = firebase.database().ref();
//     dbRef.child("ratings").once('value', function(allRecord){
//         allRecord.forEach( function(currentRecord) {
//             var userId = currentRecord.val().idUser;
//             var itemId = "ISBN"+currentRecord.val().idBuku;
//             var rating = currentRecord.val().rating;
//             dataRating.push(userId+';'+itemId+';'+rating);
//         })
//     }).then(() => {
//         export_rating(dataRating)
//     });
// }

// function export_rating(arrayData) {
//     $.ajax({
//         url: "./admin/algo/createDataBook.php",
//         type:"POST",
//         data: {
//             listRating:arrayData,
//         },success:function(response){
//             getNewPredictionRating()
//             console.log(response);
//             if(response) {
//                 //location.reload();
//             }
//         }
//     })
// >>>>>>> 01933edd569c350c75f62e4d74571ff68362a186
// }

function saveDataRatingToCsv(){
    var dataRating = []
    const dbRef = firebase.database().ref();
    dbRef.child("ratings").once('value', function(allRecord){
        allRecord.forEach( function(currentRecord) {
            var userId = currentRecord.val().idUser;
            var itemId = "ISBN"+currentRecord.val().idBuku;
            var rating = currentRecord.val().rating;
            dataRating.push(userId+';'+itemId+';'+rating);
        })
    }).then(() => {
        export_rating(dataRating)
    });
}

function export_rating(arrayData) {
    $.ajax({
        url: "./admin/algo/createDataBook.php",
        type:"POST",
        data: {
            listRating:arrayData,
        },success:function(response){
            getNewPredictionRating()
            console.log(response);
            if(response) {
                //location.reload();
            }
        }
    })
}

function saveDataUserToCsv(){
    var dataUser = []
    const dbRef = firebase.database().ref();
    dbRef.child("user").once('value', function(allRecord){
        allRecord.forEach( function(currentRecord) {
            var userId = currentRecord.val().userId;
            var negara = currentRecord.val().negara.toLowerCase()
            var provinsi = currentRecord.val().provinsi.toLowerCase()
            var usia = getAge(currentRecord.val().tanggalLahir)
            dataUser.push(userId+';'+negara+';'+provinsi+';'+usia);
        })
    }).then(() => {
        export_user(dataUser)
    });
}

function convertTl(str) {
    var date = new Date(str),
      mnth = ("0" + (date.getMonth() + 1)).slice(-2),
      day = ("0" + date.getDate()).slice(-2);
    return [date.getFullYear(), mnth, day].join("-");
}

function getAge(dateString){
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
    {
        age--;
    }
    return age;
}

function export_user(arrayData) {
    $.ajax({
        url: "./admin/algo/createDataBook.php",
        type:"POST",
        data: {
            listUser:arrayData,
        },success:function(response){
            getNewPredictionRating()
            console.log(response);
            if(response) {
                //location.reload();
            }
        }
    })
}





$("#btn-logout").click(function(){
    firebase.auth().signOut().then(function() {
    }).catch(function(error) {
    // An error happened.
    });
})
