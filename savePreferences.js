function salva(titleSong, idSong, idArtist, photo_link) {
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "savePreferences.php", true);
  xhttp.setRequestHeader("Content-Type", "application/json");
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // Response
      var response = this.responseText;
      if (response == "true") {
        alert("Questa canzone è stata salvata tra le tue preferite");
      }
      else {
        alert("Si è verificato un errore, si prega di riprovare.");
      }
    }
  };
  var data = { titleSong: titleSong, idSong: idSong, idArtist: idArtist, photo_link: photo_link };
  xhttp.send(JSON.stringify(data));
}