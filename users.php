<?php

include('connect.php');
header('Access-Control-Allow-Origin: *');
$query = $conn->prepare('SELECT * FROM users');
$query->execute();
$array=$query->get_result();

$response=[];
while ($users= $array->fetch_assoc()) {
    $response[]=$users;
}

echo json_encode($response);



?>