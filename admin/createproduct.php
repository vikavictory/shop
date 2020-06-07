<?php
session_start();

if ($_SESSION["loggued_on_user"] !== "admin")
	header('Location: ../index.php');


if ($_POST['submit'] && $_POST['submit'] === "Create" &&
isset($_POST['product']) && isset($_POST['description']) &&
isset($_POST['price']) && isset($_POST['image']))
{
	$file = "../data/products";
	$folder = "../data";
	$newProduct['product'] = $_POST['product'];
	$newProduct['description'] = $_POST['description'];
	$newProduct['price'] = $_POST['price'];
	$newProduct['image'] = $_POST['image'];
	if (!file_exists($folder))
		mkdir($folder);
	if (!file_exists($file))
		file_put_contents($file, null);
	$data = unserialize(file_get_contents($file));
	$data[] = $newProduct;
	file_put_contents($file, serialize($data));
	header("Location: products.php");
}
?>