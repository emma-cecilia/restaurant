<?php 
require('model/connectDatabase.php');
// session_unset();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>RESTAURANT</title>
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/habillage.css">
	</head>	
	<body>
		<div>
			<div class="logo">
				<h1>RESTAURANT CONGO BOLINGO</h1>
				<h2>DE l'ÎLE MBAMOU</h2>
				<hr>
				<a href="index.php"><img  src ="images/logo.jpg"/></a>
			</div>
			<div class="bouton">
				<a href="controller/creationDeCompte.php">creer compte</a>
			</div>
			<?php include('controller/formulaireDeConnexion.php');?>
			<table class="menu">
				<tr><th colspan="4">Carte du restaurant</th></tr>
				<tr>
					<th><img src ="images/menu.png"/ width="75px"></th>
					<th>Titre produit et Description</th>
					<th>Prix</th>
				</tr>
			</table>
			<div class="scroll">
				<table class="menu">
					<?php include('controller/carteDuRestaurant.php');?>
				</table>
			</div>
		</div>
	</body>
	
</html>
