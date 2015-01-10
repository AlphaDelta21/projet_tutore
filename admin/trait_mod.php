<?php
	session_start();
	require_once '../classes/ProfesseurClass.php';
	require_once '../classes/QuestionClass.php';
	
	$_SESSION['pseudo'];
	$id_question = $_GET['id'];
	$question = new Question();
	
	$question->hydrateId($id_question);
	$reponse=$question->getReponse($id_question);
		
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
		<meta name="date" content="2015-01-10T16:48:44+0100" >
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
		<h1><?php echo $_SESSION['pseudo']; ?></h1>	
	</div>

	<div class="contenupage">
		<h2>Modification question</h2>
						
		<form method="POST" action="trait_mod_final.php<?php echo "?id=".$id_question?>" style="text-align: left; margin: 3px;">
			<label>Question :</label>
				<textarea name="editor1" id="editor1" cols="25" rows="5" style=" margin: 5px; resize:none;" required>
				<?php echo $question->getQuestion();?>
				</textarea> <br>
			<label>Réponse 1 :</label>
				<input type="text" id="rep1" name="reponse0" value="<?php echo $reponse[0] ?>" required> <br>
			<label>Réponse 2 :</label>
				<input type="text" id="rep2" name="reponse1" value="<?php echo $reponse[1] ?>"required> <br>
			<label>Réponse 3 :</label>
				<input type="text" id="rep3" name="reponse2" value="<?php echo $reponse[2] ?>"> <br>
			<label>Réponse 4 :</label>
				<input type="text" id="rep4" name="reponse3" value="<?php echo $reponse[3] ?>"> <br>
			<label>Code identifiant :</label>
				<input type="text" id="code" name="code" value="<?php echo $question->getCode(); ?>" required> <br>
			<label>Theme :</label>
				<input type="text" id="theme" name="theme" value="<?php echo $question->getCode(); ?>" required> <br>
				<input type="submit" id="poster" name="modifier" value="Modifier">
		</form>
		
	</div>	
</body>

</html>
