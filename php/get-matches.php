<?php
session_start();

if(isset($_SESSION['accountid'])){


$accountid = $_SESSION["accountid"];

$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
         die("Couldn't connect to Database");
}

$matches = $db->prepare("CALL Get_Matches(?)");
$matches->bind_param("i", $accountid);
$matches->execute();
$matches = $matches->get_result();

header('Content-Type: application/json');     
   while ($row = $matches->fetch_assoc())
   {  
       $filename = '../user-photos/'.$row['username'].'.jpg';
       if (file_exists($filename)) {
         $userphoto = './user-photos/'.$row['username'].'-thumb.jpg';;
         } else {
         $userphoto = './images/placeholder-thumb.jpg';
}
      $row += array('photo' => $userphoto);
      echo json_encode($row, JSON_PRETTY_PRINT); 
      echo ">";
   }

$db->close();
    
}

?>