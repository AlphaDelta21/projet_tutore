<?php
	session_start();
	
	require_once '../classes/ProfesseurClass.php';
	require_once '../classes/QuestionClass.php';
	
	$identifiant = strip_tags(addslashes (sha1($_POST['identifiant'])));
	$mdp = strip_tags(addslashes (sha1($_POST['mdp'])));
	
	if ((isset($identifiant)) && (isset($mdp)))
	{
		$prof = new Professeur();
		
		if($prof->authentification($identifiant, $mdp) == TRUE) 
		{	
			$pseudo = $_POST['identifiant'];
			$_SESSION['pseudo'] = $pseudo;
			$_SESSION['idProf'] = $prof->getId();
			echo "<script type='text/javascript'>document.location.replace('http://iutdijon.u-bourgogne.fr/pedago/iq/kidioui/admin/interface.php');</script>";
		}
		
		else 
			echo 'Identifiant ou mot de passe incorrect.';
	}
?>