<?php

session_start();

if(isset($_POST['question1']) && isset($_POST['question2']) && isset($_POST['question3']) && 
   isset($_POST['question4']) && isset($_POST['question5']) && isset($_POST['question6']) && 
   isset($_POST['question7']) && isset($_POST['question8']) && isset($_POST['question9']) && 
   isset($_POST['question10']) && isset($_SESSION["profile"])){

$profileid = $_SESSION["profile"];

    $db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

$q1 = $_POST['question1'];
$q2 = $_POST['question2'];
$q3 = $_POST['question3'];
$q4 = $_POST['question4'];
$q5 = $_POST['question5'];
$q6 = $_POST['question6'];
$q7 = $_POST['question7'];
$q8 = $_POST['question8'];
$q9 = $_POST['question9'];
$q10 = $_POST['question10'];


$result = $db->prepare("INSERT INTO personality VALUES(?,1,?),(?,2,?),(?,3,?),(?,4,?),(?,5,?),(?,6,?),(?,7,?),(?,8,?),(?,9,?),(?,10,?)");
$result->bind_param("iiiiiiiiiiiiiiiiiiii", $profileid, $q1, $profileid, $q2, $profileid, $q3, $profileid, $q4, $profileid, $q5, $profileid, $q6, $profileid, $q7, $profileid, $q8, $profileid, $q9, $profileid, $q10);
$result->execute();
       

$db->close();

session_destroy();
header("Location: ../check-email.php?verify=".md5($profileid));
    
}

?>