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


 function setAttributes() {
     function getAtts(xmlhttp) {
         var response = xmlhttp.responseText;
         var atts = JSON.parse(response);
         for (var key in atts) {
             if (atts.hasOwnProperty(key)) {
                 if (key.substring(0, 5) == "hobby") {
                     document.getElementById(atts[key]).checked = true;
                 } else if (key == 1 || key == 2 || key == 3 || key == 4 || key == 5 || key == 6 || key == 7 || key == 8 || key == 9 || key == 10) {
                     document.getElementById(atts[key]).checked = true;
                 } else if (key == "photo") {
                     document.getElementById('photo').innerHTML = "<img src=\"" + atts[key] + "\" class=\"edit-pro-pic\"/>";
                 } else if (key == "tagline") {
                     document.getElementById('tagline').value = atts[key];
                 } else if (key == "height") {
                     document.getElementById('height').selectedIndex = atts[key] - 47;
                 }
             }
         }
     }
     ajaxCall('php/get-edit-profile.php', getAtts);
 }

 window.onload = setAttributes();

 document.getElementById("Mobility").selectedIndex = 12;

 function hideMessage() {
     document.getElementById('newMsg').style.display = "none";
 }