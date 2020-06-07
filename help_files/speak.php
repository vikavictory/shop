<?php

session_start();

if ($_SESSION["loggued_on_user"] && $_SESSION["loggued_on_user"] !== "")
{
	if ($_POST['msg'] && $_POST['msg'] !== "" && 
	$_POST['submit'] && $_POST['submit'] === "OK") {
		$newMessage['login'] = $_SESSION["loggued_on_user"];
		$newMessage['time'] = time();
		$newMessage['msg'] = $_POST['msg'];
		if (!file_exists('../private'))
			mkdir("../private");
		if (!file_exists('../private/chat'))
			file_put_contents('../private/chat', null);
		$fp = fopen('../private/chat', "r+");
		if (flock($fp, LOCK_EX)) {
			$data = unserialize(file_get_contents('../private/chat'));
			$data[] = $newMessage;
			file_put_contents('../private/chat', serialize($data));
			flock($fp, LOCK_UN);
		}
		fclose($fp);
	} ?>
<html>
<head><script langage='javascript'>top.frames['chat'].location = 'chat.php';</script></head>
<body>
<form name='speak.php' method='post' action='speak.php'>
	<input type='text' name='msg' value=''/> 
	<input type="submit" name="submit" value="OK" />
</form>
</body></html>
<?php }

else
	echo "ERROR\n";
?>

