function phone(elem, helpMsg) {
    if (elem.value.length == 10) {
        return true;
    }

    alert(helpMsg);
    elem.focus();
    return false;
}

function isAlphabat(elem, helpMsg) {
    var alphaExp = /^[a-zA-Z]+$/;

    if (elem.value.match(alphaExp)) {
        return true;
    } else {
        alert(helpMsg);
        elem.value = "";
        elem.focus();
        return false;
    }

}

function emailValidator(elem, helpMsg) {
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-Z0-9]{2,4}$/;
    if (elem.value.match(emailExp)) {
        return true;
    } else {
        alert(helpMsg);
        elem.value = "";
        elem.focus();
        return false;
    }
}

function length_val(elem, len, helpMsg) {
    if (elem.value.length < len) {
        alert(helpMsg);
        elem.focus();
        return false;
    } else
        return true;
}

function val_pword(elem1, elem2, helpMsg) {
    if (elem1.value == elem2.value)
        return true;
    else {
        alert(helpMsg);
        elem2.focus();
        return false;
    }
}


function validateform() {
    if (!isAlphabat(user_reg.First_Name, "Enter valid First Name"))
        return false;
    if (!isAlphabat(user_reg.Last_Name, "Enter valid Last Name"))
        return false;
    if (!emailValidator(user_reg.Email_id, "Enter valid Email"))
        return false;
    if (!phone(user_reg.phone, "Enter valid phone number"))
        return false;
    alert("Successfully Registered");
    return true;
}

/////////////////////////////////////////////////


