<?php
include('connect.php');

$id = $_POST["id"];
$name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];
$category = $_POST["category"];
$image_url = $_POST["image_url"];

$query = $conn->prepare('SELECT * FROM products WHERE id = ?');
$query -> bind_param('i', $id);
$query -> execute();
$result = $query -> get_result();
$row = $result -> fetch_assoc();

$response = [];
if(!empty($row)){
    $sql = "UPDATE products set name =?,description=?,price=?,category=?,image_url=? WHERE id=?";
    $statement = $conn->prepare($sql);
    $statement->bind_param('ssissi', $name,$description,$price,$category,$image_url,$id);
    $statement->execute();
    $response['status'] = "Product Updated";
    $response['prod_id'] = $id;
    $response['name'] = $name;
    $response['description'] = $description;
    $response['price'] = $price;
    $response['category'] = $category;
    $response['image_url'] = $image_url;

} else{
    $response['status'] = "Product does not exist";
}
echo json_encode($response);


?>