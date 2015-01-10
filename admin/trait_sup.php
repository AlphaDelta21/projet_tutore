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
			<meta name="date" content="2015-01-10T17:38:11+0100" >
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

	<div class="contenupage">
	
	<?php
		$id_question = $_GET['id'];

		$question = new Question();
		
		if($question->supprimer($id_question) == TRUE)
			echo '<h2>La question a été supprimée.</h2>';
		else
			echo 'Une erreur malencontreuse s\'est produite, la question n\'a pas été supprimée.';	
	?>
		
						
		<form action="http://iutdijon.u-bourgogne.fr/pedago/iq/kidioui/admin/interface.php">
			<input type="submit" id="Retour" value="Retour acceuil">					
		</form>
		
	</div>
	
	</body>
	
	</html>