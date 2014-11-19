<?php

class connection
{
	function connection()
	{
		  // la variable bdd va stocker la connection a la base de donnée
		$bdd = new PDO('mysql:host=localhost;dbname=test','root','password');
	}
}

?>