<?php
include "product.php";
include "user.php";

if(isset($_SESSION['Password']) && isset($_SESSION['Email'])){

    if(isset($_SESSION['Role'])){
        $Role = $_SESSION['Role'];
    }



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_product'])) {
    $productId = $_POST['productId'];
    $newName = $_POST['newName'];
    $newCategory = $_POST['newCategory'];
    $newPrice = $_POST['newPrice'];
    $newQuantity = $_POST['newQuantity'];

    $productM->updateProduct($productId, $newName, $newCategory, $newPrice, $newQuantity);
}




if (isset($_GET['edit_product'])) {
    $productId = $_GET['edit_product'];
    $productDetails = $productM->getProductDetails($productId);
}

if(isset($_POST['update_product'])) {
   
    header("Location: record.php");
   
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
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

.addproduct{
    display: flex;
    justify-content: space-between;
    align-items:center;
    
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

.name {
    font-weight: bold;
    margin-bottom: 5px;
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
    
</head>
<body>

<div class="container mt-5">
    <?php if (!isset($_GET['edit_product']) && !isset($productDetails)) : ?>
    <div class="confirm-if-added">
        <h2>Product Inventory</h2>
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
                    <a href="?edit_product=<?php echo $row['ID']; ?>" class="btn btn-primary btn-sm">Update</a>
                    
                   
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
    <?php endif; ?>
</div>

<div class="container mt-5">
    <?php if (isset($_GET['edit_product']) && isset($productDetails)) : ?>
    <h2>Edit Product</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <input type="hidden" name="productId" value="<?php echo isset($productDetails['ID']) ? $productDetails['ID'] : ''; ?>">
        <div class="mb-3">
            <label for="newName" class="form-label">New Name</label>
            <input type="text" class="form-control" id="newName" name="newName" placeholder="New Name" value="<?php echo isset($productDetails['ProductName']) ? $productDetails['ProductName'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="newCategory" class="form-label">New Category</label>
            <input type="text" class="form-control" id="newCategory" name="newCategory" placeholder="New Category" value="<?php echo isset($productDetails['Category']) ? $productDetails['Category'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="newPrice" class="form-label">New Price</label>
            <input type="text" class="form-control" id="newPrice" name="newPrice" placeholder="New Price" value="<?php echo isset($productDetails['Price']) ? $productDetails['Price'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="newQuantity" class="form-label">New Quantity</label>
            <input type="text" class="form-control" id="newQuantity" name="newQuantity" placeholder="New Quantity" value="<?php echo isset($productDetails['Quantity']) ? $productDetails['Quantity'] : ''; ?>">
        </div>

        
        <button type="submit" name="update_product" class="btn btn-primary" onclick="return confirm('Confirm this changes?')">Update Product</button>
        <button type="button" class="btn btn-primary" onclick="if(confirm('Cancel adding?')) location.href = 'record.php';">Cancel</button>
    </form>
    <?php endif; ?>
</div>

</body>
</html>
<?php
 }elseif(!isset($_SESSION['Password']) && !isset($_SESSION['Email'])){
    header('location: login.php');
 }
?>