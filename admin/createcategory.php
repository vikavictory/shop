<?php
session_start();

if ($_SESSION["loggued_on_user"] !== "admin")
	header('Location: ../index.php');


if ($_POST['submit'] && $_POST['submit'] === "Create" &&
	isset($_POST['category']))
{
	$file = "../data/category";
	$folder = "../data";
	if (!file_exists($folder))
		mkdir($folder);
	if (!file_exists($file))
		file_put_contents($file, null);
	$data = unserialize(file_get_contents($file));
	$data[] = $_POST['category'];
	file_put_contents($file, serialize($data));
	header("Location: category.php");
}
?>