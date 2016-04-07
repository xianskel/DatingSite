<?php
session_start();

if(isset($_SESSION['accountid'])){
    $accountid = $_SESSION['accountid'];
    
if(isset($_COOKIE['sessionid'])){

$sessionid = $_COOKIE['sessionid'];

setcookie("sessionid", "", time()-10, "/");
setcookie("token", "", time()-10, "/");
 
$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

    if($db->connect_error){
        die("Couldn't connect to Database");
    }

$deletesession  = $db->prepare("DELETE FROM login WHERE accountid=? AND sessionid=?");
$deletesession->bind_param("is", $accountid, $sessionid);
$deletesession->execute();

$db->close();

}
    
session_destroy();

}
header("Location: ../index.php");

?>