function validateForm() {
    if(document.forms["add-post"]["title"].value == ""){
        alert("Title must be entered");
        return false;
    }else if(document.forms["add-post"]["post"].value == ""){
        alert("Nothing was entered");
        return false;
    }
  }
