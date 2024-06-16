<?php
require_once 'database.php';

$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ProductName = $_POST['ProductName'];
    $Category = $_POST['Category'];
    $Price = $_POST['Price'];
    $Quantity = $_POST['Quantity'];


    $sql = "INSERT INTO inventory2 (ProductName, Category, Price, Quantity) VALUES ('$ProductName', '$Category', '$Price', '$Quantity')";

    if ($db->conn->query($sql) === TRUE) {
        echo "Product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->conn->error;
    }
}
?>