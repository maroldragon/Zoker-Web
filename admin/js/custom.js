firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        console.log("You Login Now");
        var user = firebase.auth().currentUser;
        var userId = user.uid;
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

        const dbRef = firebase.database().ref();
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
        console.log("You Not Login")
        window.location.href = "./login-admin.php";
    }
});

$("#btn-logout").click(function(){
    firebase.auth().signOut().then(function() {
    }).catch(function(error) {
    // An error happened.
    });
})

/*#######################################
                Profile
#######################################*/
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
    //upload()
});

$("#btn-simpan-profile").click(function() {
    upload();
})

function upload() {
    //get your select image
    var image=document.getElementById("imageUpload").files[0];
    if(image){
        $("#overlay-dark").css("display", "block")
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
            console.log("upload is " + progress +" done");
            $("#myBar").text(progress.toFixed(0)+ "%");
            $("#myBar").css("width", progress+"%");
        },function (error) {
            //handle error here
            console.log(error.message);
        },function () {
        //handle successful uploads on complete
            uploadTask.snapshot.ref.getDownloadURL().then(function (downlaodURL) {
                $("#overlay-dark").css("display", "none")
                //get your upload image url here...
                console.log(downlaodURL);
                $("#myBar").text("0%");
                $("#myBar").css("width", "0%");
                let database = firebase.database();
                var user = firebase.auth().currentUser;
                var userId = user.uid;
                database.ref('user/' + userId + "/photo").set(downlaodURL)
                updateUserData();
            });
        });
    }else {
        updateUserData();
        console.log("Image Not Set")
    }
}

function updateUserData() {
    let database = firebase.database();
    var namaDepanText = $("#namaDepanText")
    var namaBelakangText = $("#namaBelakangText")
    var usernameText = $("#usernameText")
    var jenisKelaminText = $("#jenisKelaminText")
    var tempatLahirText = $("#tempatLahirText")
    var tanggalLahirText = $("#tanggalLahirText")
    var alamatText = $("#alamatText")
    var user = firebase.auth().currentUser;
    var userId = user.uid;
    
    database.ref('user/' + userId + "/namaDepan").set(namaDepanText.val())
    database.ref('user/' + userId + "/namaBelakang").set(namaBelakangText.val())
    database.ref('user/' + userId + "/userName").set(usernameText.val())
    database.ref('user/' + userId + "/jenisKelamin").set(jenisKelaminText.val())
    database.ref('user/' + userId + "/tempatLahir").set(tempatLahirText.val())
    database.ref('user/' + userId + "/tanggalLahir").set(tanggalLahirText.val())
    database.ref('user/' + userId + "/alamat").set(alamatText.val())
    swal("Selamat", "Berhasil di edit", "success");
}

/*#######################################
            Input Book
#######################################*/

$("#btnSaveBook").click(function(e){
    e.preventDefault();
    var image=document.getElementById("uploadImageCover").files[0];
    var book =document.getElementById("uploadBuku").files[0];
    let database = firebase.database();
    var isbn = $("#isbn")
    var judul = $("#judulBuku")
    var penulis = $("#penulis")
    var penerbit= $("#penerbit")
    var kategori = $("#kategori")
    var tahunTerbit = $("#tahunTerbit")
    var deskripsi = $("#deskripsiBuku")

    if(isbn.val()=="" || judul.val()=="" || penulis.val()=="" || tahunTerbit.val()=="" || deskripsi.val()=="") {
        swal("Error", "Masih Ada Data Yang Kosong", "error");
    }else if(image && book){
        database.ref('books/' + isbn.val()).set({
            isbn: isbn.val(),
            judul: judul.val(),
            penulis: penulis.val(),
            penerbit: penerbit.val(),
            kategori: kategori.val(),
            tahunTerbit: tahunTerbit.val(),
            deskripsi: deskripsi.val()
        }).then(() => {
            uploadImageCover();
        });
    }else {
        swal("Error", "Masukkan File Gambar Dan Bukuku", "error");
    }
})

function uploadImageCover() {
    //get your select image
    var image=document.getElementById("uploadImageCover").files[0];
    var isbn = $("#isbn")
    var book =document.getElementById("uploadBuku").files[0];
    if(image && book){
        $("#overlay-dark").css("display", "block")
        var user = firebase.auth().currentUser;
        var imageName= isbn.val();
        var storageRef=firebase.storage().ref('images-cover/'+imageName);

        var uploadTask=storageRef.put(image);

        uploadTask.on('state_changed',function (snapshot) {
            var progress=(snapshot.bytesTransferred/snapshot.totalBytes)*100;
            console.log("upload is " + progress +" done");
            $("#myBar").css("display", "block");
            $("#myBar").text("Upload Image " + progress.toFixed(0)+ "%");
            $("#myBar").css("width", progress+"%");
        },function (error) {
            //handle error here
            console.log(error.message);
        },function () {
        //handle successful uploads on complete
            uploadTask.snapshot.ref.getDownloadURL().then(function (downlaodURL) {
                $("#overlay-dark").css("display", "none")
                //get your upload image url here...
                console.log(downlaodURL);
                $("#myBar").text("");
                $("#myBar").css("width", "0%");
                $("#myBar").css("display", "none");
                let database = firebase.database();
                database.ref('books/' + isbn.val() + "/cover").set(downlaodURL)
                uploadBook();
            });
        });
    }else {
        swal("Error", "Masukkan File Gambar Dan Buku", "error");
        console.log("Image Not Set")
    }
}

function uploadBook() {
    //get your select image
    var book =document.getElementById("uploadBuku").files[0];
    var isbn = $("#isbn")
    if(book){
        $("#overlay-dark").css("display", "block")
        var bookName= isbn.val();
        var storageRef=firebase.storage().ref('books/'+bookName);

        var uploadTask=storageRef.put(book);

        uploadTask.on('state_changed',function (snapshot) {
            var progress=(snapshot.bytesTransferred/snapshot.totalBytes)*100;
            console.log("upload is " + progress +" done");
            $("#myBar").css("display", "block");
            $("#myBar").text("Upload Buku " + progress.toFixed(0)+ "%");
            $("#myBar").css("width", progress+"%");
        },function (error) {
            //handle error here
            console.log(error.message);
        },function () {
        //handle successful uploads on complete
            uploadTask.snapshot.ref.getDownloadURL().then(function (downlaodURL) {
                $("#overlay-dark").css("display", "none")
                //get your upload image url here...
                console.log(downlaodURL);
                $("#myBar").text("");
                $("#myBar").css("width", "0%");
                $("#myBar").css("display", "none");
                let database = firebase.database();
                database.ref('books/' + isbn.val() + "/file").set(downlaodURL).then(()=> {
                    swal("Selamat", "Buku Berhasil Di Upload", "success").then(function(){ 
                        location.reload();
                    });
                })
            });
        });
    }else {
        console.log("Book Not Set")
        swal("Error", "Masukkan File Gambar Dan Buku", "error")
    }
}