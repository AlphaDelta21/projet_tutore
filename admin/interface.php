<!DOCTYPE html>
<html lang='fr'>

	<head>
		<title>IUT Dijon informatique</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css">
		<link rel="shortcut icon" type="image/x-icon" href="../images/iut-dijon.jpg" />
		<meta name="generator" content="Bluefish 2.2.6" >
		<meta name="author" content="elodie" >
		<meta name="date" content="2014-11-18T22:00:29+0100" >
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
				Bonjour professeur .
				<img src="../images/iut-dijon.png" alt="">
			</div>
			<div class="contenu">
				<div class="historique">
					<h1>Questions déja posées</h1>
					
					<table style="background-color:#F3F3F3; margin-left: 20px;"> 
						<tr>
							<td>Question</td><td><img src="modifier.png" width="15" height="15" alt=""></td><td><img src="delete.png" width="15" height="15" alt=""></td>
						</tr>
					</table>
					
				</div>
				
				<div class="newquestion">
					Publier une nouvelle question
					
					<form>
						<label>Question :</label>
						<textarea></textarea> <br>
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
				</div>
			</div>
		</div>
	<div class="piedpage">
		Développé par le groupe AlphaDelta
	</div>
</div>


</body>

</html>