<?php
require('../model/connectDatabase.php');
require('../model/fonctions.php');
require('../model/produit.php');
session_start();

if(isset($_GET['first'])){
	$_SESSION['panier']=array();
	$_SESSION['quantitePanier']=array();
}else{
	$panier=$_SESSION["panier"];
	$quantitePanier=$_SESSION["quantitePanier"];
	if(isset($_POST['ajouter'])){
		$monProduit=new Produit(null,null,null,null,null);
		$monProduit->getProduitById($_POST['idProduit']);
		$quantitePanier[]=$_POST['quantite'];
		// array_unshift($panier,$monProduit);
		$panier[]=$monProduit;
		$_SESSION["panier"]=$panier;
		$_SESSION["quantitePanier"]=$quantitePanier;
	}
	// echo $panier[0]->getNomProduit();
	// echo'<br>';
	// echo$quantitePanier[0];
}

$bdd=connectDatabase();

$stmt = $bdd->query('SELECT * FROM produit');
	$tabProduit=array();
	// $tabIdProduit=array();

	while($message = $stmt->fetch()){
		$idProduit=$message['idProduit'];
		$tabProduit["$idProduit"]=$message['nomProduit'];
	}

	//Gestion du Panier

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Commander</title>
		<link rel="stylesheet" type="text/css" href="css/">	
	</head>
<body>
	<h2>Passer une commande</h2>
		<form action="formulaireDeCommande.php" method="POST">
			<fieldset><legend>Ajouter un article</legend>
				<table>
					<tr>
						<td><label>Nom produit :</label></td>
						<td>
							<select name="idProduit">
								<?php foreach ($tabProduit as $index=>$leProduit){
									echo '<option value="'.$index.'"><a href="formulaireDeCommande.php?nomProduit='.$index.'">'.$leProduit.'</a></option>';
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>	
							<table border="1px solid">
								<tr>
									<th id="imageProduit"><img src ="<?php //if(isset($_GET['nomProduit'])){echo '../images/meals/'.$tabImageProduit[$_GET['nomProduit']];} ?>"/></th>
									<th id="descriptionProduit">Description<br>Prix:3€</th>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>Quantité</td>
						<td><input type="number" min="1" name="quantite" required/></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="ajouter" value="Ajouter"/></td>
					</tr>
				</table>
			</form>
			</fieldset>
			<fieldset><legend>Récapitulatif de la commande</legend>
			<form>
				<table>
					<tr>
						<th>Quantité</th>
						<th>Produit</th>
						<th>P.U</th>
						<th>Total</th>
						<th>Poubelle</th>
					</tr>
					<tr>
					
						<?php 
						$panier=$_SESSION["panier"];
						foreach ($panier as $monPanier){
							echo '<td>'.$monPanier->getNomProduit().'</td>';
							echo '<td>'.$monPanier->getPrixProduit().'</td>';
							echo '<td>'.$monPanier->getPrixProduit().'</td>';
							echo '<td><a href="formulaireDeCommande.php?id='.$monPanier->getIdProduit().'"></a></td>';
						}?>
					</tr>
				</table>
				<input type="submit" name="valider" value="Valider la commande" />
				<a href="reservationTable.php?msg=commandeAnnuler">Annuler</a>
			</fieldset>
		</form>
<script src="../js/commande.js"></script>
</body>
</html>