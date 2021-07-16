const dbRef = firebase.database().ref();
var user_id_all = ""

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
    dbRef.child("books").orderByChild('rating').limitToLast(15).on("value", function (snapshot) {
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

function generateBookDetail(){
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
            var tanggal = date.getDay()+"/"+date.getMonth()+"/"+date.getFullYear;
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

// function generateEditProfile(snap) {
//     $("#inputNamaDepan").val(snap.namaDepan);
//     $("#inputNamaBelakang").val(snap.namaBelakang);
//     $("#inputUsername").val(snap.userName);
//     $("#inputJenisKelamin").val(snap.jenisKelamin);
//     $("#inputTempatLahir").val(snap.tempatLahir);
//     $("#inputTanggalLahir").val(snap.tanggalLahir);
//     $("#inputAgama").val(snap.agama);
//     $("#inputHobi").val(snap.hobi);
//     $("#inputNegara").val(snap.negara);
//     $("#inputProvinsi").val(snap.provinsi);
//     $("#inputKota").val(snap.kota);
//     $("#inputAlamat").val(snap.alamat);
//     $("#inputEmail").val(snap.email);
// }

$("#buttonSearch").click(function(e) {
    e.preventDefault()
    var search = $("#inputSearch").val();
    location.href = "./search.php?search=" + search;
})

$("#btn-logout").click(function(){
    firebase.auth().signOut().then(function() {
    }).catch(function(error) {
    // An error happened.
    });
})
