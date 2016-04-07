<?php

session_start();

if(isset($_SESSION["accountid"])){

$accountid = $_SESSION["accountid"];

date_default_timezone_set('Europe/Dublin');
$time = date("Y-m-d H:i:s");

$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

$lastOnline = $db->prepare("UPDATE account SET lastonline=? WHERE accountid=?"); 
$lastOnline->bind_param("si", $time, $accountid); 
$lastOnline->execute();

$db->close();

}

?>