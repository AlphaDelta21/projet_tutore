<?php

class Professeur
{
	private $bdd;
	private $id;
	private $nom;
	private $prenom; 
	private $email; 
	private $identifiant; 
	private $mdp;
	
	public function __construct($asAdmin)
	{
		try 
		{
			if($asAdmin)
				$this->bdd = new PDO('mysql:host=sql-pedago;dbname=iq-kidioui','iq-kidioui_adm','TuD8R778');
			else
				$this->bdd = new PDO('mysql:host=sql-pedago;dbname=iq-kidioui','iq-kidioui','VaC4tD85');
		}	
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
	}
	
	
	public function inscription($nom, $prenom, $email, $identifiant, $mdp)
	{
		$requete = $this->bdd->prepare('INSERT INTO professeur
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
		//$listeId = $this->getListeIdentifiant();
		//$listeMdp = $this->getListeMdp();
		
		
		
		$requete = $this->bdd->prepare('SELECT * FROM professeur WHERE identifiant = :identifiant, mdp = :mdp');
			
			$requete->bindParam(':identifiant', $identifiant, PDO::PARAM_STR, 50);
			$requete->bindParam(':mdp', $mdp, PDO::PARAM_STR, 50);
			
			if($requete->execute() == TRUE)
			{
				//$array=$requete->fetch();
				//printf($array[0]);
				echo'OK !';
			}			
			
			else 
			{
				echo "Erreur authentification !";
			}
		
/*		if(in_array($identifiant, $listeId) && in_array($mdp, $listeMdp))
		{
			$requete = $this->bdd->prepare('SELECT * FROM professeur WHERE identifiant = :identifiant, mdp = :mdp');
			
			$requete->bindParam(':identifiant', $identifiant, PDO::PARAM_STR, 50);
			$requete->bindParam(':mdp', $mdp, PDO::PARAM_STR, 50);
			
			if($requete->execute() == TRUE)
			{
				$array=$requete->fetch();
				printf($array[0]);
			}			
			
			else 
			{
				echo "Erreur authentification !";
			}	
			
			//$requete->execute(array('identifiant' => $identifiant));
					
			
			//return $array;	
		}
		else
			return false;
*/	}
	
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