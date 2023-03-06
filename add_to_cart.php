<?php
header('Access-Control-Allow-Origin: *');
include('connect.php');
$name = $_POST['prod_name'];
$description = $_POST['prod_description'];
$price = $_POST['price'];
$image_url = $_POST['image_url'];

$query =  $conn->prepare('insert into shopping_cart(prod_name,prod_description,price,img_url) values(?,?,?,?)');
$query->bind_param('ssis',$name, $description, $price,$image_url);
$query->execute();
$response['status'] = "Product is successfully added!";
$response['name'] = $name;
$response['description'] = $description;
$response['price'] = $price;
$response['image_url'] = $image_url;

echo json_encode($response);
