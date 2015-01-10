<?php
	require_once '../classes/ProfesseurClass.php';
	require_once '../classes/QuestionClass.php';
?>

<!DOCTYPE html>
<html lang='fr'>

	<head>
		<title>IUT Dijon informatique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css">
		<link rel="shortcut icon" type="image/x-icon" href="../images/iut-dijon.jpg" />
		<meta name="generator" content="Bluefish 2.2.6" >
		<meta name="author" content="elodie" >
		<meta name="date" content="2015-01-08T17:39:48+0100" >
		<meta name="copyright" content="www.nomsite.fr">
		<meta name="keywords" content="">
		<meta name="description" content="Site de sondages de l'IUT informatique de Dijon">
		<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-style-type" content="text/css">
		<meta http-equiv="expires" content="0">
	</head>
	
<body>

	<div class="descriptionprof">		
		<h1>Authentification</h1>	
	</div>

	<div class="contenupage">
		<h2>Identifiez vous</h2>
						
		<form method="POST" action="trait_auth.php">
			<label>Identifiant :</label> 
			<input type="text" name="identifiant" id="identifiant"> <br>
			<label>Mot de passe :</label> 
			<input type="password" name="mdp" id="mdp">	<br>
			<input type="submit" name="connexion" value="Connexion"> <br>				
		</form>
		<a href="inscription.php">Pas encore inscrit ?</a>
	</div>	
</body>

</html>
