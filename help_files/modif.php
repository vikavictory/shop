<?php

if ($_POST['submit'] && $_POST['submit'] === "OK" &&
	$_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] )
{
	$currentUser['login'] = $_POST['login'];
	$currentUser['oldpw'] = hash("whirlpool", $_POST['oldpw']);
	$currentUser['newpw'] = hash("whirlpool", $_POST['newpw']);
	$data = unserialize(file_get_contents("../private/passwd"));
	foreach ($data as $key => $user)
	{
		if ($user['login'] === $currentUser['login'])
		{
			if ($user['passwd'] !== $currentUser['oldpw'] ||
				$user['passwd'] === $currentUser['newpw'])
			{
				echo "ERROR\n";
				exit ();
			}
			$data[$key]['passwd'] = $currentUser['newpw'];
			file_put_contents("../private/passwd", serialize($data));
			echo "OK\n";
			header("Location: index.html");
			exit();
		}
	}
	echo "ERROR\n";
}
else
	echo "ERROR\n";

?>
