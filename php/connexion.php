<?php 

require_once "db.php";

$email = $_POST['email'];
$password = $_POST['password'];
$userType= $_POST['userType'];
var_dump($userType);
$query = "SELECT * FROM $userType WHERE email = :email AND password = :password ";

$statement = $pdo->prepare($query); 

$statement->execute([
    ':email'=>$email,
    ':password'=>$password
]);

$response = $statement->fetch(PDO::FETCH_ASSOC);


if(!empty($response)){
   session_start();
   $_SESSION['nom'] = $response['nom'];
   $_SESSION['adresse'] = $response['adresse'];
   $_SESSION['fixe'] = $response['fixe'];
   $_SESSION['email'] = $response['email'];
   $_SESSION['userType'] = $_POST['userType'];
   header('location:dashboard.php');
}else{
    $_POST['test'] = 'test' ;
    header('location:loginPage.php?login=false');
}
