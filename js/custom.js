const dbRef = firebase.database().ref();

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        console.log("You Login Now");
        var user = firebase.auth().currentUser;
        var userId = user.uid;

        $("#menuGuest").addClass("d-none")
        $("#menuUser").removeClass("d-none")

        var usernameHeader = $("#usernameHeader")
        var photoHeader = $("#photoHeader")
        var photoProfile = $("#img-profile-admin")
        var namaLengkap = $("#namaLengkap")
        var username = $("#username")
        var jenisKelamin = $("#jenisKelamin")
        var ttl = $("#ttl")
        var alamat = $("#alamat")
        var emailProfil = $("#emailProfil")

        var photoEdit = $("#imagePreview");
        var namaDepanText = $("#namaDepanText")
        var namaBelakangText = $("#namaBelakangText")
        var usernameText = $("#usernameText")
        var jenisKelaminText = $("#jenisKelaminText")
        var tempatLahirText = $("#tempatLahirText")
        var tanggalLahirText = $("#tanggalLahirText")
        var alamatText = $("#alamatText")
        var emailText = $("#emailText")

        dbRef.child("user").child(userId).get().then((snapshot) => {
        if (snapshot.exists()) {
            usernameHeader.text(snapshot.val().userName)
            photoHeader.attr("src",snapshot.val().photo);
            photoProfile.attr("src",snapshot.val().photo);

            namaLengkap.text(snapshot.val().namaDepan + " " + snapshot.val().namaBelakang)
            username.text(snapshot.val().userName)
            jenisKelamin.text(snapshot.val().jenisKelamin)
            ttl.text(snapshot.val().tempatLahir + " " + snapshot.val().tanggalLahir)
            alamat.text(snapshot.val().alamat)
            emailProfil.text(snapshot.val().email)

            photoEdit.css("background-image", "url("+snapshot.val().photo+")")
            namaDepanText.val(snapshot.val().namaDepan)
            namaBelakangText.val(snapshot.val().namaBelakang)
            usernameText.val(snapshot.val().userName)
            var jkLower = (snapshot.val().jenisKelamin).toLowerCase();
            jenisKelaminText.val(jkLower)
            tempatLahirText.val(snapshot.val().tempatLahir)
            tanggalLahirText.val("5/12/2000")
            alamatText.val(snapshot.val().alamat)
            emailText.val(snapshot.val().email)
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



$("#btn-logout").click(function(){
    firebase.auth().signOut().then(function() {
    }).catch(function(error) {
    // An error happened.
    });
})