var txtInput = document.getElementById("text-input");
var msgArea = document.getElementById("msg-area");
var conArea = document.getElementById('con-area');
var userTitle = document.getElementById('username');
var sound = new Audio("../audio/Robot_blip-Marianne_Gagnon-120342607.wav");
var isFirst = true;
var msgNum = 0;
var username;
var startCon;
var IntervalId;

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

function getMsgCallback() {
    function getMessage(xmlhttp) {
        var response = xmlhttp.responseText.split(">")
        for (var i = 0; i < response.length; i++) {
            var message = JSON.parse(response[i]);
            var isUser = true;
            if (message['text'] != undefined) {
                if (message['sender'].indexOf('&') == 0) {
                    $('#msg-area').append("<div class=\"bottom-marg\"> <div class=\"msg user-msg\">" + message['text'] + "</div> <div class=\"msg-tail msg-tail-user\"></div> <div class=\"sent-by sent-by-other\"> Sent by " + message['sender'].substring(1) + formatTime(message['time']) + "</div> </div>");
                    isUser = true;
                } else {
                    $('#msg-area').append("<div style=\"margin-bottom:20px;\"> <div class=\"msg\">" + message['text'] + "</div><div class=\"msg-tail\"></div><div class=\"sent-by\"> Sent by " + message['sender'] + formatTime(message['time']) + "</div> </div>");
                    isUser = false;
                }
                msgNum = message['messageid'];
                msgArea.scrollTop = msgArea.scrollHeight;
                if (!isUser && !isFirst) {
                    sound.play();
                }
            }
        }
    }
    var params = "msgNum=" + msgNum + "&username=" + username;
    ajaxCall('php/get-messages.php', getMessage, params);
}

function selectCon(user) {
    msgArea.innerHTML = "";
    userTitle.innerHTML = "<img src=\"user-photos/" + user + "-thumb.jpg\">" + user;
    isFirst = true;
    username = user;
    msgNum = 0;
    getMsgCallback();
    IntervalId = setInterval(function () {
        isFirst = false;
        getMsgCallback();
    }, 2000);
    getConCallback(user);
}

function sendMsgCallback(message) {
    function sendMessage(xmlhttp) {
        txtInput.value = "";
    }
    var msg = message.trim();
    var params = "message=" + msg + "&username=" + username;
    if (msg != "") {
        ajaxCall('php/set-message.php', sendMessage, params);
    }
}

function getConCallback(hideNew) {
    function getConversation(xmlhttp) {
        var response = xmlhttp.responseText.split(">");
        conArea.innerHTML = "";
        for (var i = 0; i < response.length - 1; i++) {
            var con = JSON.parse(response[i]);
            var newMess = "<div class=\"col-sm-2 con-count\">" + con['new'] + "</div>";
            var highlight = "style=\"background-color: #948ed8; color: white;\"";
            if (con['new'] == undefined || hideNew == con['username']) {
                newMess = "";
            } else if (con['new'] > 99) {
                con['new'] = "99+"
            }
            if (con['username'] != username) {
                highlight = "";
            }
            conArea.insertAdjacentHTML('beforeend', "<div class=\"row\"><div class=\"col-xs-10 col-xs-offset-1 nopad\"><button " + highlight + " onclick=\"selectCon('" + con['username'] + "');\" class=\"conversation nopad\"><div class=\"col-xs-5 nopad\"><img src=\"user-photos/" + con['username'] + "-thumb.jpg\"></div><div class=\"col-xs-5\"><p>" + con['username'] + "</p><p>" + isOnline(con['lastonline']) + "</p></div>" + newMess + "</button></div><button class=\"close-con\" onclick=\"deleteCon('" + con['username'] + "');\"></button></div></div>");
        }
        if (startCon == undefined && response[response.length - 1] != "&&&") {
            startCon = response[response.length - 1];
            selectCon(startCon);
        }
    }
    ajaxCall('php/get-conversations.php', getConversation);
}

window.onload = getConCallback();


setInterval(function () {
    getConCallback();
}, 30000);

function deleteCon(user) {
    var params = "username=" + user;
    ajaxCall('php/delete-conversation.php', getConCallback, params);
    if (user == username) {
        msgArea.innerHTML = "";
        userTitle.innerHTML = "My Messages";
        clearInterval(IntervalId);
        username = "";
    }
}

function formatTime(message) {

    var cDay = new Date().getDate();
    var cMonth = new Date().getMonth() + 1;
    var cYear = new Date().getFullYear();

    var mDay = message.substring(8, 10);
    var mMonth = message.substring(5, 7);
    var mYear = message.substring(0, 4);

    if (cDay - mDay != 0 || cMonth - mMonth != 0 || cYear - mYear != 0) {
        return formatDate();
    } else {
        return " at " + message.substring(11, 16);
    }

    function formatDate() {
        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        var month = months[mMonth - 1];
        var day = mDay;

        if (mDay == 1 || mDay == 21 || mDay == 31) {
            day = day + "st";
        } else if (mDay == 2 || mDay == 22) {
            day = day + "nd";
        } else if (mDay == 3 || mDay == 23) {
            day = day + "rd";
        } else {
            day = day + "th";
        }
        if (cYear - mYear == 0) {
            return " on " + month + " " + day;
        } else {
            return " on " + month + " " + day + " " + mYear;
        }
    }
}


function isOnline(timestamp) {

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

    if (cHour == lHour && cDay == lDay && cMonth == lMonth && cYear == lYear && (cMin - lMin) < 2) {
        return "<i class=\"fa fa-circle green\"></i> online";
    } else {
        return "offline";
    }
}