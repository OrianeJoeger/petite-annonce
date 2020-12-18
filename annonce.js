document.addEventListener('DOMContentLoaded', () => {

    function loadAnnonce(requete) {
        requete.addEventListener("load", (evt) => {
          const jsonData = evt.target.responseText;
          const data = JSON.parse(jsonData);

          document.getElementById("annonce").innerHTML = '';
          for(let annonce of data) {
            document.getElementById("annonce").innerHTML += 
            '<li class="shadow-sm list-group-item p-3 mt-3 mb-3">' +
            '<div class="row"> '+
            '<div> <img class="img_annonces" src=" '+ annonce['photo'] + '" class="col-sm-4">'  +
            '</div>' +
            '<div class="col-sm-6">' +
            '<h3>' + annonce['titre'] + '</h3>' +
            '<p> ' + annonce['description'] + ' </p>' +
            '<p> ' + annonce['categorie'] + ' </p>' +
            '</div>' +
            '<div  class="col-sm-2">' +
            '<a class="btn btn-primary btn-block " href="annonce_details.php?idAnnonce=' + annonce['id'] + '">Voir plus</a>' + 
            '<button class="btn btn-primary btn-block btn-suppr" href="#" data-id=" ' + annonce['id'] + ' "role="button" > Supprimer </button> ' +
            '</div>' + 
            '</div>' + 
            '</li>';
        }

        loadSuppButton();
    });
    }

    function addAnnonce() {
        const formAjoutAnnonce = document.getElementById("nouvelle-annonce");
        const requeteHTTPPost = new XMLHttpRequest();
        const donneesFormulaire = new FormData(formAjoutAnnonce);
        requeteHTTPPost.open("post", "wsAjoutAnnonce.php");
        requeteHTTPPost.send(donneesFormulaire);
        requeteHTTPPost.addEventListener("load", (evt) => {
            if(evt.target.status !== 200){
                alert('Vous devez être connecté.');
                return;
            }
            document.location.href="annonces.php";
        });
    }

    function search() {
        const requeteHTTPGetRechercheAnnonce = new XMLHttpRequest();
        const inputRecherche = document.getElementById("input_recherche");
        requeteHTTPGetRechercheAnnonce.open("get", "wsRechercheAnnonce.php?search=" + inputRecherche.value);
        requeteHTTPGetRechercheAnnonce.send();
        loadAnnonce(requeteHTTPGetRechercheAnnonce);
    }


    function suppAnnonce(id) {
        const requeteHTTPDelete = new XMLHttpRequest();
        requeteHTTPDelete.open("delete", "wsSuppressionAnnonce.php?id_annonce=" + id);
        requeteHTTPDelete.send(id);
        requeteHTTPDelete.addEventListener("load", (evt) => {
            if(evt.target.status !== 200){
                alert('Vous devez être connecté.');
                return;
            }
            document.location.href="annonces.php";
        });
    }

    function loadSuppButton() {
        const suppressionAnnonces = document.getElementsByClassName("btn-suppr");
        if (suppressionAnnonces) {
            for(let element of suppressionAnnonces) {
                element.addEventListener("click", (event) => {
                    event.preventDefault();
                    suppAnnonce(element.dataset.id);
                })
            }
        }
    }

    function getAnnonce(){
        const requeteHTTPGetInfosAnnonce = new XMLHttpRequest();
        requeteHTTPGetInfosAnnonce.open("get", "wsInfosAnnonce.php" );
        requeteHTTPGetInfosAnnonce.send();
        loadAnnonce(requeteHTTPGetInfosAnnonce);
    }

    function authentification(){
        const requeteHTTPAuthentification = new XMLHttpRequest();
        requeteHTTPAuthentification.open("post", "wsAuthentification.php" );
        requeteHTTPAuthentification.send(new FormData(document.getElementById('authentification-form')));
        requeteHTTPAuthentification.addEventListener("load", (evt) => {
            if(evt.target.status === 200){
                alert('Bienvenue ' + evt.target.responseText + ' !')

                document.location.href="annonces.php";
            }
            else {
                alert('Mauvais email / mots de passe.')
            }
        });
    }

    const afficheDonnees = document.getElementById('affiche_donnees');
    if (afficheDonnees) {
        afficheDonnees.addEventListener('click', (event) => {
            event.preventDefault();
            getAnnonce();
            loadSuppButton();
        })
    }

    const nouvelleAnnonce = document.getElementById('nouvelle-annonce');
    if (nouvelleAnnonce) {
        nouvelleAnnonce.addEventListener('submit', (event) => {
            event.preventDefault();
            addAnnonce();
        })
    } 

    const rechercheAnnonce = document.getElementById("form-recherche");
    if (rechercheAnnonce) {
        rechercheAnnonce.addEventListener("submit", (evt) => {
            evt.preventDefault();
            search();
        })
    }

    const authentificationForm = document.getElementById('authentification-form');
    if (authentificationForm) {
        authentificationForm.addEventListener('submit', (evt) => {
            evt.preventDefault();

            authentification();
        })
    }

    loadSuppButton();

});


