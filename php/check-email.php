<?php

session_start();

if (isset($_POST['email']) && !isset($_SESSION['accountid'])) {
    
    $email = htmlspecialchars($_POST['email']);
    
    $db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");
    
    if ($db->connect_error) {
        die("Couldn't connect to Database");
    }
    
    $emailcount = $db->prepare("SELECT email FROM account WHERE email=?");
    $emailcount->bind_param("s", $email);
    $emailcount->execute();
    $emailcount = $emailcount->get_result();
    
    $db->close();
    
    if (mysqli_num_rows($emailcount) > 0) {
        echo "exists";
    }
}

else if (isset($_POST['email']) && isset($_SESSION['accountid'])) {
    
    $email     = htmlspecialchars($_POST['email']);
    $accountid = $_SESSION['accountid'];
    
    $db = new mysqli("localhost", "root", "root", "siteUsers");
    
    if ($db->connect_error) {
        die("Couldn't connect to Database");
    }
    
    $emailcount = $db->prepare("SELECT email FROM account WHERE email=? AND accountid<>?");
    $emailcount->bind_param("si", $email, $accountid);
    $emailcount->execute();
    $emailcount = $emailcount->get_result();
    
    $db->close();
    
    if (mysqli_num_rows($emailcount) > 0) {
        echo "exists";
    }
}

?>