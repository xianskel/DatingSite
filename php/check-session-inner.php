<?php
session_start();

$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

    if($db->connect_error){
        die("Couldn't connect to Database");
    }

if(isset($_SESSION['accountid']) && !empty($_SESSION['accountid'])) {
    
    $accountid = $_SESSION['accountid'];
    
    $checkuser = $db->prepare("SELECT isverified, isbanned FROM account WHERE accountid=?");
    $checkuser->bind_param("i", $accountid);
    $checkuser->execute();
    $checkuser = $checkuser->get_result();
    $checkuser = $checkuser->fetch_assoc();
    if($checkuser['isbanned']==1 || $checkuser['isverified']==0){
        session_destroy();
        header("Location: ../index.php");
        exit(); 
    }
}

else if(isset($_COOKIE['sessionid']) && isset($_COOKIE['token'])){
    $sessionid = $_COOKIE['sessionid'];
    $token = $_COOKIE['token'];
    
    $checksession  = $db->prepare("SELECT accountid, token FROM login WHERE sessionid=?");
    $checksession->bind_param("s", $sessionid);
    $checksession->execute();
    $checksession = $checksession->get_result();

   while ($row = $checksession->fetch_assoc()) {
        $oldtoken = ($row["token"]);
        $accountid = ($row["accountid"]);
    }

    if(mysqli_num_rows($checksession)>0 && $oldtoken==$token) {
      $newtoken = "";
           for ($i = 0; $i < 32; $i++) {
           $newtoken .= substr("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789", mt_rand(0, 61), 1);
           }
    
           $settoken = $db->prepare("UPDATE login SET token=? WHERE accountid=? AND sessionid=?");
           $settoken->bind_param("sis", $newtoken, $accountid, $sessionid);
           $settoken->execute();
        
           $pref  = $db->prepare("SELECT preferenceid, username, profileid 
                                  FROM preference p 
                                  JOIN account a 
                                  ON p.accountid=a.accountid
                                  JOIN profile b
                                  ON b.accountid=a.accountid
                                  WHERE a.accountid=?");
           $pref->bind_param("i", $accountid);
           $pref->execute();
           $pref = $pref->get_result();

           while ($row = $pref->fetch_assoc()) {
              $preferenceid = $row["preferenceid"];
              $username = $row["username"];
              $profileid = $row["profileid"];
           }  
                
           $_SESSION["username"] = $username;
           $_SESSION["accountid"] = $accountid;
           $_SESSION["preferenceid"] = $preferenceid;
           $_SESSION["profileid"] = $profileid;

           $expiry = time() + 60 * 60 * 24 * 120;
           setcookie("sessionid", $sessionid, $expiry, "/");
           setcookie("token", $newtoken, $expiry, "/");    
           exit();
           }
    else if(mysqli_num_rows($checksession)>0 && $oldtoken!=$token){
           
           $deletesession  = $db->prepare("DELETE FROM login WHERE accountid=?");
           $deletesession->bind_param("i", $accountid);
           $deletesession->execute();
           
           setcookie("sessionid", "", time()-10, "/");
           setcookie("token", "", time()-10, "/");
           exit();
         }
}
else{
    header("Location: ../index.php");
    exit();    
}
?>