var firebaseConfig = {
  apiKey: "AIzaSyClKW64xN5GDrVQQqEk8565x8xi8rsWIQM",
  authDomain: "auth-41e12.firebaseapp.com",
  projectId: "auth-41e12",
  storageBucket: "auth-41e12.appspot.com",
  messagingSenderId: "850276553669",
  appId: "1:850276553669:web:eaa81d75ec3c42f07e71ac",
  measurementId: "G-7H077ZQLSH"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);

firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
    // User is signed in.

    document.getElementById("user_div").style.display = "block";
    document.getElementById("login_div").style.display = "none";

    var user = firebase.auth().currentUser;

    if(user != null){

      var email_id = user.email;
      document.getElementById("user_para").innerHTML = "Welcome User : " + email_id;

    }

  } else {
    // No user is signed in.

    document.getElementById("user_div").style.display = "none";
    document.getElementById("login_div").style.display = "block";

  }
});

function login(){

  var userEmail = document.getElementById("email_field").value;
  var userPass = document.getElementById("password_field").value;

  firebase.auth().signInWithEmailAndPassword(userEmail, userPass).catch(function(error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;

    window.alert("Error : " + errorMessage);

    // ...
  });

}

function logout(){
  firebase.auth().signOut();
}
