<?php

session_start();

if(isset($_SESSION["accountid"]) && isset($_POST['password']) && isset($_POST['newpassword'])){

$accountid = $_SESSION["accountid"];
$password = $_POST['password'];    
$newpassword = $_POST['newpassword'];    

    $db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

$passwordhash  = $db->prepare("SELECT passwordhash FROM account WHERE accountid=?");
$passwordhash->bind_param("i", $accountid);
$passwordhash->execute();
$passwordhash = $passwordhash->get_result();
$passwordhash = $passwordhash->fetch_object()->passwordhash;    
    
if(crypt($password, $passwordhash) == $passwordhash) {    
    
    $salt = "$2y$08$";
    for ($i = 0; $i < 22; $i++) {
    $salt .= substr("./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", mt_rand(0, 63), 1);
    }

    $newpasswordhash =  crypt($newpassword, $salt);

    $update = $db->prepare("UPDATE account SET passwordhash=? WHERE accountid=?"); 
    $update->bind_param("si", $newpasswordhash, $accountid); 
    $update->execute();

    $db->close();
    
    header("Location: ../account.php");
    exit();     
}else{
    header("Location: ../change-password.php?error=1");
    exit(); 
}
    
}else{
    echo "Loggin Error";
}

?>