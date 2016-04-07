var member = true;

function changeForm() {

    if (member) {
        document.getElementById("regForm").style.display = "inline";
        document.getElementById("signForm").style.display = "none";
        document.getElementById('regButton').innerHTML = "Sign In";
        member = false;
    } else {
        document.getElementById("regForm").style.display = "none";
        document.getElementById("signForm").style.display = "inline";
        document.getElementById('regButton').innerHTML = "Register";
        member = true;
    }
}


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

//Uses a loop to produce a list of years within a the boundries 1901-2099 
function yearList() {
    var list = '<option selected disabled value="0">Year</option>';
    for (var i = new Date().getFullYear() - 17; i >= 1916; i--) {
        list += '<option value="' + i + '">' + i + '</option>';
    }
    document.getElementById('numYear').innerHTML = list;

}

window.onload = yearList;

// Checks if the selected year is leap year
function isLeap() {
    var year = document.getElementById('numYear').value;

    return ((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0);
}


// Determines how many days are in the selected month while accounting for leap years
function daysInMonth() {
    var e = document.getElementById('numMonth').selectedIndex;
    switch (e) {
    case 2:
        {
            if (isLeap()) {
                numDays(29);
            } else numDays(28);
            break;
        }
    case 4:
    case 6:
    case 9:
    case 11:
        {
            numDays(30);
            break;
        }
    default:
        {
            numDays(31);
            break;
        }
    }
}


// Dynamically produce a list of days for dropdown list after month has been selected
function numDays(num) {
    var amount = '<option selected disabled value="0">Day</option>';
    for (var i = 1; i <= num; i++) {
        amount += '<option value="' + i + '">' + i + '</option>';
    }
    document.getElementById('numDay').innerHTML = amount;
}


//Checks the age entered and makes sure it is over 18 years old
function ofAge() {

    var bDay = document.getElementById('numDay').value;
    var bMonth = document.getElementById('numMonth').selectedIndex;
    var bYear = document.getElementById('numYear').value;
    var cDay = new Date().getDate();
    var cMonth = new Date().getMonth() + 1;
    var cYear = new Date().getFullYear();

    if (cYear - bYear > 18) {
        return true;
    }
    if (cYear - bYear == 18 && cMonth - bMonth > 0) {
        return true;
    }
    if (cYear - bYear == 18 && cMonth - bMonth == 0 && bDay - cDay >= 0) {
        return true;
    } else {
        return false;
    }
}

/* Second part of JS is used to validate the entered fields from the form and ensure that
the correct format is used in text fields. If incorrect format is used an error message should
appear inline with the form*/


//Validates the username field. Only allows upper and lower alphabet characters, number, dashes and underscores using regex
function validateUsername() {
    var re1 = /^[a-zA-Z0-9\-\_]+$/;
    var username = document.getElementById('username').value;

    if (re1.test(username) && username.length > 4) {
        document.getElementById('userTick').style.display = 'block';
        document.getElementById('userCross').style.display = 'none';
        checkUsername();
        return true;
    } else {
        document.getElementById('userCross').style.display = 'block';
        document.getElementById('userTick').style.display = 'none';
        return false;
    }
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


function checkUsername() {
    var params = "username=" + document.getElementById("username").value;

    function check(xmlhttp) {
        var response = xmlhttp.responseText;
        if (response == "exists") {
            document.getElementById('userCross').style.display = 'block';
            document.getElementById('userTick').style.display = 'none';
            document.getElementById('usernameExists').style.display = 'block';
            return false;
        } else {
            document.getElementById('usernameExists').style.display = 'none';
        }
    }
    ajaxCall('php/check-name.php', check, params);
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

//Makes sure that a value has been selected in all the D.O.B dropdown lists
function validateDate() {
    var day = document.getElementById('numDay').value;

    if (day == 0) {
        document.getElementById('dateCross').style.display = 'block';
        document.getElementById('dateTick').style.display = 'none';
        return false;
    } else {
        document.getElementById('dateTick').style.display = 'block';
        document.getElementById('dateCross').style.display = 'none';
        return true;
    }
}


// REGISTRATION FORM
// Revalidates all fields again upon submit and returns appropriate error message if form is incomplete
function validateForm() {

    var error = 0;

    if (!validateUsername()) {
        error++;
    }
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
    if (!validateDate()) {
        alert("You must enter your date of birth");
        return false;
    }
    if (!ofAge()) {
        alert("You cannot register if you are under 18");
        return false;
    }
    if (error > 0) {
        alert("Please fill out form completely");
        return false;
    }
}