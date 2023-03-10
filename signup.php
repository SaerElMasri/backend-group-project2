<?php
include('connect.php');

header('Access-Control-Allow-Origin:*');
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$check_email =  $conn->prepare('select email from users where email=?');
$check_email->bind_param('s', $email);
$check_email->execute();
$check_email->store_result();
$email_exists = $check_email->num_rows();

$hashed_password = password_hash($password, PASSWORD_BCRYPT);

if ($email_exists > 0) {
    $response['status'] = "failed";
} else {
    $query =  $conn->prepare('insert into users(first_name,last_name,email,password) values(?,?,?,?)');
    $query->bind_param('ssss', $first_name, $last_name, $email, $hashed_password);
    $query->execute();
    $response['status'] = "success";
}

echo json_encode($response);
?>