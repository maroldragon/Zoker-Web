firebase.auth().onAuthStateChanged(function(user) {
    if (user) {
        console.log("You Login Now");
        var user = firebase.auth().currentUser;
        var userId = user.uid;
        const dbRef = firebase.database().ref();
        dbRef.child("user").child(userId).get().then((snapshot) => {
        if (snapshot.exists()) {
            console.log(snapshot.val());
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
