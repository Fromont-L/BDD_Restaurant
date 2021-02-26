<?php
	//Démarrage de la session
	session_start();

	//Est-ce que l'id existe et est-ce qu'elle n'est pas vide ?
	if(isset($_GET['NumTable']) && !empty($_GET['NumTable'])){
		require_once('connect.php');

		//Nettoyer l'id envoyé
		$NumTable = strip_tags($_GET['NumTable']);

		//Déclarer les variables
		$sql = 'SELECT * FROM `tableResto` WHERE `NumTable` = :NumTable;';

		//Préparer la requête
		$query = $db->prepare($sql);

		//Accrocher les paramètres
		$query->bindValue(':NumTable', $NumTable, PDO::PARAM_INT);

		//Exécuter la requête
		$query->execute();

		//Récupération du produit
		$tableResto = $query->fetch();

		//Vérification (si le produit existe)
		if(!$tableResto){
			$_SESSION['erreur'] = "Ce numéro de table n'existe pas";
			header('Location: Atable.php');
		}

		}else{
			$_SESSION['erreur'] = "URL Invalide";
			header('Location: Atable.php');
		}

		$value='current_value';
		$value=$value++;
		header("details.php?NumTable=" . $value);
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
				<h1>Détails de l'élément <?= $tableResto['NumTable'] ?> </h1>
				<p>Numéro de table : <?= $tableResto['NumTable']?> </p>
				<p>Nombre de chaises : <?= $tableResto['NombreChaises']?> </p>
				<p>Exposition : <?= $tableResto['Exposition']?> </p>
				<p>Lieu : <?= $tableResto['Lieu']?> </p>
				<p><a href="Atable.php" class="btn btn-secondary">Retour</a>
					<a href="edit.php?id=<?= $tableResto['NumTable']?>" class="btn btn-warning">Modifier</a></p>
			</section>
		</div>
	</main>

</body>

</html>