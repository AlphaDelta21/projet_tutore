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
		<meta name="date" content="2015-01-08T21:58:36+0100" >
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
		<?php
					
			$quest = $_POST['editor1'];
			$code = $_POST['code'];
			
			$question = new Question();
			
			$question->hydrate(array(
			'id_question' => 1,
			'id_prof' => $_SESSION['idProf'],
			'nomQuestion' => $quest,
			'code' => $code,
			'publiable' =>0));
			
			
			if (isset($_POST['reponse']))
			{
				$list_rep = array();
				foreach ($_POST['reponse'] as $reponse => $valeur)
				{
				array_push ($list_rep, $valeur);
				}
			}
			
			else
			{
				$list_rep = array();
			}
			
										
			$question->ajouter($list_rep);
		?>
		La question a été ajoutée.
		<form action="interface.php">
			<input type="submit" name="retour" value="Retour à l'interface">		
		</form>	
	</div>	

	<div class="piedpage">
		Dévélopper par AlphaDelta21
	</div>
</body>

</html>
