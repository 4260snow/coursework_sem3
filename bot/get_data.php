<?php
    header('Content-Type: application/json; charset=utf-8');
    
    $con = mysqli_connect("localhost", "f0767737_recipes", "12345678", "f0767737_recipes");
    $name = $_GET['name'];
    
    if ($name != NULL) {
        $sql = "SELECT * FROM `list_of_recipes` WHERE `name`=\"$name\"";
        $res = mysqli_query($con, $sql);
        $res = mysqli_fetch_assoc($res);
        
        if (gettype($res["num_rows"])){
            $data = ['name' => $res["name"], 'description' => $res["description"], 'recipe' => $res["recipe"]];
        } else {
            $data = ['name' => 0];
        }
        print_r(json_encode($data));
    }else{
        $sql = "SELECT * FROM `list_of_recipes` ORDER BY RAND() LIMIT 1";
        $res = mysqli_query($con, $sql);
        $res = mysqli_fetch_assoc($res);
        $data = ['name' => $res["name"], 'description' => $res["description"], 'recipe' => $res["recipe"]];
        print_r(json_encode($data));
    }
    mysqli_close($con);
?>