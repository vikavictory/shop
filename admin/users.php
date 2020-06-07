<?php
session_start();

if ($_SESSION["loggued_on_user"] !== "admin")
	header('Location: ../index.php');
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Shop</title>
	<!-- Вставить иконку
	<link rel="shortcut icon" type="image/png" href="favicon.ico"/> -->
	<!-- Add Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="../main.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Add navigation bar -->
<div class="navigation ">
	<ul>
		<li>
			<a href="../index.php">Main</a>
		</li>
		<li>
			<a href="about.html">Catalog</a>
		</li>
		<li>
			<a href="admin.php">Admin</a>
		</li>
		<li>
			<a href=\"logout.php\">Exit</a>
		</li>
	</ul>
</div>
<h1 class="display-4">Users</h1>
<?php
if (file_exists("../private/passwd")) {
	$data = unserialize(file_get_contents("../private/passwd"));
	if ($data)
		{
			echo "<div class=\"users\"><ul>";
			foreach ($data as $key => $value)
				echo "<li>" . $value['login'] . " " . $value['email'] . "</li>";
			echo "</ul></div>";
		}
}
?>