<?php
require('model/fonctions.php');
if(isset($_POST['connexion'])){
	$mail=($_POST['mail']);
	$motDePasse=($_POST['motDePasse']);
	$verification=connexionClient($mail,$motDePasse);
	if($verification){
		$msg='conReussie';
		session_start();
		$clientConnecte= new Client (null,null,null,null,null,null,null,null,null,null);
		$clientConnecte->getClientIdNameByMail($mail);
		$_SESSION["id"] = $clientConnecte->getIdClient();
		$_SESSION["nom"] = $clientConnecte->getPrenomClient().' '.$clientConnecte->getNomClient();
		 header("Location:controller/reservationTable.php?msg=$msg");
	}else{
		$msg='conEchoue';		
		header("Location:index.php?msg=$msg");
	}
}
include('view/formulaireDeConnexion.phtml');
?>

					
