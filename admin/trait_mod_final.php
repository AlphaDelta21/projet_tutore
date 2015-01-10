<?php
	session_start();
	require_once '../classes/ProfesseurClass.php';
	require_once '../classes/QuestionClass.php';
	
	$_SESSION['pseudo'];
	$id_question = $_GET['id'];
	$question = new Question();	
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
		<meta name="date" content="2015-01-10T17:51:59+0100" >
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
		<h1><?php $_SESSION['pseudo']?></h1>	
	</div>

	<div class="contenupage">
		<h2>Modification question</h2>
		
			<?php 
				$question = new Question();
				$question->hydrateId($id_question);
				$question->setNomQuestion($_POST['editor1']);
				$question->setCode($_POST['code']);
				$question->setTheme($_POST['theme']);
				if(isset($_POST['reponse0']) AND isset($_POST['reponse1']))
					$arrayReponse=array($_POST['reponse0'], $_POST['reponse1']);
				if(isset($_POST['reponse2']))
					array_push($arrayReponse, $_POST['reponse2']);
				if(isset($_POST['reponse3']))
					array_push($arrayReponse, $_POST['reponse3']);
				
				$question->modifier($id_question, $arrayReponse);
			?>
			<p>La question a bien été modifié </p>
			<form action="interface.php"><input type="submit" value="Retour page d'accueil"></form>
		
	</div>	
</body>

</html>
