<?php

	require_once 'ProfesseurClass.php';
	require_once 'QuestionClass.php';
	require_once 'EleveClass.php';

	
	$question = new Question();
	
	$question->hydrate(array(
	'id_prof' => 5,
	'nomQuestion' => 'Coucou ?',
	'code' => 9999,
	'publiable' => 0
	));
	
	$reponse = array(
	'Coucou', 'Salut', 'A plus');
	
	
	$question->supprimer(97);
	$question->supprimer(98);
	$question->supprimer(99);
	
	echo($question->afficher(9999));
	
				

?>