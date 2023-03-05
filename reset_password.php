<?php
include('connect.php');

$email = $_POST["email"];
$new_password = $_POST["password"];
$query = $conn->prepare('SELECT id FROM users WHERE email = ?');
$query -> bind_param('s', $email);
$query -> execute();
$result = $query -> get_result();
$row = $result -> fetch_assoc();

$response = [];
if(!empty($row)){
    $hashedPassword = PASSWORD_HASH($new_password, PASSWORD_BCRYPT);
    $sql = "UPDATE users set password=? WHERE email=?";
    $query = $conn->prepare($sql);
    $query->bind_param('ss', $hashedPassword, $email);
    $query->execute();
    $response['status'] = "Password Changed";
} else{
    $response['status'] = "Email does not exist";
}
echo json_encode($response);


?>