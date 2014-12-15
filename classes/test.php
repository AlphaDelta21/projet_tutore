<?php

	require_once 'ProfesseurClass.php';
	require_once 'QuestionClass.php';
	require_once 'EleveClass.php';
	require_once 'ResultatClass.php';

	
	
	$prof = new Professeur();
		
	echo($prof->authentification('moreauxq', 'mdp'));
	
	echo($prof->toString());
				

?>