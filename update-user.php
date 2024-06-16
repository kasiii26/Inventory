<?php
include 'user.php'; // Ensure the path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user'])) {
    $userId = $_POST['userId'];
    $newFirstName = $_POST['newFirstName'];
    $newLastName = $_POST['newLastName'];
    $newEmail = $_POST['newEmail'];
    $newGender = $_POST['newGender'];
    $newAge = $_POST['newAge'];
    $newRole = $_POST['newRole'];

    if ($user->updateUser($userId, $newFirstName, $newLastName, $newEmail, $newGender, $newAge, $newRole)) {
        header('Location: user_list.php?message=User updated successfully');
        exit();
    } else {
        header('Location: user_list.php?error=Failed to update user');
        exit();
    }
}

if (isset($_GET['edit_user'])) {
    $userId = $_GET['edit_user'];
    $userDetails = $user->getUserDetails($userId);
    if ($userDetails === false) {
        header('Location: user_list.php?error=User not found');
        exit();
    }
}

if (isset($_GET['delete_user'])) {
    $userId = $_GET['delete_user'];

    if ($user->deleteUser($userId)) {
        header('Location: user_list.php?message=User deleted successfully');
        exit();
    } else {
        header('Location: user_list.php?error=Failed to delete user');
        exit();
    }
}
?>
