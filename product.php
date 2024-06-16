<?php
class Products {
    
    private $conn;

    public function __construct($servername, $proname, $password, $dbname) {
        $this->conn = new mysqli($servername, $proname, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } 
    }

    public function getProductDetails($productId) {
        
        $query = "SELECT * FROM products WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null; 
        }
    }



    public function addNew($ProductName, $Category, $Price, $Quantity) {
        $stmt = $this->conn->prepare("INSERT INTO products (ProductName, Category, Price, Quantity) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssdi", $ProductName, $Category, $Price, $Quantity);

        if ($stmt->execute()) {
            echo " ";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function updateProduct($productId, $productName, $category, $price, $quantity) {
        $stmt = $this->conn->prepare("UPDATE products SET ProductName = ?, Category = ?, Price = ?, Quantity = ? WHERE ID = ?");
        $stmt->bind_param("ssdii", $productName, $category, $price, $quantity, $productId);

        if ($stmt->execute()) {
            echo " ";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }


    

    public function deleteProduct($productId) {
        $stmt = $this->conn->prepare("DELETE FROM products WHERE id = ?");
        $stmt->bind_param("i", $productId);
    
        if ($stmt->execute()) {
            echo " ";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    }

    

    

   

}


    $servername = "localhost";
    $dbusername = "dfoiwidm_inventory";
    $dbpassword = "inventory123";
    $dbname = "dfoiwidm_inventory";


$productM = new Products($host, $username, $password, $database);



?>