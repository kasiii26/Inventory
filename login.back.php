<?php
include 'user.php';

if(isset($_POST['Email']) && isset($_POST['Password'])){
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    if(empty($Email) && empty($Password)){
        header('location: login.php?error=Email and password Required');
    }elseif(empty($Email)){
        header('location: login.php?error=Email required');
    }elseif(empty($Password)){
        header('location: login.php?error=Password required');
    }else{
        $query = $user->login($Email, $Password);
    }
}
?>