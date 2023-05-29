<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="LoginPage.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <div class="cardform">
        <form method="POST" action="dashboard.php">
            <label for="FirstName">Nome</label>
            <input id="FirstName" type="text" name="nome" required><br>
            <label for="cognome">Cognome</label>
            <input id="cognome" type="text" name="cognome" required><br>
            <label for="nickName">Nickname</label>
            <input id="nickName" type="text" name="nick" required><br>
            <label for="mail">Email</label>
            <input id="mail" type="email" name="email" required><br>
            <label for="pass">Password</label>
            <input id="pass" type="password" name="password" oninput="functionCheck()" required><br>
            <p id="demo" style="color: red;"></p>
            <div>
                <button type="submit" name="submit" value="registra" id="registra">Register</button>
                <a href="HMW1.HomePage.php"><button type="button">Back</button></a>
            </div>
        </form>
    </div>
</body>

<script>
    function functionCheck() {
        let text = document.getElementById("pass").value;
        var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if (!re.test(text)) {
            document.getElementById("demo").innerHTML = "Mi dispiace ma la password non è valida.<br> Inserisci una password di almeno 8 caratteri, 1 maiuscolo, 1 minuscolo, 1 carattere speciale e un numero.";
            document.getElementById("login").disabled = true;
        }else{
            document.getElementById("demo").style.display = "none";
            document.getElementById("login").disabled = false;
        }
    }
</script>

</html>