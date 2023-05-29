<?php 
require "define.php";
session_start();

if($_SESSION['signup'] == 'nick') echo '<script>alert("Mi dispiace ma non puoi usare un nickname già registrato.")</script>';

session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <title>McOFY</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="HMW1.HomePage.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>

<div class="cardform">
 <div>
    <h1>Benvenuto nella Home Page</h1>
    <p><br> Su questo sito avrai la possibilità di cercare le canzoni dei tuoi artisti preferiti</p>
    <p>Potrai salvare le tue preferenze e ascoltarle tutte le volte che vuoi</p>
 </div>

 <div id="but">
    <button type="button"><a href="RegisterPage.php">Register</a></button>
    <button type="button"><a href="LoginPage.php">Login</a></button>

 </div>
</div>
    
    
</body>
</html>