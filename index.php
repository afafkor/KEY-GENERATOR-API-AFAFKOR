<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>test page</title>
<!-- css -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>

	<div class="container-fluid">
		<div class="container">
			
			<?php
			
				// include('generate.php');

			?>

			<div class='row'>
				<h1 class="container-fluid">Welcome to the Key Generator API</h1>
				
			</div>
			<div class="row">
				
				<article class="col-md-12">
					<h3>Commande de l'API KEY GENERATOR :</h3>
					<p>Welcome to the “Key Generator” app coding challenge. A key generator is a  program that generates a product licensing key. This is a coding challenge designed to test your production-level development skills using minimalistic specifications.</p>
					<p>

						<a href="generate.php" class="text-info">Générer des clés</a> </br>
						<a href="show.php" class="text-info">Affichage des clés crée</a> </br>
						<a href="sort.php" class="text-info">Affichage des clés crée trié par date de création</a> </br>
						<form method="POST" action="delete.php">
							<div class="form-group">
								<label for='keyiddelete'>Veuilez saisir le ID de la clé à supprimer
									<input class="form-control" id='keyiddelete' type="number" name="keyid">
								</label>
								<input type="submit" value="Supprimer" class="btn btn-primary mb-2">
							</div>
						</form>

						<form method="POST" action="show.php">
							<div class="form-group">
								<label for='keyidshow'>Veuilez saisir le ID de la clé à afficher
									<input  class="form-control" id='idkeyshow' type="number" name="keyid">
								</label>
								<input type="submit" value="Afficher" class="btn btn-primary mb-2">
							</div>
						</form>

						
					
						
					</p>
				
				</article> 
					
			</div> 
			
		</div>
		
	</div>

</body>
</html>