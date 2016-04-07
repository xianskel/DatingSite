<?php

session_start();

if(isset($_SESSION['accountid']) && isset($_POST['username'])) {

$accountid = $_SESSION["accountid"];
$otheruser = $_POST['username'];

if(isset($_SESSION['conversation'])){
  if($_SESSION['conversation'] == $otheruser){
      unset($_SESSION['conversation']);
  }
}
    
date_default_timezone_set('Europe/Dublin');
$time = date("Y-m-d H:i:s");
    
$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

$otherid = $db->prepare("SELECT accountid FROM account WHERE username=?");
$otherid->bind_param("s", $otheruser);
$otherid->execute();
$otherid = $otherid->get_result();
$otherid = $otherid->fetch_object()->accountid;

$cons  = $db->prepare("SELECT conid FROM userconversation WHERE accountid=? AND otherid=?");
$cons->bind_param("ii", $accountid, $otherid);
$cons->execute();
$cons = $cons->get_result();

   while ($row = $cons->fetch_assoc())
   {  
     $conid = $row['conid'];
     echo $conid;
     $checkcon  = $db->prepare("SELECT accountid FROM userconversation WHERE conid=?");
     $checkcon->bind_param("i", $conid);
     $checkcon->execute();
     $checkcon = $checkcon->get_result();

     if(mysqli_num_rows($checkcon)>1) {
        $deleteusercon  = $db->prepare("DELETE FROM userconversation WHERE accountid=? AND conid=?");
        $deleteusercon->bind_param("ii", $accountid, $conid);
        $deleteusercon->execute();
      }
     else{
        $deletecon  = $db->prepare("DELETE FROM conversation WHERE conid=?");
        $deletecon->bind_param("i", $conid);
        $deletecon->execute();
      }
  }

$db->close();

}

?>