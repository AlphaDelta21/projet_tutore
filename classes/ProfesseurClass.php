<?php

class Professeur
{
	private $connection;
	
	public function __construct()
	{
		/*try 
		{
			if($asAdmin)
				$bdd = new PDO('mysql:host=sql-pedago;dbname=iq-kidioui','iq-kidioui_adm','TuD8R778');
			else
				$bdd = new PDO('mysql:host=sql-pedago;dbname=iq-kidioui','iq-kidioui','VaC4tD85');
		}	
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}*/
	}
	
	public function mail_to($nom, $prenom, $email, $identifiant, $mdp)
	{
		$to      = $email;
		$subject = 'Inscription site de sondage KiDiOui';
		$message = 'Bonjour';
		$headers = 'From: quentin.moreaux8@gmail.com';


		
		if(mail($to, $subject, $message, $headers))
			echo("Un mail vous a été envoyé");
		else
			echo("Erreur");
	}
	
	public function inscription($nom, $prenom, $email, $identifiant, $mdp)
	{

		try 
		{
			if($asAdmin)
				$bdd = new PDO('mysql:host=sql-pedago;dbname=iq-kidioui','iq-kidioui_adm','TuD8R778');
			else
				$bdd = new PDO('mysql:host=sql-pedago;dbname=iq-kidioui','iq-kidioui','VaC4tD85');
		}	
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}

		$requete = $bdd->prepare('INSERT INTO professeur
		(nom, prenom, email, identifiant, mdp)
		VALUES(:nom, :prenom, :email, :identifiant, :mdp)');
		
		$requete->execute(array(
		'nom' => $nom,
		'prenom' => $prenom,
		'email' => $email,
		'identifiant' => $identifiant,
		'mdp' => $mdp
		));
	}
	
	public function authentification()
	{
	
	}
}

?>
