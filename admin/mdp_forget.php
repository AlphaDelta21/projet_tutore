<!DOCTYPE html>
<html lang='fr'>

	<head>
		<title>IUT Dijon informatique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css">
		<link rel="shortcut icon" type="image/x-icon" href="../images/iut-dijon.jpg" />
		<meta name="generator" content="Bluefish 2.2.6" >
		<meta name="author" content="elodie" >
		<meta name="date" content="2014-12-29T17:42:08+0100" >
		<meta name="copyright" content="www.nomsite.fr">
		<meta name="keywords" content="">
		<meta name="description" content="Site de sondages de l'IUT informatique de Dijon">
		<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-style-type" content="text/css">
		<meta http-equiv="expires" content="0">
	</head>
	
	<?php
		require_once '../classes/questionClass.php';
	?>

<body>
	
	<div class="descriptionprof">
		<h1>Oubli de mot de passe ?</h1>	
	</div>

<table>
	
	<tr class="contenupage">
		<td colspan="2">
			<p>Merci de saisir votre adresse e-mail:</p>
				
				<form method="POST" action="trait_inscription.php" target="_blank" style="text-align: left;">
					<label>Adresse mail : </label> <input type="email" name="email" required> <br>
					<input type="Submit" value="Envoyer" id="sinscrire">
				</form>
			<p>
				Un mail va vous être envoyé avec votre identifiant et mot de passe. Conservez-les bien !			
			</p>	
		</td>
		
	</tr>
	<tr>
		<td class="piedpage" colspan="2">Nous contacter</td>
	</tr>

</table>


</body>
</html>