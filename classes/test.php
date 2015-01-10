<?php

	require_once 'ProfesseurClass.php';
	require_once 'QuestionClass.php';
	require_once 'EleveClass.php';

<<<<<<< HEAD
	
	$question = new Question();
	
	echo $question->getIdReponse('dazda');
	
	/*$question->hydrate(array(
	'id_question' => 94,
	'id_prof' => 2,
	'nomQuestion' => 'Coucouuuuu',
	'code' => 9856,
	'publiable' =>0));
	
	echo($question->getIdQuestion());
	echo($question->getIdProf());
	echo($question->getQuestion());
	echo($question->getCode());
	echo($question->isPubliable());*/
=======
	
	$question = new Question();
>>>>>>> 6490a593d3f7e233c1d6e368967b6f70ee46f1f0
	
	$question->hydrate(array(
	'id_prof' => 5,
	'nomQuestion' => 'Coucou ?',
	'code' => 9999,
	'publiable' => 0
	));
	
<<<<<<< HEAD

	/*$array = $question->publier(100);
=======
	$reponse = array(
	'Coucou', 'Salut', 'A plus');
>>>>>>> 6490a593d3f7e233c1d6e368967b6f70ee46f1f0
	
	for($i=0;$i<count($array);$i++)
	{
		echo($array[$i]).'<br/>';
	}*/
	
<<<<<<< HEAD
=======
	$question->supprimer(97);
	$question->supprimer(98);
	$question->supprimer(99);
	
	echo($question->afficher(9999));
	
>>>>>>> 6490a593d3f7e233c1d6e368967b6f70ee46f1f0
				

?>