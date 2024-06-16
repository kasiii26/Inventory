<?php
    $servername = "localhost";
    $dbusername = "dfoiwidm_inventory";
    $dbpassword = "inventory123";
    $dbname = "dfoiwidm_inventory";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
 
    
   
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
