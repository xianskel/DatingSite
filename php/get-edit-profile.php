<?php 

session_start();

if(isset($_SESSION['accountid']) && isset($_SESSION['username']) && isset($_SESSION['profileid'])){

$accountid = $_SESSION['accountid'];
$username = $_SESSION["username"];
$profileid = $_SESSION["profileid"];        

$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}
    
$profileinfo  = $db->prepare("SELECT height, dob, tagline FROM profile WHERE accountid=?");
$profileinfo->bind_param("i", $accountid);
$profileinfo->execute();
$profileinfo = $profileinfo->get_result()->fetch_assoc();

    
$hobby  = $db->prepare("SELECT * FROM userhobby WHERE profileid=?");
$hobby->bind_param("i", $profileid);
$hobby->execute();
$hobby = $hobby->get_result();

$count=0;
while ($row = $hobby->fetch_assoc())
{  
   $profileinfo['hobby'.$count] = $row['hobby'];
    $count++;
}

$attribute  = $db->prepare("SELECT attname, charid FROM userattribute WHERE profileid=?");
$attribute->bind_param("i", $profileid);
$attribute->execute();
$attribute = $attribute->get_result();   
    
while ($row = $attribute->fetch_assoc()){
        $profileinfo[$row['charid']] = $row['attname'];
      }
    
$filename = '../user-photos/'.$username.'.jpg';

if (file_exists($filename)) {
    $userphoto = './user-photos/'.$username.'.jpg?'.time();
    } else {
    $userphoto = './images/placeholder.jpg';
    }
$profileinfo['photo'] = $userphoto;   

$db->close();
    
header('Content-Type: application/json');     
echo json_encode($profileinfo, JSON_PRETTY_PRINT);    
}

?>