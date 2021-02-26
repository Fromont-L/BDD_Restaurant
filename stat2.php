<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content="CRUD du brief A Table !"/>
	<meta name="author" content="Lucas Fromont"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>Statistiques À table !</title>
</head>
<body>

	<nav class="navbar navbar-expand navbar-dark">
		<div id="navbar-nav" class="collapse navbar-collapse justify-content-center">
			<ul class="navbar-nav">
				<li><a href="Atable.php" class="btn btn-success">Voir toute la BDD</a></li>
				<li><a href="add.php" class="btn btn-primary">Ajouter des infos à la BDD</a></li>
				<li><a href="modif.php" class="btn btn-warning">Modifier des infos à la BDD</a></li>
				<li><a href="killbase.php" class="btn btn-danger" OnClick="return confirm('Are you sure about that ?');">Supprimer la BDD</a></li>
			</ul>
		</div>
	</nav>

	<?php

	//Connexion à la base de données

	//Instanciation d'un objet PDO pour créer une connexion à la base de données
	$bddPDO = new PDO('mysql:host=localhost;dbname=BriefATable', 'fromont', 'password');
	$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$requete = "SELECT DISTINCT utilisateur.Prenom, utilisateur.Nom, tableResto.NumTable, qrcode.Dates
				FROM utilisateur
				INNER JOIN telephone ON utilisateur.IDTel = telephone.IDTel
				INNER JOIN qrcode ON telephone.NomQRCODE = qrcode.NomQRCODE
				INNER JOIN tableResto ON qrcode.NumTable = tableResto.NumTable";

	$requete2 = "SELECT DISTINCT tableResto.NumTable, COUNT(qrcode.NumTable)
				FROM tableResto
				INNER JOIN qrcode ON tableResto.NumTable = qrcode.NumTable
				GROUP BY NumTable
				ORDER BY NumTable";


	$result = $bddPDO->query($requete);

	$result2 = $bddPDO->query($requete2);


	if (!$result){
		echo "La récupération des données a rencontré un problème";
	} else {
		$nombre = $result->rowCount();
	

	?>

	<main class="container">
		<h1 class="d-flex justify-content-center mx-2 my-2">Ce qu'il faut savoir :</h1>
		<!--<h2 class="d-flex justify-content-center mx-2 my-2">Il y a <?=$nombre?> éléments</h2>-->
		<h2>Liste de personnes ayant mangé à une table à la date et l'heure précise</h2>
		<table class="table">
			<tr>
				<th>Prénom</th>
				<th>Nom</th>
				<th>N° de Table</th>
				<th>Date</th>
			</tr>

			<?php

			while($ligne = $result->fetch(PDO::FETCH_NUM)){
				echo "<tr>";
				foreach ($ligne as $valeur) {
					echo "<td>$valeur</td>";
				}

				echo "</tr>";

			}

			?>

		</table>

		<?php

			$result->closeCursor();
		}
		?>

		<?php

		if (!$result2){
			echo "La récupération des données a rencontré un problème";
		} else {
			$nombre = $result2->rowCount();

		?>

		<h2>La table la plus utilisée du restaurant</h2>
		<table class="table">
			<tr>
				<th>Numéro de la table</th>
				<th>Nombre d'utilisation</th>
			</tr>

			<?php

			while($ligne = $result2->fetch(PDO::FETCH_NUM)){
				echo "<tr>";
				foreach ($ligne as $valeur) {
					echo "<td>$valeur</td>";
				}

				echo "</tr>";

			}

			?>

		</table>

		<?php

			$result->closeCursor();
		}
		?>





	</main>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>