<?php
	$table = "list_of_recipes";
	$name = $_POST["name"];
	$desc = $_POST["description"];
	$rec = $_POST["recipe"];

	$con = mysqli_connect("localhost", "root", "", "recipes");
	$sql = "INSERT INTO `$table` (`name`, `description`, `recipe`) VALUES ('$name', '$desc', '$rec')";
	print_r($sql);
	
	mysqli_query($con, $sql);
	
	header("Location: ../main.php");	
?>
