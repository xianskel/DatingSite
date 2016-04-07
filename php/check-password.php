<?php
session_start();

if (isset($_POST['password']) && isset($_SESSION['accountid']))
	{
	$accountid = $_SESSION['accountid'];
	$password = htmlspecialchars($_POST['password']);

	if ($db->connect_error)
		{
		die("Couldn't connect to Database");
		}

	$passwordhash = $db->prepare("SELECT passwordhash FROM account WHERE accountid=?");
	$passwordhash->bind_param("i", $accountid);
	$passwordhash->execute();
	$passwordhash = $passwordhash->get_assoc();
	$passwordhash = $result['passwordhash'];
	if (crypt($password, $passwordhash) == $passwordhash)
		{
		echo "exists";
		echo $passwordhash;
		}
	  else
		{
		}
	}

?>