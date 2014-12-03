<?php

	$id_question = $_GET[''];

	$tab = array("Chocolat", "Vanille", "Pistache");
	
	$question = new Question();
	$question->modifier($texte1, $tab, $texte2);

?>