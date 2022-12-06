<?php
require('../model/connectDatabase.php');
require('../model/fonctions.php');
require('../model/produit.php');
require('../model/produitCommande.php');
require('../model/produitPanier.php');
session_start();

if(isset($_GET['first'])){
	$_SESSION['panier']=array();
}
else{
	$panier=$_SESSION["panier"];
	if(isset($_POST['ajouter'])){
		$monProduit=new Produit(null,null,null,null,null);
		$monProduit->getProduitById($_POST['idProduit']);
		$quantitePanier=$_POST['quantite'];
		$monProduitPanier= new ProduitPanier($monProduit,$quantitePanier);
		// array_unshift($panier,$monProduit);
		$panier[]=$monProduitPanier;
		$_SESSION["panier"]=$panier;
	}
	if(isset($_POST['valider'])){
		$panier=$_SESSION["panier"];
		$laCommande= new Commande(null,date("d-m-Y"),$_SESSION["id"]);
		$idCommande=$laCommande-> getIdCommande();
		if(!$laCommande-> setCommandeBDD()){echo'erreur commande';};
		foreach ($panier as $monPanier){
			$quantite=$monPanier->getQuantite();
			$idProduit=$monProduit=$monPanier->getProduit();
			$leProduitCommande= new ProduitCommande($idCommande,$idProduit,$quantite);
		}
	}
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
						<td>Quantite</td>
						<td><input type="number" min="1" name="quantite" required/></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="ajouter" value="Ajouter"/></td>
					</tr>
				</table>
			</form>
			</fieldset>
			<fieldset><legend>Recapitulatif de la commande</legend>
			<form action="" method="POST">
				<table>
					<tr>
						<th>Quantite</th>
						<th>Produit</th>
						<th>P.U</th>
						<th>Total</th>
						<th>Poubelle</th>
					</tr>
					<tr>
					
						<?php 
						$panier=$_SESSION["panier"];
						foreach ($panier as $monPanier){
							$quantite=$monPanier->getQuantite();
							$monProduit=$monPanier->getProduit();
							echo '<td>'.$quantite.'</td>';
							echo '<td>'.$monProduit->getNomProduit().'</td>';
							echo '<td>'.$monProduit->getPrixProduit().'</td>';
							echo '<td>'.($monProduit->getPrixProduit())*$quantite.'</td>';
							echo '<td><a href="formulaireDeCommande.php?id='.$monProduit->getIdProduit().'"></a></td>';
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