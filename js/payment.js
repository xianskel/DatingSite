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

 function checkPayment() {
     function cPayment(xmlhttp) {
         var response = xmlhttp.responseText;
         if (!isFuture(response)) {
             document.getElementById('popup').style.display = 'block';
         }
     }
     ajaxCall('php/check-payment.php', cPayment);
 }

 window.onload = checkPayment();

 function sendPayment() {
     var fullname = document.getElementById('fullname').value;
     var ccnum = document.getElementById('ccNumber').value;
     var month = document.getElementById('month').value;
     var year = document.getElementById('year').value;
     var cvv = document.getElementById('security').value;

     function sPayment(xmlhttp) {
         var response = xmlhttp.responseText;
         if (response == 0) {
             updatePayment();
         } else {
             return false;
         }
     }
     var param = "fullname=" + fullname + "&ccNumber=" + ccnum + "&month=" + month + "&year=" + year + "&security=" + cvv;
     ajaxCall('http://amnesia.csisdmz.ul.ie/4014/cc.php', sPayment, param);
 }

 function updatePayment() {
     function uPayment(xmlhttp) {
         document.getElementById('popup').style.display = 'none';
         return false;
     }
     var value = document.getElementById('amount').value;
     var amount = value.substring(0, 2);
     var length = value.substring(2);
     var params = "amount=" + amount + "&length=" + length;
     ajaxCall('php/update-payment.php', uPayment, params);
 }


 function validateName() {
     var re1 = /^[a-zA-Z '-]+$/;
     var name = document.getElementById('fullname').value;

     if (re1.test(name) && name.length > 4) {
         document.getElementById('nameTick').style.display = 'block';
         document.getElementById('nameCross').style.display = 'none';
         document.getElementById('nameError').style.display = 'none';
         return true;
     } else {
         document.getElementById('nameCross').style.display = 'block';
         document.getElementById('nameTick').style.display = 'none';
         document.getElementById('nameError').style.display = 'block';
         return false;
     }
 }

 function validateCard() {
     var re1 = /^[0-9]+$/;
     var num = document.getElementById('ccNumber').value;

     if (re1.test(num) && num.length == 16) {
         document.getElementById('cardTick').style.display = 'block';
         document.getElementById('cardCross').style.display = 'none';
         document.getElementById('cardError').style.display = 'none';
         return true;
     } else {
         document.getElementById('cardCross').style.display = 'block';
         document.getElementById('cardTick').style.display = 'none';
         document.getElementById('cardError').style.display = 'block';
         return false;
     }
 }

 function validateCvv() {
     var re1 = /^[0-9]+$/;
     var num = document.getElementById('security').value;

     if (re1.test(num) && num.length == 3) {
         document.getElementById('cvvTick').style.display = 'block';
         document.getElementById('cvvCross').style.display = 'none';
         document.getElementById('cvvError').style.display = 'none';
         return true;
     } else {
         document.getElementById('cvvCross').style.display = 'block';
         document.getElementById('cvvTick').style.display = 'none';
         document.getElementById('cvvError').style.display = 'block';
         return false;
     }
 }

 function validateExpiry() {
     var month = document.getElementById('month').value;
     var year = document.getElementById('year').value;
     var date = "20" + year + "-" + month + "-" + "00";

     if (month == 0 || year == 0 || !isFuture(date)) {
         document.getElementById('dateCross').style.display = 'block';
         document.getElementById('dateTick').style.display = 'none';
         document.getElementById('dateError').style.display = 'block';
         return false;
     } else {
         document.getElementById('dateTick').style.display = 'block';
         document.getElementById('dateCross').style.display = 'none';
         document.getElementById('dateError').style.display = 'none';
         return true;
     }
 }

 function validateAmount() {
     var amount = document.getElementById('amount').value;
     if (amount == 0) {
         document.getElementById('amountCross').style.display = 'block';
         document.getElementById('amountTick').style.display = 'none';
         document.getElementById('amountError').style.display = 'block';
         return false;
     } else {
         document.getElementById('amountTick').style.display = 'block';
         document.getElementById('amountCross').style.display = 'none';
         document.getElementById('amountError').style.display = 'none';
         return true;
     }
 }

 function isFuture(date) {
     var pYear = date.substring(0, 4);
     var pMonth = date.substring(5, 7);
     var pDay = date.substring(8, 10);
     var cDay = new Date().getDate();
     var cMonth = new Date().getMonth() + 1;
     var cYear = new Date().getFullYear();
     if (pYear - cYear > 0) {
         return true;
     } else if (pYear - cYear == 0 && pMonth - cMonth > 0) {
         return true;
     } else if (pYear - cYear == 0 && pMonth - cMonth == 0 && pDay - cDay > 0) {
         return true;
     } else {
         return false;
     }
 }

 function validateForm() {

     var error = 0;
     if (!validateName()) {
         error++;
     }
     if (!validateCard()) {
         error++;
     }
     if (!validateCvv()) {
         error++;
     }
     if (!validateExpiry()) {
         error++;
     }
     if (!validateAmount()) {
         error++;
     }
     if (error > 0) {
         alert("Please fill out form completely");
         return false;
     } else {
         updatePayment();
         return true;
     }
 }