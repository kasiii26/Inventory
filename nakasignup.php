<?php
include "user.php";


    $servername = "localhost";
    $dbusername = "dfoiwidm_inventory";
    $dbpassword = "inventory123";
    $dbname = "dfoiwidm_inventory";

$user = new Users($host, $username, $password, $database);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_user'])) {
    $userId = $_POST['userId'];
    $newFirstName = $_POST['newFirstName'];
    $newLastName = $_POST['newLastName'];
    $newEmail = $_POST['newEmail'];
    $newGender = $_POST['newGender'];
    $newAge  = $_POST['newAge'];
    $newRole = $_POST['newRole'];

    if ($user->updateUser($userId, $newFirstName, $newLastName, $newEmail, $newGender, $newAge, $newRole)) {
        header('Location: nakasignup.php?message=User updated successfully');
        exit();
    } else {
        header('Location: nakasignup.php?error=Failed to update user');
        exit();
    }
}


if (isset($_GET['edit_user'])) {
    $userId = $_GET['edit_user'];
    $userDetails = $user->getUserDetails($userId);
    if ($userDetails === false) {
        header('Location: nakasignup.php?error=User not found');
        exit();
    }
}

if (isset($_GET['delete_user'])) {
    $userId = $_GET['delete_user'];
    $user->deleteUser($userId);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body{
        background-color: darkgray;
    }
</style>
<body>
    <div class="logo">
        <img src="pics/logo.png" width="115px",height="auto">
    </div>
    <div class="m-5 adduser">
        <a href="add-user.php" class="btn btn-primary"> Add New User</a>
        <a style="background-color: black; border:black;" href="home.php" class="btn btn-primary" > Back</a>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Action</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $result = $user->getAllUsers(); 
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td>
                    <a class="btn btn-primary" href="nakasignup.php?edit_user=<?php echo $row['UserID']; ?>">Edit</a>
                    <a class="btn btn-danger" href="delete-user.php?id=<?php echo $row['UserID']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
                <td><?php echo $row['LastName']; ?></td>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Gender']; ?></td>
                <td><?php echo $row['Age']; ?></td>
                <td><?php echo $row['Role']; ?></td>
            </tr>
            <?php
                    }
                } else {
            ?>
            <tr>
                <td colspan="8">No users found</td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

    <?php if (isset($userDetails)): ?>
    <div class="container mt-5">
        <h2>Edit User</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="userId" value="<?php echo $userDetails['UserID']; ?>">
            <div class="mb-3">
                <label for="newFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="newFirstName" name="newFirstName" value="<?php echo $userDetails['FirstName']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="newLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="newLastName" name="newLastName" value="<?php echo $userDetails['LastName']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="newEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="newEmail" name="newEmail" value="<?php echo $userDetails['Email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="newGender" class="form-label">Gender</label>
                <input type="gender" class="form-control" id="newGender" name="newGender" value="<?php echo $userDetails['Gender']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="newAge" class="form-label">Age</label>
                <input type="age" class="form-control" id="newAge" name="newAge" value="<?php echo $userDetails['Age']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="newRole" class="form-label">Role</label>
                <select class="form-select" id="newRole" name="newRole" required>
                    <option value="0" <?php if ($userDetails['Role'] == 0) echo 'selected'; ?>>Admin</option>
                    <option value="1" <?php if ($userDetails['Role'] == 1) echo 'selected'; ?>>User</option>
                </select>
            </div>
            <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
        </form>
    </div>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
