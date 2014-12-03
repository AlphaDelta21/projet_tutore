<?php

	require_once 'ProfesseurClass.php';
	require_once 'QuestionClass.php';
	
	$tab = array("Chocolat", "Vanille", "Pistache");
	
	$question = new Question();


	$prof = new Professeur();

	$prof->mail_to("Quentin", "Moreaux", "quentin_moreaux8@gmail.com", "moreauxq", "mdp");
	
	//$question->ajouter("Bonjour", 2, 9475, $tab);
	
	$texte1 = "Bonjour";
	$texte2 = "ruojnoB";
	
	
	//$question->modifier($texte1, $tab, $texte2);
	
	//$question->supprimer($texte2);
			
			

?>
