<?php
require_once 'user.php';

$host = "localhost";
$username = "root";
$password = "";
$database = "inventory1";

$user = new Users($host, $username, $password, $database);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FirstName = $_POST['firstname'];
    $LastName = $_POST['lastname'];
    $Photo = $_FILES['photo'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Gender = $_POST['gender'];
    $Age = intval($_POST['age']);

    

    $user->register($FirstName, $LastName, $Photo, $Email, $Password, $Gender, $Age);
}
?>