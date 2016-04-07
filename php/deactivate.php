<?php
session_start();

if(isset($_SESSION['accountid'])){
    $accountid = $_SESSION['accountid'];
 
$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

    if($db->connect_error){
        die("Couldn't connect to Database");
    }

    $activate  = $db->prepare("UPDATE account SET isactive='0' WHERE accountid=?");
    $activate->bind_param("i", $accountid);
    $activate->execute();  
    
    $deletesession  = $db->prepare("DELETE FROM login WHERE accountid=?");
    $deletesession->bind_param("i", $accountid);
    $deletesession->execute(); 

$db->close();

}
include './logout.php';

?>