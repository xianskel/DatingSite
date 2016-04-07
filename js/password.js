function validatePass() {
    if (!validatePassword()) {
        return false;
    }
    if (!confirmPassword()) {
        return false;
    }
    return true;
}


//Validates password fields. Both passwords must be the same and be atleast one character long.
//No other constrants
function validatePassword() {
    if (document.getElementById('pwd1').value.length > 6) {
        document.getElementById('pwdTick').style.display = 'block';
        document.getElementById('pwdCross').style.display = 'none';
        return true;
    } else {
        document.getElementById('pwdCross').style.display = 'block';
        document.getElementById('pwdTick').style.display = 'none';
        return false;
    }
}

//Validates password fields. Both passwords must be the same and be atleast one character long.
//No other constrants
function confirmPassword() {
    var pass1 = document.getElementById('pwd1').value;
    var pass2 = document.getElementById('pwd2').value;

    if (pass1 == pass2 && pass2.length > 6) {
        document.getElementById('pwd2Tick').style.display = 'block';
        document.getElementById('pwd2Cross').style.display = 'none';
        return true;
    } else {
        document.getElementById('pwd2Cross').style.display = 'block';
        document.getElementById('pwd2Tick').style.display = 'none';
        return false;
    }
}