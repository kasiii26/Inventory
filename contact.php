<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: darkgray;
    
    
}

main {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
        margin: 0;
        justify-content: space-between;
        padding: 60px;
    }

.dashboard {
    background-color: #333;
    color: #fff;
    padding: 5px 0;
    text-align: center;
}

.all-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 10px;
}

.addproduct{
    display: flex;
    justify-content: space-between;
    align-items:center;
    
}



.all-head-right {
    display: flex;
    gap: 50px;
    
}

.dash {
    padding: 5px 10px;
    
}
.dash a {
    text-decoration: none; 
    color: white; 

}











.btn-primary {
    background-color: black;
    border-color: #007bff;
    font-size: 20px;
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

.LogoD a{
    text-decoration: none;
    color: white;
}

.container {
    max-width: 1000px;
    padding: 10px;
    background-color:#fff;
    border-radius: 10px;
            
}

.about-us-head{
    font-size: 35px;
    font-weight: bold;
    display:flex;
    justify-content: center;
}

.containers {
        width: 700px; 
        height: 550px; 
        border: 2px solid;
        border-radius: 10px;
        padding: 10px;
        justify-content: center;
        background-color:white;
        align-items: center;
        
    }

    p {
        margin: 0;
        padding: 5px 0;
    }

    .about-us-head{
        font-size: 35px;
        font-weight: bold;
    }

    .admin-gmail{
        font-weight: bold;
       display:flex;
       
       justify-content: center;
    }

    .admin-info{
        display:flex;
       
       justify-content: center;
       margin-bottom:2px;

    }

    .locationD{
        margin: 10px;
    }

    .about-us-head{
        margin: 20px;
    }


    </style>
    <div class="dashboard">
        
        <div class="all-head">
            <div class = LogoD><a href='home.php'>Back</a></div>
                <div class = "all-head-right">
                <div class="dash"> <img src="pics/logo.png" width="100px", height="auto"></div>
                     
        </div>
                    
                    
     </div>
    
   
    </div>

</head>
<body>


    

</body>

   
<main>
<div class="containers ">
     <p class ="about-us-head">CONTACT DETAILS</p>
               <div class="admin-gmail">
                  <p>LeoniloMolar@gmail.com</p>
                  </div>
                  <div class="admin-info">
                
                   <p>(908) 685-1800</p>
                </div>

         <div class="locationD">
             <div class="admin-gmail">
                  <p>123Main Street</p>
                  
                  </div>
                  <div class="admin-gmail">
                  
                  <p>4343 Southern Leyte</p>
                  </div>
                
                  <div class="admin-info">
                
                   <p>Hilongos, Leyte</p>
                </div>
                <div class="admin-info">
                
                   <p>Philippines</p>
                </div>
    
</div>

</div>

<div class="containers ">
     <p class ="about-us-head">ONLINE INQUIRY</p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <input type="hidden" name="productId">
        <div class="mb-3">
           
            <input type="text" class="form-control" id="newName" name="newName" placeholder="Name">
        </div>

        <div class="mb-3">
            
            <input type="text" class="form-control" id="newCategory" name="newCategory" placeholder="Email">
        </div>

        <div class="mb-3">
           
            <input type="text" class="form-control" id="newPrice" name="newPrice" placeholder="Phone">
        </div>

        <div class="mb-3">
           
            <input type="text" class="form-control" id="newQuantity" name="newQuantity" placeholder="Address">
        </div>

        
        <button type="submit" name="update_product" class="btn btn-primary" >Submit</button>
        <button type="button" class="btn btn-primary">Cancel</button>
    </form>
</div>

</main>



</html>