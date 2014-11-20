<!DOCTYPE html>
<html lang='fr'>

	<head>
		<title>IUT Dijon informatique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css">
		<link rel="shortcut icon" type="image/x-icon" href="../images/iut-dijon.jpg" />
		<meta name="generator" content="Bluefish 2.2.6" >
		<meta name="author" content="elodie" >
		<meta name="date" content="2014-11-20T12:22:43+0100" >
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

<table>
	<th class="descriptionprof">
		<h1>Bonjour professeur</h1>
	</th>
	<th class="descriptionprof">	
		<img src="../images/iut-dijon.png" alt="">
	</th>
	
	<tr class="contenupage">
		<td>
			<form action="index.php" style="text-align : left;"><input type="submit" value="Déconnecter"></form>
			
			<h2>Historique</h2>
			
			<table class="table_historique">
				<th style="width: 94%;">Question</th><th style="width: 6%;"></th>
				<tr>
					<td>"Quelle requete ... ?"</td>
					<td>
						<img class="icone" class="bulle" onclick="modifier(id)" src="modifier.png" alt="Modifier">
						<img class="icone" class="bulle" onclick="supprimer(id)" src="delete.png" alt="Supprimer">
					</td>
								
				</tr>			
				<tr>
					<td>"Comment s'appelle... ?"</td>
					<td>
						<img class="icone" src="modifier.png" alt="Modifier">
						<img class="icone"src="delete.png" alt="Supprimer">
					</td>	
				</tr>
			</table>
						
		</td>
		
		<td class="publier">
			Publier une nouvelle question
					
				<form  style="text-align: left; margin: 3px;">
					<label>Question :</label>
					<textarea cols="30" rows="10" style="resize:none;"></textarea> <br>
					<label>Réponse 1 :</label>
					<input type="text" id="rep1" name="rep1"> <br>
					<label>Réponse 2 :</label>
					<input type="text" id="rep2" name="rep2"> <br>
					<label>Réponse 3 :</label>
					<input type="text" id="rep3" name="rep3"> <br>
					<label>Réponse 4 :</label>
					<input type="text" id="rep4" name="rep4"> <br>
					<input type="submit" id="poster" name="poster" value="Poster">
				</form>	
		</td>
		
	</tr>
	<tr>
		<td class="piedpage" colspan="2">Nous contacter</td>
	</tr>

</table>

</body>

</html>

<script type="text/javascript">

	function modifier(id)
	{
		window.location.assign("trait_mod.php?animauxlist="+id);
	}	
	
	function supprimer(id)
	{
		window.location.assign("trait_sup.php?animauxlist="+id);
	}	
</script>