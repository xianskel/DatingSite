<?php

session_start();

if(isset($_GET['username'])){
 
$_SESSION["conversation"] = $_GET['username'];

header("Location: ../messages.php");
exit();
    
}

?>