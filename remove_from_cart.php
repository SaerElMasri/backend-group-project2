<?php
include('connect.php');
$id = $_POST["id"];
$query = $conn->prepare('SELECT id FROM shopping_cart WHERE id = ?');
$query->bind_param('i', $id );
$query->execute();
$result = $query -> get_result();
$row = $result -> fetch_assoc();
$sql="DELETE FROM shopping_cart WHERE id=?";
$query = $conn -> prepare($sql);
$query -> bind_param('i', $id);
$query->execute();
$response=[];
$response['status'] = "Product has been deleted";
echo json_encode($response);
?>