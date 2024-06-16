
<?php
include "user.php";

if(isset($_SESSION['Password']) && isset($_SESSION['Email'])){

  if(isset($_SESSION['Role'])){
      $Role = $_SESSION['Role'];
  }
  if(isset($_SESSION['Email']) && isset($_SESSION['Password'])){
    header:'location: home.php';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" >

</head>
<style>
    
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap');


*{
  margin: 0;
  padding: 0;
  text-decoration: none;
  font-family: "Roboto Condensed", sans-serif;

}

body{
  height: 100vh;
  display: flex;
  justify-content: center;
  background-color: darkgray;
}

h2{
    text-align: center;
    margin: 20px 0 20px 0;
}

.form-container {
  width: 400px;
  margin: 20px auto;
  padding: 20px;
  background-color: #a0deff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.name, .time{
  display: grid;
  grid-template-columns: auto auto;
  gap: 10px;
}

label {
  margin: 8px 0 8px 0;
  width:200px;
}

input {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  box-sizing: border-box;
}

a{
  color: #fff;
}

.button-container{ 
  text-align: center;
  margin: 10px 0 0 0;
  
}

button {
  background-color: #d64933;
  color: #fff;
  padding: 10px;
  border: none;
  border-radius: 4px;
  width: 150px;
}

button:hover {
  background-color: #973324;
}

.back{
    background-color: rgb(1, 19, 209);
}

.back:hover{
    background-color: rgb(0, 13, 151);
    color: #000;

}

textarea#description,
textarea#ingredients,
textarea#steps{
    width: 400px;

}

.image{
  display: flex;
  margin: 0;
}

#current-image{
  display: flex;
  align-items: center;
  justify-content: center;
}

#current-image img{
  height: 100px;
  width: auto;
  background-color: #3d3d3d;
}
</style>
<body>
<div class="form-container">
      <form action="signup.back.php" method="POST" enctype="multipart/form-data">

        <h2>Add A New User</h2>
          <div class="name">
            <div>
              <label for="first name">First Name:</label>
              <input type="text" id="firstname" name="firstname" placeholder="First Name" required>
            </div>
            <div>
              <label for="first name">Last Name:</label>
              <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
            </div>
          </div>
          <input type="file" name="photo" id="photo" accept="image/*" required>

          <label for="email">Email:</label>
          <input type="email" id="email" name="email" placeholder="Email" required>
          <label for="password">Choose a Password: </label>
          <input type="password" id="password" name="password" placeholder="Type your password here..." required>
          <input type="password" name="confirmpassword" placeholder="Confirm Password..." required>

          <div style="color: #911300; padding: 0 0 10px 0; font-size: 13px; text-align: center;">
                    <?php
                        if (isset($_GET['error'])) {
                            $error = $_GET['error'];
                            echo "Password doesn't match! Try again";
                        }
                    ?>
                    </div>
                    <div class="gender">
          <label for="role">Gender: <span style="color: gray; opacity: .9";>(Male | Female)</span></label>
            <!-- <input class="role" type="checkbox" value="adminUser" style="width:20px; margin: 0;">Male</input>
            <input class="role" type="checkbox" value="regularUser" style="width:20px; margin: 0;">Female</input> -->
            <input type="text" name="gender">
          </div>
          <br>
          <label for="email">Age:</label>
          <input type="age" id="age" name="age" placeholder="Age" required>
          <!-- <div class="role">
          <label for="role">Role:</label>
            <input class="role" value="1" type="radio" name="adminUser" style="width:20px; margin: 0;">Employee</input>
            <input class="role" value="0" type="radio" name="regularUser" style="width:20px; margin: 0;">Manager</input>
          </div> -->
          <br>
            <div class="button-container">
            <button type="submit">Submit</button>
            <button type= "button" class="back"><a href="nakasignup.php">Back</a></button>
          </div>
      </form>
  </div>
</body>
</html>
<?php
 }elseif(!isset($_SESSION['Password']) && !isset($_SESSION['Email'])){
    header('location: home.php');
 }
}elseif(!isset($_SESSION['Email']) && !isset($_SESSION['Password'])){
  header('location: home.php?error=Logout first');
}
?>