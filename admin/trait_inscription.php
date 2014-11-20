<!DOCTYPE html>
<html lang='fr'>

	<head>
		<title>IUT Dijon informatique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css">
		<link rel="shortcut icon" type="image/x-icon" href="../images/iut-dijon.jpg" />
		<meta name="generator" content="Bluefish 2.2.6" >
		<meta name="author" content="elodie" >
		<meta name="date" content="2014-11-19T18:12:25+0100" >
		<meta name="copyright" content="www.nomsite.fr">
		<meta name="keywords" content="">
		<meta name="description" content="Site de sondages de l'IUT informatique de Dijon">
		<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-style-type" content="text/css">
		<meta http-equiv="expires" content="0">
	</head>
	
	<?php
		require_once '../developpement/bdd/question.class.php';
		require_once '../developpement/bdd/bdd.class.php';
	?>

<body>

<div style="height : 100%;">
		<div class="contenupage">
			<div class="descriptionprof">
				Validation de l'inscription
				<img src="../images/iut-dijon.png" alt="">
			</div>
			<div class="contenu">
				<div>
				
				<?php
					$nom = $_POST['nom'];
					$prenom = $_POST['prenom'];
					$email = $_POST['email'];
					$identifiant = sha1 ($_POST['identifiant']);
					$mdp = sha1 ($_POST['mdp']);
				
					echo $nom.'<br>';
					
				?>
				
				 	<a href="index.php">Retour à la page d'acceuil</a>
				</div>
			</div>
		</div>
		<div class="piedpage">
			Développé par le groupe AlphaDelta
		</div>
	</div>

</body>
</html>
