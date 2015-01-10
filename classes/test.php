<?php

	require_once 'ProfesseurClass.php';
	require_once 'QuestionClass.php';
	require_once 'EleveClass.php';

	
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
	
	

	/*$array = $question->publier(100);
	
	for($i=0;$i<count($array);$i++)
	{
		echo($array[$i]).'<br/>';
	}*/
	
				

?>