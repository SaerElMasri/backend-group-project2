<?php
    include 'connect.php';

    $username = $_GET["name"];
    $description = $_GET["description"];
    $price = $_GET["price"];
    $category = $_GET["category"];

    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);

?>