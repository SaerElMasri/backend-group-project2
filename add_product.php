<?php
header('Access-Control-Allow-Origin: *');
include('connect.php');

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];
$image_url = $_POST['image_url'];

$query =  $conn->prepare('insert into products(name,description,price,category,image_url) values(?,?,?,?,?)');
$query->bind_param('ssiss',$name, $description, $price, $category,$image_url);
$query->execute();
$response['status'] = "Product is successfully added!";
$response['name'] = $name;
$response['description'] = $description;
$response['price'] = $price;
$response['category'] = $category;
$response['image_url'] = $image_url;


echo json_encode($response);
