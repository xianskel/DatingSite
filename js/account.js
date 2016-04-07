function ajaxCall(url, func, params) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            func(xmlhttp);
        }
    }
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(params);
}


//Validates for standard email format and allows for underscores, hyphens and fullstops
function validateEmail() {
    var re3 = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (re3.test(document.getElementById('email').value)) {
        document.getElementById('emailTick').style.display = 'block';
        document.getElementById('emailCross').style.display = 'none';
        checkEmail();
        return true;
    } else {
        document.getElementById('emailCross').style.display = 'block';
        document.getElementById('emailTick').style.display = 'none';
        return false;
    }
}


function checkEmail() {
    var params = "email=" + document.getElementById("email").value;

    function check(xmlhttp) {
        var response = xmlhttp.responseText;
        if (response == "exists") {
            document.getElementById('emailCross').style.display = 'block';
            document.getElementById('emailTick').style.display = 'none';
            document.getElementById('emailExists').style.display = 'block';
            return false;
        } else {
            document.getElementById('emailExists').style.display = 'none';
        }
    }
    ajaxCall('php/check-email.php', check, params);
}

//Validates the address field. Only allows upper and lower alphabet characters using regex
function validateAddress(name) {
    var re1 = /^[a-zA-Z0-9\'-. ]+$/;
    var address = document.getElementById(name).value;
    if (re1.test(address)) {
        document.getElementById(name + 'Tick').style.display = 'block';
        document.getElementById(name + 'Cross').style.display = 'none';
        return true;
    } else {
        document.getElementById(name + 'Cross').style.display = 'block';
        document.getElementById(name + 'Tick').style.display = 'none';
        return false;
    }
}

// REGISTRATION FORM
// Revalidates all fields again upon submit and returns appropriate error message if form is incomplete
function validateAccount() {

    var error = 0;

    if (!validateEmail()) {
        error++;
    }
    if (!validateAddress('address1')) {
        error++;
    }
    if (document.getElementById('address2').value.length > 0 && !validateAddress('address2')) {
        error++;
    }
    if (!validateAddress('city')) {
        error++;
    }
    if (!validatePassword()) {
        error++;
    }
    if (!confirmPassword()) {
        error++;
    }
    if (error > 0) {
        alert("Please fill out form completely");
        return false;
    }
}