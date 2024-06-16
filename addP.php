<?php
include "user.php";
include "product.php";

if(isset($_SESSION['Password']) && isset($_SESSION['Email'])){

    if(isset($_SESSION['Role'])){
        $Role = $_SESSION['Role'];
    }



$productM = new Products($host, $username, $password, $database);


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $productName = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $productM->addNew($productName, $category, $price, $quantity);
}

if(isset($_POST['add_product'])) {
   
    header("Location: record.php");
   
}





?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


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



.all-head-right {
    display: flex;
    gap: 5px;
}

.dash {
    padding: 5px 5px;
    
}
.dash a {
    text-decoration: none; 
    color: white; 

}




.container {
    max-width: 600px;
    margin: auto;
    padding: 20px;
    background-color:#fff;
    border-radius: 8px;
            
}

h2 {
    color: black;
    text-align: center;
    margin-bottom: 30px;
    font-weight:bold;
}

.addForms {
    margin-bottom: 20px;
}

.name {
    font-weight: bold;
    margin-bottom: 5px;
}

.btn-primary {
    background-color: black;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.form-control {
    border-radius: 4px;
}

.buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}


    </style>

</head>
<body>

<div class="dashboard">
        
        <div class="all-head">
            <div class = LogoD>Logo</div>
                <div class = "all-head-right">
                     <div class="dash"><a href = "">Contact</a></div>
                     <div class="dash"><a href = "">Services</a></div>
                     <div class="dash"><a href = "">About Us</a></div>
                     <div class="dash"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
           <input type="text" placeholder="Search..">
        </div>
                    
                    
                 </div>
            </div> 
   
    </div>



    <div class="container mt-5">
        <h2>ADD NEW PRODUCTS</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="addForms">
                <label for="product_name" class="name" >PRODUCT NAME:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="addForms">
                <label for="category" class="name" >CATEGORY:</label>
                <input type="text" class="form-control" id="category" name="category" required>
            </div>
            <div class="addForms">
                <label for="price" class="name" >PRICE:</label>
                <input type="text" class="form-control" id="price" name="price" required>
            </div>
            <div class="addForms">
                <label for="quantity" class="name" >QUANTITY:</label>
                <input type="text" class="form-control" id="quantity" name="quantity" required>
            </div>

    <div class="buttons">
            <button type="submit"  class="btn btn-primary" name="add_product" onclick="return confirm('Confirm this changes?')">Add Product</button>
            <button type="button" class="btn btn-primary" onclick="if(confirm('Cancel adding?')) location.href = 'record.php';">Cancel</button>
    </div>
        </form>
    </div>

    

    
</body>
</html>

<?php
 }elseif(!isset($_SESSION['Password']) && !isset($_SESSION['Email'])){
    header('location: home.php');
 }
?>
