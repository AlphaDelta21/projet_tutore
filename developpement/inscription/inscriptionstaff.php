<!DOCTYPE HTML>

<head>
		<title>ASQuetigny GRS</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css">
		<link rel="shortcut icon" type="image/x-icon" href="images/ASQ.jpg" />
		<meta name="generator" content="Bluefish 2.2.6" >
		<meta name="author" content="elodie" >
		<meta name="date" content="2014-11-17T19:13:11+0100" >
		<meta name="copyright" content="www.asq-gr.fr">
		<meta name="keywords" content="gr, grs, asq, quetigny, site, côte d'or, bourgogne, gymnastique, club, association, compétition">
		<meta name="description" content="Site du club de GRS a Quetigny">
		<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta http-equiv="content-style-type" content="text/css">
		<meta http-equiv="expires" content="0">
	</head>

<html>

<body>

<?php

	$nom = mb_strtolower($_POST['nom']);
	$prenom = mb_strtolower($_POST['prenom']);
	$mail = $_POST['mail'];
	$identifiant = sha1($_POST['identifiant']);
	$mdp = sha1($_POST['mot_de_passe']);
	//generation d'une clef aleatoire
	$cle = md5(microtime(TRUE)*100000);
	
	//acceder BDD
	mysql_connect('clustermysql08.hosteur.com', 'dumdumelo', 'weYtRVYD')
		or die ("Impossibilité de se connecter au serveur Mysql !");
	mysql_select_db ("site_asq");
	
	//indique l'encodage a la bdd
	mysql_query("SET NAMES 'utf8'"); 
	
		
	$command = "SELECT identifiant, log FROM membre_staff WHERE nom ='".$nom."' AND prenom='".$prenom."'";
	$sqlquery = mysql_query($command) or die("Impossibilité d'accéder aux données en lecture!");
	$inscription = mysql_fetch_array ($sqlquery);
	mysql_free_result($sqlquery);


		//la personne ne fait pas partie du staff
		if($inscription == false)
		{
			echo 'Nous sommes désolés, mais vous n\'êtes pas autorisé à accéder à cet espace.';
		}
			
		//la personne est autorisée
		else 
		{
			//test si mdp et id vide
			if(($inscription['identifiant'] !="") && ($inscription['mot_de_passe'] !=""))
			{
				echo 'Vous êtes déja inscrit.';			
			}
			
			else 
			{
				echo 'Merci pour votre inscription. 
				Un mail d\'activation a été envoyé à l\'adresse suivante :'.$mail.'.';
		
				$sujet = "Activation de votre compte." ;
				$entete = "From: contact@asq-gr.fr" ;

								
				$message = "Bienvenue sur le site de l'ASQuetigny, \n
Pour activer votre compte, veuillez cliquer sur le lien ci dessous
ou copier coller dans votre navigateur internet. \n\n
http://asq-gr.fr/activation.php?mail=".$mail."&identifiant=" . urlencode($identifiant)."&log=". urlencode($mdp)."&nom=". urlencode($nom)."&prenom=". urlencode($prenom)."
---------------\n
Ceci est un mail automatique, Merci de ne pas y répondre.\n";
				

				mail($mail, $sujet, $message, $entete);
			}	
		}


	mysql_close();
?>

</body>

</html>