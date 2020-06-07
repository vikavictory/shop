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
	<link href="../main.css" rel="stylesheet" type="text/css">
</head>
<!-- Add navigation bar -->
<body>
<div class="navigation ">
	<ul>
		<li>
			<a href="../index.php">Main</a>
		</li>
		<li>
			<a href="../register/register.php">Register</a>
		</li>
		<li>
			<a href="login.php">Login</a>
		</li>
		<li>
			<a href="about.html">Catalog</a>
		</li>
	</ul>
</div>
<h1 class="display-4">Login page</h1>
<?php
if (!empty($_GET['error']))
{
	echo "<h3 class=\"error\">Error: ".$_GET['error']."</h3>";
	$_GET['error'] = "";
}
?>
<div class="login-form">
	<form method="post" action="auth.php">
		Login:<br>
		<svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
		</svg>
		<input type="text" name="login" required><br>
		Password:<br>
		<svg class="bi bi-lock" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" d="M11.5 8h-7a1 1 0 00-1 1v5a1 1 0 001 1h7a1 1 0 001-1V9a1 1 0 00-1-1zm-7-1a2 2 0 00-2 2v5a2 2 0 002 2h7a2 2 0 002-2V9a2 2 0 00-2-2h-7zm0-3a3.5 3.5 0 117 0v3h-1V4a2.5 2.5 0 00-5 0v3h-1V4z" clip-rule="evenodd"/>
		</svg>
		<input type="password" name="passwd" required><br>
		<br><input class="btn btn-primary" type="submit" name="submit" value="SignIn"><br>
		<br><h6>If you don't have an account: <a href="../register/register.php">Sign Up</a></h6>
	</form>
</div>
</body>
</html>


