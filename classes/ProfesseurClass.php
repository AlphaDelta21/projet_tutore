<?php

class Professeur
{
	private $bdd;
	
	public function __construct()
	{
		/*try 
		{
			if($asAdmin)
				$this->bdd = new PDO('mysql:host=sql-pedago;dbname=iq-kidioui','iq-kidioui_adm','TuD8R778');
			else
				$this->bdd = new PDO('mysql:host=sql-pedago;dbname=iq-kidioui','iq-kidioui','VaC4tD85');
		}	
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}*/
	}
	
<<<<<<< HEAD
	public function mail_to($nom, $prenom, $email, $identifiant, $mdp)
	{
		$to      = $email;
		$subject = 'Inscription site de sondage KiDiOui';
		$message = 'Bonjour';
		$headers = 'From: quentin.moreaux8@gmail.com';


		
		if(mail($to, $subject, $message, $headers))
			echo("Un mail vous a �t� envoy�");
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
=======
	
	public function inscription($nom, $prenom, $email, $identifiant, $mdp)
	{
		$requete = $this->bdd->prepare('INSERT INTO professeur
>>>>>>> 020e6c338b9641da96a1b9ee3ecb63f509924c96
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
	
	public function authentification($identifiant, $mdp)
	{
		$listeId = $this->getListeIdentifiant();
		$listeMdp = $this->getListeMdp();
		
		if(in_array($identifiant, $listeId) && in_array($mdp, $listeMdp))
			return true;
		else
			return false;
	}
	
	public function getId($nom)
	{
		$requete = $this->bdd->prepare('SELECT id_prof FROM professeur WHERE nom = :nom');
		
		$requete->execute(array('nom' => $nom));
		
		$result = $requete->fetch();
		
		return $result[0];
	}
	
	public function getPrenom($id)
	{
		$requete = $this->bdd->prepare('SELECT prenom FROM professeur WHERE id_prof = :id');
		
		$requete->execute(array('id' => $id));
		
		$result = $requete->fetch();
		
		return $result[0];
	}
	
	public function getNom($id)
	{
		$requete = $this->bdd->prepare('SELECT nom FROM professeur WHERE id_prof = :id');
		
		$requete->execute(array('id' => $id));
		
		$result = $requete->fetch();
		
		return $result[0];
	}
	
	public function getEmail($id)
	{
		$requete = $this->bdd->prepare('SELECT email FROM professeur WHERE id_prof = :id');
		
		$requete->execute(array('id' => $id));
		
		$result = $requete->fetch();
		
		return $result[0];
	}
	
	public function getIdentifiant($id)
	{
		$requete = $this->bdd->prepare('SELECT identifiant FROM professeur WHERE id_prof = :id');
		
		$requete->execute(array('id' => $id));
		
		$result = $requete->fetch();
		
		return $result[0];
	}
	
	public function getListeIdentifiant()
	{
		$requete = $this->bdd->query('SELECT identifiant FROM professeur');
				
		
		while($donnees=$requete->fetch(PDO::FETCH_NUM))
		{
			foreach($donnees as $valeur)
				$array[] = $valeur;
		}


		return $array;
		
	}
	
	public function getMdp($id)
	{
		$requete = $this->bdd->prepare('SELECT mdp FROM professeur WHERE id_prof = :id');
		
		$requete->execute(array('id' => $id));
		
		$result = $requete->fetch();
		
		return $result[0];
	}
	
	public function getListeMdp()
	{
	$requete = $this->bdd->query('SELECT mdp FROM professeur');
				
		
		while($donnees=$requete->fetch(PDO::FETCH_NUM))
		{
			foreach($donnees as $valeur)
				$array[] = $valeur;
		}


		return $array;
	}
}

?>