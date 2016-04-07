function checkMsg() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var response = xmlhttp.responseText;
            if (response > 0) {
                var count = document.getElementById('msgc');
                count.innerHTML = response;            }
        }
    }
    xmlhttp.open("POST", 'php/check-messages.php', true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}


window.onload = checkMsg;

setInterval(function () {
    checkMsg();
}, 20000);