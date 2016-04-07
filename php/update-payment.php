<?php

session_start();

if(isset($_SESSION["accountid"]) && isset($_POST['amount']) && isset($_POST['length'])){

$accountid = $_SESSION['accountid'];
$amount = $_POST['amount'];
$length = $_POST['length'];
date_default_timezone_set('Europe/Dublin');

$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

$edate = $db->prepare("SELECT MAX(expiredate) AS 'edate' FROM payment WHERE accountid=?");
$edate ->bind_param("i", $accountid);
$edate ->execute();
$edate = $edate->get_result();


if(mysqli_num_rows($edate)>0) {
       $startdate = $edate->fetch_object()->edate;
       $startdate = date_create($startdate);
       $startdate = date_format($startdate,"Y-m-d H:i:s");

    }
else{
     $startdate = date_create();
     $startdate = date_format($startdate,"Y-m-d H:i:s");
}

$date = date_create();
$date = date_format($date,"Y-m-d H:i:s");

$expiredate = date_create($startdate);
$expiredate = date_modify($expiredate,$length);
$expiredate = date_format($expiredate, "Y-m-d H:i:s");

$update = $db->prepare("INSERT INTO payment VALUES('',?,?,?,?)");
$update ->bind_param("idss", $accountid, $amount, $date, $expiredate);
$update ->execute();

$db->close();

}

?>