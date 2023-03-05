<?php
include('connect.php')

$id=$_GET["id"];
$query = $conn->prepare('SELECT id FROM products WHERE id = ?');
$query->bind_param('i',$id);
$query->execute();
$result = $query -> get_result();
$row = $result -> fetch_assoc();
$sql="DELETE * FROM products WHERE id=?";
$query = $conn->prepare($sql);
$query->bind_param('i', $id);
$response=[];
$response['status'] = "Product has been deleted";
echo json_encode($response);









?>