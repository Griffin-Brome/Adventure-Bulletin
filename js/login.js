
//will also have to check if they exist and match the user
function validateForm() {
    var user = document.forms["user"]["username"].value;
    if (user == "") {
      alert("Username must be entered");
      return false;
    }
    var pass = document.forms["user"]["password"].value;
    if (pass == "") {
      alert("Password must be entered");
      return false;
    }else if (pass.length < 8){
        alert("Password is not long enough");
        return false;
    }
  }