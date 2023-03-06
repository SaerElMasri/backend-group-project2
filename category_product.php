<?php
header('Access-Control-Allow-Origin: *');
include('connect.php');
$category=$_GET['category'];
$query = $conn->prepare('SELECT * FROM products WHERE category=?');
$query->bind_param('s', $category);
$query->execute();
$array = $query->get_result();
$response = [];
while ($product = $array->fetch_assoc()) {
    $response[]=$product;
}
echo json_encode($response);
?>