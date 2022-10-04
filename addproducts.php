<?php 
include_once "connection.php";

if (isset($_POST['buy'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];


    if (empty($name) && empty($price)) {
        echo "het is gelukt";
    }else{
        $query = "INSERT INTO card(name, price) VALUES('$name', '$price')";
        $res = mysqli_query($connect,$query);

        if ($res) {
            $name = "";
            header("location: index.php");
        }
    }
}



