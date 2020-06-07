<?php

if ($_POST['submit'] && $_POST['submit'] === "SignUp" &&
	isset($_POST['login']) && isset($_POST['passwd']) &&
	isset($_POST['email']))
{
	$newUser['login'] = $_POST['login'];
	$newUser['email'] = $_POST['email'];
	$newUser['passwd'] = hash("whirlpool", $_POST['passwd']);
	if (!file_exists("../private"))
		mkdir("../private");
	if (!file_exists("../private/passwd"))
		file_put_contents("../private/passwd", null);
	$data = unserialize(file_get_contents("../private/passwd"));
	foreach ($data as $key => $value)
	{
		if ($value['login'] === $newUser['login'])
		{
			$error = "This user already exists\n";
			header('Location: ../register/register.php?error='.$error);
			exit ();
		}
		if ($value['email'] === $newUser['email'])
		{
			$error = "This email already exists\n";
			header('Location: ../register/register.php?error='.$error);
			exit ();
		}
	}
	$data[] = $newUser;
	file_put_contents("../private/passwd", serialize($data));
	header("Location: ../login/login.php");
}

?>
