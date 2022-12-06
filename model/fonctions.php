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
				session_unset();
				break;
			default:
				$msg='';
				break;
		}
		return $msg;
	}
}

function TVA($montantHT){
	$tauxTVA=20;
	return $montantHT*($tauxTVA/100);
}
?>