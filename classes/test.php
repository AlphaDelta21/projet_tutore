<?php

	require_once 'ProfesseurClass.php';
	require_once 'QuestionClass.php';
	require_once 'EleveClass.php';
	require_once 'ResultatClass.php';
	
	$res = new Resultat(true);
	
	$array = $res->resultat(93);
	
	$prof = new Professeur(true);
	
	$array = $prof->authentification('moreauxq', 'mdp');
	
	//echo($array);
	
	/*	
	for($i=0;$i<count($array);$i++)
		echo($array[$i]);
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
	
	if($prof->authentification('moreauxq', 'mdp'))
		echo("Wesh");
	else
		echo("Rip");
	
	

	
	
	//$question->modifier($texte1, $tab, $texte2);
	
	//$question->supprimer($texte2);*/
	
	$eleve= new Eleve(true);
	$eleve-> vote(1);
			
			

?>