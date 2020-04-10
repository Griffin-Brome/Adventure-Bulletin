function validateForm() {
    var re =  new RegExp("^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$");
    var email = document.forms["user"]["email"].value;
        if (re.test(email)) {
        alert("Invalid email")
        return false;
    }
}