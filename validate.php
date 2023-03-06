<?php

include('connect.php');	
header('Access-Control-Allow-Origin:*');
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailValid = validateEmail($email);
    $passwordValid = validatePassword($password);

function validatePassword($password) {
    $regex = '/^(?=.*[!@#$%^&*(),.?":{}|<>])(?=.*[A-Z])(?=.*\d).{8,}$/';
    return preg_match($regex, $password);
}

function validateEmail($email) {
    $regex = '/^[^@\s]+@[^@\s]+\.[^@\s]+$/';
    return preg_match($regex, $email);
}

    $response = array('valid' => ($emailValid && $passwordValid));
    echo json_encode($response);

?>