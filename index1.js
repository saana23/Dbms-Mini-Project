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


    
    
    function signup(){
      
      var email = document.getElementById("email").value;
      var password = document.getElementById("password").value;
      
      firebase.auth().createUserWithEmailAndPassword(email, password).then(function(){alert('user signed up');
    }).catch(function(error){
        var errorcode=error.code;
        var errormsg=error.message;

    });
      
     
    }