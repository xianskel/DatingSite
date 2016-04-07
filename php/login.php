<?php

if(isset($_POST['loginEmail']) && isset($_POST['loginPassword'])){

$email = htmlspecialchars($_POST['loginEmail']);
$password = htmlspecialchars($_POST['loginPassword']);

$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

$account  = $db->prepare("SELECT * FROM account WHERE email=?");
$account->bind_param("s", $email);
$account->execute();
$account = $account->get_result();

while ($row = $account->fetch_assoc()) {
  	   $accountid = $row["accountid"];
  	   $username = $row["username"];
       $passwordhash = $row["passwordhash"];
       $isactive = $row['isactive'];
       $isbanned = $row['isbanned'];
       $isverified = $row['isverified'];
}

if(isset($accountid) && isset($username) && isset($passwordhash) && isset($isactive) && isset($isbanned) && isset($isverified)){
   if($isbanned==1){
    echo "<h3>User is banned</h3>";
    exit();
} 
    if($isverified==0){
        echo "<h3>Please verify your email address</h3>";
        exit();
    }
        

$profile  = $db->prepare("SELECT profileid FROM profile WHERE accountid=?");
$profile->bind_param("i", $accountid);
$profile->execute();
$profile = $profile->get_result();
$profileid = $profile->fetch_object()->profileid;    
    
$pref  = $db->prepare("SELECT preferenceid FROM preference WHERE accountid=?");
$pref->bind_param("i", $accountid);
$pref->execute();
$pref = $pref->get_result();
$preferenceid = $pref->fetch_object()->preferenceid;
      
if(crypt($password, $passwordhash) == $passwordhash) {    
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["profileid"] = $profileid;
    $_SESSION["accountid"] = $accountid;
    $_SESSION["preferenceid"] = $preferenceid;
    
    if($isactive==0){
       $activate  = $db->prepare("UPDATE account SET isactive='1' WHERE accountid=?");
       $activate->bind_param("i", $accountid);
       $activate->execute();       
    }
    
    if(isset($_POST['remember'])){
       $staylogged = $_POST['remember'];
       if($staylogged == "on"){
            $expiry = time() + 60 * 60 * 24 * 120;
            $token = "";
               for ($i = 0; $i < 32; $i++) {
               $token .= substr("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", mt_rand(0, 61), 1);
               }
               $sessionid = "";
               for ($i = 0; $i < 32; $i++) {
               $sessionid .= substr("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", mt_rand(0, 61), 1);
               }
            setcookie("sessionid", $sessionid, $expiry, "/");
            setcookie("token", $token, $expiry, "/");
            $setlogin = $db->prepare("INSERT INTO login (sessionid, accountid, token) VALUES(?,?,?)");
            $setlogin->bind_param("sis", $sessionid, $accountid, $token);
            $setlogin->execute();
      }
  }
    $checkatts  = $db->prepare("SELECT * FROM userattribute WHERE profileid=?");
    $checkatts->bind_param("i", $profileid);
    $checkatts->execute();
    $checkatts = $checkatts->get_result();
    if(mysqli_num_rows($checkatts)<4) {
         header("Location: ../edit-profile.php?new=1");
         exit();
    }
    $db->close();

    header("Location: ../matches.php");
    exit();
}
else{
    header("Location: ../index.php?error=1");
    exit();
}
}else{
    header("Location: ../index.php?error=1");
    exit();
}
}

?>