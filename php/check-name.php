<?php

if (isset($_POST['username']))
	{
	$username = htmlspecialchars($_POST['username']);
    $db=new mysqli("193.1.101.7", "group09", "e0LoxVI6s", "group09DB", "3307");
	if ($db->connect_error)
		{
		die("Couldn't connect to Database");
		}

	$usercount = $db->prepare("SELECT username FROM account WHERE username=?");
	$usercount->bind_param("s", $username);
	$usercount->execute();
	$usercount = $usercount->get_result();
	$db->close();
	if (mysqli_num_rows($usercount) > 0)
		{
		echo "exists";
		}
	}

?>