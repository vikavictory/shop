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
<h1 class="display-4">Categories</h1>
<form action="newcategory.php">
	<button type="submit">Create new category</button>
</form>
<?php
if (file_exists("../data/category")) {
	$data = unserialize(file_get_contents("../data/category"));
	if ($data !== "") {
		if ($data) {
			echo "<div class=\"category\"><ul>";
			foreach ($data as $key => $value) {
				if ($value !== "") {
					echo "<li>" . $value . "</li>";
				}
				echo "</ul></div>";
			}
		}
	}
}
?>
<?php
if (file_exists("../data/category"))
{
	$data = unserialize(file_get_contents("../data/category"));
	if ($data !== "")
	{
		if ($data)
		{ ?>
			<?php
			foreach ($data as $key => $value)
			{
			    if ($value !== "") {
			    ?>
                    <form action="deletecategory.php" method="post" class="category" id="myform<?php echo $key;?>">
                        <table>
                            <tr>
                                <td>
									<?php echo $key;?>
                                    <input type="hidden" name="id" form="myform<?php echo $key;?>" required value="<?php echo $key;?>">
                                </td>
                                <td>
                                    <?php echo $value;?>
                                </td>
                                <td>
                                    <input type="submit" name="submit" form="myform<?php echo $key;?>" value = "delete" />
                                </td>
                            </tr>
                        </table>
                    </form>
				<?php }} ?>
            </body>
		<?php }
}}
?>