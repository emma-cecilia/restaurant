<?php
function connexionClient($mail, $motDePasse){
	require('model/client.php');
	$monClient = new Client(null,null,null,null,null,null,null,null,null,null);
	$monClient->getClientByMail($mail);
	if(!empty($monClient->getIdClient())){
		if($monClient->getMotDePasse()==$motDePasse){
			return true;			
		} else{
			return false;
			// return $message='ce mot de passe est incorrect';
		}
	}else{
		return false;
		// return $message='ce mail nexiste pas';
	}
}
function lireMessage(){
	if(isset($_GET['msg'])){
		switch($_GET['msg']){
			case 'conReussie':
				$msg='la connexion a reussie';
				break;
			case 'creationReussie':
				$msg='votre compte a bien été crée';
				break;
			case 'creationEchouee':
				$msg='Erreur à la creation du compte';
				break;
			case 'conEchoue':
				$msg='la connexion a echoue';
				break;
			case 'deconnecte':
				$msg='déconnection réussie';
				break;
			default:
				$msg='';
				break;
		}
		return $msg;
	}
}

function reserverTable($dateHeure, $nombreCouvert, $idClient){
	require('TableRestaurant.php');
	require('reserver.php');
	
	$numTable=0;$reservable=false;
	$msg='pasDeTableDispo';
	while($numTable<3 and !$reservable){
		$maTable = new TableRestaurant(NULL, NULL);
		$maTable->getTableRestaurantByMaxCouvert($nombreCouvert,$numTable);
		
		$maReservation = new reserver(NULL, NULL, NULL, NULL);
		$maReservation->getReserverByDate($dateHeure);
		if($maReservation->getIdTableRestaurant()==$maTable->getIdTableRestaurant()){
			$reservable=false;
			$numTable+=1;
			// return $msg='cette table est déjà occupée à cette date';
		}else{
				$reservable=true;
				$laReservation = new reserver($idClient,$maTable->getIdTableRestaurant, $dateHeure, $nombreCouvert);
				//$laReservation->setReserverBDD();
				$msg='reservationReussie';
		}
	}
	return $msg;


}
?>