<?php

session_start();

if(isset($_SESSION["accountid"]) && isset($_POST['email']) && isset($_POST['seeking']) && isset($_POST['address1']) && isset($_POST['address2']) && isset($_POST['city']) && isset($_POST['county'])){

$accountid = $_SESSION["accountid"];
$email = $_POST['email'];    
$seeking = $_POST['seeking'];    
$line1 = $_POST['address1'];    
$line2 = $_POST['address2'];    
$town = $_POST['city']; 
$county = $_POST['county'];        

date_default_timezone_set('Europe/Dublin');
$time = date("Y-m-d H:i:s");

    $db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

$emailupdate = $db->prepare("UPDATE account SET email=? WHERE accountid=?"); 
$emailupdate->bind_param("si", $email, $accountid); 
$emailupdate->execute();
    
$profileupdate = $db->prepare("UPDATE profile SET seeking=? WHERE accountid=?"); 
$profileupdate->bind_param("si", $seeking, $accountid); 
$profileupdate->execute();    

$addressup = $db->prepare("UPDATE address SET line1=?, line2=?, town=?, county=? WHERE accountid=?"); 
$addressup->bind_param("ssssi", $line1, $line2, $town, $county, $accountid); 
$addressup->execute(); 
    
$db->close();

header("Location: ../account.php");
exit();
    
}

?>