<?php

	$identifiant = strip_tags(addslashes ($_POST['identifiant']));
	$mdp = strip_tags(addslashes ($_POST['mdp']));
	
	if ((isset($identifiant != '')) && (isset($mdp != '')))
	{
		header('Location: interface.php');	
	}
?>