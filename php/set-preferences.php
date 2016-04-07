<?php

session_start();

if(isset($_SESSION["preferenceid"]) && isset($_POST['name']) && isset($_POST['value']) && isset($_POST['type'])){
    
$preferenceId = $_SESSION["preferenceid"];

$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

$name = $_POST['name'];
$value = $_POST['value'];
$type = $_POST['type'];


if($type=="hobby"){
   if($value=="checked"){
    $result = $db->prepare("INSERT INTO hobbypref VALUES(?,?)");
    $result->bind_param("is", $preferenceId, $name);
    $result->execute();
}

   else{
    $result = $db->prepare("DELETE FROM hobbypref WHERE preferenceid=? AND hobby=?");
    $result->bind_param("is", $preferenceId, $name);
    $result->execute();
    }
}

else if($type=="att"){
   if($value=="checked"){
    $result = $db->prepare("INSERT INTO attributepref VALUES(?,?)");
    $result->bind_param("is", $preferenceId, $name);
    $result->execute();
}

   else{
    $result = $db->prepare("DELETE FROM attributepref WHERE preferenceid=? AND attribute=?");
    $result->bind_param("is", $preferenceId, $name);
    $result->execute();
    }
}

else if($type=="limit"){
     $result = $db->prepare("UPDATE preference SET ".$name."=? WHERE preferenceid=?");
     $result->bind_param("ii", $value, $preferenceId);
     $result->execute();
}

$db->close();

}

?>