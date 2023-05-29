<?php
require "define.php";
session_start();
$iduser = $_SESSION['id'];

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {

  if (!empty($_POST)) {
    if ($_POST['submit'] == "deleteSong") {
      $id = $_POST['id'];

      $query = "DELETE FROM preference WHERE id = '$id';";
      $res = mysqli_query($conn, $query);
    }
  }

  $query = "SELECT * FROM preference WHERE iduser = '$iduser';";
  $res = mysqli_query($conn, $query);
  if ($res) {
    $arrayRes = array();
    while ($item = mysqli_fetch_assoc($res)) {
      array_push($arrayRes, $item);
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
  <link rel="stylesheet" href="PrefPage.css" />
  <link rel="stylesheet" href="navbarPref.css" />
  <script src="api.js"></script>

  <title>Preferences</title>

  <div class="topnav" id="myTopnav">
    <a href="#" class="active">
      <img src="logo_sito1.png" alt="logo" id="logo" height="20px">
    </a>
    <a href="dashboard.php">Dashboard</a>
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
  <div class="cardrow">

    <?php
    foreach ($arrayRes as $item) {
    ?>
      <div class="col">
        <div class="cardform">


          <h1><?php echo $item['song_title'] ?></h1><br>
          <img src="<?php echo $item['photo_link']?>" width="150px">
          <input type="text" style="display:none" value="<?php echo $item['idsong'] ?>">
          <div style="display:none" id="artista_<?php echo $item['idsong'] ?>">
            <label for="divArtista">Artista</label>
            <p id="nomeArtista_<?php echo $item['idsong'] ?>"></p>
          </div>
          <div style="display:none" id="album_<?php echo $item['idsong'] ?>">
            <label for="divAlbum">Album</label>
            <p id="nomeAlbum_<?php echo $item['idsong'] ?>"></p>
            <p id="dataAlbum_<?php echo $item['idsong'] ?>"></p>
            <p id="nSongAlbum_<?php echo $item['idsong'] ?>"></p>
            <img src="" width="150px" id="albumPhoto_<?php echo $item['idsong'] ?>">
          </div>

          <div style="display:none" id="musicaAlbum_<?php echo $item['idsong'] ?>">
            <audio controls autoplay>
              <source src="" id="nreprAlbum_<?php echo $item['idsong'] ?>" type="audio/mpeg">
            </audio>
          </div>

          <div>
            
            <button onclick="getInformationSong('<?php echo $item['idsong'] ?>')">Info</button>
            <button onclick="getSong('<?php echo $item['idsong'] ?>')">Play</button>
          </div>
          
          <div>
            <form action="" method="post">
              <input type="text" name="id" value="<?php echo $item['id'] ?>" style="display:none">
              <button type="submit" name="submit" value="deleteSong">Rimuovi</button>
            </form>
          </div>

        </div>
      </div>
    <?php }
    ?>

  </div>
</body>

</html>