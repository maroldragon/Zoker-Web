const dbRef = firebase.database().ref();
var user_id_all = ""
// saveDataUserToCsv()
// saveDataRatingToCsv()
getNewPredictionRating()
function getNewPredictionRating() {
    $.ajax({
        url: './admin/algo/ratingPrediksi.csv',
        dataType: 'text',
    }).done(successFunction);

    function successFunction(csv) {
        let data = []
        let allTextLines = csv.split(/\r\n|\n/);
        for (let i = 0; i < allTextLines.length; i++) {
            let row = allTextLines[i].split(';');
            let col = []
            for (let j = 0; j < row.length; j++) {
                col.push(row[j]);
            }
            data.push(col);
        }
        // console.log(data);
        savePreditionRating(data);
    }
}

function savePreditionRating(data) {
    let database = firebase.database();
    for (let i = 1; i < data.length - 1; i++) {
        let isbn = (data[i][1]).substring(4)
        let userId = data[i][0]
        let prediksiRatingId = userId + "-" + isbn
        database.ref('ratingPrediksi/' + prediksiRatingId).set({
            idRatingPrediksi: prediksiRatingId,
            idBuku: isbn,
            idUser: userId,
            rating: (parseFloat(data[i][2])).toFixed(2)
        }).then(()=> {
            console.log("Rating Prediction Added")  
        })
    }
}

/*########################################/
            DEVELOP PURPOSE
#########################################*/

// dbRef.child("user").on("value", function (snapshot) {
//     snapshot.forEach(function(child) {
//         let database = firebase.database();
//         console.log(child.val().userId);
//         database.ref('user/' + child.val().userId + "/status").set("verified")
//     });    
// }, function (errorObject) {
//     console.log(errorObject) 
// });

/*########################################/
        END DEVELOP PURPOSE
#########################################*/

firebase.auth().onAuthStateChanged(function (user) {
    if (user) {
        var user = firebase.auth().currentUser;
        var userId = user.uid;
        const dbRef = firebase.database().ref();
        dbRef.child("user").child(userId).get().then((snapshot) => {
            if (!snapshot.exists()) {
                firebase.auth().signOut().then(function() {
                }).catch(function(error) {
                // An error happened.
                });
            } else {

            }
        })

        console.log("You Login Now");
        var user = firebase.auth().currentUser;
        var userId = user.uid;
        user_id_all = userId;

        $("#menuGuest").addClass("d-none");
        $("#menuUser").removeClass("d-none");
        var photoEdit = $("#imagePreview");
        var photoHeader = $("#headerPhotoProfil");
        var usernameHeader = $("#headerUserName");
        var namaLengkapHeader = $("#linkProfilUser");

        dbRef.child("user").child(userId).get().then((snapshot) => {
            if (snapshot.exists()) {
                generateProfile(snapshot.val())
                generateEditProfile(snapshot.val())
                usernameHeader.text(snapshot.val().userName)
                namaLengkapHeader.text(snapshot.val().namaLengkap)
                if(snapshot.val().photo != ""){
                    photoHeader.attr("src", snapshot.val().photo);                    
                    photoEdit.css("background-image", "url("+snapshot.val().photo+")")
                }else {
                    photoHeader.attr("src", "../img/no_image.png");      
                    photoEdit.css("background-image", "url("+"'../img/no_image.png'"+")")
                }
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

function registerUser() {
    var namaLengkap = $("#inputNamaLengkap").val();
    var userName = $("#inputUsername").val();
    var jenisKelamin = $("#inputJenisKelamin option:selected").val();
    var tempatLahir = $("#inputTempatLahir").val();
    var tanggalLahir = $("#inputTanggalLahir").val();
    var negara = $("#inputNegara").val();
    var provinsi = $("#inputProvinsi").val();
    var kota = $("#inputKota").val();
    var alamat = $("#inputAlamat").val();
    var email = $("#inputEmail").val();
    var formatEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var email = $("#inputEmail").val();
    var password = $("#inputPassword").val();
    var passwordConfirm = $("#inputKonfirmasiPassword").val();

    if (namaLengkap == "") {
        swal("Error", "Nama Lengkap Tidak Boleh Kosong", "error");
    } else if (userName == "") {
        swal("Error", "Username Tidak Boleh Kosong", "error");
    } else if (tempatLahir == "") {
        swal("Error", "Tempat Lahir Tidak Boleh Kosong", "error");
    } else if (negara == "") {
        swal("Error", "Negara Tidak Boleh Kosong", "error");
    } else if (provinsi == "") {
        swal("Error", "Provinsi Tidak Boleh Kosong", "error");
    } else if (kota == "") {
        swal("Error", "Kota Tidak Boleh Kosong", "error");
    } else if (alamat == "") {
        swal("Error", "Alamat Tidak Boleh Kosong", "error");
    } else if (email == "") {
        swal("Error", "Email Tidak Boleh Kosong", "error");
    } else if (!formatEmail.test(email)) {
        swal("Error", "Format Email Salah", "error");
    } else if(password == ""){
        swal("Error", "Password Tidak Boleh Kosong", "error");
    } else if(password.length < 6){
        swal("Error", "Password Minimal 6 Karakter", "error");
    } else if(passwordConfirm == ""){
        swal("Error", "Konfirmasi Password Tidak Boleh Kosong", "error");
    } else if (password != passwordConfirm) {
        swal("Error", "Password Tidak Sama", "error")
    } else {
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
                swal("Error", "Email Sudah Terdaftar", "error")
            });
    }

    // function checkEmail(email){
    //     firebase.auth().fetchSignInMethodsForEmail(email).once("value", function(snapshot) {
    //         console.log(snapshot);
    //     })
    // }
}

function writeUserData(userId) {
    var namaLengkap = $("#inputNamaLengkap").val();
    var userName = $("#inputUsername").val();
    var jenisKelamin = $("#inputJenisKelamin option:selected").val();
    var tempatLahir = $("#inputTempatLahir").val();
    var tanggalLahir = $("#inputTanggalLahir").val();
    var negara = $("#inputNegara").val();
    var provinsi = $("#inputProvinsi").val();
    var kota = $("#inputKota").val();
    var alamat = $("#inputAlamat").val();
    var email = $("#inputEmail").val();
    var password = $("#inputPassword").val();

    $.ajax({
        url: "./createHashPassword.php",
        type: "POST",
        data: {
            password: password,
        }, success: function (response) {
            console.log(response);
            if (response) {
                regNow(response)
            }
        }
    })

    function regNow(pass) {
        let database = firebase.database();
        database.ref('user/' + userId).set({
            userId: userId,
            namaLengkap: namaLengkap,
            userName: userName,
            jenisKelamin: jenisKelamin,
            tempatLahir: tempatLahir,
            tanggalLahir: tanggalLahir,
            negara: negara,
            provinsi: provinsi,
            kota: kota,
            alamat: alamat,
            email: email,
            status: "unverified",
            password : pass
        }).then(() => {
            saveDataUserToCsv()
            swal("Success", "Registrasi Berhasil, Akun Anda Akan Diverifikasi Terlebih Dahulu", "success").then(() => {
                firebase.auth().signOut().then(function () {
                    location.href = "./index.php"
                }).catch(function (error) {
                    // An error happened.
                });
            })
        });
    }
}
    

function addCarousel() {
    var carousel = document.getElementById("carousel-book");
    carousel.innerHTML = ""
    var active = "active"
    dbRef.child("books").orderByChild('rating').limitToLast(3).on("value", function (snapshot) {
        snapshot.forEach(function (child) {
            carousel.innerHTML += "<div class='carousel-item " + active + "'> <div class='row'>" +
                "<div class='col-lg-3 col-md-3 col-sm-5'>" +
                "<img src='" + child.val().cover + "' class='carousel-img' alt='...' id='carouselImage'>" +
                "</div>" +
                "<div class='col-lg-9 col-md-9 col-sm-7 pos-middle'>" +
                "<div class='d-inline mt-4 mb-4'>" +
                "<div class='carousel-highlight'>Populer</div>" +
                "<div class='carousel-title' id='carouselJudul'>" + child.val().judul + "</div>" +
                "<div class='carousel-caption' id='carouselPenulis'>" + child.val().penulis + "</div>" +
                "<a href='detail_buku.php?isbn=" + child.val().isbn + "' class='btn btn-carousel form-control mt-3' id='carouselButton'>Lihat Buku</a>" +
                "</div> </div> </div> </div>";
            active = ""
        });
    }, function (errorObject) {
        console.log(errorObject)
    });
}

function addNewBook() {
    var listBookNew = document.getElementById("listBookNew");
    listBookNew.innerHTML = ""
    dbRef.child("books").orderByChild("tanggal").limitToFirst(6).on("value", function (snapshot) {
        snapshot.forEach(function (child) {
            listBookNew.innerHTML += "<div class='col-lg-2 col-md-4 col-sm-4 col-6'> <div class='card'>" +
                "<div class='card-rating'>" +
                "<i class='fas fa-star'></i><span id='newCardRating'>" + child.val().rating + "</span>" +
                "</div>" +
                "<img src='" + child.val().cover + "' class='card-img-top' alt='...' id='newCardImage'>" +
                "<div class='card-body'>" +
                "<a class='card-title' href='detail_buku.php?isbn=" + child.val().isbn + "' id='newCardJudul'>" + child.val().judul + "</a>" +
                "<div class='card-text' id='newCardPenulis'>" + child.val().penulis + "</div>" +
                "</div> </div> </div>"
        });
    }, function (errorObject) {
        console.log(errorObject)
    });
}

function addRecommendBook() {
    var listBookRec = document.getElementById("listBookRecommend");
    listBookRec.innerHTML = ""
    firebase.auth().onAuthStateChanged(function (user) {
        let dataBook = []
        if (user) {
            $("#textRecommendation").text("Rekomedasi")
            var user = firebase.auth().currentUser;
            var userId = user.uid;
            dbRef.child("ratingPrediksi").orderByChild("idUser").equalTo(userId).on("value", function (snapshot) {
                snapshot.forEach(function (child) {
                    var rate = "" + child.val().rating
                    dataBook.push(child)
                    // console.log(child.val())
                });
                //console.log(dataBook)
                dataBook.sort(function (a, b) {
                    return a.val().rating - b.val().rating;
                });

                var mini = 0;
                if(dataBook.length > 20) {
                    mini = dataBook.length-20;
                }
                
                for (var key = dataBook.length - 1; key >= mini; key--) {
                    console.log(dataBook[key].val())
                    generateRecommendBook(dataBook[key].val().idBuku, listBookRec);
                }

            }, function (errorObject) {
                console.log(errorObject)
            });
        } else {
            $("#textRecommendation").text("Rekomedasi Populer")
            dbRef.child("books").orderByChild("rating").on("value", function (snapshot) {
                snapshot.forEach(function (child) {
                    dataBook.push(child)
                });

                dataBook.sort(function (a, b) {
                    return a.val().rating - b.val().rating;
                });

                for (var key = dataBook.length - 1; key >= 0; key--) {
                    console.log(dataBook[key].val())
                    generateRecommendBook(dataBook[key].val().isbn, listBookRec);
                }

            }, function (errorObject) {
                console.log(errorObject)
            });
        }
    })
}

function generateRecommendBook(idBuku, listBookRec) {
    dbRef.child("books").orderByChild("isbn").equalTo(idBuku).on("value", function (snapshot) {
        snapshot.forEach(function (child) {
            listBookRec.innerHTML += "<div class='col-lg-2 col-md-4 col-sm-4 col-6'> <div class='card'>" +
                "<div class='card-rating'>" +
                "<i class='fas fa-star'></i><span id='recCardRating'>" + child.val().rating + "</span>" +
                "</div>" +
                "<img src='" + child.val().cover + "' class='card-img-top' alt='...' id='recCardImage'>" +
                "<div class='card-body'>" +
                "<a class='card-title' href='detail_buku.php?isbn=" + child.val().isbn + "' id='recCardJudul'>" + child.val().judul + "</a>" +
                "<div class='card-text' id='recCardPenulis'>" + child.val().penulis + "</div>" +
                "</div> </div> </div>"
        });
    }, function (errorObject) {
        console.log(errorObject)
    });
}

function addKategoriBook(kategori) {
    var listBookKat = document.getElementById("listBookKategori");
    listBookKat.innerHTML = ""
    var query = ""
    if (kategori != "") {
        query = dbRef.child("books").orderByChild('kategori').equalTo(kategori);
    } else {
        query = dbRef.child("books").orderByChild('kategori')
    }

    query.on("value", function (snapshot) {
        snapshot.forEach(function (child) {
            listBookKat.innerHTML += "<div class='col-lg-2 col-md-4 col-sm-4 col-6'> <div class='card'>" +
                "<div class='card-rating'>" +
                "<i class='fas fa-star'></i><span id='katCardRating'>" + child.val().rating + "</span>" +
                "</div>" +
                "<img src='" + child.val().cover + "' class='card-img-top' alt='...' id='katCardImage'>" +
                "<div class='card-body'>" +
                "<a class='card-title' href='detail_buku.php?isbn=" + child.val().isbn + "' id='katCardJudul'>" + child.val().judul + "</a>" +
                "<div class='card-text' id='katCardPenulis'>" + child.val().penulis + "</div>" +
                "</div> </div> </div>"
        });
    }, function (errorObject) {
        console.log(errorObject)
    });
}

function addSearchBook(keyword) {
    var listBookSearch = document.getElementById("listBookSearch");
    listBookSearch.innerHTML = ""
    var query = ""
    query = dbRef.child("books")
    $("#emptyPencarian").css("display", "block")
    query.on("value", function (snapshot) {
        snapshot.forEach(function (child) {
            if (child.val().judul.toLowerCase().includes(keyword.toLowerCase())) {
                addDataSearch(listBookSearch, child)
            }
        })
    }, function (errorObject) {
        console.log(errorObject)
    });
}

function addSearchBookCompleks(judul, penulis, isbn) {
    var listBookSearch = document.getElementById("listBookSearch");
    listBookSearch.innerHTML = ""
    var query = ""
    query = dbRef.child("books")
    var exist = false;
    $("#emptyPencarian").css("display", "block")
    query.on("value", function (snapshot) {
        snapshot.forEach(function (child) {
            if (child.val().judul.toLowerCase().includes(judul.toLowerCase()) &&
                child.val().penulis.toLowerCase().includes(penulis.toLowerCase()) &&
                child.val().isbn.toLowerCase().includes(isbn.toLowerCase())) {
                addDataSearch(listBookSearch, child)
                exist = true;
            }
        }).then(() => {
            if (!exist) {
                listBookSearch.innerHTML = ""
            }
        });
    }, function (errorObject) {
        console.log(errorObject)
    });
}

function addDataSearch(list, child) {
    $("#emptyPencarian").css("display", "none")
    list.innerHTML += "<div class='col-lg-2 col-md-4 col-sm-4 col-6'> <div class='card'>" +
        "<div class='card-rating'>" +
        "<i class='fas fa-star'></i><span id='searchCardRating'>" + child.val().rating + "</span>" +
        "</div>" +
        "<img src='" + child.val().cover + "' class='card-img-top' alt='...' id='searchCardImage'>" +
        "<div class='card-body'>" +
        "<a class='card-title' href='detail_buku.php?isbn=" + child.val().isbn + "' id='searchCardJudul'>" + child.val().judul + "</a>" +
        "<div class='card-text' id='searchCardPenulis'>" + child.val().penulis + "</div>" +
        "</div> </div> </div>"
}

/*#######################################
                Profile
#######################################*/

function simpanProfileUser() {
    let database = firebase.database();
    var namaLengkap = $("#inputNamaLengkap").val();
    var username = $("#inputUsername").val();
    var jenisKelamin = $("#inputJenisKelamin").val();
    var tempatLahir = $("#inputTempatLahir").val();
    var tanggalLahir = $("#inputTanggalLahir").val();
    var negara = $("#inputNegara").val();
    var provinsi = $("#inputProvinsi").val();
    var kota = $("#inputKota").val();
    var alamat = $("#inputAlamat").val();
    var user = firebase.auth().currentUser;
    var userId = user.uid;

    if (username == "") {
        swal("Error", "Username Tidak Boleh Kosong", "error");
    } else if (tempatLahir == "") {
        swal("Error", "Tempat Lahir Tidak Boleh Kosong", "error");
    } else if (negara == "") {
        swal("Error", "Negara Tidak Boleh Kosong", "error");
    } else if (provinsi == "") {
        swal("Error", "Provinsi Tidak Boleh Kosong", "error");
    } else if (kota == "") {
        swal("Error", "Kota Tidak Boleh Kosong", "error");
    } else if (alamat == "") {
        swal("Error", "Alamat Tidak Boleh Kosong", "error");
    } else {
        database.ref('user/' + userId + "/namaLengkap").set(namaLengkap)
        database.ref('user/' + userId + "/userName").set(username)
        database.ref('user/' + userId + "/jenisKelamin").set(jenisKelamin)
        database.ref('user/' + userId + "/tempatLahir").set(tempatLahir)
        database.ref('user/' + userId + "/tanggalLahir").set(tanggalLahir)
        database.ref('user/' + userId + "/alamat").set(alamat)
        database.ref('user/' + userId + "/negara").set(negara)
        database.ref('user/' + userId + "/provinsi").set(provinsi)
        database.ref('user/' + userId + "/kota").set(kota)
        swal("Selamat", "Berhasil di edit", "success").then(() => {
            location.href = "./profil.php"
        })
    }
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
    upload()
});

function upload() {
    //get your select image
    var image=document.getElementById("imageUpload").files[0];
    if(image){
        //$("#overlay-dark").css("display", "block")
        //now get your image name
        var user = firebase.auth().currentUser;
        var userId = user.uid;
        var now = new Date();
        var imageName= now.getDay() + now.getSeconds() + now.getMilliseconds() + userId;
        console.log(image);
        //firebase  storage reference
        //it is the path where yyour image will store
        var storageRef=firebase.storage().ref('images/'+imageName);
        //upload image to selected storage reference

        var uploadTask=storageRef.put(image);

        uploadTask.on('state_changed',function (snapshot) {
            //observe state change events such as progress , pause ,resume
            //get task progress by including the number of bytes uploaded and total
            //number of bytes
            var progress=(snapshot.bytesTransferred/snapshot.totalBytes)*100;
            // console.log("upload is " + progress +" done");
            // $("#myBar").text(progress.toFixed(0)+ "%");
            // $("#myBar").css("width", progress+"%");
        },function (error) {
            //handle error here
            console.log(error.message);
        },function () {
        //handle successful uploads on complete
            uploadTask.snapshot.ref.getDownloadURL().then(function (downlaodURL) {
                // $("#overlay-dark").css("display", "none")
                // //get your upload image url here...
                // console.log(downlaodURL);
                // $("#myBar").text("0%");
                // $("#myBar").css("width", "0%");
                let database = firebase.database();
                var user = firebase.auth().currentUser;
                var userId = user.uid;
                database.ref('user/' + userId + "/photo").set(downlaodURL);
            });            
            swal("Success", "Foto Anda Berhasil Diupdate", "success");
        });
    }else {
        console.log("Image Not Set")
    }
}

function generateBookDetail() {
    firebase.auth().onAuthStateChanged(function (user) {
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
                snapshot.forEach(function (child) {
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

            dbRef.child("ratings").orderByChild('idRating').equalTo(userId + "-" + isbnGet).on("value", function (snapshot) {
                snapshot.forEach(function (child) {
                    $("#rate-" + parseInt(child.val().rating)).prop('checked', true)
                    console.log($("rate-" + (child.val().rating)))
                    var txtUlasan = $("#inputUlasan").val()
                    if (child.val().ulasan.trim() != "") {
                        $("#ratingFeedback").text(parseInt(child.val().rating));
                        $("#inputUlasan").val(child.val().ulasan);
                        $("#buttonKirimUlasan").hide()
                    }
                });
            }, function (errorObject) {
                console.log(errorObject)
            });

            dbRef.child("peminjaman").orderByChild('idPeminjaman').equalTo(userId + "-" + isbnGet).on("value", function (snapshot) {
                snapshot.forEach(function (child) {
                    var a = moment(child.val().tanggal, 'MM/DD/YYYY HH:mm:ss').format('MM/DD/YYYY HH:mm:ss');
                    var b = moment()
                    var diffTime = moment.duration(b.diff(moment(a, 'MM/DD/YYYY HH:mm:ss')));
                    if(diffTime.days() >= 7){
                        setBukuTerpinjamFinish(child.val().idPeminjaman);
                    }
                    if(child.val().status == "finished" && diffTime.days() >= 5){
                        $("#buttonPinjamBuku").text("Pinjam Buku");
                        $("#waktuPinjam").addClass("d-none");
                        $("#buttonPinjamBuku").prop("disabled", false);
                    }else{
                        $("#buttonPinjamBuku").text("Buku Sudah Dipinjam");
                        setInterval(function(){
                            //var deadline = moment("12/22/2021 14:54:50", 'MM/DD/YYYY HH:mm:ss').format('MM/DD/YYYY HH:mm:ss'); 
                            b = moment()
                            diffTime = moment.duration(b.diff(moment(a, 'MM/DD/YYYY HH:mm:ss')));
                            waktu = diffTime.days() + "Hari " + diffTime.hours() + " Jam " + diffTime.minutes() + " Menit " + diffTime.seconds() + " Detik";
                            if(diffTime.days() >= 7){
                                setBukuTerpinjamFinish(child.val().idPeminjaman);
                            }
                            $("#waktuPinjam").text(waktu);
                        }, 1000)

                        //$("#waktuPinjam").text(child.val().tanggal)
                        $("#waktuPinjam").removeClass("d-none");
                        $("#buttonPinjamBuku").prop("disabled", true);
                    }
                });
            }, function (errorObject) {
                console.log(errorObject)
            });

        } else {
            console.log("Belum login")
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
                snapshot.forEach(function (child) {
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
        }
    })
}

function setBukuTerpinjamFinish(idPeminjaman) {
    let database = firebase.database();
    database.ref('peminjaman/' + idPeminjaman + "/status").set("finished");
}

function savePinjamBuku() {
    firebase.auth().onAuthStateChanged(function (user) {
        if (user) {
            var isbnGet = (location.search.replace('?', '').split('='))[1];
            var user = firebase.auth().currentUser;
            var userId = user.uid;
            var bookId = isbnGet;
            var peminjamanId = userId + "-" + bookId;
            var date = new Date();
            var tanggal = moment().format('MM/DD/YYYY HH:mm:ss');
            var status = "unfinished"
            var bukuTerpinjam = 0
            dbRef.child("user").child(userId).get().then((snapshot) => {
                if (snapshot.exists()) {
                    dbRef.child("peminjaman").orderByChild('idUser').equalTo(userId).on("value", function (snapshot) {
                        if (snapshot.exists()) {
                            snapshot.forEach(function (child) {
                                bukuTerpinjam += 1
                            });
                            if (bukuTerpinjam >= 5) {
                                swal("Error", "Anda Sudah Meminjam 5 Buku", "error")
                            } else {
                                let database = firebase.database();
                                database.ref('peminjaman/' + peminjamanId).set({
                                    idPeminjaman: peminjamanId,
                                    idBuku: bookId,
                                    idUser: userId,
                                    status: status,
                                    tanggal: tanggal
                                }).then(() => {
                                    swal("Selamat", "Buku Berhasil Di Dipinjam", "success").then(function () {
                                        location.href = "./buku_terpinjam.php"
                                    });
                                })
                            }
                        } else {
                            let database = firebase.database();
                            database.ref('peminjaman/' + peminjamanId).set({
                                idPeminjaman: peminjamanId,
                                idBuku: bookId,
                                idUser: userId,
                                status: status,
                                tanggal: tanggal
                            }).then(() => {
                                swal("Selamat", "Buku Berhasil Di Dipinjam", "success").then(function () {
                                    location.href = "./buku_terpinjam.php"
                                });
                            })
                        }
                    }, function (errorObject) {
                        console.log(errorObject)
                    });
                } else {
                    console.log("No data available");
                }
            }).catch((error) => {
                console.error(error);
            });
        } else {
            swal("Error", "Anda Belum Melakukan Login", "error").then(() => {
                location.href = "./login.php"
            })
        }
    });
}

function generateBukuTerpinjam() {
    firebase.auth().onAuthStateChanged(function (user) {
        if (user) {
            var isbnGet = (location.search.replace('?', '').split('='))[1];
            var user = firebase.auth().currentUser;
            var userId = user.uid;
            var bookId = isbnGet;
            var peminjamanId = userId + "-" + bookId;
            var date = new Date();
            var tanggal = date.getDay() + "/" + date.getMonth() + "/" + date.getFullYear;
            var status = "unfinished"

            $("#emptyPinjam").css("display", "block")
            var listBookTerpinjam = document.getElementById("listBookTerpinjam");
            listBookTerpinjam.innerHTML = ""

            dbRef.child("peminjaman").orderByChild("idUser").equalTo(userId).on("value", function (snapshot) {
                snapshot.forEach(function (child) {
                    var a = moment(child.val().tanggal, 'MM/DD/YYYY HH:mm:ss').format('MM/DD/YYYY HH:mm:ss');
                    var b = moment()
                    var diffTime = moment.duration(b.diff(moment(a, 'MM/DD/YYYY HH:mm:ss')));
                    //waktu = diffTime.days() + "Hari " + diffTime.hours() + " Jam " + diffTime.minutes() + " Menit " + diffTime.seconds() + " Detik";
                    if(diffTime.days() >= 7){
                        setBukuTerpinjamFinish(child.val().idPeminjaman);
                    }
                    if(child.val().status == "unfinished" && diffTime.days() < 5){
                        generateDataTersimpan(child.val().idBuku, listBookTerpinjam)
                    }
                    
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
        snapshot.forEach(function (child) {
            listBookTerpinjam.innerHTML += "<div class='col-lg-2 col-md-4 col-sm-4 col-6'> <div class='card'>" +
                "<div class='card-rating'>" +
                "<i class='fas fa-star'></i><span id='newCardRating'>" + child.val().rating + "</span>" +
                "</div>" +
                "<img src='" + child.val().cover + "' class='card-img-top' alt='...' id='newCardImage'>" +
                "<div class='card-body'>" +
                "<a class='card-title' href='detail_buku.php?isbn=" + child.val().isbn + "' id='newCardJudul'>" + child.val().judul + "</a>" +
                "<div class='card-text' id='newCardPenulis'>" + child.val().penulis + "</div>" +
                "<a href='baca_buku.php?read=" + child.val().isbn + "' class='btn btn-primary form-control' id='buttonBacaBuku'>Baca Buku</a>" +
                "</div> </div> </div>"
        });
    }, function (errorObject) {
        console.log(errorObject)
    });
}

function generateRiwayatPinjaman() {
    firebase.auth().onAuthStateChanged(function (user) {
        if (user) {
            //var isbnGet = (location.search.replace('?', '').split('='))[1];
            var user = firebase.auth().currentUser;
            var userId = user.uid;
            $("#emptyRiwayat").css("display", "block")
            var listBookRiwayat = document.getElementById("listBookRiwayat");
            listBookRiwayat.innerHTML = ""

            dbRef.child("peminjaman").orderByChild("idUser").equalTo(userId).on("value", function (snapshot) {
                snapshot.forEach(function (child) {
                    generateDataRiwayat(child.val().idBuku, listBookRiwayat)
                })
            });

        } else {
            console.log("You Not Login")
        }
    });
}

function generateDataRiwayat(bookId, listBookRiwayat) {
    $("#emptyRiwayat").css("display", "none")
    dbRef.child("books").orderByChild("isbn").equalTo(bookId).on("value", function (snapshot) {
        snapshot.forEach(function (child) {
            listBookRiwayat.innerHTML += "<div class='col-lg-2 col-md-4 col-sm-4 col-6'> <div class='card'>" +
                "<div class='card-rating'>" +
                "<i class='fas fa-star'></i><span id='newCardRating'>" + child.val().rating + "</span>" +
                "</div>" +
                "<img src='" + child.val().cover + "' class='card-img-top' alt='...' id='newCardImage'>" +
                "<div class='card-body'>" +
                "<a class='card-title' href='detail_buku.php?isbn=" + child.val().isbn + "' id='newCardJudul'>" + child.val().judul + "</a>" +
                "<div class='card-text' id='newCardPenulis'>" + child.val().penulis+ "</div> </div>"
        });
    }, function (errorObject) {
        console.log(errorObject)
    });
}

function generateProfile(snap) {
    $("#textNamaLengkap").text(snap.namaLengkap);
    $("#textUsername").text(snap.userName);
    $("#textJenisKelamin").text(snap.jenisKelamin);
    $("#textTempatLahir").text(snap.tempatLahir);
    $("#textTanggalLahir").text(snap.tanggalLahir);
    $("#textAlamat").text(snap.alamat);
    $("#textKota").text(snap.kota);
    $("#textProvinsi").text(snap.provinsi);
    $("#textNegara").text(snap.negara);
    $("#textEmail").text(snap.email);
}

function generateEditProfile(snap) {
    $("#inputNamaLengkap").val(snap.namaLengkap);
    $("#inputUsername").val(snap.userName);
    $("#inputJenisKelamin").val(snap.jenisKelamin);
    $("#inputTempatLahir").val(snap.tempatLahir);
    var mydate = convertTanggal(snap.tanggalLahir);
    $("#inputTanggalLahir").val(mydate);
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

function readBook() {
    firebase.auth().onAuthStateChanged(function (user) {
        if (user) {
            var bookId = (location.search.replace('?', '').split('='))[1];
            var user = firebase.auth().currentUser;
            var userId = user.uid;
            var ratingId = userId + "-" + bookId
            let database = firebase.database();
            let tanggal = new Date().toLocaleString();

            dbRef.child("ratings").child(ratingId).get().then((snapshot) => {
                if (!snapshot.exists()) {
                    database.ref('ratings/' + ratingId).set({
                        idRating: ratingId,
                        idBuku: bookId,
                        idUser: userId,
                        ulasan: "",
                        rating: 5,
                        tanggal: tanggal
                    }).then(() => {
                        saveDataRatingToCsv()
                        // swal("Terima Kasih", "Rating Berhasil Dikirim", "success").then(function(){ 
                        // });
                    });
                }
            })
            
            getFileByIsbn(bookId)
        } else {
            console.log("Belum Login")
        }
    })
}

function getFileByIsbn(isbn) {
    dbRef.child("books").orderByChild("isbn").equalTo(isbn).on("value", function (snapshot) {
        snapshot.forEach(function (child) {
            $("#textJudulBuku").text(child.val().judul);
            $("#textPenulis").text(child.val().penulis);
            PDFObject.embed(child.val().file, "#viewBook");
        });
    }, function (errorObject) {
        console.log(errorObject)
    });
}

$("#buttonSearch").click(function (e) {
    e.preventDefault()
    var search = $("#inputSearch").val();
    location.href = "./search.php?search=" + search;
})

function tambahkanUlasan() {
    firebase.auth().onAuthStateChanged(function (user) {
        if (user) {
            var isbnGet = (location.search.replace('?', '').split('='))[1];
            var user = firebase.auth().currentUser;
            var userId = user.uid;
            var bookId = (location.search.replace('?', '').split('='))[1];
            var ratingId = userId + "-" + bookId
            var rate = $("#ratingFeedback").text()
            var ulasanValue = $("#inputUlasan").val();
            let database = firebase.database();
            var tanggal = new Date().toLocaleString()
            if (ulasanValue.trim() != "") {
                dbRef.child("peminjaman").child(userId + "-" + isbnGet).get().then((snapshot) => {
                    if (snapshot.exists()) {
                        database.ref('ratings/' + ratingId).set({
                            idRating: ratingId,
                            idBuku: bookId,
                            idUser: userId,
                            ulasan: ulasanValue,
                            rating: rate,
                            tanggal: tanggal
                        }).then(() => {
                            saveDataRatingToCsv()
                            swal("Terima Kasih", "Rating Berhasil Dikirim", "success").then(function () {
                                location.href = "./detail_buku.php?isbn=" + bookId
                            });
                        });
                    } else {
                        swal("Error", "Lakukan Peminjaman terlebih Dahulu", "error")
                    }
                })
            } else {
                swal("Error", "Silahkan Isi Teks Ulasan", "error")
            }
        } else {
            swal("Error", "Anda Belum Melakukan Login", "error").then(() => {
                location.href = "./login.php"
            })
        }
    })
}


function saveDataRatingToCsv() {
    var dataRating = []
    const dbRef = firebase.database().ref();
    dbRef.child("ratings").once('value', function (allRecord) {
        allRecord.forEach(function (currentRecord) {
            var userId = currentRecord.val().idUser;
            var itemId = "ISBN" + currentRecord.val().idBuku;
            var rating = currentRecord.val().rating;
            dataRating.push(userId + ';' + itemId + ';' + rating);
        })
    }).then(() => {
        export_rating(dataRating)
    });
}

function export_rating(arrayData) {
    $.ajax({
        url: "./admin/algo/createDataBook.php",
        type: "POST",
        data: {
            listRating: arrayData,
        }, success: function (response) {
            getNewPredictionRating()
            console.log(response);
            if (response) {
                //location.reload();
            }
        }
    })
}

function saveDataRatingToCsv() {
    var dataRating = []
    const dbRef = firebase.database().ref();
    dbRef.child("ratings").once('value', function (allRecord) {
        allRecord.forEach(function (currentRecord) {
            var userId = currentRecord.val().idUser;
            var itemId = "ISBN" + currentRecord.val().idBuku;
            var rating = currentRecord.val().rating;
            dataRating.push(userId + ';' + itemId + ';' + rating);
        })
    }).then(() => {
        export_rating(dataRating)
    });
}

function export_rating(arrayData) {
    $.ajax({
        url: "./admin/algo/createDataBook.php",
        type: "POST",
        data: {
            listRating: arrayData,
        }, success: function (response) {
            getNewPredictionRating()
            console.log(response);
            if (response) {
                //location.reload();
            }
        }
    })
}

function saveDataUserToCsv() {
    var dataUser = []
    const dbRef = firebase.database().ref();
    dbRef.child("user").once('value', function (allRecord) {
        allRecord.forEach(function (currentRecord) {
            var userId = currentRecord.val().userId;
            var negara = currentRecord.val().negara.toLowerCase()
            var provinsi = currentRecord.val().provinsi.toLowerCase()
            var usia = getAge(currentRecord.val().tanggalLahir)
            dataUser.push(userId + ';' + negara + ';' + provinsi + ';' + usia);
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

function getAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

function export_user(arrayData) {
    $.ajax({
        url: "./admin/algo/createDataBook.php",
        type: "POST",
        data: {
            listUser: arrayData,
        }, success: function (response) {
            getNewPredictionRating()
            console.log(response);
            if (response) {
                //location.reload();
            }
        }
    })
}

$("#btn-logout").click(function () {
    firebase.auth().signOut().then(function () {
    }).catch(function (error) {
        // An error happened.
    });
})


