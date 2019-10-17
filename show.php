<?php
include('template.php');
//Header('Content-Type :application/json');
$msg='';
if( !empty($_POST['keyid']) ){
	//Si le client a saisi un Nom de clé , on filtre les données via MySQL
	$requete = $pdo->prepare('SELECT * FROM licenceKey WHERE KeyId= :keyid');
	$requete->bindParam(':keyid', $_POST['keyid']);

} else {
	$msg = "La Clé que vous recherchez n'existe pas dans la base de donnees";
	echo $msg;
	//Sinon on affiche tous les Clés
	$requete = $pdo->prepare('SELECT * FROM licenceKey');
}


if( $requete->execute() ){
	//on récupérer les résultats dans un array
	$resultats = $requete->fetchALL(PDO::FETCH_ASSOC);
	//var_dump($resultats);
	print_r($resultats);

	$success = true;
	//calcule de nombre de ligne retourné
	$data['Nombre de cle'] = empty($resultats)? 0 : count($resultats);

	$data['Cles'] = $resultats;
	
	//personalisation du message selon le resultat
	$msg='Voici la liste des clés enregistré dans la base de données.';
	if ($data['Nombre de cle']==0){$msg= "il n'ya aucune clé dans la base de données!";}
	if ($data['Nombre de cle']==1){$msg= "Voici la clé que vous avez demander";}
} else {

	$msg = "Une erreur s'est produite";
}


reponse_json($success, $data, $msg);