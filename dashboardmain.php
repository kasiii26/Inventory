<?php

include 'user.php';

if(isset($_SESSION['Password']) && isset($_SESSION['Email'])){

    if(isset($_SESSION['Role'])){
        $Role = $_SESSION['Role'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="Home.css">
    <title>Dashboard</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap');

*{
    margin: 2px;
    color: black;
    font-family: "Roboto Condensed", sans-serif;
}
nav{
    display: flex;
    justify-content: space-between;
    align-items: center;
    align-items: center;
    border-radius: 10px;
    background-color: #03AED2;
    height: 80px;
}
.con1 {
    display: flex;
    font-size: 18px;
 
}
.con1 a{
    text-decoration: none;
    margin: 10px;
}
.con1 a:hover{
    background-color: #058aa5;
    border-radius: 8px;
}

.svg{
    display: flex;
    margin-left: 50px;
}
.types:hover{
    background-color: gray;
    border-radius: 8px;
}
.svg input{
    border: transparent;
    border-radius: 10px;
    width: 200px;
}
aside{
    display: grid;
    grid-template-columns: 200px, 1vh;
    color: black;
}
.container {
    display: grid;
    grid-template-columns: 300px 1fr;
    height: 580px;
}
.aside-1 {
    background-color: #d7d2f7;
    background-size: cover;
    display: flex;
    justify-content: space-between;
    flex-direction: column;
    padding: 5%;
    color: black;
    border-radius: 10px;
    height: 550px;
}
.user-info{
    display: flex;
    align-items: center;
    text-decoration: none;
    font-size: 10px;
    font-weight: lighter;
    justify-content: space-between;
}
.types {
    display: flex;
    margin: 20px;
    margin-top: 40px;
    font-size: 18px;
    color: black;
    letter-spacing: 1px;
    align-items: center;
    transition: 0.7s;
    gap: 10px;
  }
  .svg2{
    margin-top: 40px;
    margin-left: 29px;
  }
  .svg2 a{
    text-decoration: none;
  }
  .con1 svg{
    margin-top: 4px;
  }
.home{
    margin: 40px;
}
.home3{
  margin-bottom: 120px;
}
.home3 img{
    width: 900px;
    height: 500px;
    
}
.logout{
    font-size: 24px ;
    margin-left: 80px;
    padding: 10px;
    width: 80px;
    height: 30px;
    margin-bottom: 20px;
}
.logout a{
    text-decoration: none;
}
</style>
<body>
    <nav>
        <div class="logo">
            <img src="pics/logo.png" width="115px" height="auto">
        </div>
        <div class="con1 col-6">
            <div class=" svg"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                <input style="width: 300px; height:30px; margin-top:5px;" type="text" placeholder="Search..">
                    <h4 class="user"><svg  xmlns="http://www.w3.org/2000/svg"  width="30"  height="30"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg> <?php echo $_SESSION['FirstName'] . " " . $_SESSION['LastName'] ?></h4>
        </div>
        </div>
    </nav>
    <div class="container m-0 p-0">
        <aside class="aside-1">
            <div>
               
             <div class="buttons-all">
                <div class="svg2">
                <a href="dashboardmain.php" class="types"> <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-layout-board"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" /><path d="M4 9h8" /><path d="M12 15h8" /><path d="M12 4v16" /></svg>Dashboard</a>
            <a href="home.php" class="types"> <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-home-move"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2" /><path d="M19 12h2l-9 -9l-9 9h2v7a2 2 0 0 0 2 2h5.5" /><path d="M16 19h6" /><path d="M19 16l3 3l-3 3" /></svg>Home</a>
             <a href="record.php" class="types"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-indent-decrease"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 6l-7 0" /><path d="M20 12l-9 0" /><path d="M20 18l-7 0" /><path d="M8 8l-4 4l4 4" /></svg>Inventory</a>
             <a class="<?php echo($Role == 0) ? 'd-block' : 'd-none' ?> types" href="nakasignup.php" ><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" /></svg>
                Employees
            </a>
            <a href="contact.php" style="color: black;" class="types"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-phone"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" /></svg>Contact</a>
            <a href="about-us.php" style="color: black;" class="types"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-question-mark"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 8a3.5 3 0 0 1 3.5 -3h1a3.5 3 0 0 1 3.5 3a3 3 0 0 1 -2 3a3 4 0 0 0 -2 4" /><path d="M12 19l0 .01" /></svg>About Us</a>
             </div>
            </div>
            </div>
            <div class="logout">
            <a href="logout.php">Logout</a>
            </div>
        </aside>
        <main>
                <div class="home">
                    <div class="home3">
                    </div>
                </div>
        </main>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


<?php
 }elseif(!isset($_SESSION['Password']) && !isset($_SESSION['Email'])){
    header('location: login.php');
 }
?>


