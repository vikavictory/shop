<?php

include ("auth.php");

session_start();

if ($_POST['submit'] && $_POST['submit'] === "OK" && $_POST['login'] && $_POST['passwd'])
{
	if (auth($_POST['login'], hash("whirlpool",$_POST['passwd'])) === false)
	{
		$_SESSION["loggued_on_user"] = "";
		echo "ERROR\n";
		exit();
	}
	$_SESSION["loggued_on_user"] = $_POST['login'];?>
	<html>
	<body>
		<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
		<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
	</body>
	</html>
<?php }

else
	echo "ERROR\n";
?>
