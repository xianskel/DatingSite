<?php

session_start();

if(isset($_SESSION['preferenceid'])){

$preferenceId = $_SESSION["preferenceid"];

$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

$Preferences = $db->prepare("SELECT distance, maxage, minage, maxheight, minheight FROM preference WHERE preferenceid=?");
$Preferences->bind_param("i", $preferenceId);
$Preferences->execute();
$Preferences = $Preferences->get_result();
$Preferences = $Preferences->fetch_assoc();

$hobbyPref = $db->prepare("SELECT hobby FROM hobbypref WHERE preferenceid=?");
$hobbyPref->bind_param("i", $preferenceId);
$hobbyPref->execute();
$hobbyPref = $hobbyPref->get_result();
$count=0;
while ($row = $hobbyPref->fetch_assoc())
{  
   $Preferences['hobby'.$count] = $row['hobby'];
    $count++;
}

$attPref = $db->prepare("SELECT attribute FROM attributepref WHERE preferenceid=?");
$attPref->bind_param("i", $preferenceId);
$attPref->execute();
$attPref = $attPref->get_result();
$count=0;
while ($row = $attPref->fetch_assoc())
{  
   $Preferences['att'.$count] = $row['attribute'];
    $count++;
}

$db->close();

header('Content-Type: application/json');     
    echo json_encode($Preferences, JSON_PRETTY_PRINT); 

}
    
?>