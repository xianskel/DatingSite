<?php
session_start();

if (isset($_SESSION['accountid']))
	{
	$accountid = $_SESSION['accountid'];
    $db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");
	if ($db->connect_error)
		{
		die("Couldn't connect to Database");
		}

	$expiredate = $db->prepare("SELECT MAX(expiredate) AS 'edate' FROM payment WHERE accountid=?");
	$expiredate->bind_param("i", $accountid);
	$expiredate->execute();
	$expiredate = $expiredate->get_result();
	if (mysqli_num_rows($expiredate) < 1)
		{
		echo "No Payment";
		}
	  else
		{
		$expiredate = $expiredate->fetch_object()->edate;
		echo $expiredate;
		}

	$db->close();
	}

?>