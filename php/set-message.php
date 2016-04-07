<?php

session_start();
if(isset($_POST['username']) && isset($_POST['message']) && isset($_SESSION['accountid']) && isset($_SESSION["username"])){

$accountid = $_SESSION['accountid'];
$username = $_SESSION["username"];
$message = htmlspecialchars($_POST['message']);
$otheruser = htmlspecialchars($_POST['username']);
    
    $db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

date_default_timezone_set('Europe/Dublin');
$time = date("Y-m-d H:i:s");

if($username == "" || $message =="") {
    die();
}

$otherid = $db->prepare("SELECT accountid FROM account WHERE username=?");
$otherid->bind_param("s", $otheruser);
$otherid->execute();
$otherid = $otherid->get_result();
$otherid = $otherid->fetch_object()->accountid;

$findcon = $db->prepare("SELECT conid FROM userconversation 
                         WHERE accountid=? 
                         AND otherid=? 
                         AND conid IN(
                                      SELECT conid FROM userconversation
                                      WHERE accountid=?
                                      AND otherid=?)");
$findcon->bind_param("iiii", $accountid, $otherid, $otherid, $accountid);
$findcon->execute();
$findcon = $findcon->get_result();

if(mysqli_num_rows($findcon)<1) {

     $con = $db->prepare("INSERT INTO conversation VALUES('',?)");
     $con->bind_param("s", $time);
     $con->execute();
    
     $conid = $db->insert_id;
    
     $usercons = $db->prepare("INSERT INTO userconversation (accountid, otherid, conid, lastview) VALUES (?,?,?,?),(?,?,?,'0000-00-00 00:00:00')");
     $usercons->bind_param("iiisiii", $accountid, $otherid, $conid, $time, $otherid, $accountid, $conid);
     $usercons->execute();
    
     $result  = $db->prepare("INSERT INTO message VALUES('',?,?,?,?)");
     $result->bind_param("isss", $conid, $username, $message, $time);
     $result->execute();

}else{
     $maxcon = $db->prepare("SELECT MAX(conid) AS con FROM userconversation WHERE otherid=? AND accountid=?");
     $maxcon->bind_param("ii", $otherid, $accountid);
     $maxcon->execute();
     $maxcon = $maxcon->get_result();
     $maxcon = $maxcon->fetch_object()->con;
    
     $result  = $db->prepare("INSERT INTO message VALUES('',?,?,?,?)");
     $result->bind_param("isss", $maxcon, $username, $message, $time);
     $result->execute();
}
$db->close();

}

?>