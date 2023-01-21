<?php
    $id = $_POST["note_id"];
    $con = mysqli_connect("localhost", "root", "", "recipes");
    $sql = "DELETE FROM `list_of_recipes` WHERE id=$id";
    header("Location: ../main.php");
?>
