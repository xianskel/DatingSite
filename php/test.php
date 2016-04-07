<?php

$password = "password";

$salt = "$2y$08$";
for ($i = 0; $i < 22; $i++) {
$salt .= substr("./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", mt_rand(0, 63), 1);
}

$passwordhash =  crypt($password, $salt);

echo $passwordhash;


?>