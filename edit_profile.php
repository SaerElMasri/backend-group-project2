<?php
include('connect.php');

$id = $_POST["id"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];

$query = $conn->prepare('SELECT * FROM users WHERE id = ?');
$query -> bind_param('i', $id);
$query -> execute();
$result = $query -> get_result();
$row = $result -> fetch_assoc();

$response = [];
if(!empty($row)){
    $sql = "UPDATE users set first_name =?,last_name=?,email=? WHERE id=?";
    $query = $conn->prepare($sql);
    $query->bind_param('sssi', $first_name,$last_name,$email,$id);
    $query->execute();
    $response['status'] = "Profile Changed";
    $response['user_id'] = $id;
    $response['first_name'] = $first_name;
    $response['last_name'] = $last_name;
    $response['$email'] = $email;

} else{
    $response['status'] = "Email does not exist";
}
echo json_encode($response);


?>