<?php

session_start();

function auth($login, $passwd)
{
	$data = unserialize(file_get_contents("../private/passwd"));
	foreach ($data as $key => $user)
	{
		if ($user['login'] === $login) {
			if ($user['passwd'] !== $passwd)
				return ("Incorrect password");
			else
				return (true);
		}
	}
		return ("User is not found");
}

if (isset($_POST['submit']) && $_POST['submit'] === "SignIn" &&
	isset($_POST['login']) && isset($_POST['passwd']))
{
	$authResult = auth($_POST['login'], hash("whirlpool",$_POST['passwd']));
	if ($authResult !== true)
	{
		header('Location: ../login/login.php?error='.$authResult);
		exit ();
	}
	$_SESSION["loggued_on_user"] = $_POST['login'];
	if ($_POST['login'] === 'admin')
		header('Location: ../admin/admin.php');
	else
		header('Location: ../index.php');
 }
?>
