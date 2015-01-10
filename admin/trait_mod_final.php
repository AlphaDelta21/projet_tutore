<?php
	session_start();
	require_once '../classes/ProfesseurClass.php';
	require_once '../classes/QuestionClass.php';
	
	$_SESSION['pseudo'];
	$id_question = $_GET['nom'];
	$question = new Question();
	
/*$tab = array("Chocolat", "Vanille", "Pistache");
	$question->modifier($texte1, $tab, $texte2);*/
	
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
		<meta name="date" content="2015-01-10T16:27:14+0100" >
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
		
		</form>
		
	</div>	
</body>

</html>
