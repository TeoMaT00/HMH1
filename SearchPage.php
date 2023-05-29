<?php
require "define.php";
session_start();
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SearchPage.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="api.js" defer="true"></script>
    <script src="savePreferences.js" defer="true"></script>

    <title>Search</title>


    <div class="topnav" id="myTopnav">
        <a href="#" class="active">
            <img src="logo_sito1.png" alt="logo" id="logo" height="20px">
        </a>
        <a href="dashboard.php">Dashboard</a>
        <a href="PrefPage.php">Preferences</a>
        <div class="dropdown">
            <button class="dropbtn">Profile
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="profile.php">Settings</a>
                <a href="HMW1.HomePage.php">Logout</a>

            </div>
        </div>

        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
</head>

<body>

<div id="cardDash">
    <h1>Benvenuto nella pagina di Search, <b><?php echo $_SESSION['nick']; ?></b>.</h1>
    <p>Da questa pagina potrai selezionare uno degli artisti presenti per cercare la sua top-10</p>
  </div>

    <div class="cardrow">


        <div class="cardform">


            <h1>Bruno Mars</h1><br>
            <img src="https://m.media-amazon.com/images/I/716mnZd24EL._UF1000,1000_QL80_.jpg" width="200px">

            <div style="display:none" id="list_0du5cEVh5yTK9QJze8zA0C">

            </div>

            <div>

                <button onclick="getTT('0du5cEVh5yTK9QJze8zA0C')">Seleziona</button>
            </div>

        </div>

        <div class="cardform">

            <h1>SAM SMITH</h1>
            <img src="https://www.universalmusic.it/dbcommon/file/news/img1/12801_medium.jpg" width="200px">

            <div style="display:none" id="list_2wY79sveU1sp5g7SokKOiI">

            </div>

            <div>

                <button onclick="getTT('2wY79sveU1sp5g7SokKOiI')">Seleziona</button>
            </div>


        </div>

        <div class="cardform">


            <h1>COLDPLAY</h1>
            <img src="https://radiogold.it/wp-content/uploads/2021/07/MOTS-rid-album-artwork.jpeg" width="200px">

            <div style="display:none" id="list_4gzpq5DPGxSnKTe4SA8HAU">

            </div>

            <div>

                <button onclick="getTT('4gzpq5DPGxSnKTe4SA8HAU')">Seleziona</button>
            </div>

        </div>

    </div>

    <div class="cardrow">


        <div class="cardform">


            <h1>IMAGINE DRAGONS</h1><br>
            <img src="https://www.ibs.it/images/0602577189760_0_536_0_75.jpg" width="200px">

            <div style="display:none" id="list_53XhwfbYqKCa1cC15pYq2q">

            </div>

            <div>

                <button onclick="getTT('53XhwfbYqKCa1cC15pYq2q')">Seleziona</button>
            </div>

        </div>

        <div class="cardform">

            <h1>ED SHEERAN</h1>
            <img src="https://www.ansa.it/webimages/img_457x/2023/3/1/a8a8c98ce1bca77210a996f34e466f7a.jpg" width="200px">

            <div style="display:none" id="list_6eUKZXaKkcviH0Ku9w2n3V">

            </div>

            <div>

                <button onclick="getTT('6eUKZXaKkcviH0Ku9w2n3V')">Seleziona</button>
            </div>


        </div>

        <div class="cardform">


            <h1>KATY PERRY</h1>
            <img src="https://static01.nyt.com/images/2020/08/29/arts/27album-katy1/27album-katy1-mediumSquareAt3X.jpg" width="200px">

            <div style="display:none" id="list_6jJ0s89eD6GaHleKKya26X">

            </div>

            <div>

                <button onclick="getTT('6jJ0s89eD6GaHleKKya26X')">Seleziona</button>
            </div>

        </div>

    </div>


    <div class="cardrow">


        <div class="cardform">


            <h1>ONE REPUBLIC</h1><br>
            <img src="https://upload.wikimedia.org/wikipedia/en/9/96/OneRepublic_-_Native.png" width="200px">


            <div style="display:none" id="list_5Pwc4xIPtQLFEnJriah9YJ">

            </div>

            <div>

                <button onclick="getTT('5Pwc4xIPtQLFEnJriah9YJ')">Seleziona</button>
            </div>

        </div>

        <div class="cardform">

            <h1>MAROON 5</h1>
            <img src="https://angelaboozer.files.wordpress.com/2014/10/final1.png" width="200px">

            <div style="display:none" id="list_04gDigrS5kc9YWfZHwBETP">

            </div>
            
            <div>

                <button onclick="getTT('04gDigrS5kc9YWfZHwBETP')">Seleziona</button>
            </div>


        </div>

        <div class="cardform">


            <h1>RIHANNA</h1>
            <img src="https://upload.wikimedia.org/wikipedia/en/d/d1/Rihanna_-_Loud.png" width="200px">

            <div style="display:none" id="list_5pKCCKE2ajJHZ9KAiaK11H">

            </div>

            <div>

                <button onclick="getTT('5pKCCKE2ajJHZ9KAiaK11H')">Seleziona</button>
            </div>

        </div>

    </div>
</body>

</html>