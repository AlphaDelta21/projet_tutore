<?php
	session_start();
	require_once '../classes/ProfesseurClass.php';
	require_once '../classes/QuestionClass.php';

	$identifiant = $_POST['identifiant'];
	$mdp = $_POST['mdp'];
	
	$prof = new Professeur($admin);
	
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
			<meta name="date" content="2014-12-07T17:55:55+0100" >
			<meta name="copyright" content="www.nomsite.fr">
			<meta name="keywords" content="">
			<meta name="description" content="Site de sondages de l'IUT informatique de Dijon">
			<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
			<meta http-equiv="content-type" content="text/html; charset=UTF-8">
			<meta http-equiv="content-style-type" content="text/css">
			<meta http-equiv="expires" content="0">
		</head>
		
<body>

<?php		
	
/*	if($prof->authentification($identifiant, $mdp) == TRUE)
	{*/
		//$_SESSION['nom'] = $prof->getNom();
		//$_SESSION['id'] = $prof->getId();
	
?>
	
<script src="ckeditor/ckeditor.js"></script>

	<table class="contenupage">
	
		<th class="descriptionprof">
			<h1>
				Bonjour professeur
				<?php
					//echo $_SESSION['nom'];
				?>
			</h1>
		</th>
		<th class="descriptionprof">	
			<img src="../images/iut-dijon.png" alt="">
		</th>
		<tr>
			<td style="width: 70%; vertical-align: top;">
				<form action="trait_deco.php" style="text-align : left;"><input type="submit" value="Déconnecter"></form>
				
				<h2>Historique</h2>
				
				<div style=" height: 200px; overflow-y:scroll;">
				
				<table class="table_historique" style="border: 1px solid black; border-collapse: collapse; paddin: 0px;">
					<th style="width: 90% background-color: background-color: #CA0062;">Question</th><th style="width: 10%;"></th>		
					
					<?php
							
						$question = new Question($asAdmin);
							
						
						//tableau qui regroupe toutes les questions de la Bdd
						$liste_question = $question->getListeQuestion();
						foreach($liste_question as $question)
						{
							//fonction qui coupe la chaine, et met dans $tab_tri chaque attribut
							//$tab_tri = split('/', $question->toString());
							
							echo '<tr>';								
							echo '<td>'.$value.'</td>';	
							echo '<td>
									<img src="modif.png" onclick=modifier() width="30" height="30" alt=""> <img src="suppr.png" onclick=supprimer() width="30" height="30" alt=""></td>
									</tr>';
						}
						
					?>		
				</table>
	
				</div>				
			</td>
			
			<td class="publier">
				Publier une nouvelle question
						
					<form method="POST" action="trait_new.php" style="text-align: left; margin: 3px;">
						<label>Question :</label>
						<textarea cols="30" rows="10" name="question" style="resize:none;"></textarea> <br>
						<label>Réponse 1 :</label>
						<input type="text" id="rep1" name="rep1"> <br>
						<label>Réponse 2 :</label>
						<input type="text" id="rep2" name="rep2"> <br>
						<label>Réponse 3 :</label>
						<input type="text" id="rep3" name="rep3"> <br>
						<label>Réponse 4 :</label>
						<input type="text" id="rep4" name="rep4"> <br>
						<label>Code identifiant :</label>
						<input type="text" id="code" name="code"> <br>
						<input type="submit" id="poster" name="poster" value="Poster">
					</form>	
			</td>
		</tr>
		<tr>
			<td class="piedpage" colspan="2">Nous contacter</td>
		</tr>
	
	</table>	
	

<?php

/*	}
		
	else 
	{
		echo 'Nous sommes désolés mais l\'authentification a échoué.';
		echo '<form action="index.php">
					<input type="submit" value="Retour" >
				</form>'	;
	}			
	*/
?>


</body>

</html>

<script type="text/javascript">

	function modifier(question, tab_rep)
	{
		window.location.assign("trait_mod.php?question"+question+"&tab_rep="+tab_rep);
	}	
	
	function supprimer(question)
	{
		window.location.assign("trait_sup.php?question"+supprimer);
	}
	
		function publier(code)
	{
		window.location.assign("trait_sup.php?code="+code);
	}	
</script>