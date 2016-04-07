<?php

session_start();

if(isset($_SESSION['accountid'])) {

$accountid = $_SESSION["accountid"];
$openuser = "&&&";
if(isset($_SESSION['conversation']) && !empty($_SESSION['conversation'])){
    $openuser = $_SESSION['conversation'];
}

$db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");

if($db->connect_error){
    die("Couldn't connect to Database");
}

$checkuser = $db->prepare("SELECT username 
                           FROM account 
                           WHERE username=? AND accountid IN(
                                                            SELECT otherid FROM userconversation
                                                            WHERE accountid=?)");
$checkuser->bind_param("si", $openuser, $accountid);
$checkuser->execute();
$checkuser = $checkuser->get_result();

header('Content-Type: application/json');         
if(mysqli_num_rows($checkuser)==0) {
    $user = $db->prepare("SELECT username, lastonline, null AS new FROM account WHERE username=?");
    $user->bind_param("s", $openuser);
    $user->execute();
    $user = $user->get_result();
        
    while ($row = $user->fetch_assoc())
        {  
           echo json_encode($row, JSON_PRETTY_PRINT); 
           echo ">";
        }
}

$usercons = $db->prepare("SELECT username, lastonline, SUM(newmess) AS new
                          FROM(
                               (SELECT username, lastonline, b.conid, lastmess
                                FROM account a
                                JOIN userconversation b
                                ON a.accountid=b.otherid
                                JOIN conversation c
                                ON b.conid=c.conid
                                WHERE b.accountid=?
                                GROUP BY b.conid) AS temp1  
                           LEFT JOIN
                               (SELECT b.conid, COUNT(time) AS newmess
                                FROM userconversation b
                                JOIN message c
                                ON c.conid=b.conid
                                WHERE b.accountid=?
                                AND c.time > b.lastview
                                GROUP BY b.conid) AS temp2
                           ON temp1.conid=temp2.conid)
                           GROUP BY username
                           ORDER BY temp1.lastmess DESC");
$usercons->bind_param("ii", $accountid, $accountid);
$usercons->execute();
$usercons = $usercons->get_result();
    
while ($row = $usercons->fetch_assoc())
{  
    echo json_encode($row, JSON_PRETTY_PRINT); 
    echo ">";
}

echo $openuser;

$db->close();

}

?>