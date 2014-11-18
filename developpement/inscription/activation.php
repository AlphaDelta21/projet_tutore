<!DOCTYPE HTML>
<head>
		<title>ASQuetigny GRS</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css">
		<link rel="shortcut icon" type="image/x-icon" href="images/ASQ.jpg" />
		<meta name="generator" content="Bluefish 2.2.6" >
		<meta name="author" content="elodie" >
		<meta name="date" content="2014-11-17T19:13:09+0100" >
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
	
		mysql_connect('clustermysql08.hosteur.com', 'dumdumelo', 'weYtRVYD')
		or die ("Impossibilité de se connecter au serveur Mysql depuis db_connection!");
	
		mysql_select_db ("site_asq");
	
		//recupère les variables transmises via l'activation du mail
		$mail = $_GET['mail'];
		$identifiant = $_GET['identifiant'];
		$log = $_GET['log'];
		$nom = $_GET['nom'];
		$prenom = $_GET['prenom'];	
	
	
		$maj = "UPDATE membre_staff SET identifiant='".$identifiant."',log='".$log."',mail='".$mail."'
					WHERE nom = '".$nom."' AND prenom ='".$prenom."'";
		$sqlquery = mysql_query($maj) or die("Impossible d'accéder aux données en écriture.");
		
		echo 'Votre inscription a bien été prise en compte. Vous pouvez dorénavant accèder aux documents du STAFF.'
	
	?>
</body>

</html>

