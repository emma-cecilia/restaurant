<?php
// require('model/connectDatabase.php');
// require('model/produit.php');

// $monProduit=new Produit(null,null,null,null);
$bdd=connectDatabase();
$produit = $bdd->query('SELECT * FROM produit');
while($monProduit=$produit->fetchObject()){
	echo'<tr>';
	echo'<td><img width="75px" height="75px" src="images/meals/'.$monProduit->imageProduit.'"/></td>';
	echo'<td>'.$monProduit->nomProduit.'<br>';
	echo $monProduit->descriptionProduit.'</td>';
	echo'<td class="prix">'.$monProduit->prixProduit.'</td>';
	echo'</tr>';
}
?>