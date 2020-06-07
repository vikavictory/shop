<?php

if ($_POST['submit'] && $_POST['submit'] === "OK" && ($_POST['login'] && $_POST['passwd']))
{
	$newUser['login'] = $_POST['login'];
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
			echo "ERROR\n";
			exit ();
		}
	}
	$data[] = $newUser;
	file_put_contents("../private/passwd", serialize($data));
	echo "OK\n";
	header("Location: index.html");
}
else
	echo "ERROR\n";

?>
