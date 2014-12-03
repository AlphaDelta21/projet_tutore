<?php

	require_once '../classes/ProfesseurClass.php';

	$identifiant = strip_tags(addslashes ($_POST['identifiant']));
	$mdp = strip_tags(addslashes ($_POST['mdp']));
	
	if ((isset($identifiant != '')) && (isset($mdp != '')))
	{
		$prof = new Professeur(TRUE);
		
		if($prof->authentification($identifiant, $mdp) == TRUE) 
		{	
			//aller vers l'interface
			header('Location: interface.php');
		}
		
		else 
			echo 'Désolé, mais vous n\êtes pas autoriser à acceder à cet espace.';
	}
?>