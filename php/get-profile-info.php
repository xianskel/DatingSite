<?php

session_start();

if (isset($_SESSION['accountid']) && isset($_SESSION['username']) && isset($_SESSION['profileid'])) {
    
    $accountid = $_SESSION['accountid'];
    $username  = $_SESSION["username"];
    $profileid = $_SESSION["profileid"];
    
 
    
    if (isset($_GET['username']) && !empty($_GET['username'])) {
        $username = $_GET['username'];
        
        $accountinfo = $db->prepare("SELECT a.accountid, p.profileid 
                                  FROM account a
                                  JOIN profile p
                                  ON a.accountid=p.accountid
                                  WHERE username=?");
        $accountinfo->bind_param("s", $username);
        $accountinfo->execute();
        $accountinfo = $accountinfo->get_result();
        
        while ($row = $accountinfo->fetch_assoc()) {
            $accountid = $row["accountid"];
            $profileid = $row["profileid"];
        }
    }

    $profileinfo = $db->prepare("SELECT * FROM profile WHERE accountid=?");
    $profileinfo->bind_param("i", $accountid);
    $profileinfo->execute();
    $profileinfo = $profileinfo->get_result();
    
    while ($row = $profileinfo->fetch_assoc()) {
        $height  = $row["height"];
        $dob     = $row["dob"];
        $tagline = $row["tagline"];
        $gender  = $row["gender"];
        $seeking = $row["seeking"];
    }
    
    $hobby = $db->prepare("SELECT * FROM userhobby WHERE profileid=?");
    $hobby->bind_param("i", $profileid);
    $hobby->execute();
    $hobby = $hobby->get_result();
    
    $hobbies = "";
    $count = 0;
    while ($row = $hobby->fetch_assoc()) {
        if($count<7){
            $hobbies .= "<p>".$row["hobby"]."<p>";
        }
        $count++;
    }
    
    $attribute = $db->prepare("SELECT * FROM userattribute WHERE profileid=?");
    $attribute->bind_param("i", $profileid);
    $attribute->execute();
    $attribute = $attribute->get_result();
    
    while ($row = $attribute->fetch_assoc()) {
        if ($row['charid'] == 1) {
            $hair = $row["attname"];
        }
        if ($row['charid'] == 2) {
            $eye = $row["attname"];
        }
        if ($row['charid'] == 3) {
            $body = $row["attname"];
        }
        if ($row['charid'] == 4) {
            $smoker = $row["attname"];
        }
        if ($row['charid'] == 5) {
            $occupation = $row["attname"];
        }
        if ($row['charid'] == 6) {
            $education = $row["attname"];
        }
        if ($row['charid'] == 7) {
            $ethnicity = $row["attname"];
        }
        if ($row['charid'] == 8) {
            $religion = $row["attname"];
        }
        if ($row['charid'] == 9) {
            $mstatus = $row["attname"];
        }
        if ($row['charid'] == 10) {
            $pstatus = $row["attname"];
        }
        if ($row['charid'] == 11) {
            $county = $row["attname"];
        }
    }
    
    $db->close();
    
    $birthdate = new DateTime($dob);
    $today     = new DateTime('today');
    $age       = $birthdate->diff($today)->y;
    
    $filename = './user-photos/' . $username . '.jpg';
    
    if (file_exists($filename)) {
        $userphoto = './user-photos/' . $username . '.jpg';
        ;
    } else {
        $userphoto = './images/placeholder.jpg';
    }
    
    if ($username == $_SESSION['username']) {
        $button = "<a href=\"edit-profile.php\" class=\"btn btn-info edit-mess-btn\">Edit Profile</a>";
    } else {
        $button = "<form action=\"./php/show-conversation.php\" method=\"GET\"><input type=\"hidden\" name=\"username\" value=" . $username . "><button class=\"btn btn-info edit-mess-btn\">Message</button></form>";
    }
    
}

?>