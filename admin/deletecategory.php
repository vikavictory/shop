<?php
session_start();

if ($_SESSION["loggued_on_user"] !== "admin")
	header('Location: ../index.php');


if (isset($_POST['submit']) && $_POST['submit'] === "delete" && isset($_POST['id'])) {
	//print_r ($_POST);
	$file = "../data/category";
	$data = unserialize(file_get_contents($file));
	$data[$_POST['id']] = "";
	file_put_contents($file, serialize($data));
	header("Location: category.php");
}