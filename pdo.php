  
<?php

try {
	//On test la connexion à la base de donnée
    $pdo = new PDO('mysql:localhost;dbname=key_gnerator;', 'root', '');

} catch(Exception $e) {
	//Si la connexion n'est pas établie, on stop le chargement de la page.
	reponse_json($success, $data, 'Echec de la connexion à la base de données');
    exit();
}

?>