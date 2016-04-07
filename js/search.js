var startList = 0;
var matches = document.getElementById('match-area');
var name = "";
var order = "";

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

function updateSearch() {
    function getMatches(xmlhttp) {
        document.getElementById('match-area').innerHTML = "";
        var response = xmlhttp.responseText.split(">");
        var matchCount = response.length;
        showBtns(matchCount);
        for (var i = 0; i < matchCount; i++) {
            var user = JSON.parse(response[i]);
            matches.insertAdjacentHTML('beforeend', "<div class=\"row profile-list\"><div class=\"col-sm-3\" style=\"padding-left:0px;\"><img src=\"" + user['photo'] + "\"></div><div class=\"col-sm-3 col-sm-offset-1\"><p class=\"name sm-marg\">" + user['username'] + "</p><p class=\"basic-info\">" + user['age'] + "</p><p class=\"basic-info city\">" + user['town'] + " / " + user['distance'] + "km away</p></div><div class=\"col-sm-3\"><p class=\"basic-info sm-marg\">" + user['Score'] + "% Match</p><p class=\"basic-info sm-marg\">" + lastOnline(user['last_online']) + "</p></div><div class=\"col-sm-2\">  <form action=\"./php/show-conversation.php\" method=\"GET\"><input type=\"hidden\" name=\"username\" value=" + user['username'] + "><button class=\"btn btn-info sm-marg pro-btn\">Message</button></form><form action=\"./profile.php\" method=\"GET\"><input type=\"hidden\" name=\"username\" value=" + user['username'] + "><button class=\"btn btn-info pro-btn\">View Profile</button></form></div></div>");
        }
    }
    var param = "startno=" + startList + "&search=" + name + "&order=" + order;
    ajaxCall('php/get-search-results.php', getMatches, param);
}

window.onload = updateSearch();

setInterval(function () {
    updateSearch();
}, 30000);

function nextPage() {
    startList += 10;
    updateSearch();
}

function prevPage() {
    startList -= 10;
    updateSearch();
}

function setSearch(value) {
    name = value;
    updateSearch();
}

function setOrder(value) {
    order = value;
    updateSearch();
}

function showBtns(count) {
    if (startList == 0 && count < 11) {
        document.getElementById("next-btn").style.display = "none";
        document.getElementById("prev-btn").style.display = "none";
    } else if (startList == 0 && count == 11) {
        document.getElementById("next-btn").style.display = "inline-block";
        document.getElementById("prev-btn").style.display = "none";
    } else if (startList > 0 && count < 11) {
        document.getElementById("next-btn").style.display = "none";
        document.getElementById("prev-btn").style.display = "inline-block";
    } else if (startList > 0 && count == 11) {
        document.getElementById("next-btn").style.display = "inline-block";
        document.getElementById("prev-btn").style.display = "inline-block";
    }
}

function getPreferences(xmlhttp) {
    var response = xmlhttp.responseText;
    var prefs = JSON.parse(response);
    for (var key in prefs) {
        if (prefs.hasOwnProperty(key)) {
            if (key == "distance") {
                document.getElementById("distance").value = prefs[key];
                document.getElementById("distanceoutput").innerHTML = "Max distance: " + prefs[key] + "km";
            } else if (key == "minage") {
                document.getElementById("minage").value = prefs[key];
                document.getElementById("minageoutput").innerHTML = "Min age: " + prefs[key];
            } else if (key == "maxage") {
                document.getElementById("maxage").value = prefs[key];
                document.getElementById("maxageoutput").innerHTML = "Max age: " + prefs[key];
            } else if (key == "minheight") {
                document.getElementById("minheight").value = prefs[key];
                document.getElementById("minheightoutput").innerHTML = "Min height: " + formatFeet(prefs[key]);
            } else if (key == "maxheight") {
                document.getElementById("maxheight").value = prefs[key];
                document.getElementById("maxheightoutput").innerHTML = "Max height: " + formatFeet(prefs[key]);
            } else if (key == "county") {
                document.getElementById(key).value = prefs[key];
            } else {
                document.getElementById(prefs[key]).checked = true;
            }
        }
    }
}

window.onload = ajaxCall('php/get-preferences.php', getPreferences);


function sendAttribute(id) {
    var param;
    if (document.getElementById(id).checked == true) {
        param = "name=" + id + "&value=checked&type=att";
    } else {
        param = "name=" + id + "&value=notchecked&type=att";
    }
    ajaxCall('php/set-preferences.php', updateSearch, param);
    startList = 0;
}

function sendHobby(id) {
    var param;
    if (document.getElementById(id).checked == true) {
        param = "name=" + id + "&value=checked&type=hobby";
    } else {
        param = "name=" + id + "&value=notchecked&type=hobby";
    }
    ajaxCall('php/set-preferences.php', updateSearch, param);
    startList = 0;
}

function sendLimits(id, value) {
    var param = "name=" + id + "&value=" + value + "&type=limit";
    ajaxCall('php/set-preferences.php', updateSearch, param);
    startList = 0;
}

var distance = document.getElementById("distance");
distance.addEventListener("change", function () {
    document.getElementById("distanceoutput").innerHTML = "Max Distance: " + this.value + "km";
    sendLimits(this.id, this.value);
});


var minage = document.getElementById("minage");
minage.addEventListener("change", function () {
    document.getElementById("minageoutput").innerHTML = "Min Age: " + this.value;
    document.getElementById("maxage").min = this.value;
    sendLimits(this.id, this.value);
    if (this.value >= document.getElementById("maxage").value) {
        document.getElementById("maxage").value = (parseInt(this.value) + 1);
        document.getElementById("maxageoutput").innerHTML = "Max Age: " + (parseInt(this.value) + 1);
    }
});

var maxage = document.getElementById("maxage");
maxage.addEventListener("change", function () {
    document.getElementById("maxageoutput").innerHTML = "Max Age: " + this.value;
    sendLimits(this.id, this.value);
});

var minheight = document.getElementById("minheight");
minheight.addEventListener("change", function () {
    document.getElementById("minheightoutput").innerHTML = "Min Height: " + formatFeet(this.value);
    document.getElementById("maxheight").min = this.value;
    sendLimits(this.id, this.value);
    if (this.value >= document.getElementById("maxheight").value) {
        document.getElementById("maxheight").value = (parseInt(this.value) + 1);
        document.getElementById("maxheightoutput").innerHTML = "Max Height: " + formatFeet((parseInt(this.value) + 1));
    }
});

var maxheight = document.getElementById("maxheight");
maxheight.addEventListener("change", function () {
    document.getElementById("maxheightoutput").innerHTML = "Max Height: " + formatFeet(this.value);
    sendLimits(this.id, this.value);
});

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