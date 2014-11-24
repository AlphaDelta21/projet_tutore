<?php

	require_once 'ProfesseurClass.php';
	require_once 'QuestionClass.php';
	
	$tab = array("Reponse1", "Reponse2", "Reponse3");
	
	$question = new Question(true);
	$prof = new Professeur(true);
	
	//$question->ajouter("Bonjooour", 2, 9475, $tab);
	
	/*echo($prof->getPrenom(1));
	echo($prof->getNom(1));
	echo($prof->getEmail(1));
	echo($prof->getIdentifiant(1));
	echo($prof->getMdp(1));*/
	
	if($prof->authentification('moreauxq', 'mdp'))
		echo("Wesh");
	else
		echo("Rip");
	
	

	
	
	//$question->modifier($texte1, $tab, $texte2);
	
	//$question->supprimer($texte2);
			
			

?>