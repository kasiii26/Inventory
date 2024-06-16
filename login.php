
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Dashboard</title>
</head>
<body>

    <div class="main">
        <aside class="main2">
        
            <div class="main3">
            <img src="pics/pic1" alt="">
        </aside>
        <div class="main4">
            <div class="main5">
                <h3>Login</h3>
                <?php 

                    if(isset($_GET['error'])){
                        $error = $_GET['error'];

                        echo "<p style='color:red; font-size:12px; margin: 0 0 0 110px; padding: 0;'>$error </p>";
                    }
                ?>
                <form action="login.back.php" method="post">
                    <div class="main6">
                        <input type="email" placeholder="Email" name="Email"><br>
                        <input type="password" placeholder="" name="Password"><br>
                    </div>
                    <div class="main7">
                        <button type="submit" class="registerbtn">Login</button>
                        <h4>Forgot Email and Password? <a href="#">Click here</a></h4>
                    </div>
                </form>
            </div>
        </div>
    </div>
        



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
