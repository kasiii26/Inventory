<?php

include 'user.php';


if(isset($_SESSION['Password']) && isset($_SESSION['Email'])){

    if(isset($_SESSION['Role'])){
        $Role = $_SESSION['Role'];
    }
    if(isset($_SESSION['UserId'])){
        $UserId = $_SESSION['UserId'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Dashboard</title>
</head>
<style>
    *{
    margin: 2px;
    color: black;
}
nav{
    background-color: #03AED2;
    height: 60px;
    display: flex;
    align-items: center;
    border-radius: 10px;
}
.con1{
    display: flex;
    gap: 15px;
    font-size: 18px;
}
.log-in{
    display: flex;
    margin-left: 600px;
}
.svg{
    display: flex;
    margin-left: 50px;
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
.home{
    margin: 40px;
}
.home3{
  margin-top: 100px;
}
.home3 img{
    width: 900px;
    height: 300px;
}
</style>
<body>
    <nav>
        <div class="mader">
        <div class="con1">
            logo here

           <a href="login.php" class="log-in">Contact</a>
           <a href="signup.php" class="log">Services</a>
           <a href="login.php" class="login">About Us</a>
           <div class="svg"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
           <input type="text" placeholder="Search..">
        </div>
        </div>
    </nav>
    <div class="container">
        <aside class="aside-1">
            <div>
                <div class ="user-info">
                    <h1 class="user">USERNAME PROFILE</h1>
                    <a href="#" class="arrow"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-select" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M3 3m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                        <path d="M9 11l3 3l3 -3" />
                      </svg></a>
          
                  </div>
             <div class="buttons-all">
                <div class="svg2">
                    <a href="#" class="types"> <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-home-move"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2" /><path d="M19 12h2l-9 -9l-9 9h2v7a2 2 0 0 0 2 2h5.5" /><path d="M16 19h6" /><path d="M19 16l3 3l-3 3" /></svg>Home</a>
                    <a href="#" class="types"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-indent-decrease"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 6l-7 0" /><path d="M20 12l-9 0" /><path d="M20 18l-7 0" /><path d="M8 8l-4 4l4 4" /></svg>Inventory</a>
                    <a href="#" class="types <?php echo($Role == 0 ? 'd-block' : 'd-none')?> "><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" /><path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" /></svg>Employees</a>
                    <a href="#" class="types"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-credit-card-pay"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 19h-6a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5" /><path d="M3 10h18" /><path d="M16 19h6" /><path d="M19 16l3 3l-3 3" /><path d="M7.005 15h.005" /><path d="M11 15h2" /></svg>Transaction</a>
             </div>
            </div>
            </div>
</aside>
<main>
          <div class="home">
            <div class="home2">
                <h2>Home</h2>
            </div>
            <div class="home3">
            <img src="pics/Product Sales.png" alt="">
            </div>
          </div>
</main>
</body>
</html>
<?php
}
?>
