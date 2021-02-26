<?php
	//Démarrage de la session
	session_start();

	//Inclure la connexion à la base
	require_once('connect.php');

	//Déclarer les variables
	$sql = 'SELECT * FROM `utilisateur`';
	$sql2 = 'SELECT * FROM `telephone`';
	$sql3 = 'SELECT * FROM `qrcode`';
	$sql4 = 'SELECT * FROM `tableResto`';


	//Préparer la requête $sql
	$query = $db->prepare($sql);

	//Exécution de la requête sql
	$query->execute();

	//Stocker les resultats dans la base de données (result)
	$result = $query->fetchAll(PDO::FETCH_ASSOC);


	//Préparer la requête $sql2
	$query = $db->prepare($sql2);

	//Exécution de la requête $sql2
	$query->execute();

	//Stocker les resultats dans la base de données (result2)
	$result2 = $query->fetchAll(PDO::FETCH_ASSOC);


	//Préparer la requête $sql3
	$query = $db->prepare($sql3);

	//Exécution de la requête $sql3
	$query->execute();

	//Stocker les resultats dans la base de données (result3)
	$result3 = $query->fetchAll(PDO::FETCH_ASSOC);


	//Préparer la requête $sql4
	$query = $db->prepare($sql4);

	//Exécution de la requête $sql4
	$query->execute();

	//Stocker les resultats dans la base de données (result4)
	$result4 = $query->fetchAll(PDO::FETCH_ASSOC);


	require_once('close.php');
?>
<!DOCTYPE html>
<html lang=fr>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<meta name="description" content="CRUD du brief A Table !"/>
	<meta name="author" content="Lucas Fromont"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<title>À table !</title>

</head>

<body>
	<nav class="navbar navbar-expand navbar-dark">
		<div id="navbar-nav" class="collapse navbar-collapse justify-content-center">
			<ul class="navbar-nav">
				<li><a href="stat2.php" class="btn btn-success">Voir statistiques de la BDD</a></li>
				<li><a href="add.php" class="btn btn-primary">Ajouter des infos à la BDD</a></li>
				<li><a href="modif.php" class="btn btn-warning">Modifier des infos à la BDD</a></li>
				<li><a href="killbase.php" class="btn btn-danger" OnClick="return confirm('Are you sure about that ?');">Supprimer la BDD</a></li>
			</ul>
		</div>
	</nav>
	<main class="container">
		<h1 class="d-flex justify-content-center mx-2 my-2">À Table !</h1>
		<!--Première liste-->
		<div class="row">
			<section class="col-12">
				<?php
					if(!empty($_SESSION['erreur'])){
						echo '<div class="alert alert-danger" role="alert">' . $_SESSION['erreur'] . '</div>';
						$_SESSION['erreur'] = "";
					}
				?>
				<h2>Liste Utilisateur</h2>
				<table class="table">
					<thead>
						<th>ID</th>
						<th>Nom</th>
						<th>Prénom</th>
						<th>ID Téléphone</th>
						<th>Info sup.</th>
					</thead>
					<tbody>
						<?php
							foreach ($result as $utilisateur){
						?>
							<tr>
								<td><?= $utilisateur['ID']?></td>
								<td><?= $utilisateur['Nom']?></td>
								<td><?= $utilisateur['Prenom']?></td>
								<td><?= $utilisateur['IDTel']?></td>
								<td><a href="details.php?ID=<?= $utilisateur['ID']?>">Voir</a></td>
							</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</section>
		</div>
		<!--Deuxième liste-->
		<div class="row">
			<section class="col-12">
				<h2>Liste Téléphone</h2>
				<table class="table">
					<thead>
						<th>Marque du Téléphone</th>
						<th>Langue du Téléphone</th>
						<th>ID Téléphone</th>
						<th>Nom du QR CODE</th>
					</thead>
					<tbody>
						<?php
							foreach ($result2 as $telephone){
						?>
							<tr>
								<td><?= $telephone['IDTel']?></td>
								<td><?= $telephone['MarqueTel']?></td>
								<td><?= $telephone['LangueTel']?></td>
								<td><?= $telephone['NomQRCODE']?></td>
								<td><a href="details_tel.php?IDTel=<?= $telephone['IDTel']?>">Voir</a></td>
							</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</section>
		</div>
		<!--Troisième liste-->

		<div class="row">
			<section class="col-12">
				<h2>Liste QR CODE</h2>
				<table class="table">
					<thead>
						<th>ID du QR CODE</th>
						<th>Nom du QR CODE</th>
						<th>URL du QR CODE</th>
						<th>Numéro de la Table</th>
						<th>Date de Flashing</th>
					</thead>
					<tbody>
						<?php
							foreach ($result3 as $qrcode){
						?>
							<tr>
								<td><?= $qrcode['IDQRCODE']?></td>
								<td><?= $qrcode['NomQRCODE']?></td>
								<td><?= $qrcode['URLQRCODE']?></td>
								<td><?= $qrcode['NumTable']?></td>
								<td><?= $qrcode['Dates']?></td>
								<td><a href="details_qrcode.php?IDQRCODE=<?= $qrcode['IDQRCODE']?>">Voir</a></td>
							</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</section>
		</div>
		<!--Quatrième liste-->
		<div class="row">
			<section class="col-12">
				<h2>Liste Des Tables</h2>
				<table class="table">
					<thead>						
						<th>Numéro de la Table</th>
						<th>Nombre de Chaises</th>
						<th>Exposition Soleil/Ombre</th>
						<th>Lieu ou se trouve la Table</th>
					</thead>
					<tbody>
						<?php
							foreach ($result4 as $tableResto){
						?>
							<tr>
								<td><?= $tableResto['NumTable']?></td>
								<td><?= $tableResto['NombreChaises']?></td>
								<td><?= $tableResto['Exposition']?></td>
								<td><?= $tableResto['Lieu']?></td>
								<td><a href="details_table.php?tableResto=<?= $tableResto['NumTable']?>">Voir</a></td>
							</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</section>
		</div>
		<!--Boutons
		<h2>Options</h2>
		<div class="row">
			<section class="col-12">
				<a href="add.php" class="btn btn-primary">Ajouter des infos à la BDD</a>
				<a href="modif.php" class="btn btn-warning">Modifier des infos à la BDD</a>
				<a href="killbase.php" class="btn btn-danger" OnClick="return confirm('Are you sure about that ?');">Supprimer la BDD</a>
			</section>
		</div>-->
	</main>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>