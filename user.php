<?php
session_start();

class Users {
    private $conn;

    public function __construct($servername, $dbusername, $dbpassword, $dbname) {
        $this->conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } 
    }

    public function register($FirstName, $LastName, $Photo, $Email, $Password, $Gender, $Age) {
        $Role = "1";

        $stmt = $this->conn->prepare("INSERT INTO users (FirstName, LastName, Photo, Email, Password, Gender, Age, Role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssi", $FirstName, $LastName, $Photo, $Email, $Password, $Gender, $Age, $Role);

        if ($stmt->execute()) {
           header('location: nakasignup.php');
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }


    public function query($sql){
        $query = $this->conn->query($sql);
        return $query;
    }

    public function login(){
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];


        
        $sql = "SELECT *  from users where Email = '$Email' && Password = '$Password'";
        $query = mysqli_query($this->conn, $sql);

        if(mysqli_num_rows($query) == 1){
            $row = mysqli_fetch_assoc($query);

            $_SESSION ['LastName'] = $row['LastName'];
            $_SESSION ['FirstName'] = $row['FirstName'];
            $_SESSION ['Photo'] = $row['Photo'];
            $_SESSION ['Email'] = $row['Email'];
            $_SESSION ['Password'] = $row['Password'];
            $_SESSION ['Gender'] = $row['Gender'];
            $_SESSION ['Age'] = $row['Age'];
            $_SESSION ['Role'] = $row['Role'];

            header('location: dashboardmain.php');
            exit();
        }else{
            header ('location: login.php?error=Incorrect Email or Password');
        }
    }

    public function updateUser($userId, $firstName, $lastName, $email, $gender, $age, $role) {
        $sql = "UPDATE users SET FirstName=?, LastName=?, Email=?, Gender=?, Age=?, `Role`=? WHERE UserID=?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }
        $stmt->bind_param("ssssiii", $firstName, $lastName, $email, $gender, $age, $role, $userId);
        return $stmt->execute();
    }
    

    public function getUserDetails($userId) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE UserID = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public function deleteUser($userId) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE UserID = ?");
        $stmt->bind_param("i", $userId);
        return $stmt->execute();
    }

    public function getAllUsers() {
        return $this->conn->query("SELECT * FROM users");
    }


}





    $servername = "localhost";
    $dbusername = "dfoiwidm_inventory";
    $dbpassword = "inventory123";
    $dbname = "dfoiwidm_inventory";


$user = new Users($host, $username, $password, $database);
?>
