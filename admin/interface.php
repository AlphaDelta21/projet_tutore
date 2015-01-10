<?php
	session_start();
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
			<meta name="date" content="2015-01-10T17:48:58+0100" >
			<meta name="copyright" content="www.nomsite.fr">
			<meta name="keywords" content="">
			<meta name="description" content="Site de sondages de l'IUT informatique de Dijon">
			<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
			<meta http-equiv="content-type" content="text/html; charset=UTF-8">
			<meta http-equiv="content-style-type" content="text/css">
			<meta http-equiv="expires" content="0">
			<script src="ckeditor/ckeditor.js"></script>
		</head>
		
	<body>
	<div class="descriptionprof">
		<h1><?php echo $_SESSION['pseudo']; ?></h1>	
	</div>
	
	<table class="contenupage">
		
		<tr>
			<td style="vertical-align: top;">
			
				<form action="trait_deco.php" style="text-align : left;"><input type="submit" value="Déconnecter"></form>
				
				<h2>Historique</h2>
				
				<div style=" height: 500px; overflow-y:scroll;">
				
				<table class="table_historique" style="border: 1px solid black; border-collapse: collapse; paddin: 0px;">
					<th style="width: 90% background-color: background-color: #CA0062;">Question</th> <th style="width: 90% background-color: background-color: #CA0062;">Code sécurité</th> <th colspan="4" style="width: 90% background-color: background-color: #CA0062;"></th>	
				<?php
						
						$question = new Question();
		
						$liste = $question->getListeQuestion($_SESSION['idProf']);
						
						for($i=0;$i<count($liste);$i++)
						{
							$question->afficheListe($liste, $i);
							
						}							
				?>
		
				</table>
	
				</div>				
			</td>
			
			<td class="publier">
				<h2>Nouvelle question</h2>
						
					<form method="POST" action="trait_new.php" style="text-align: left; margin: 3px;">
						<label>Question :</label>
							<textarea name="editor1" id="editor1" cols="25" rows="5" style=" margin: 5px; resize:none;" required>
						
	         			</textarea> <br>
						<label>Réponse 1 :</label>
							<input type="text" id="rep1" name="reponse[]" required> <br>
						<label>Réponse 2 :</label>
							<input type="text" id="rep2" name="reponse[]" required> <br>
						<label>Réponse 3 :</label>
							<input type="text" id="rep3" name="reponse[]"> <br>
						<label>Réponse 4 :</label>
							<input type="text" id="rep4" name="reponse[]"> <br>
						<label>Code identifiant :</label>
							<input type="text" id="code" name="code" required> <br>
							<input type="submit" id="poster" name="poster" value="Poster">
					</form>	
			</td>
		</tr>
		<tr>
			<td class="piedpage" colspan="2">Développer par AlphaDelta21</td>
		</tr>
	
	</table>	
	
	</body>
	
	</html>
	
<script>
    CKEDITOR.replace('editor1');
</script>
