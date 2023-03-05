<?php

include('connect.php');

$id=$_POST['id'];

$query = $conn->prepare('SELECT * FROM products WHERE id=?');
$query->bind_param('i', $id);
$query->execute();
$query->store_result();
$num_rows = $query->num_rows();


$query->bind_result($id, $name, $description,$price, $category, $image_url);
$query->fetch();
$response = [];
if ($num_rows == 0) {
    $response['response'] = "product not available";
} else {
    
    $response['response'] = "found";
    $response['id'] = $id;
    $response['name'] = $name;
    $response['description'] = $description;
    $response['price'] = $price;
    $response['category'] = $category;
    $response['image_url'] = $image_url;
            
}
echo json_encode($response);



?>