firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        console.log("You Login Now");
        var user = firebase.auth().currentUser;
        var userId = user.uid;
        var usernameHeader = $("#usernameHeader")
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

        const dbRef = firebase.database().ref();
        dbRef.child("user").child(userId).get().then((snapshot) => {
        if (snapshot.exists()) {
            usernameHeader.text(snapshot.val().userName)
            photoProfile.attr("src",snapshot.val().photo);

            namaLengkap.text(snapshot.val().namaDepan + " " + snapshot.val().namaBelakang)
            username.text(snapshot.val().userName)
            jenisKelamin.text(snapshot.val().jenisKelamin)
            ttl.text(snapshot.val().tempatLahir + " " + snapshot.val().tanggalLahir)
            alamat.text(snapshot.val().alamat)
            emailProfil.text(snapshot.val().email)

            photoEdit.css("background-image", "url("+snapshot.val().photo+")")
            namaLengkapText.val(snapshot.val().namaDepan + " " + snapshot.val().namaBelakang)
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
        //now get your image name
        var imageName=image.name;
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
        },function (error) {
            //handle error here
            console.log(error.message);
        },function () {
        //handle successful uploads on complete
            uploadTask.snapshot.ref.getDownloadURL().then(function (downlaodURL) {
                //get your upload image url here...
                console.log(downlaodURL);
            });
        });
    }else {
        console.log("Image Not Set")
    }
}

function updateUserData() {
    var user = firebase.auth().currentUser;
    var userId = user.uid;
    database.ref('users/' + userId).set({
    email: email,
    password: pass
    });
}

