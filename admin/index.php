<!DOCTYPE html>
<html lang='fr'>

	<head>
		<title>IUT Dijon informatique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css">
		<link rel="shortcut icon" type="image/x-icon" href="../images/iut-dijon.jpg" />
		<meta name="generator" content="Bluefish 2.2.6" >
		<meta name="author" content="elodie" >
		<meta name="date" content="2014-11-19T22:49:54+0100" >
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

<div style="height: 100%;">
		<div class="contenupage">
			<div class="descriptionprof">
				Authentification
				<img src="../images/iut-dijon.png" alt="">
			</div>
			<div class="contenu" id="contenu">
				<div>
					Identifiez vous.
					<form method="POST" action="traitement.php">
						<label>Identifiant :</label> 
							<input type="text" name="identifiant" id="identifiant"> <br>
						<label>Mot de passe :</label> 
							<input type="password" name="mdp" id="mdp">	<br>
						<input type="submit" name="connexion" value="Connexion"> <br>				
					</form>
					<a href="mdp_forget.php">Mot de passe oublié ?</a> <a href="inscription.php">Pas encore inscrit ?</a>
					
				</div>
				<div>

				</div>
			</div>
		</div>
	<div class="piedpage">
		Développé par le groupe AlphaDelta
	</div>
</div>
					<a href="interface.php">Interface gestion des questions</a>
					<a href="../user/new/index.php">Interface elève menu accueil</a>

</body>

</html>
