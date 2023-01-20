<?php
	$login = "8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918";
	$password = "d82494f05d6917ba02f7aaa29689ccb444bb73f20380876cb05d1f37537b7892";
	if (hash("sha256", $_GET["name"]) == $login){
		if (hash("sha256", $_GET["password"]) == $password){
			header("Location: ../main.php");
			exit();
		}
		header("Location: ../index.php?err=password");
		exit();
	}
	header("Location: ../index.php?err=username");
	exit()	
?>
