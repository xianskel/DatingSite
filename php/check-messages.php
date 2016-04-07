<?php
session_start();

if (isset($_SESSION['accountid'])) {
	$accountid = $_SESSION['accountid'];
    $db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");
	if ($db->connect_error) {
		die("Couldn't connect to Database");
	}

	$messcount = $db->prepare("SELECT accountid, COUNT(time) AS newmess
                            FROM userconversation b
                            JOIN message c
                            ON c.conid=b.conid
                            WHERE b.accountid=?
                            AND c.time > b.lastview
                            GROUP BY accountid");
	$messcount->bind_param("i", $accountid);
	$messcount->execute();
	$messcount = $messcount->get_result();
	if (mysqli_num_rows($messcount) == 0) {
		echo "0";
	}
	else {
		$messcount = $messcount->fetch_object()->newmess;
		echo $messcount;
	}

	$db->close();
}

?>