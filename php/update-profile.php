<?php

session_start();

if(isset($_SESSION["profileid"]) && !empty($_SESSION["profileid"]) && isset($_POST['tagline']) && isset($_POST['1']) && isset($_POST['2']) && isset($_POST['3']) && isset($_POST['4']) && isset($_POST['5']) && isset($_POST['6']) && isset($_POST['7']) && isset($_POST['8']) && isset($_POST['9']) && isset($_POST['10']) && isset($_POST['hobbies']) && isset($_POST['height'])){

$profileid = $_SESSION["profileid"];    
$height = $_POST['height'];
$hair = $_POST['1'];
$eyes = $_POST['2'];
$body = $_POST['3'];    
$smoker = $_POST['4'];
$job = $_POST['5'];
$education = $_POST['6'];
$race = $_POST['7'];
$religion = $_POST['8'];
$mstatus = $_POST['9'];    
$parent = $_POST['10'];   
$tagline = $_POST['tagline'];  
$hobbies = $_POST['hobbies'];
    
if(strlen($tagline)>500){
    echo "Tagline is too long";
    exit();
}    

$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}
    
    $setheight = $db->prepare("UPDATE profile SET height=?, tagline=? WHERE profileid=?"); 
    $setheight->bind_param("isi", $height, $tagline, $profileid); 
    $setheight->execute();
   
    $deleteattributes  = $db->prepare("DELETE FROM userattribute WHERE profileid=? AND charid<'11'");
    $deleteattributes->bind_param("i", $profileid);
    $deleteattributes->execute();
    
    $updateattributes = $db->prepare("INSERT INTO userattribute VALUES(?,'1',?),(?,'2',?),(?,'3',?),(?,'4',?),(?,'5',?),(?,'6',?),(?,'7',?),(?,'8',?),(?,'9',?),(?,'10',?)");
    $updateattributes->bind_param("isisisisisisisisisis", $profileid, $hair, $profileid, $eyes, $profileid, $body, $profileid, $smoker, $profileid, $job, $profileid, $education, $profileid, $race, $profileid, $religion, $profileid, $mstatus, $profileid, $parent);
    $updateattributes->execute();
    
    $deletehobby  = $db->prepare("DELETE FROM userhobby WHERE profileid=?");
    $deletehobby->bind_param("i", $profileid);
    $deletehobby->execute();
    
    foreach($hobbies as $hobby){
         $con = $db->prepare("INSERT INTO userhobby VALUES(?,?)");
         $con->bind_param("is", $profileid, $hobby);
         $con->execute();
    }
    
$db->close();
header("Location: ../profile.php");    
    
}


?>