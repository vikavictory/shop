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
			<a href=\"../logout.php\">Exit</a>
		</li>
	</ul>
</div>
<h1 class="display-4">Create new product</h1>
<div class="registration-form">
    <form name="registration" method="post" action="createproduct.php" onsubmit="return validate_form ( );">
        Сategory:<br>
        <select name="category">
            <option value="other">Other</option>


        </select>
        <br>Product's name:<br>
        <input type="text" name="product" max="30" required><br>
        Description:<br>
        <input type="text" name="description" required><br>
        Price:<br>
        <input type="number" name="price" min="0" max="100000000"required ><br>
        Image:<br>
        <input type="file" name="image" required><br>

        <br><input class="btn btn-primary" type="submit" name="submit" value="Create"><br>
    </form>
</div>
