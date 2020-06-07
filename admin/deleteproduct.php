<?php
session_start();

if ($_SESSION["loggued_on_user"] !== "admin")
	header('Location: ../index.php');

if ($_POST['submit'] && $_POST['submit'] === "save") {
	if (isset($_POST['id']) && isset($_POST['product']) &&
		isset($_POST['description']) && isset($_POST['price']) && isset($_POST['image'])) {
		$file = "../data/products";
		$folder = "../data";
		$changeProduct['product'] = $_POST['product'];
		$changeProduct['description'] = $_POST['description'];
		$changeProduct['price'] = $_POST['price'];
		$changeProduct['image'] = $_POST['image'];
		$data = unserialize(file_get_contents($file));
		$data[$_POST['id']] = $changeProduct;
		file_put_contents($file, serialize($data));
		header("Location: products.php");
	}
}

if ($_POST['submit'] && $_POST['submit'] === "delete") {
		$file = "../data/products";
		$data = unserialize(file_get_contents($file));
		$data[$_POST['id']]['product'] = "DELETED_PRODUCT";
		$data[$_POST['id']]['description'] = "";
		$data[$_POST['id']]['price'] = "";
		$data[$_POST['id']]['image'] = "";
		file_put_contents($file, serialize($data));
		header("Location: products.php");
}
