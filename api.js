function getArtist(id) {
  const clientId = "a9c508beb75f48e7892c8f9b259d5fe6";
  const clientSecret = "ef9213fb0d6546cc90ff1bd702b61cb7";
  const _getToken = async () => {

    const result = await fetch('https://accounts.spotify.com/api/token', {

      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
        'Authorization': 'Basic ' + btoa(clientId + ':' + clientSecret)
      },
      body: 'grant_type=client_credentials'
    });

    const data = await result.json();
    return data.access_token;
  }

  const _getArtist = async () => {
    const token = await _getToken();
    const result = await fetch('https://api.spotify.com/v1/artists/' + id, {

      method: 'GET',
      headers: { 'Authorization': 'Bearer ' + token }
    });
    const data = await result.json();
    return data;
  }
  data = _getArtist();
  console.log(data);
}

async function getSong(id) {
  const clientId = "a9c508beb75f48e7892c8f9b259d5fe6";
  const clientSecret = "ef9213fb0d6546cc90ff1bd702b61cb7";
  const _getToken = async () => {

    const result = await fetch('https://accounts.spotify.com/api/token', {

      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
        'Authorization': 'Basic ' + btoa(clientId + ':' + clientSecret)
      },
      body: 'grant_type=client_credentials'
    });

    const data = await result.json();
    return data.access_token;
  }

  const _getSong = async () => {
    const token = await _getToken();
    const result = await fetch('https://api.spotify.com/v1/tracks/' + id, {

      method: 'GET',
      headers: { 'Authorization': 'Bearer ' + token }
    });
    const data = await result.json();
    return data;
  }
  data = await _getSong();
  console.log(data);
   if(data.preview_url != '' && data.preview_url != null){
   /*document.getElementById("musicaAlbum_"+id).style.display = 'block';
   document.getElementById("nreprAlbum_"+id).src = data.preview_url+".mp3";  */
   console.log(typeof data.preview_url);
    alert("Stai per essere reindirizzato all'anteprima della canzone. Buon ascolto");
    window.location.href = data.preview_url;
  }else{
    window.location.href = data.external_urls.spotify;
  }
}

async function getInformationSong(id) {
  const clientId = "a9c508beb75f48e7892c8f9b259d5fe6";
  const clientSecret = "ef9213fb0d6546cc90ff1bd702b61cb7";
  const _getToken = async () => {

    const result = await fetch('https://accounts.spotify.com/api/token', {

      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
        'Authorization': 'Basic ' + btoa(clientId + ':' + clientSecret)
      },
      body: 'grant_type=client_credentials'
    });

    const data = await result.json();
    return data.access_token;
  }

  const _getInformation = async () => {
    const token = await _getToken();
    const result = await fetch('https://api.spotify.com/v1/tracks/' + id, {

      method: 'GET',
      headers: { 'Authorization': 'Bearer ' + token }
    });
    const data = await result.json();
    return data;
  }
  data = await _getInformation();
  console.log(data);

  document.getElementById("artista_"+id).style.display = 'block';
  document.getElementById("nomeArtista_"+id).innerText = 'Nome Artista: ' + data.artists[0].name;

  document.getElementById("album_"+id).style.display = 'block';
  document.getElementById("nomeAlbum_"+id).innerText = 'Nome Album: ' + data.album.name;
  document.getElementById("dataAlbum_"+id).innerText = 'Data di rilascio: ' + data.album.release_date;
  document.getElementById("nSongAlbum_"+id).innerText = 'Numero di canzoni: ' + data.album.total_tracks;
  document.getElementById("albumPhoto_"+id).src = data.album.images[1]['url'];
}

/**
 * 
 * GET INFORMATION TOP-TRACKS 
 */

async function getTT(id) {
  const clientId = "a9c508beb75f48e7892c8f9b259d5fe6";
  const clientSecret = "ef9213fb0d6546cc90ff1bd702b61cb7";
  const _getToken = async () => {

    const result = await fetch('https://accounts.spotify.com/api/token', {

      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded',
        'Authorization': 'Basic ' + btoa(clientId + ':' + clientSecret)
      },
      body: 'grant_type=client_credentials'
    });

    const data = await result.json();
    return data.access_token;
  }

  const _getTT = async () => {
    const token = await _getToken();
    const result = await fetch('https://api.spotify.com/v1/artists/'+id+'/top-tracks?market=IT', {

      method: 'GET',
      headers: { 'Authorization': 'Bearer ' + token }
    });
    const data = await result.json();
    return data;
  }
  data = await _getTT();
  console.log(data);

  var str = "<p>Ecco una lista delle migliori canzoni dell'artista:</p>";
  str+="<ul>";
  data.tracks.forEach(element => {
    str+="<li>"+element.name+" <button onclick=\'salva(\""+element.name+"\",\""+element.id+"\",\""+element.artists[0].id+"\", \""+element.album.images[0].url+"\")'>Salva</button></li>";
  });
  str+="</ul>";
  document.getElementById("list_"+id).innerHTML= str;
  document.getElementById("list_"+id).style.display = 'block';

}


async function getTesto(id) {
  token = await getToken();

}
