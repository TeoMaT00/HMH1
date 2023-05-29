<?php
require "define.php";
session_start();

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {

    if (empty($_SESSION)) {
        session_destroy();
        header('Location: HMW1.HomePage.php');
    }
}

?>


<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css" />
    <link rel="stylesheet" href="navbarSettings.css" />
    <title>Profile</title>
</head>


<div class="topnav" id="myTopnav">
    <a href="#" class="active">
        <img src="logo_sito1.png" alt="logo" id="logo" height="20px">
    </a>
    <a href="dashboard.php">Dashboard</a>
    <a href="PrefPage.php">Preferences</a>
    <a href="SearchPage.php">Search</a>
    <div class="dropdown">
        <button class="dropbtn">Profile
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="#">Settings</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<body>
    <div class="cardform1">
        <form>
            <label for="nome">Nome</label>
            <label class="info" id="nome" type="text" name="nome"><?php echo $_SESSION['nome'] ?></label><br>
            <label for="cognome">Cognome</label>
            <label class="info" id="cognome" type="text" name="cognome"><?php echo $_SESSION['cognome'] ?></label><br>
            <label for="mail">Email</label>
            <label class="info" id="mail" type="email" name="email"><?php echo $_SESSION['email'] ?></label><br>

            <a href="SettingsPage.php">
                <button type="button" id="modify">Modify</button>
            </a>
        </form>
    </div>

</body>

</html>