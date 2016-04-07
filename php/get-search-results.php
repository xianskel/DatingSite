<?php
session_start();

if (isset($_SESSION['accountid']) && isset($_POST['startno'])) {
    
    $procedure = "search_distance_asc";
    $accountid = $_SESSION["accountid"];
    $startno   = $_POST['startno'];
    $search    = "";
    
    if (isset($_POST['search']) && !empty($_POST['search'])) {
            $search = $_POST['search'];
    }
    
    if (isset($_POST['order']) && !empty($_POST['order'])) {
        $order  = $_POST['order'];
        
        if ($order == "distanceLow") {
            $procedure = "search_distance_asc";
        } else if ($order == "distanceHigh") {
            $procedure = "search_distance_desc";
        } else if ($order == "matchLow") {
            $procedure = "search_score_asc";
        } else if ($order == "matchHigh") {
            $procedure = "search_score_desc";
        } else if ($order == "usernameA") {
            $procedure = "search_username_asc";
        } else if ($order == "usernameZ") {
            $procedure = "search_username_desc";
        } else if ($order == "ageLow") {
            $procedure = "search_age_asc";
        } else if ($order == "ageHigh") {
            $procedure = "search_age_desc";
        }
    }

   $db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");
    
    if ($db->connect_error) {
        die("Couldn't connect to Database");
    }
    
    $matches = $db->prepare("CALL ".$procedure." (?,?,?)");
    $matches->bind_param("iis", $accountid, $startno, $search);
    $matches->execute();
    $matches = $matches->get_result();
    
    header('Content-Type: application/json');
    while ($row = $matches->fetch_assoc()) {
        $filename = '../user-photos/' . $row['username'] . '.jpg';
        if (file_exists($filename)) {
            $userphoto = './user-photos/' . $row['username'] . '-thumb.jpg';
            ;
        } else {
            $userphoto = './images/placeholder-thumb.jpg';
        }
        $row += array(
            'photo' => $userphoto
        );
        echo json_encode($row, JSON_PRETTY_PRINT);
        echo ">";
    }
    
    $db->close();
    
}

?>