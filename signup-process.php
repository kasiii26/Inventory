<?php

include "user.php";




    $firstname = $_POST['firstname'];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];


    $user->register($firstname, $lastname, $email, $password, $gender, $age);
    
        
     


?>
