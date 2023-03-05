<?php
include('connect.php');

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];
$image_url = $_POST['image_url'];


$query =  $conn->prepare('insert into products(name,description,price,category,image_url) values(?,?,?,?,?)');
$query->bind_param('sssss', $name, $description, $price, $category,$image_url);
$query->execute();
$response['status'] = "success";


echo json_encode($response);
?>