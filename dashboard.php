<?php
require "define.php";
session_start();

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {

  if (!empty($_POST)) {
    if ($_POST['submit'] == "login") {
      $mail = $_POST['email'];
      $password = $_POST['password'];

      $query = "SELECT * FROM users WHERE mail = '$mail' AND password = '$password';";
      $res = mysqli_query($conn, $query);

      if ($user = mysqli_fetch_array($res)) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['cognome'] = $user['cognome'];
        $_SESSION['nick'] = $user['nickname'];
        $_SESSION['email'] = $user['mail'];
        $_SESSION['password'] = $user['password'];
      } else {
        session_destroy();
        header('Location: HMW1.HomePage.php');
      }
    }

    if ($_POST['submit'] == "registra") {
      $nome = $_POST['nome'];
      $cognome = $_POST['cognome'];
      $email = $_POST['email'];
      $nickname = $_POST['nick'];
      $password = $_POST['password'];

      $query = "SELECT * FROM users WHERE nickname = '$nickname';";
      $res = mysqli_query($conn, $query);
      $user = mysqli_fetch_array($res);
      if ($user['nickname']) {
        $_SESSION['signup'] = 'nick';
        header('Location: HMW1.HomePage.php');
      }

      $query = "INSERT INTO users (nome, cognome, mail, nickname, password) VALUES ('$nome', '$cognome', '$email', '$nickname', '$password');";
      $res = mysqli_query($conn, $query);
      
      if ($user = mysqli_fetch_array($res)) {
        $_SESSION['id'] = mysqli_insert_id($conn);
        $_SESSION['nome'] = $_POST['nome'];
        $_SESSION['cognome'] = $_POST['cognome'];
        $_SESSION['nick'] = $_POST['nickname'];
        $_SESSION['email'] = $_POST['mail'];
        $_SESSION['password'] = $_POST['password'];
      }
    }
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Dashboard</title>
  <meta charset="utf-8">
  <!-- <link rel="stylesheet" href="HMW1.HomePage.css" /> -->
  <link rel="stylesheet" href="dashboard.css" />
  <link rel="stylesheet" href="navbar.css" />
  <script src="api.js" defer="true"></script>
  <script src="savePreferences.js" defer="true"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <div class="topnav" id="myTopnav">
    <a href="#" class="active">
      <img src="logo_sito1.png" alt="logo" id="logo" height="20px">
    </a>
    <a href="PrefPage.php">Preferences</a>
    <a href="SearchPage.php">Search</a>
    <div class="dropdown">
      <button class="dropbtn">Profile
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="profile.php">Settings</a>
        <a href="logout.php">Logout</a>
      </div>
    </div>

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
  </div>
</head>

<body>

  <div id="cardDash">
    <h1>Benvenuto nella tua dashboard personale, <b><?php echo $_SESSION['nick']; ?></b>.</h1>
    <p>Da questa pagina potrai gestire i tuoi dati personali oppure i tuoi brani preferiti</p>
    <p>A seguire troverai una selezione di 9 canzoni di 9 artisti diversi. Ascoltali e salva i tuoi preferiti.</p>
  </div>


  <div class="cardrow">

    <div class="cardform">
      <h2>When I was your man</h2>
      <h3>Bruno Mars</h3>
      <img src="https://m.media-amazon.com/images/I/716mnZd24EL._UF1000,1000_QL80_.jpg" width="150px">
      <div>
        <button onclick="salva('When I was your man', '0nJW01T7XtvILxQgC5J7Wh', '0du5cEVh5yTK9QJze8zA0C', 'https://m.media-amazon.com/images/I/716mnZd24EL._UF1000,1000_QL80_.jpg')">Salva</button>
        <button onclick="getSong('0nJW01T7XtvILxQgC5J7Wh')">Riproduci</button>
      </div>
    </div>

    <div class="cardform">
      <h2>Unholy</h2>
      <h3>Sam Smith</h3>
      <img src="https://www.universalmusic.it/dbcommon/file/news/img1/12801_medium.jpg" width="150px">
      <div>
        <button onclick="salva('Unholy','3nqQXoyQOWXiESFLlDF1hG?si=d32df4f9378e42aa ','2wY79sveU1sp5g7SokKOiI?si=p_JZhX6JQK2RpCLMWkq5Hg', 'https://www.universalmusic.it/dbcommon/file/news/img1/12801_medium.jpg')">Salva</button>
        <button onclick="getSong('3nqQXoyQOWXiESFLlDF1hG?si=d32df4f9378e42aa')">Riproduci</button>
      </div>
    </div>

    <div class="cardform">
      <h2>Yellow</h2>
      <h3>Coldplay</h3>
      <img src="https://radiogold.it/wp-content/uploads/2021/07/MOTS-rid-album-artwork.jpeg" width="150px">
      <div>
        <button onclick="salva('Yellow', '3AJwUDP919kvQ9QcozQPxg?si=c590316a0dec494a', '4gzpq5DPGxSnKTe4SA8HAU?si=pN8dcWEVR5qkA23-ahF1uQ', 'https://radiogold.it/wp-content/uploads/2021/07/MOTS-rid-album-artwork.jpeg')">Salva</button>
        <button onclick="getSong('3AJwUDP919kvQ9QcozQPxg?si=c590316a0dec494a')">Riproduci</button>
      </div>
    </div>

  </div>

<!---->
  <div class="cardrow">

    <div class="cardform">
      <h2>Demons</h2>
      <h3>Imagine Dragons</h3>
      <img src="https://www.ibs.it/images/0602577189760_0_536_0_75.jpg" width="150px">
      <div>
        <button onclick="salva('Demons', '5qaEfEh1AtSdrdrByCP7qR?si=04db621c594d4a5a', '53XhwfbYqKCa1cC15pYq2q?si=Y_0kQ4MsQNy70vWSiFpPrA', 'https://www.ibs.it/images/0602577189760_0_536_0_75.jpg')">Salva</button>
        <button onclick="getSong('5qaEfEh1AtSdrdrByCP7qR?si=04db621c594d4a5av')">Riproduci</button>
      </div>
    </div>

    <div class="cardform">
      <h2>Shape of you</h2>
      <h3>Ed Sheeran</h3>
      <img src="https://www.ansa.it/webimages/img_457x/2023/3/1/a8a8c98ce1bca77210a996f34e466f7a.jpg" width="150px">
      <div>
        <button onclick="salva('Shape of you', '7qiZfU4dY1lWllzX7mPBI3?si=70b9fc6f8dbc4624', '6eUKZXaKkcviH0Ku9w2n3V?si=O1KTPiaxSVaVm55Vm6ipWA', 'https://www.ansa.it/webimages/img_457x/2023/3/1/a8a8c98ce1bca77210a996f34e466f7a.jpg')">Salva</button>
        <button onclick="getSong('7qiZfU4dY1lWllzX7mPBI3?si=70b9fc6f8dbc4624')">Riproduci</button>
      </div>
    </div>

    <div class="cardform">
      <h2>Fireworks</h2>
      <h3>Katy Perry</h3>
      <img src="https://static01.nyt.com/images/2020/08/29/arts/27album-katy1/27album-katy1-mediumSquareAt3X.jpg" width="150px">
      <div>
        <button onclick="salva('Fireworks', '4lCv7b86sLynZbXhfScfm2?si=41db09aa14da4b8b', '6jJ0s89eD6GaHleKKya26X?si=qgV_zLxeQHyzGCXLJ2e6eA', 'https://static01.nyt.com/images/2020/08/29/arts/27album-katy1/27album-katy1-mediumSquareAt3X.jpg')">Salva</button>
        <button onclick="getSong('4lCv7b86sLynZbXhfScfm2?si=41db09aa14da4b8b')">Riproduci</button>
      </div>
    </div>

  </div>

<!---->
  <div class="cardrow">

    <div class="cardform">
      <h2>Counting Stars</h2>
      <h3>One Republic</h3>
      <img src="https://upload.wikimedia.org/wikipedia/en/9/96/OneRepublic_-_Native.png" width="150px">
      <div>
        <button onclick="salva('Counting Stars', '2tpWsVSb9UEmDRxAl1zhX1?si=0c56905706e24fb1', '5Pwc4xIPtQLFEnJriah9YJ?si=FarcCyfUT0KpNFPTfLlzZA', 'https://upload.wikimedia.org/wikipedia/en/9/96/OneRepublic_-_Native.png')">Salva</button>
        <button onclick="getSong('2tpWsVSb9UEmDRxAl1zhX1?si=0c56905706e24fb1')">Riproduci</button>
      </div>
    </div>

    <div class="cardform">
      <h2>Maps</h2>
      <h3>Maroon 5</h3>
      <img src="https://angelaboozer.files.wordpress.com/2014/10/final1.png" width="150px">
      <div>
        <button onclick="salva('Maps', '4gbVRS8gloEluzf0GzDOFc?si=814ac29edbc2420b', '04gDigrS5kc9YWfZHwBETP?si=EJalDyt9Rq2E3JjclKz7JA', 'https://angelaboozer.files.wordpress.com/2014/10/final1.png')">Salva</button>
        <button onclick="getSong('4gbVRS8gloEluzf0GzDOFc?si=814ac29edbc2420b')">Riproduci</button>
      </div>
    </div>

    <div class="cardform">
      <h2>Umbrella</h2>
      <h3>Rihanna</h3>
      <img src="https://upload.wikimedia.org/wikipedia/en/d/d1/Rihanna_-_Loud.png" width="150px">
      <div>
        <button onclick="salva('Umbrella', '49FYlytm3dAAraYgpoJZux?si=50a85b41972044c3', '5pKCCKE2ajJHZ9KAiaK11H?si=ywX7EEzMS3aLY5ChXT9plw', 'https://upload.wikimedia.org/wikipedia/en/d/d1/Rihanna_-_Loud.png')">Salva</button>
        <button onclick="getSong('49FYlytm3dAAraYgpoJZux?si=50a85b41972044c3')">Riproduci</button>
      </div>
    </div>

  </div>

</body>

</html>