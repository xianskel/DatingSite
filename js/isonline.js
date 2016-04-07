function updateTime() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        }
    }
    xmlhttp.open("POST", 'php/update-timestamp.php', true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}


window.onload = updateTime;

setInterval(function () {
    updateTime();
}, 30000);