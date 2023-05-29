<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="LoginPage.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div class="cardform">
        <form method="POST" action="dashboard.php">
            <label for="mail">Email</label>
            <input id="mail" type="email" name="email"><br>
            <label for="FirstName">Password</label>
            <input id="FirstName" type="password" name="password"><br>
            <div>
                <button type="submit" name="submit" value="login" id="login">Login</button>
                <a href="HMW1.HomePage.php"><button type="button">Back</button></a>
            </div>
        </form>
    </div>
</body>

</html>