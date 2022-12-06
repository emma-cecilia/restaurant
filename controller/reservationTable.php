<?php
require('../model/connectDatabase.php');
require('../model/fonctions.php');
require('../model/reserver.php');
session_start();
$bdd=connectDatabase();
if(!isset($_SESSION['id']) or !isset($_GET['msg']) or !$_GET['msg']=='conReussie'){header("Location:../index.php");}
if(isset($_POST['confirmer'])){
	$dateHeure=($_POST['dateReservation']).' '.($_POST['heureReservation']).':'.($_POST['minuteReservation']).':00';
	$nombreCouvert=($_POST['nombreCouvert']);
	$idClient=$_SESSION["id"];
	unset($_SESSION['panier']);
	$_SESSION['panier']=array(null,null);
	unset($_SESSION['quantitePanier']);
	$_SESSION['quantitePanier']=array(null,null);

	$requete = $bdd->prepare("
		SELECT tablerestaurant.idTableRestaurant AS id,reserver.dateReservation
		FROM reserver
		RIGHT JOIN tablerestaurant ON reserver.idTableRestaurant=tablerestaurant.idTableRestaurant
		WHERE not dateReservation=:dateHeure
	");
		$requete->execute(array(':dateHeure'=>$dateHeure));
		$resultat=$requete->fetch() 	;
		$idTableRestaurant=$resultat['id'];
		
		$requete = $bdd->prepare("INSERT INTO reserver
							VALUES(null,:idClient,:idTableRestaurant,:dateReservation,:nombreCouvert)");
		$retour=$requete->execute(array(
		':idClient'=>$idClient,
		':idTableRestaurant'=>$idTableRestaurant,
		':dateReservation'=>$dateHeure,
		':nombreCouvert'=>$nombreCouvert));
	
	if($retour){
		echo'<p>Votre réservation a bien été enregistré.<br>Merci de cliquer sur  commander, pour effectuer une commande.</p>';
	}else{
		echo'erreur requete ';		
	}

}
include('../view/reservationTable.phtml');
?>