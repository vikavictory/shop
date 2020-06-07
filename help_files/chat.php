<?php

date_default_timezone_set("Europe/Moscow");
session_start();

if ($_SESSION['loggued_on_user'] && $_SESSION['loggued_on_user'] !== "")
{
	if (file_exists('../private') && file_exists('../private/chat'))
	{
		$fp = fopen("../private/chat", "r+");
		if (flock($fp, LOCK_SH)) {
			$data = unserialize(file_get_contents('../private/chat'));
			foreach ($data as $message)
				echo ("[" . date('H:i', $message['time']) .
					"] <b>" . $message['login'] . "</b>: " . $message['msg'] . "<br />\n");
			flock($fp, LOCK_UN);
			fclose($fp);
		}
	}
}

else
	echo "ERROR\n";
?>
