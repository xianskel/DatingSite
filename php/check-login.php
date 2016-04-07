<?php

if (isset($_POST['email']) && isset($_POST['password'])) {
    
    $email    = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    
    $db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");
    
    if ($db->connect_error) {
        die("Couldn't connect to Database");
    }
    
    $result = $db->prepare("SELECT * FROM account WHERE email=?");
    $result->bind_param("s", $email);
    $result->execute();
    $result       = $result->get_result();
    $result       = $result->fetch_assoc();
    $passwordhash = $result['passwordhash'];
    
    if (crypt($password, $passwordhash) == $passwordhash) {
        echo "1";
    } else {
        echo "0";
    }
    
}

?>