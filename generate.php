<?php
include ("template.php");
//Header('Content-Type :application/json');

function generate_key($i){

	
	$keyLength= 5;
	$str ="0123456789ABCDEFGHIJKLMNOPURSTVWXYZ";
	
	$RandStr = substr(str_shuffle($str),0,$keyLength);
	
	echo 'randstr'.$RandStr;
	$KeyText=$RandStr;
	$nbr=0;

	while ($nbr < 4){

		$RandStr = substr(str_shuffle($str),0,$keyLength);
		$KeyText=$KeyText.'-'.$RandStr;
		$nbr++;
	}

	
	$keyName='Key'. $i;
	// echo $KeyName;


	return $KeyArray = array('keyname' => $keyName, 'keytext' => $KeyText );
}

	
/*$reponse = $pdo->query('SELECT * FROM licenceKey');
var_dump($reponse);
*/
	$rep= $pdo->query('SELECT KeyId FROM licenceKey ORDER BY KeyId DESC');
	
	if($rep){
		$donnee=$rep->fetch();
		//echo $donnee['KeyId'].'le id le plus grand </br>';
		$KeyArray=generate_key($donnee['KeyId']+1);
	}else{
		//echo 'aucune entrée </br>';
		$KeyArray=generate_key(0);
	}
	
	
	
	$req=$pdo->prepare('INSERT INTO licenceKey(KeyId, KeyName, KeyText) VALUES(:keyid, :keyname, :keytext)');
	$req->execute(array(
		'keyid'=>null,
		'keyname' => $KeyArray['keyname'],
		'keytext' => $KeyArray['keytext'],
		));
	$success=true;
	$msg='votre clé ('.$KeyArray['keyname'].') à bien été crée et ajouter à la base de donnée </br>' ;
	echo $msg;
	
	reponse_json($success, $KeyArray, $msg);				