<?php
include('template.php');
//Header('Content-Type :application/json');
$data='';
if( !empty($_POST['keyid']) ){

	//Si le client a saisis un keyid
	$requete = $pdo->prepare('DELETE FROM licenceKey WHERE  KeyId= :id');
	$requete->bindParam(':id', $_POST['keyid']);

	if( $requete->execute() ){
		$success = true;
		$msg = 'La Clé (Key'.$_POST['keyid'].') est supprimé';
		//echo $msg;

	} else {
		$msg = "Une erreur s'est produite";
		//echo $msg;	}

	}
} 	else {
	$msg = "Il manque des informations";
	//echo $msg;
	}

reponse_json($success, $data, $msg);