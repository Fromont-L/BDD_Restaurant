<?php
	//Démarrage de la session
	session_start();

	//Est-ce que l'id existe et est-ce qu'elle n'est pas vide ?
	if(isset($_GET['ID']) && !empty($_GET['ID'])){
		require_once('connect.php');

		//Nettoyer l'id envoyé
		$ID = strip_tags($_GET['ID']);

		//Déclarer les variables
		$sql = 'SELECT * FROM `utilisateur` WHERE `ID` = :ID;';
		$sql2 = 'SELECT * FROM `telephone` WHERE `IDTel` = :IDTel;';
		$sql3 = 'SELECT * FROM `qrcode` WHERE `IDQRCODE` = :IDQRCODE;';
		$sql4 = 'SELECT * FROM `tableResto` WHERE `NumTable` = :NumTable;';

		//Préparer la requête
		$query = $db->prepare($sql);

		//Accrocher les paramètres
		$query->bindValue(':ID', $ID, PDO::PARAM_INT);

		//Exécuter la requête
		$query->execute();

		//Récupération du produit
		$utilisateur = $query->fetch();

		//Vérification (si le produit existe)
		if(!$utilisateur){
			$_SESSION['erreur'] = "Cet ID n'existe pas";
			header('Location: Atable.php');
		}

		}else{
			$_SESSION['erreur'] = "URL Invalide";
			header('Location: Atable.php');
		}

		$value='current_value';
		$value=$value++;
		header("details.php?ID=" . $value);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content="CRUD du brief A Table !"/>
	<meta name="author" content="Lucas Fromont"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>Détails de l'élément</title>

</head>

<body>
	<main class="container">
		<div class="row">
			<section class="col-12">
				<h1>Détails de l'élément <?= $utilisateur['ID'] ?> </h1>
				<p>ID : <?= $utilisateur['ID']?> </p>
				<p>Nom : <?= $utilisateur['Nom']?> </p>
				<p>Prenom : <?= $utilisateur['Prenom']?> </p>
				<p>IDTel : <?= $utilisateur['IDTel']?> </p>
				<!-- Une bonne idée mais c'est pas joli dans le code :( Je trouverai un meilleur moyen
				<form action="details.php?ID=1">
					<input type="submit" name="ID" value="1">
					<input type="submit" name="ID" value="2">
					<input type="submit" name="ID" value="3">
					<input type="submit" name="ID" value="4">
					<input type="submit" name="ID" value="5">
					<input type="submit" name="ID" value="6">
					<input type="submit" name="ID" value="7">
					<input type="submit" name="ID" value="8">
					<input type="submit" name="ID" value="9">
					<input type="submit" name="ID" value="10">
					<input type="submit" name="ID" value="11">
					<input type="submit" name="ID" value="12">
					<input type="submit" name="ID" value="13">
					<input type="submit" name="ID" value="14">
					<input type="submit" name="ID" value="15">
					<input type="submit" name="ID" value="16">
					<input type="submit" name="ID" value="17">
					<input type="submit" name="ID" value="18">
					<input type="submit" name="ID" value="19">
					<input type="submit" name="ID" value="20">
					<input type="submit" name="ID" value="21">
				</form>
				-->
				<p><a href="Atable.php" class="btn btn-secondary">Retour</a>
					<a href="edit.php?id=<?= $utilisateur['ID']?>" class="btn btn-warning">Modifier</a></p>
			</section>
		</div>
	</main>

</body>

</html>