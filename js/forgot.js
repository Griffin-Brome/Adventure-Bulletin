function validateForm() {
    var format = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
    if(!(email.value.match(format))){
        alert("Invalid email")
        return false;
    }
}