<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Management</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <?php if (!isset($_GET['edit_user']) && !isset($userDetails)) : ?>
    <div class="confirm-if-added">
        <h2>User List</h2>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
               
                <th scope="col">Email</th>
                <th scope="col">Photo</th>
                <th scope="col">Gender</th>
                <th scope="col">Age</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $user->getAllUsers();
            if ($result->num_rows > 0) {
                $count = 1;
                while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <th scope="row"><?php echo $count++; ?></th>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['LastName']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Photo']; ?></td>
                <td><?php echo $row['Gender']; ?></td>
                <td><?php echo $row['Age']; ?></td>
                <td><?php echo $row['Role'] == 0 ? 'Admin' : 'User'; ?></td>
                <td>
                    <a href="?edit_user=<?php echo $row['UserID']; ?>" class="btn btn-primary btn-sm">Update</a>
                    <a href="?delete_user=<?php echo $row['UserID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
            <?php
                }
            } else {
            ?>
            <tr>
                <td colspan="6">No users found</td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>

<div class="container mt-5">
    <?php if (isset($_GET['edit_user']) && isset($userDetails)) : ?>
    <h2>Edit User</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="userId" value="<?php echo isset($userDetails['UserID']) ? $userDetails['UserID'] : ''; ?>">
        <div class="mb-3">
            <label for="newFirstName" class="form-label">New First Name</label>
            <input type="text" class="form-control" id="newFirstName" name="newFirstName" placeholder="New First Name" value="<?php echo isset($userDetails['FirstName']) ? $userDetails['FirstName'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="newLastName" class="form-label">New Last Name</label>
            <input type="text" class="form-control" id="newLastName" name="newLastName" placeholder="New Last Name" value="<?php echo isset($userDetails['LastName']) ? $userDetails['LastName'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="newEmail" class="form-label">New Email</label>
            <input type="email" class="form-control" id="newEmail" name="newEmail" placeholder="New Email" value="<?php echo isset($userDetails['Email']) ? $userDetails['Email'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="newPhoto" class="form-label">New Photo</label>
            <input type="photo" class="form-control" id="newPhoto" name="newPhoto" placeholder="New Photo" value="<?php echo isset($userDetails['Photo']) ? $userDetails['Photo'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="newGender" class="form-label">New Gender</label>
            <input type="gender" class="form-control" id="newGender" name="newGender" placeholder="New Gender" value="<?php echo isset($userDetails['Gender']) ? $userDetails['Gender'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="newAge" class="form-label">New Age</label>
            <input type="age" class="form-control" id="newAge" name="newAge" placeholder="New Age" value="<?php echo isset($userDetails['Age']) ? $userDetails['Age'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="newRole" class="form-label">New Role</label>
            <select id="newRole" name="newRole" class="form-select">
                <option value="0" <?php if (isset($userDetails['Role']) && $userDetails['Role'] == 0) echo 'selected'; ?>>Admin</option>
                <option value="1" <?php if (isset($userDetails['Role']) && $userDetails['Role'] == 1) echo 'selected'; ?>>User</option>
            </select>
        </div>

        <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
    </form>
    <?php endif; ?>
</div>

</body>
</html>
