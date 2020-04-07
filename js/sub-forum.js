function validateForm() {
    if(document.forms["new-post"]["title"].value == ""){
        alert("Title must be entered");
        return false;
    }else if(document.forms["new-post"]["post"].value == ""){
        alert("Nothing was entered");
        return false;
    }
  }