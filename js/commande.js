
function afficherProduit(produit){
	var descriptionProduit=document.querySelector('#descriptionProduit');
	var imageProduit=document.querySelector('#imageProduit');
	
	
	<?php $produit[]=leProduit('Poulet');?>
	
	var imageProduit:'<?php echo $produit[0]; ?>';
	var descriptionProduit:'<?php echo $produit[1]; ?>';
	var prixProduit:'<?php echo $produit[2]; ?>';
	
	
	imageProduit.innerHTML='<img src ="'+imageProduit+'.jpg"/>';
	descriptionProduit.innerHTML=descriptionProduit+'<br>'+prixProduit+'€';
}