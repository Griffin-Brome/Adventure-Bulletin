//will also have to check if the username already exists
function validateForm() {
    validateName(document.forms["create"]["name"].value);
    validateEmail(document.forms["create"]["email"].value);
    validatePasswords(document.forms["create"]["pass"].value, document.forms["create"]["passConfirm"].value);
  }


  function validateName(name){
    if (name == "") {
        alert("Name must be entered");
        return false;
      }
  }
  function validateEmail(email){
    var format = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
    if(!(email.value.match(format))){
        alert("Invalid email")
        return false;
    }
  }
  function validatePasswords(pass1, pass2){
    if(pass1.value != pass2.value){
        alert("Passwords do not match");
        return false;
    
    }else if(pass1.value == "" || pass2.value == ""){
      alert("Must enter a password");
      return false;
  }
}
  
  