<?php

	$identifiant = sha1($_GET['identifiant']);
	$motdepasse = sha1($_GET['log']);

	//acceder BDD
	mysql_connect('clustermysql08.hosteur.com', 'dumdumelo', 'weYtRVYD')
		or die ("Impossibilité de se connecter au serveur Mysql !");
	mysql_select_db ("site_asq");
	
	//indique l'encodage a la bdd
	mysql_query("SET NAMES 'utf8'"); 
	
		
	$command = "SELECT identifiant, log 
					FROM membre_staff 
					WHERE identifiant ='".$identifiant."' AND log='".$motdepasse."'";
	$sqlquery = mysql_query($command) or die("Impossibilité d'accéder aux données en lecture!");
	$inscription = mysql_fetch_array ($sqlquery);
	mysql_free_result($sqlquery);


		//la personne n'est pas inscrite
		if($inscription == false)
		{
			echo 'Identifiant ou mot de passe incorrect.';
			require 'admin.php';
		}
			
		//la personne est autorisée
		else 
		{
			require 'staff.php';
		}
?>