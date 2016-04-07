<?php

session_start();

if(isset($_SESSION['username']) && isset($_SESSION['accountid']) && isset($_POST['msgNum']) && isset($_POST['username'])){

$username = $_SESSION["username"];
$accountid = $_SESSION['accountid'];
$lastmsg = $_POST['msgNum'];
$otheruser = $_POST['username'];

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

$maxcon = $db->prepare("SELECT MAX(conid) AS con FROM userconversation WHERE otherid=? AND accountid=?");
$maxcon->bind_param("ii", $otherid, $accountid);
$maxcon->execute();
$maxcon = $maxcon->get_result();
$maxcon = $maxcon->fetch_object()->con;

$message = $db->prepare("SELECT sender, text, time, messageid 
                         FROM message WHERE conid IN(
                                                    SELECT conid FROM userconversation
                                                    WHERE accountid=?
                                                    AND otherid=?)");
$message->bind_param("ii", $accountid, $otherid);
$message->execute();
$message = $message->get_result();


$lastview = $db->prepare("UPDATE userconversation SET lastview=? WHERE accountid=? AND conid=?");
$lastview->bind_param("sii", $time, $accountid, $maxcon);
$lastview->execute();

$db->close();
 
header('Content-Type: application/json');         
while ($row = $message->fetch_assoc())
{  
    if($row['messageid']>$lastmsg){
         if($row['sender'] == $username){
            $row['sender'] = "&".$row['sender'];
   }
    echo json_encode($row, JSON_PRETTY_PRINT);
    echo ">";
    }
}

}
    
?>