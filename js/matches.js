var matches = document.getElementById('match-area');


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

function updateMatches() {
    function getMatches(xmlhttp) {
        document.getElementById('match-area').innerHTML = "";
        var response = xmlhttp.responseText.split(">");
        var matchCount = response.length;
        for (var i = 0; i < matchCount; i++) {
            var user = JSON.parse(response[i]);
            matches.insertAdjacentHTML('beforeend', "<div class=\"row profile-list\"><div class=\"col-sm-3\" style=\"padding-left:0px;\"><img src=\"" + user['photo'] + "\"></div><div class=\"col-sm-3 col-sm-offset-1\"><p class=\"name sm-marg\">" + user['username'] + "</p><p class=\"basic-info\">" + user['age'] + "</p><p class=\"basic-info city\">" + user['town'] + " / " + user['distance'] + "km away</p></div><div class=\"col-sm-3\"><p class=\"basic-info sm-marg\">" + user['Score'] + "% Match</p><p class=\"basic-info sm-marg\">" + lastOnline(user['last_online']) + "</p></div><div class=\"col-sm-2\">  <form action=\"./php/show-conversation.php\" method=\"GET\"><input type=\"hidden\" name=\"username\" value=" + user['username'] + "><button class=\"btn btn-info sm-marg pro-btn\">Message</button></form><form action=\"./profile.php\" method=\"GET\"><input type=\"hidden\" name=\"username\" value=" + user['username'] + "><button class=\"btn btn-info pro-btn\">View Profile</button></form></div></div>");
        }
    }
    ajaxCall('php/get-matches.php', getMatches);
}

window.onload = updateMatches();

setInterval(function () {
    updateMatches();
}, 30000);


function formatFeet(inches) {
    return "" + Math.floor(inches / 12) + "ft " + inches % 12 + "in";
}

function lastOnline(timestamp) {

    var cMin = new Date().getMinutes();
    var cHour = new Date().getHours();
    var cDay = new Date().getDate();
    var cMonth = new Date().getMonth() + 1;
    var cYear = new Date().getFullYear();

    var lMin = parseInt(timestamp.substring(14, 16));
    var lHour = parseInt(timestamp.substring(11, 13));
    var lDay = parseInt(timestamp.substring(8, 10));
    var lMonth = parseInt(timestamp.substring(5, 7));
    var lYear = parseInt(timestamp.substring(0, 4));

    if (cHour == lHour && cDay == lDay && cMonth == lMonth && cYear == lYear && (cMin - lMin) < 5) {
        return "Online Now";
    } else if (cHour == lHour && cDay == lDay && cMonth == lMonth && cYear == lYear) {
        return "Online " + (cMin - lMin) + " minutes ago";
    } else if (cDay == lDay && cMonth == lMonth && cYear == lYear) {
        return "Online " + (cHour - lHour) + " hours ago";
    } else if (cMonth == lMonth && cYear == lYear) {
        return "Online " + (cDay - lDay) + " days ago";
    } else if (cYear == lYear) {
        return "Online " + (cMonth - lMonth) + " months ago";
    } else {
        return "Online " + (cYear - lYear) + " year ago";
    }
}