<?php 

require_once "db.php";

$email = $_POST['email'];
$password = $_POST['password'];
$userType= $_POST['userType'];
$query = "SELECT * FROM $userType WHERE email = :email AND password = :password ";

$statement = $pdo->prepare($query); 

$statement->execute([
    ':email'=>$email,
    ':password'=>$password
]);

$response = $statement->fetch(PDO::FETCH_ASSOC);

var_dump($response);
