<?php
include "user.php";

// Instantiate the Users class
$host = "localhost";
$username = "root";
$password = "";
$database = "inventory1";
$user = new Users($host, $username, $password, $database);

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    if ($user->deleteUser($userId)) {
        header('Location: nakasignup.php?message=User deleted successfully');
    } else {
        header('Location: nakasignup.php?error=Failed to delete user');
    }
    exit();
} else {
    header('Location: nakasignup.php?error=No user ID specified');
    exit();
}
?>
