<?php 
if(isset($_GET['check'])){
    $profilecrypt = $_GET['check'];
    $confirmed = "false";
    
$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}
    
$profile  = $db->prepare("SELECT profileid, account.accountid 
                          FROM profile
                          JOIN account
                          ON account.accountid = profile.accountid
                          WHERE isverified=0");
$profile->execute();
$profile = $profile->get_result();

while($row = $profile->fetch_assoc()){
    if(md5($row['profileid']) == $profilecrypt){
         $accountid = $row['accountid'];
         $setverify = $db->prepare("UPDATE account SET isverified='1' WHERE accountid=?");
         $setverify->bind_param("i", $accountid);
         $setverify->execute();
         $confirmed = "true";
    }
}    
}

?>