<?php

if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['city']) && isset($_POST['county']) && isset($_POST['year']) && isset($_POST['month']) && isset($_POST['day']) && isset($_POST['gender']) && isset($_POST['seeking']) && isset($_POST['password'])){

date_default_timezone_set('Europe/Dublin');

$username  = htmlspecialchars($_POST['username']);
$email = htmlspecialchars($_POST['email']);
$address1  = htmlspecialchars($_POST['address1']);
$address2 = htmlspecialchars($_POST['address2']);
$city  = htmlspecialchars($_POST['city']);
$county = htmlspecialchars($_POST['county']);
$dob  = htmlspecialchars($_POST['year']."-".$_POST['month']."-".$_POST['day']);
$gender = htmlspecialchars($_POST['gender']);
$seeking  = htmlspecialchars($_POST['seeking']);
$password = htmlspecialchars($_POST['password']);
$isActive = 1;
$isBanned = 0;
$isVerified = 0;
$time = date("Y-m-d H:i:s");


$address = "{$address1}+{$address2}+{$city}+{$county}";
            $prepAddr = str_replace(' ','+',$address);

            $locData=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');

            $output= json_decode($locData);

            $lat = $output->results[0]->geometry->location->lat;
            $lon = $output->results[0]->geometry->location->lng;

$salt = "$2y$08$"; for ($i = 0; $i < 22; $i++) { $salt .=substr( "./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", mt_rand(0, 63), 1); }

$passwordhash =  crypt($password, $salt);

    $db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

$setaccount  = $db->prepare("INSERT INTO account VALUES('',?,?,?,?,?,?,?)");
$setaccount->bind_param("sssiiis", $username, $email, $passwordhash, $isActive, $isBanned, $isVerified, $time);
$setaccount->execute();

$accountid =  $db->insert_id;

$pref  = $db->prepare("SELECT preferenceid FROM preference WHERE accountid=?");
$pref->bind_param("i", $accountid);
$pref->execute();
$pref = $pref->get_result();
$preferenceid = $pref->fetch_object()->preferenceid;

$setprofile  = $db->prepare("INSERT INTO profile VALUES('',?,'','67',?,?,?)");
$setprofile->bind_param("isss", $accountid, $dob, $gender, $seeking);
$setprofile->execute();

$profileid =  $db->insert_id;

$setaddress  = $db->prepare("INSERT INTO address VALUES('',?,?,?,?,?,?,?)");
$setaddress->bind_param("issssdd", $accountid, $address1, $address2, $city, $county, $lat, $lon);
$setaddress->execute();

$sethobbypref  = $db->prepare("INSERT INTO hobbypref (preferenceid, hobby) SELECT ?, hobbyname FROM hobby");
$sethobbypref->bind_param("i", $preferenceid);
$sethobbypref->execute();

$setattpref  = $db->prepare("INSERT INTO attributepref (preferenceid, attribute) SELECT ?, attname FROM attribute");
$setattpref->bind_param("i", $preferenceid);
$setattpref->execute();

$db->close();

session_start();
    $_SESSION['login'] = "1";
    $_SESSION["profile"] = $profileid;
    $_SESSION["email"] = $email;

header("Location: ../personality-test.php");

}

?>