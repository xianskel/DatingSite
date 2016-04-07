<?php 

if(isset($_SESSION['accountid']) && isset($_SESSION['username']) && isset($_SESSION['profileid'])){
    
$accountid = $_SESSION['accountid'];
$username = $_SESSION["username"];
$profileid = $_SESSION["profileid"];
      
$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

$address  = $db->prepare("SELECT * FROM address WHERE accountid=?");
$address->bind_param("i", $accountid);
$address->execute();
$address = $address->get_result();

while ($row = $address->fetch_assoc()) {
  	$line1 = $row["line1"];
  	$line2 = $row["line2"];
    $town = $row['town'];
    $county = $row['county'];
}

$email = $db->prepare("SELECT email FROM account WHERE accountid=?");
$email->bind_param("i", $accountid);
$email->execute();
$email = $email->get_result();
$email = $email->fetch_object()->email;    

$paydate  = $db->prepare("SELECT paydate, expiredate, amount FROM payment WHERE accountid=?");
$paydate->bind_param("i", $accountid);
$paydate->execute();
$paydate = $paydate->get_result();

$pay = "N/A";
$expire = "N/A";
$amount = "N/A";    
while ($row = $paydate->fetch_assoc()){
  	$pay = substr($row["paydate"],0,10);
  	$expire = substr($row["expiredate"],0,10);
    $amount = "€".$row['amount'];
}    
    
$seeking  = $db->prepare("SELECT seeking FROM profile WHERE profileid=?");
$seeking->bind_param("i", $profileid);
$seeking->execute();
$seeking = $seeking->get_result();    
$seeking = $seeking->fetch_object()->seeking;  
  
$notseeking="man";    
if($seeking=="man"){
    $notseeking="woman";
}    
    
}

?>