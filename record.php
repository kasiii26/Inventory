<?php
include "product.php";
include "user.php";

if(isset($_SESSION['Password']) && isset($_SESSION['Email'])){

    if(isset($_SESSION['Role'])){
        $Role = $_SESSION['Role'];
    }
    
    if(isset($_SESSION['Email']) && isset($_SESSION['Password'])){
        header:'location: home.php';
    

$productM = new Products($host, $username, $password, $database);

if (isset($_GET['delete_product'])) {
    $productId = $_GET['delete_product'];
    $productM->deleteProduct($productId);
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: darkgray;
}

.dashboard {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

.all-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 5px;
}

.addproduct{
    display: flex;
    justify-content: space-between;
    align-items:center;
    
}



.all-head-right {
    display: flex;
    gap: 5px;
}
.all-head-right input {
    border-radius: 10px;

}

.dash {
    padding: 5px 10px;
    
}
.dash a {
    text-decoration: none; 
    color: white; 

}




.container {
    max-width: 800px;
    padding: 20px;
    background-color:#fff;
    border-radius: 10px;
            
}

h2 {
    color: black;
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
}

.addForms {
    margin-bottom: 20px;
}


.btn-primary {
    background-color: black;
    border-color: #007bff;
    font-size: 20px;
    border-radius:8px;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}



.buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}


    </style>




<body>

<div class="dashboard">
        
        <div class="all-head">
            <div class = LogoD>
                <img src="pics/logo.png" width="115px", height="auto">
            </div>
                <div class = "all-head-right">
                     <div class="dash"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
           <input type="text" placeholder="Search..">
        </div>
                    
                    
                 </div>
            </div> 
   
    </div>
    
    <div class="m-5 adduser">
        <a style="background-color: black; border: black;" href="home.php" class="btn btn-primary" > Back</a>
    </div>
<div class="container mt-5">
    
    <br>
    <br>
    <div class = "confirm-if-added">
        <h2>INVENTORY</h2>
    </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
               
                $result = $productM->getAllProducts();
                if ($result->num_rows > 0) {
                    $count = 1;
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $count++; ?></th>
                            <td><?php echo $row['ProductName']; ?></td>
                            <td><?php echo $row['Category']; ?></td>
                            <td><?php echo "P" . $row['Price']; ?></td>
                            <td><?php echo $row['Quantity']; ?></td>
                            <td>
                              
                                <a href="?delete_product=<?php echo $row['ID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Product?')">Delete</a>
                                
                            </td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6">No products found</td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>


        

    </div>
    <div class="container mt-5">

            <div class="addproduct">
                <a href="addp.php" class="btn btn-primary btn-sm"> Add Product</a>
                <a href="update1.php"  class="btn btn-primary btn-sm">Edit Product</a>
            </div>

    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
    


</body>
</html>

<?php
 }elseif(!isset($_SESSION['Password']) && !isset($_SESSION['Email'])){
    header('location: login.php');
 }
}elseif(!isset($_SESSION['Email']) && !isset($_SESSION['Password'])){
    header('location: home.php?error=logout first');
 }
?>