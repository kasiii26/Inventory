<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <main>
        <div class="form-container">
            <div class="signup-container">
                <form action="addProduct.php" method="POST">
                   
                    <label for="ProductName">Product Name:</label>
                    <input type="text" id="ProductName" name="ProductName" required>

                    <label for="Category">Category:</label>
                    <input type="text" id="Category" name="Category" required>

                    <label for="Price">Price:</label>
                    <input type="text" id="Price" name="Price" required>

                    <label for="Quantity">Quantity:</label>
                    <input type="text" id="Quantity" name="Quantity" required>
                    <button type="submit">Add Product</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>