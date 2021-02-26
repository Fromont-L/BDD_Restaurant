<?php

	//Code complet pour la création d'une base de données
	
	$servername = "localhost";
	$username = "fromont";
	$password = "password";

	//Création de la connexion
	$conn = new mysqli($servername, $username, $password);

	//Vérification de la connexion
	if ($conn->connect_error){
		die("Echec de la connexion : " . $conn->connect_error);
	}

	//Création de la base de donnée
	$sql = "CREATE DATABASE BriefATable";
	if ($conn->query($sql) === TRUE) {
		echo "Base de données créée avec succès ! ";
	} else {
		echo "Erreur dans la création de la base de données... : " . $conn->error;
	}
	

	//Code complet pour la création d'une table dans une base de données
	
	//Déclarer les variables
	$servername = "localhost";
	$username = "fromont";
	$password = "password";
	$dbname = "BriefATable";

	//Création de la connexion
	$conn = new mysqli($servername, $username, $password, $dbname);

	//Vérification de la connexion
	if ($conn->connect_error) {
		die("Echec de la connexion : " . $conn->connect_error);
	}

	//Remplace tous les $sql
	$sql = file_get_contents('file.sql');
	/*
	
	//J'ai remplacé tout par un file.sql pour que ce soit plus propre

	//Création de la table "utilisateur" en PHP
	$sql = "CREATE TABLE utilisateur (
	ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	Nom VARCHAR(50) NOT NULL,
	Prenom VARCHAR(50) NOT NULL,
	IDTel INT(10) NOT NULL);";

	//Création de la table "telephone" en PHP
	$sql .= "CREATE TABLE telephone (
	IDTel INT(10) NOT NULL,
	MarqueTel VARCHAR(50) NOT NULL,
	LangueTel VARCHAR(50) NOT NULL,
	NomQRCODE VARCHAR(50) NOT NULL);";

	//Création de la table "qrcode" en PHP
	$sql .= "CREATE TABLE qrcode (
	NomQRCODE VARCHAR(50) NOT NULL,
	URLQRCODE VARCHAR(50) NOT NULL,
	NumTable INT(3) NOT NULL,
	Dates DATETIME(0000-00-00 00:00:00) NOT NULL);";

	//Création de la table "tableResto" en PHP
	$sql .= "CREATE TABLE tableResto (
	NumTable INT(3) NOT NULL,
	NombreChaises INT(3) NOT NULL,
	Exposition ENUM('Soleil', 'Ombre') NOT NULL,
	Lieu ENUM('Intérieur', 'Terrasse') NOT NULL);";
	
	//Vérification sur la création / message d'erreur
	if ($conn->multi_query($sql) === TRUE) {
		echo "<br/>Table utilisateur créée avec succès !";
	} else {
		echo "<br/>Erreur pour la création de la table... : " . $conn->error;
	}
	
	
	//Code complet pour ajouter des valeurs dans une table

	$servername = "localhost";
	$username = "fromont";
	$password = "password";
	$dbname = "BriefATable";

	//Création de la connexion
	$conn = new mysqli($servername, $username, $password, $dbname);

	//Vérification de la connexion
	if ($conn->connect_error) {
		die("Echec de la connexion : " . $conn->connect_error);
	}
	*/
	/*
	//Ajout de données dans la table "utilisateur" en SQL
	$sql = "INSERT INTO utilisateur (Nom, Prenom, IDTel)
	VALUES ('Palette', 'Jacky', '1234567890');
	";
	//Ajouts multiples dans la table "utilisateur" en SQL
	$sql .= "INSERT INTO utilisateur (Nom, Prenom, IDTel)
	VALUES ('Drucker', 'Michel', '1112131415');";
	$sql .= "INSERT INTO utilisateur (Nom, Prenom, IDTel)
	VALUES ('Phat', 'Danny', '1314151617');";
	$sql .= "INSERT INTO utilisateur (Nom, Prenom, IDTel)
	VALUES ('The', 'Kairi', '7878787878');";
	$sql .= "INSERT INTO utilisateur (Nom, Prenom, IDTel)
	VALUES ('Paletti', 'Yacki', '12');";
	*/



	//Ajout des clés pour les colonnes des tables


	//Vérification sur la création / message d'erreur
	if ($conn->multi_query($sql) === TRUE) {
		//Code pour voir le numéro du dernier ID
		$last_id = $conn->insert_id;
		echo " <br/>L'ajout des valeurs dans la table est un succès total ! Le dernier ID inséré est : " . $last_id;
	} else {
		echo "<br/>Erreur... et oui : " . $sql . "<br/>" . $conn->error;
	}

	//Pour fermer la connexion (à écrire uniquement à la fin !)
	$conn->close();

?>