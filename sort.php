<?php
include('template.php');
//Header('Content-Type :application/json');
$msg='';

	//requete pour récupérer tous les clé et les trié par date de creation
	$requete = $pdo->prepare('SELECT * FROM licenceKey ORDER BY KeyDate');


if( $requete->execute() ) {
	//on récupérer les résultats dans un array
	$resultats = $requete->fetchALL(PDO::FETCH_ASSOC);
	//var_dump($resultats);
	print_r($resultats);

	$success = true;
	//calcule de nombre de ligne retourné
	$data['Nombre de cle'] = empty($resultats)? 0 : count($resultats);

	$data['Cles'] = $resultats;
	
	//personalisation du message selon le resultat
	$msg='Voici la liste des clés trié par date de creation.';
	if ($data['Nombre de cle']==0){$msg= "il n'ya aucune clé dans la base de données!";}

} else {

	$msg = "Une erreur s'est produite";
}


reponse_json($success, $data, $msg);