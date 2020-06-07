<?php

function auth($login, $passwd)
{
	$data = unserialize(file_get_contents("../private/passwd"));
	foreach ($data as $key => $user)
	{
		if ($user['login'] === $login && $user['passwd'] === $passwd)
			return (true);
	}
	return (false);
}

?>