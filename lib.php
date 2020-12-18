<?php

function getAnnonces() {
    // connexion à la base de données SQL
	$pdo = new PDO('sqlite:annonces.db');
    // requête de sélection de la loutre ayant l'identifiant $id (colonne "id")
	$requeteSQL = "SELECT * FROM annonces ";
    // exécution de la requête
	$stm = $pdo->query($requeteSQL);
    // récupération du résultat
	$annonces = $stm->fetchAll();

	return $annonces;
}



function getAnnoncesByName($titre) {
    // connexion à la base de données SQL
	$pdo = new PDO('sqlite:annonces.db');
    // requête de sélection de la loutre ayant l'identifiant $id (colonne "id")
	$requeteSQL = "SELECT * FROM annonces WHERE titre LIKE '%" . $titre . "%'";

    // exécution de la requête
	$stm = $pdo->query($requeteSQL);
    // récupération du résultat
	$annonces = $stm->fetchAll();

	return $annonces;
}





function getAnnonceById($id) {

    // connexion à la base de données SQL
	$pdo = new PDO('sqlite:annonces.db');
    // requête de sélection de la loutre ayant l'identifiant $id (colonne "id")
	$requeteSQL = "SELECT * FROM annonces WHERE id=" . $id;
    // exécution de la requête
	$stm = $pdo->query($requeteSQL);
    // récupération du résultat
	$infosAnnonce = $stm->fetch(PDO::FETCH_ASSOC);

	return $infosAnnonce;
}

function addAnnonce($infosAnnonce){
	 // connexion à la base de données SQL
	$pdo = new PDO('sqlite:annonces.db');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // requête d'insertion de données; l'identifiant est automatique si on ne le fournit pas
	$requeteSQL = "INSERT INTO annonces (titre,categorie,description,photo) VALUES(:titre,:categorie,:description,:photo)";
    // exécution de la requête
	$stmt = $pdo->prepare($requeteSQL);
    // $stmt->debugDumpParams();
	return $stmt->execute($infosAnnonce);

}

function suppAnnonce($id){
	 // connexion à la base de données SQL
	$pdo = new PDO('sqlite:annonces.db');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // requête d'insertion de données; l'identifiant est automatique si on ne le fournit pas
	$requeteSQL = "DELETE FROM annonces WHERE id=:id";
    // exécution de la requête
	$stmt = $pdo->prepare($requeteSQL);
    // $stmt->debugDumpParams();
	return $stmt->execute(['id' => $id]);

}


function getUser($email, $password){
    // connexion à la base de données SQL
	$pdo = new PDO('sqlite:annonces.db');
    // requête de sélection de la loutre ayant l'identifiant $id (colonne "id")
	$requeteSQL = "SELECT * FROM users WHERE email=:email AND password=:password";
    // exécution de la requête
	$stmt = $pdo->prepare($requeteSQL);
	$stmt->execute(['email' => $email, 'password' => $password]);
    // récupération du résultat
	return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserConnected(){
	if(session_status() !== PHP_SESSION_ACTIVE){
		session_start();
	}

	return $_SESSION['user'] ?? null;
}


?>