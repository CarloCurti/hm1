function accesso(event){
    const accedi=document.querySelector('#div-accesso');

    isVisible = !isVisible;
    if(isVisible){
        accedi.classList.remove('hidden');
        document.body.classList.add('no-scroll');
    }else{
        accedi.classList.add('hidden');
        document.body.classList.remove('no-scroll');
    }
}

let isVisible=false;

const immagineAccesso = document.querySelector('#js-accesso');
immagineAccesso.addEventListener('click', accesso);

const photo_list = [];

function createImage(src){
    const image=document.createElement('img');
    image.src=src;
    return image;
}

const albumView = document.querySelector('#section-loghi-container');
for (let i=0; i<photo_list.length; i++){
    const photoSrc = photo_list[i];
    const image = createImage(photoSrc);
    albumView.appendChild(image);
}

function onThumbnailClick(event){
    const modalView = document.querySelector('#modal-view');
    const image = createImage(event.currentTarget.src);
    document.body.classList.add('no-scroll');
    modalView.innerHTML = '';
    modalView.appendChild(image);
    modalView.classList.remove('hidden');
}

function onModalClick(event){
    document.body.classList.remove('no-scroll');
    const modalView = document.querySelector('#modal-view');
    modalView.classList.add('hidden');
}

const modalView = document.querySelector('#modal-view');
modalView.addEventListener('click', onModalClick);

const galleriaItems = document.querySelectorAll('#section-loghi-container img');
for (let i=0; i<galleriaItems.length; i++){
    const item = galleriaItems[i];
    item.addEventListener('click', onThumbnailClick);
}

function tendina(event) {
    event.preventDefault();
    const menucomparsa = document.querySelector('#menu-a-comparsa');

    isVisible1 = !isVisible1;
    if (isVisible1) {
        menucomparsa.classList.remove('hidden');
        document.body.classList.add('no-scroll');
    } else {
        menucomparsa.classList.add('hidden'); 
        document.body.classList.remove('no-scroll');
    }
}

let isVisible1 = false;
const bottonemenu = document.querySelector('#link-menu');
bottonemenu.addEventListener('click', tendina);

const SFONDO1 = 'immagini per html/asics1.jpg';
const SFONDO2 = 'immagini per html/asics2.jpg';

const Cerchio = document.querySelectorAll('#bottoni-rotondi img');
const bloccoFoto = document.querySelector('#slide');

for (let i = 0; i < Cerchio.length; i++) {
  Cerchio[i].addEventListener('click', cambioSfondo);
}

function cambioSfondo(event) {
  const elementoSelezionato = event.target;
  const indice = elementoSelezionato.dataset.index;

  if (indice === '1') {
    bloccoFoto.style.backgroundImage = `url(${SFONDO1})`;
  } else if (indice === '2') {
    bloccoFoto.style.backgroundImage = `url(${SFONDO2})`;
  }
}

const SFONDO3 = 'immagini per html/new_balance1.jpg';
const SFONDO4 = 'immagini per html/new_balance2.jpg';

const Cerchio1 = document.querySelectorAll('#bottoni-rotondi img');
const bloccoFoto1 = document.querySelector('#slide1');

for (let i = 0; i < Cerchio1.length; i++) {
  Cerchio1[i].addEventListener('click', cambioSfondo1);
}

function cambioSfondo1(event) {
  const elementoSelezionato1 = event.target;
  const indice1 = elementoSelezionato1.dataset.index;

  if (indice1 === '3') {
    bloccoFoto1.style.backgroundImage = `url(${SFONDO3})`;
  } else if (indice1 === '4') {
    bloccoFoto1.style.backgroundImage = `url(${SFONDO4})`;
  }
}

const SFONDO5 = 'immagini per html/salomon1.jpg';
const SFONDO6 = 'immagini per html/salomon2.jpg';

const Cerchio2 = document.querySelectorAll('#bottoni-rotondi img');
const bloccoFoto2 = document.querySelector('#slide2');

for (let i = 0; i < Cerchio2.length; i++) {
  Cerchio2[i].addEventListener('click', cambioSfondo2);
}

function cambioSfondo2(event) {
  const elementoSelezionato2 = event.target;
  const indice2 = elementoSelezionato2.dataset.index;

  if (indice2 === '5') {
    bloccoFoto2.style.backgroundImage = `url(${SFONDO5})`;
  } else if (indice2 === '6') {
    bloccoFoto2.style.backgroundImage = `url(${SFONDO6})`;
  }
}

fetch('https://js.api.here.com/v3/3.1/mapsjs-core.js')
  .then(response => response.text())
  .then(data => {
      var platform = new H.service.Platform({
        apikey: '3J0Fvf-mVxzP0z_NqHrb3EmyoDuDWuxtMoKC9Bis_2I'
      });
      var defaultLayers = platform.createDefaultLayers();
      var map = new H.Map(document.getElementById('mappa'),
        defaultLayers.vector.normal.map,
        {
            center: { lat: 50, lng: 5 },
            zoom: 4,
            pixelRatio: window.devicePixelRatio || 1
        }
      );
      window.addEventListener('resize', () => map.getViewPort().resize());
      var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

      var ui = H.ui.UI.createDefault(map, defaultLayers);

      var LocationOfMarker = { lat: 37.51651572890033 , lng: 15.094873796109468 };

      var pngIcon = new H.map.Icon("https://cdn1.iconfinder.com/data/icons/essentials-pack/96/location_pin_position_map_navigation-512.png", { size: { w: 56, h: 56 } });

      var marker = new H.map.Marker(LocationOfMarker, { icon: pngIcon });

      map.addObject(marker);

      map.setCenter(LocationOfMarker)

      var LocationOfMarker1 = { lat: 37.47991282464538 , lng: 15.06180296660951 };
      var marker1 = new H.map.Marker(LocationOfMarker1, { icon: pngIcon });
      map.addObject(marker1);

      var LocationOfMarker2 = { lat: 37.47861681784779 , lng: 15.009951172208343 };
      var marker2 = new H.map.Marker(LocationOfMarker2, { icon: pngIcon });
      map.addObject(marker2);

      map.setZoom(11);
  })
  .catch(error => {
    console.error('There has been a problem with your fetch operation:', error);
  });

function onJson(json) {
  console.log('JSON ricevuto');
  console.log(json);
  const library = document.querySelector('#album-view');
  library.innerHTML = '';
  const results = json.albums.items;
  let num_results = results.length;
  if(num_results > 5)
    num_results = 5;
  for(let i=0; i<num_results; i++)
  {
    const album_data = results[i];
    const title = album_data.name;
    const selected_image = album_data.images[0].url;
    const album = document.createElement('div');
    album.classList.add('album');
    const img = document.createElement('img');
    img.src = selected_image;
    const caption = document.createElement('span');
    caption.textContent = title;
    album.appendChild(img);
    album.appendChild(caption);
    library.appendChild(album);
  }
}

function onResponse(response) {
  console.log('Risposta ricevuta');
  return response.json();
}

function search(event)
{
  event.preventDefault();
  const album_input = document.querySelector('#modulo-ricerca-spotify');
  const album_value = encodeURIComponent(album_input.value);
  console.log('Eseguo ricerca: ' + album_value);
  if(token){
      fetch("https://api.spotify.com/v1/search?type=album&q=" + album_value,
    {
      headers:
      {
        'Authorization': 'Bearer ' + token
      }
    }
  ).then(onResponse).then(onJson);
}else{
  console.log('Token non disponibile');
}}

function onTokenJson(json)
{
  console.log(json);
  token = json.access_token;
}

function onTokenResponse(response)
{
  return response.json();
}


const client_id = '5469b650a8154b5d9c181d168ae345e3';
const client_secret = '9b4a38f7c5264360a4d813a23cebd29c';

let token;

fetch("https://accounts.spotify.com/api/token",
    {
   method: "post",
   body: 'grant_type=client_credentials',
   headers:
   {
    'Content-Type': 'application/x-www-form-urlencoded',
    'Authorization': 'Basic ' + btoa(client_id + ':' + client_secret)
   }
  }
).then(onTokenResponse).then(onTokenJson);

const form = document.querySelector('#form-ricerca-spotify');
form.addEventListener('submit', search);

function manùcatalogo(event){
  const catalogo=document.querySelector('#blocco-catalogo');

  isVisible3 = !isVisible3;
  if(isVisible3){
    catalogo.classList.remove('hidden');
    document.body.classList.add('no-scroll');
  }
}

let isVisible3 = false;
const bottonecatalogo = document.querySelector('#catalogo');
bottonecatalogo.addEventListener('click', manùcatalogo);

function closeCatalogo() {
  const catalogo = document.querySelector('#blocco-catalogo');
  isVisible3 = false;
  catalogo.classList.add('hidden');
  document.body.classList.remove('no-scroll');
}

const closeButton = document.querySelector('#chiudi-catalogo');
closeButton.addEventListener('click', closeCatalogo);

document.getElementById('crea-account').addEventListener('click', function() {
  window.location.href = 'registration.php';
});

document.addEventListener("DOMContentLoaded", function() {
  const userPanelToggle = document.getElementById("js-accesso");
  const logoutButton = document.getElementById("button-logout");
  const divAccesso = document.getElementById("div-accesso");

  if (userPanelToggle) {
    userPanelToggle.addEventListener("click", function(event) {
      const isLogged = userPanelToggle.querySelector("span").textContent !== "Benvenuto, Accedi";

      if (isLogged && logoutButton.style.display !== "block") {
        logoutButton.style.display = "block";
        divAccesso.style.display = "none";
      } else if (!isLogged && divAccesso.style.display !== "block") {
        logoutButton.style.display = "none";
        divAccesso.style.display = "block";
      } else {
        logoutButton.style.display = "none";
        divAccesso.style.display = "none";
      }
    });
  }

  if (logoutButton) {
    logoutButton.addEventListener("click", async function(event) {
      event.preventDefault();

      const response = await fetch('logout.php');

      if (response.ok) {
        logoutButton.style.display = "none";
        userPanelToggle.querySelector("span").textContent = "Benvenuto, Accedi";
        localStorage.removeItem('nome')
      } else {
        console.error('Logout failed');
      }
    });
  }

});

document.querySelectorAll('.button-cuore').forEach(button => {
  button.addEventListener('click', async (e) => {
      const id_prodotto = e.currentTarget.dataset.itemId;

      if (id_prodotto) {
          let response = await fetch('verifica_preferiti.php', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/x-www-form-urlencoded',
              },
              body: `id_prodotto=${id_prodotto}`,
          });

          let data = await response.json();

          if (data.status === "exists") {
              response = await fetch('rimuovi_dai_preferiti.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/x-www-form-urlencoded',
                  },
                  body: `id_prodotto=${id_prodotto}`,
              });

              data = await response.text();
              alert('Prodotto rimosso dai preferiti');
              console.log(data);
          } else if (data.status === "not_exists") {
              response = await fetch('aggiungi_ai_preferiti.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/x-www-form-urlencoded',
                  },
                  body: `id_prodotto=${id_prodotto}`,
              });

              data = await response.text();
              alert('Prodotto aggiunto ai preferiti');
              console.log(data);
          } else {
              console.log(data.message);
          }
      } else {
          console.log('ID prodotto non definito');
      }
  });
});

var preferitiButton = document.getElementById("preferiti");

preferitiButton.addEventListener("click", function() {
  window.location.href = "pagina_preferiti.php";
});

document.querySelectorAll('.button-carrello').forEach(button => {
  button.addEventListener('click', async (e) => {
      const id_prodotto = e.currentTarget.dataset.itemId;
      const quantità = e.currentTarget.parentElement.querySelector('.quantità').value;

      if (id_prodotto) {
          let response = await fetch('aggiungi_al_carrello.php', {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/x-www-form-urlencoded',
              },
              body: `id_prodotto=${id_prodotto}&quantità=${quantità}`,
          });

          let data = await response.json();

          if (data.status === "success") {
              alert(`Prodotto aggiunto al carrello. Quantità: ${quantità}`);
          } else if (data.status === "error" && data.message === "Effettuare il login prima di aggiungere l'elemento nel carrello") {
              console.log('Effettuare il login prima di aggiungere il prodotto al carrello');
          } else {
              console.log(data.message);
          }
      } else {
          console.log('ID prodotto non definito');
      }
  });
});

var carrelloButton = document.getElementById("carrello");

carrelloButton.addEventListener("click", function() {
  window.location.href = "pagina_carrello.php";
});

//API IN PHP
document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('form-ricerca-API').addEventListener('submit', function(event) {
    event.preventDefault();
    console.log('Form submitted');
    cerca();
  });

  document.getElementById('tendina-prodotti').addEventListener('click', function(event) {
    if (event.target.closest('.button-cuore1')) {
      const prodottoDiv = event.target.closest('.prodotto');
      verificaProdottoPreferito(prodottoDiv);
    }
  });

  function cerca() {
    const query = document.querySelector('input[name="catalogo"]').value.trim();

    if (!query) {
      alert("Per favore inserisci un termine di ricerca");
      return;
    }

    const tendinaProdotti = document.getElementById("tendina-prodotti");
    tendinaProdotti.style.display = "block";

    console.log('Query:', query); 

    fetch('https://fakestoreapi.com/products')
      .then(response => {
        console.log('Fetch Response Status:', response.status); 
        return response.json();
      })
      .then(data => {
        console.log('Dati ottenuti:', data); 
        const risultati = data.filter(prodotto => 
          prodotto.title.toLowerCase().includes(query.toLowerCase())
        );
        console.log('Risultati filtrati:', risultati);
        mostraRisultati(risultati);
      })
      .catch(error => {
        console.error('Errore:', error);
      });
  }

  function mostraRisultati(prodotti) {
    const tendinaProdotti = document.getElementById('tendina-prodotti');
    tendinaProdotti.innerHTML = '';

    if (prodotti.length === 0) {
      tendinaProdotti.innerHTML = '<p>Nessun prodotto trovato.</p>';
      return;
    }

    prodotti.forEach(prodotto => {
      const prodottoDiv = document.createElement('div');
      prodottoDiv.className = 'prodotto';
      prodottoDiv.setAttribute('data-item-id', prodotto.id);

      const immagine = document.createElement('img');
      immagine.src = prodotto.image;
      immagine.alt = prodotto.title;

      const prodottoDetails = document.createElement('div');
      prodottoDetails.className = 'prodotto-details';

      const titolo = document.createElement('h3');
      titolo.textContent = prodotto.title;

      const prezzo = document.createElement('p');
      prezzo.textContent = `Prezzo: $${prodotto.price}`;

      const bottoneCuore = document.createElement('button');
      bottoneCuore.className = 'button-cuore1';
      const imgCuore = document.createElement('img');
      imgCuore.className = 'img-cuore';
      imgCuore.src = 'immagini per html/cuore.png';
      bottoneCuore.appendChild(imgCuore);

      prodottoDetails.appendChild(titolo);
      prodottoDetails.appendChild(prezzo);

      prodottoDiv.appendChild(immagine);
      prodottoDiv.appendChild(prodottoDetails);
      prodottoDiv.appendChild(bottoneCuore);

      tendinaProdotti.appendChild(prodottoDiv);
    });
  }

  function verificaProdottoPreferito(prodottoDiv) {
    const nomeDelProdotto = prodottoDiv.querySelector('h3').textContent;
    const prezzoDelProdotto = prodottoDiv.querySelector('p').textContent.replace('Prezzo: $', '');
    const immagineDelProdotto = prodottoDiv.querySelector('img').src;

    fetch('verifica_prodotto_mipiace.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ 
        id: prodottoDiv.getAttribute('data-item-id'),
        nome: nomeDelProdotto, 
        prezzo: prezzoDelProdotto, 
        immagine: immagineDelProdotto 
      })
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        alert(data.message);
      } else if (data.error) {
        alert(data.error);
      }
    })
    .catch(error => {
      console.error('Errore:', error);
      alert('Si è verificato un errore durante la verifica del prodotto');
    });
  }
});

document.addEventListener("DOMContentLoaded", function() {
  const userPanelToggle = document.getElementById("js-accesso-mobile");
  const logoutButton = document.getElementById("button-logout-mobile");
  const divAccesso = document.getElementById("div-accesso");

  if (userPanelToggle) {
    userPanelToggle.addEventListener("click", function(event) {
      const isLogged = userPanelToggle.querySelector("span").textContent !== "Benvenuto, Accedi";

      if (isLogged && logoutButton.style.display !== "block") {
        logoutButton.style.display = "block";
        divAccesso.style.display = "none";
      } else if (!isLogged && divAccesso.style.display !== "block") {
        logoutButton.style.display = "none";
        divAccesso.style.display = "block";
      } else {
        logoutButton.style.display = "none";
        divAccesso.style.display = "none";
      }
    });
  }

  if (logoutButton) {
    logoutButton.addEventListener("click", async function(event) {
      event.preventDefault();

      const response = await fetch('logout.php');

      if (response.ok) {
        logoutButton.style.display = "none";
        userPanelToggle.querySelector("span").textContent = "Benvenuto, Accedi";
        localStorage.removeItem('nome')
      } else {
        console.error('Logout failed');
      }
    });
  }

});