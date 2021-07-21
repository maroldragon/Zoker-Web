saveDataUserToCsv()
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
        }).then(()=> {
            console.log("Rating Prediction Added")  
        })
    }
}

firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        var user = firebase.auth().currentUser;
        var userId = user.uid;
        const dbRef = firebase.database().ref();
        dbRef.child("admin").child(userId).get().then((snapshot) => {
            if (!snapshot.exists()) {
                firebase.auth().signOut().then(function() {
                }).catch(function(error) {
                // An error happened.
                });
            } else {

            }
        })

        console.log("You Login Now");
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
        var namaLengkapText = $("#namaLengkapText")
        var usernameText = $("#usernameText")
        var jenisKelaminText = $("#jenisKelaminText")
        var tempatLahirText = $("#tempatLahirText")
        var tanggalLahirText = $("#tanggalLahirText")
        var alamatText = $("#alamatText")
        var emailText = $("#emailText")

        dbRef.child("admin").child(userId).get().then((snapshot) => {
        if (snapshot.exists()) {
            usernameHeader.text(snapshot.val().userName)
            photoHeader.attr("src",snapshot.val().photo);
            photoProfile.attr("src",snapshot.val().photo);

            namaLengkap.text(snapshot.val().namaLengkap)
            username.text(snapshot.val().userName)
            jenisKelamin.text(snapshot.val().jenisKelamin)
            ttl.text(snapshot.val().tempatLahir + " " + snapshot.val().tanggalLahir)
            alamat.text(snapshot.val().alamat)
            emailProfil.text(snapshot.val().email)
            if(snapshot.val().photo != ""){
                photoEdit.css("background-image", "url("+snapshot.val().photo+")")
            }
            namaLengkapText.val(snapshot.val().namaLengkap)
            usernameText.val(snapshot.val().userName)
            var jkLower = (snapshot.val().jenisKelamin).toLowerCase();
            jenisKelaminText.val(jkLower)
            tempatLahirText.val(snapshot.val().tempatLahir)
            var mydate = convertTanggalLahir(snapshot.val().tanggalLahir);
            tanggalLahirText.val(mydate)
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

function convertTanggalLahir(str) {
    var date = new Date(str),
      mnth = ("0" + (date.getMonth() + 1)).slice(-2),
      day = ("0" + date.getDate()).slice(-2);
    return [date.getFullYear(), mnth, day].join("-");
  }

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
                database.ref('admin/' + userId + "/photo").set(downlaodURL)
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
    var namaLengkapText = $("#namaLengkapText")
    var usernameText = $("#usernameText")
    var jenisKelaminText = $("#jenisKelaminText")
    var tempatLahirText = $("#tempatLahirText")
    var tanggalLahirText = $("#tanggalLahirText")
    var alamatText = $("#alamatText")
    var user = firebase.auth().currentUser;
    var userId = user.uid;

    database.ref('admin/' + userId + "/namaLengkap").set(namaLengkapText.val())
    database.ref('admin/' + userId + "/userName").set(usernameText.val())
    database.ref('admin/' + userId + "/jenisKelamin").set(jenisKelaminText.val())
    database.ref('admin/' + userId + "/tempatLahir").set(tempatLahirText.val())
    database.ref('admin/' + userId + "/tanggalLahir").set(tanggalLahirText.val())
    database.ref('admin/' + userId + "/alamat").set(alamatText.val())
    swal("Selamat", "Berhasil di edit", "success");
}

function uploadImage() {
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
    var tanggal = new Date().toLocaleString()

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
            deskripsi: deskripsi.val(),
            rating: "5",
            tanggal: tanggal
        }).then(() => {
            saveDataBookToCsv()
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
                    //saveDataBookToCsv()
                    swal("Selamat", "Buku Berhasil Di Upload", "success").then(function(){ 
                       location.href = "Kelola-item-digital.php?kelola_item";
                    });
                })
                // saveDataBookToCsv()
            });
        });
    }else {
        console.log("Book Not Set")
        swal("Error", "Masukkan File Gambar Dan Buku", "error")
    }
}

function generateBookUpdate(){
    var image=document.getElementById("uploadImageCover").files[0];
    var isbnGet = (location.search.replace('?', '').split('='))[1];
    var isbn = $("#isbn")
    var judul = $("#judulBuku")
    var penulis = $("#penulis")
    var penerbit= $("#penerbit")
    var kategori = $("#kategori")
    var tahunTerbit = $("#tahunTerbit")
    var deskripsi = $("#deskripsiBuku")

    const dbRef = firebase.database().ref();
    dbRef.child("books").child(isbnGet).get().then((snapshot) => {
        if (snapshot.exists()) {
            isbn.val(snapshot.val().isbn)
            judul.val(snapshot.val().judul)
            penulis.val(snapshot.val().penulis)
            penerbit.val(snapshot.val().penerbit)
            kategori.val(snapshot.val().kategori)
            tahunTerbit.val(snapshot.val().tahunTerbit)
            deskripsi.val(snapshot.val().deskripsi)
        }else{
            console.log("ISBN tidak ditemukan")
        }
    })
}

function saveBookUpdate(){
    var image=document.getElementById("uploadImageCover").files[0];
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
    }else {
        database.ref('books/' + isbn.val() + "/judul").set(judul.val())
        database.ref('books/' + isbn.val() + "/penulis").set(penulis.val())
        database.ref('books/' + isbn.val() + "/kategori").set(kategori.val())
        database.ref('books/' + isbn.val() + "/penerbit").set(penerbit.val())
        database.ref('books/' + isbn.val() + "/tahunTerbit").set(tahunTerbit.val())
        database.ref('books/' + isbn.val() + "/deskripsi").set(deskripsi.val())
    }
    if(image) {
        $("#overlay-dark").css("display", "block")
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
                swal("Selamat", "Berhasil di edit", "success");
            });
        });
    }else {
        swal("Selamat", "Data Berhasil Diupdate", "success").then(() => {
            location.href = "./Kelola-item-digital.php?kelola_item"
        });
    }
}

function hapusBuku(isbn){
    let database = firebase.database();
    //database.ref('books/' + isbn).remove()
    console.log(isbn)
}

function addPengujian(jenisPengujian, idPeng) {
    var idPengujian = idPeng
    var tanggal = new Date().toLocaleString()
    var jumlahUser = 0
    var jumlahItem = 0
    var nilaiAbsolute =  0
    var stringAbsoluteError = ""
    var std = 0
    var normalizationZero = 0
    getMemberTotal()

    function add() {
        let database = firebase.database();
        hasil = 0;
        if(jenisPengujian == "MAE"){
            hasil = nilaiAbsolute/(jumlahItem*jumlahUser)
        }else {
            hasil = Math.sqrt(nilaiAbsolute/(jumlahItem*jumlahUser))
        }
        
        database.ref('pengujian/'+idPengujian).set({
            idPengujian : idPengujian,
            jenisPengujian : jenisPengujian,
            tanggal: tanggal,
            jumlahItem : ""+jumlahItem,
            jumlahUser : ""+jumlahUser,
            nilaiAbsoluteError : ""+nilaiAbsolute,
            stringAbsoluteError : stringAbsoluteError,
            hasil: ""+hasil
        }).then(() => {
            console.log("Pengujian Ditambahkan")
            swal("", "Pegunjian Ditambahkan", "success").then(()=> {
                location.href = "./Pengujian.php?pengujian"
            })
        });
    }

    function getMemberTotal(){
        firebase.database().ref("user").once('value', function(allRecord){
            allRecord.forEach( function() {
                jumlahUser += 1;
            })
        }).then(() => {
            getItemTotal()
        });
    }

    function getItemTotal(){
        firebase.database().ref("books").once('value', function(allRecord){
            allRecord.forEach( function() {
                jumlahItem += 1;
            })
        }).then(() => {
            getRatarata()
        });
    }

    function getRatarata() {
        var jumlah = 0;
        firebase.database().ref("ratings").once('value', function(allRecord){
            allRecord.forEach( function(child) { 
                jumlah += parseFloat(child.val().rating)
            })
        }).then(()=> {
            ratarata = jumlah / (jumlahItem*jumlahUser);
            //console.log("Rata-rata"+ratarata)
            getSTD(ratarata)
        })
    }
    
    function getSTD(ratarata) {
        var jumlah = 0;
        var index = 0;
        firebase.database().ref("ratings").once('value', function(allRecord){
            allRecord.forEach( function(child) { 
                index += 1
                jumlah += Math.pow(parseFloat(child.val().rating) - ratarata,2)
            })
        }).then(()=> {
            var total = (((jumlahItem*jumlahUser)-index) * Math.pow(ratarata,2));
            total += jumlah
            std = total/(jumlahUser*jumlahItem)
            normalizationZero = (Math.abs(0-ratarata)/std)
            //console.log("STD"+std)
            getAbsoluteError()
        })
    }

    function getAbsoluteError(){
        var absoluteString = ""
        var totalAbosuluteError = 0
        var index = 0
        firebase.database().ref("ratingPrediksi").once('value', function(allRecord){
            allRecord.forEach( function(child) { 
                // console.log("SIZE" + allRecord.val().size)
                const dbRef = firebase.database().ref();
                dbRef.child("ratings").child(child.val().idRatingPrediksi).get().then((snapshot) => {  
                    if(index >= 1) {
                        absoluteString += " + "
                    }   
                    absoluteString += "|" + child.val().rating + " - "
                    if (snapshot.exists()) {
                        var rat = ((snapshot.val().rating-ratarata)/std).toFixed(2)
                        if(rat < 0) {
                            rat = "-" + rat;
                        }
                        if(jenisPengujian == "MAE"){
                            totalAbosuluteError += Math.abs(child.val().rating - ((snapshot.val().rating-ratarata)/std))
                            absoluteString += rat + "|"
                        }else if(jenisPengujian == "RMSE"){
                            totalAbosuluteError += Math.pow((child.val().rating - ((snapshot.val().rating-ratarata)/std)),2)
                            absoluteString += rat + "|" + "2".sup()
                        } 
                    }else{
                        if(jenisPengujian == "MAE"){
                            totalAbosuluteError += normalizationZero
                            absoluteString += "("+normalizationZero.toFixed(2)+")" + "|";
                        }else if(jenisPengujian == "RMSE"){
                            totalAbosuluteError += Math.pow(normalizationZero,2)
                            absoluteString += "("+normalizationZero.toFixed(2)+")" + "|" + "2".sup();
                        }
                        
                    }
                    index += 1;
                    nilaiAbsolute = totalAbosuluteError
                    stringAbsoluteError = absoluteString
                })
            })

            setTimeout(function() {
                add()
            }, 2000);

        }).then(() => {
            
        });
    }
    
}
//tampilkanProsesPengujian("RMSE", "10/23/23")

function tampilkanProsesPengujian(idPengujian, jenisPengujian, tanggal) {
    $("#pengujianHasil").addClass("d-none")
    $("#pengujianProses").removeClass("d-none");
    $("#tanggalPengujian").text(jenisPengujian)
    $("#jenisPengujian").text(tanggal)

    firebase.database().ref("pengujian").orderByChild("idPengujian").equalTo(idPengujian).once('value', function(allRecord){
        allRecord.forEach( function(child) { 
            $("#jumlahUser").html(child.val().jumlahUser);
            $("#jumlahItem").html(child.val().jumlahItem);
            $("#jumlahData").html(child.val().jumlahUser * child.val().jumlahItem)
            $("#totalAbsoluteError").html(child.val().stringAbsoluteError + " = " + child.val().nilaiAbsoluteError);
            if(jenisPengujian == "MAE"){
                $("#hasilPengujian").text("Hasil = Total Absolute / jumlah Data = " + child.val().hasil)
            }else {
                $("#hasilPengujian").text("Hasil = Akar(Total Absolute/jumlah Data) = " + child.val().hasil)
            }
        })
    }).then(()=> {
        
    })
}
function verifiedUser(idUser) {
    firebase.database().ref('user/' + idUser + "/status").set("verified")
    swal("Suskses", "user dengan id " + idUser + "Sudah di verifikasi", "success").then(() => {
        saveDataUserToCsv()
        location.href = "kelola-member-verifikasi.php"
    })
}

function deleteVerifikasi(idUser) {
    console.log(idUser)
    firebase.database().ref('user/' + idUser + "/status").set("unverified")
    swal("", "verifikasi dihapus untuk id user " + idUser , "success").then(() => {
        location.href = "kelola-member.php?kelola_member"
    })
}

/*#######################################
            Algoritma
#######################################*/

function saveDataBookToCsv(){
    var dataBook = []
    const dbRef = firebase.database().ref();
    dbRef.child("books").once('value', function(allRecord){
        allRecord.forEach( function(currentRecord) {
            dataBook.push("ISBN"+currentRecord.val().isbn+';'+currentRecord.val().kategori);
        })
    }).then(() => {
        export_book(dataBook)
    });
}

function export_book(arrayData) {
    $.ajax({
        url: "./algo/createDataBook.php",
        type:"POST",
        data: {
            listBook:arrayData,
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
        url: "./algo/createDataBook.php",
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
        url: "./algo/createDataBook.php",
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