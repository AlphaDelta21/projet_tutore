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
		<meta name="date" content="2015-01-08T17:54:55+0100" >
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
		<h1>Validation de l'inscription</h1>
	</div>

<table>
	<tr class="contenupage">
		<td colspan="2">
			<?php
				
					$prof = new Professeur();
					$prof->hydrate(array(
												'nom' => $_POST['nom'],
												'prenom' => $_POST['prenom'],
												'email' => $_POST['email'],
												'identifiant' => sha1 ($_POST['identifiant']),
												'mdp' => sha1 ($_POST['mdp'])
												));
											
				
					$prof->inscription();
						echo 'Merci pour votre inscription ! <br>';
					
					
				?>
				
				 	<a href="index.php">Retour à la page d'acceuil</a>
		</td>
		
	</tr>
	<tr>
	</tr>

</table>

</body>
</html>