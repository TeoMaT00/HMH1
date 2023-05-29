<?php
require "define.php";
session_start();

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
  $data = json_decode(file_get_contents("php://input"));
  $iduser = $_SESSION['id'];

  $title = $data->titleSong;
  $idsong = $data->idSong;
  $idartist = $data->idArtist;
  $photo_link = $data->photo_link;

  $query = "INSERT INTO preference (iduser, idsong, song_title, song_author, photo_link) VALUES ('$iduser', '$idsong', '$title', '$idartist', '$photo_link');";
  $res = mysqli_query($conn, $query);
}
echo "true";
