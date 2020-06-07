<?php
session_start();
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Shop</title>
	<!-- Вставить иконку
	<link rel="shortcut icon" type="image/png" href="favicon.ico"/> -->
	<!-- Add Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Add navigation bar -->
<div class="navigation ">
		<ul>
			<li>
				<a href="index.php">Main</a>
			</li>
			<?php
			if (!isset($_SESSION["loggued_on_user"]) || $_SESSION["loggued_on_user"] === "")
			{
				echo ("<li><a href=\"register/register.php\">Register</a></li>
				<li><a href=\"login/login.php\">Login</a></li>");
			}
			?>
			<li>
				<a href="about.html">Catalog</a>
			</li>
			<?php
			if (isset($_SESSION["loggued_on_user"]) && $_SESSION["loggued_on_user"] === "admin")
			{
				echo ("<li><a href=\"admin/admin.php\">Admin</a></li>");
			}
			?>
			<?php
			if (isset($_SESSION["loggued_on_user"]) && $_SESSION["loggued_on_user"] !== "")
			{
				echo ("<li><a href=\"logout.php\">Exit</a></li>");
			}
			?>
		</ul>
</div>
<!-- Вывести примеры товаров -->
<div class="items">
		<h1 class="display-4">Welcome</h1>
	<?php
	if (isset($_SESSION["loggued_on_user"]) && $_SESSION["loggued_on_user"] !== "")
	{
		echo "<h3> User:".$_SESSION["loggued_on_user"]."</h3>";
		$_GET['error'] = "";
	}
	?>
</div>

</body>
</html>

