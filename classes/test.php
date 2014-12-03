<?php

	require_once 'ProfesseurClass.php';
	require_once 'QuestionClass.php';
<<<<<<< HEAD
	
	$tab = array("Chocolat", "Vanille", "Pistache");
	
	$question = new Question();


	$prof = new Professeur();

	$prof->mail_to("Quentin", "Moreaux", "quentin_moreaux8@gmail.com", "moreauxq", "mdp");
=======
	require_once 'EleveClass.php';
	/*
	$tab = array("Reponse1", "Reponse2", "Reponse3");
	
	$question = new Question(true);
	$prof = new Professeur(true);
	
	//$question->ajouter("Bonjooour", 2, 9475, $tab);
	
	echo($prof->getPrenom(1));
	echo($prof->getNom(1));
	echo($prof->getEmail(1));
	echo($prof->getIdentifiant(1));
	echo($prof->getMdp(1))
>>>>>>> 020e6c338b9641da96a1b9ee3ecb63f509924c96
	
	if($prof->authentification('moreauxq', 'mdp'))
		echo("Wesh");
	else
		echo("Rip");
	
<<<<<<< HEAD
	$texte1 = "Bonjour";
	$texte2 = "ruojnoB";
=======
	

>>>>>>> 020e6c338b9641da96a1b9ee3ecb63f509924c96
	
	
	//$question->modifier($texte1, $tab, $texte2);
	
	//$question->supprimer($texte2);*/
	
	$eleve= new Eleve(true);
	$eleve-> vote(1);
			
			

?>
