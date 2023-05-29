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

    if (!empty($_POST)) {
        if ($_POST['submit'] == 'save') {
            $id = $_POST['id'];
            ($_POST['nome'] != '') ? $nome = $_POST['nome'] : $nome = $_SESSION['nome'];
            ($_POST['cognome']) ? $cognome = $_POST['cognome'] : $cognome = $_SESSION['cognome'];
            ($_POST['email']) ? $email = $_POST['email'] : $email = $_SESSION['email'];
            ($_POST['cognome']) ? $nickname = $_POST['nick'] : $nickname = $_SESSION['nickname'];
            $password = $_POST['password'];
            ($_POST['cognome']) ? $oldPass = $_POST['oldPass'] : $oldPass = $_SESSION['password'];

            if ($password == '') {
                $query = "UPDATE users SET nome = '$nome', cognome = '$cognome', mail = '$email' WHERE id = '$id'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    $_SESSION['id'] = $id;
                    $_SESSION['nome'] = $nome;
                    $_SESSION['cognome'] = $cognome;
                    $_SESSION['nick'] = $nickname;
                    $_SESSION['email'] = $email;
                    header('Location: profile.php');
                }
            } elseif ($password != $oldPass) {
                $query = "UPDATE users SET nome = '$nome', cognome = '$cognome', mail = '$email', password = '$password' WHERE id = '$id'";
                $res = mysqli_query($conn, $query);
                if ($res) {
                    $_SESSION['id'] = $id;
                    $_SESSION['nome'] = $nome;
                    $_SESSION['cognome'] = $cognome;
                    $_SESSION['nick'] = $nickname;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    header('Location: profile.php');
                }
            } else {
                echo '<script>alert("Mi dispiace ma non puoi usare una password già utilizzata.")</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SettingsPage.css">
    <link rel="stylesheet" href="navbarSettings.css" />
    <title>Settings</title>

    <div class="topnav" id="myTopnav">
        <a href="#" class="active">
            <img src="logo_sito1.png" alt="logo" id="logo" height="20px">
        </a>
        <a href="dashboard.php">Dashboard</a>
        
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
</head>

<body>
    <h1>Benvenuto nella pagina "Settings"</h1>
    <p>Qui potrai modificare le informazioni riguardanti il tuo profilo</p><br>
    <div class="cardform1">
        <form method="POST" action="#">
            <label for="nome">Modifica Nome</label>
            <input id="nome" type="text" name="nome" placeholder='<?php echo $_SESSION['nome'] ?>'><br>
            <label for="cognome">Modifica Cognome</label>
            <input id="cognome" type="text" name="cognome" placeholder='<?php echo $_SESSION['cognome'] ?>'><br>
            <label for="mail">Modifica Email</label>
            <input id="mail" type="email" name="email" placeholder="<?php echo $_SESSION['email'] ?>"><br>
            <label for="password">Modifica Password</label>
            <input type="password" name="oldPass" placeholder="Inserisci la password attuale">
            <input id="password" placeholder="Inserisci nuova password" type="password" name="password"><br>

            <input type="text" style="display:none" name="id" value="<?php echo $_SESSION['id'] ?>">

            <button type="submit" name="submit" value="save" id="registra">Save</button>
        </form>
    </div>
</body>

</html>