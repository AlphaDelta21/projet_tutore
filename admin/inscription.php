<!DOCTYPE html>
<html lang='fr'>

	<head>
		<title>IUT Dijon informatique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css">
		<link rel="shortcut icon" type="image/x-icon" href="../images/iut-dijon.jpg" />
		<meta name="generator" content="Bluefish 2.2.6" >
		<meta name="author" content="elodie" >
		<meta name="date" content="2014-12-03T20:00:26+0100" >
		<meta name="copyright" content="www.nomsite.fr">
		<meta name="keywords" content="">
		<meta name="description" content="Site de sondages de l'IUT informatique de Dijon">
		<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-style-type" content="text/css">
		<meta http-equiv="expires" content="0">
	</head>
	
	<?php
		//require_once '../developpement/bdd/question.class.php';
		//require_once '../developpement/bdd/bdd.class.php';
		require_once '../classes/ProfesseurClass.php';
	?>

<body>

<table>
	<th class="descriptionprof">
		<h1>Inscription</h1>
	</th>
	<th class="descriptionprof">	
		<img src="../images/iut-dijon.png" alt="">
	</th>
	
	<tr class="contenupage">
		<td colspan="2">
			<p>Pas encore inscrit ? Merci de remplir le formulaire ci-dessous :</p>
				
				<form method="POST" action="trait_inscription.php" target="_blank" style="text-align: left;">
					<label>NOM :</label> <input type="text" name="nom" autofocus required> <br>
					<label>Prénom : </label> <input type="text" name="prenom" required> <br>
					<label>Adresse mail : </label> <input type="email" name="email" required> <br>
					<label>Identifiant :</label> <input type="text" name="identifiant" required> <br>
					<label>Mot de passe :</label> <input type="password" name="mdp" required> <br>
					<input type="Submit" value="S'inscrire" id="sinscrire">
				</form>
		</td>
		
	</tr>
	<tr>
		<td class="piedpage" colspan="2">Nous contacter</td>
	</tr>

</table>


</body>
</html>

