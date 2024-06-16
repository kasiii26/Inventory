
<?php
   include "user.php";
   if(!isset($_SESSION['Password']) && !isset($_SESSION['Email'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
    font-size: 26px;
    margin-right: 60px;
 
}
.con1 input {
    width: 90px;
    height: 30px;
    margin-top: 8px;
}
.con1 svg{
    margin-top: 10px;
}
.con1 a{
    text-decoration: none;
    margin: 10px;
   
}
.con1 a:hover{
    background-color: #058aa5;
    border-radius: 5px;
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
    grid-template-columns: 750px 1fr;
    height: 580px;
}
.main-1 p{
margin-top: 200px;
font-size: 20px;
}
</style>
<body>
    <nav>
        <div class="logo"><img src="pics/logo.png" width="115px", height="auto"></div>
        <div class="con1">
            <a href="mission (2).html">Mission</a>
            <a href="vision.html">Vision</a>
            <div class="svg"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-search"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M21 21l-6 -6" /></svg>
                <input type="text" placeholder="Search..">
                <a href="login.php">Login</a>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">
            <div class="main-1">
               <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Iure, eum, velit, et vel nobis dolores quam tenetur repellat vero aut atque blanditiis nisi.
                 Voluptatem molestias voluptates, rerum et est accusamus?
                 
                 Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Iure, eum, velit, et vel nobis dolores quam tenetur repellat vero aut atque blanditiis nisi.
                 Voluptatem molestias voluptates, rerum et est accusamus?
                 
                 Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                Iure, eum, velit, et vel nobis dolores quam tenetur repellat vero aut atque blanditiis nisi.
                 Voluptatem molestias voluptates, rerum et est accusamus?
                 
                 <p>
                
            </div>
            <div class="main2">
                <img src="pics/Inventory-removebg-preview.png" alt="">
            </div>
        </div>
    </main>
</body>
</html>
   
<?php
}elseif(isset($_SESSION['Password']) && isset($_SESSION['Email'])){
    header('location: home.php');
    exit;
}
