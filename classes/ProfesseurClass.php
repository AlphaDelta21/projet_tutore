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
	
	//constructeur par defaut, non utilisé ici.
	public function __construct()
	{
		try 
		{
			$this->bdd = new PDO('mysql:host=sql-pedago;dbname=iq-kidioui','iq-kidioui_adm','TuD8R778');
		}	
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}	
	}
	
	public function inscription()
	{
		$requete = $this->bdd->prepare('INSERT INTO professeur
		(nom, prenom, email, identifiant, mdp)
		VALUES(:nom, :prenom, :email, :identifiant, :mdp)');
		
		$requete->execute(array(
		'nom' => $this->nom,
		'prenom' => $this->prenom,
		'email' => $this->email,
		'identifiant' => $this->identifiant,
		'mdp' => $this->mdp
		));
	}
	
	public function authentification($identifiant, $mdp)
	{
		$listeId = $this->getListeIdentifiant();
		$listeMdp = $this->getListeMdp();
		
		if(in_array($identifiant, $listeId) && in_array($mdp, $listeMdp))
		{
			$requete = $this->bdd->prepare('SELECT * FROM professeur WHERE identifiant = :identifiant');
			$requete->execute(array('identifiant' => $identifiant));
					
			
			$result = $requete->fetch(PDO::FETCH_ASSOC);
			$this->hydrate($result);
			
			return true;
		}
		else
			return false;
	}
	
	//renvoi les données séparées par un slash.
	public function toString()
	{
		return $this->id.'/'.$this->nom.'/'.$this->prenom.'/'.$this->email.'/'.$this->identifiant.'/'.$this->mdp;
	}
	
	
	public function hydrate(array $donnees)
	{
		foreach($donnees as $key=>$value)
		{
			// On récupère le nom du setter correspondant à l'attribut.
			$method='set'.ucfirst($key);
			// Si le setter correspondant existe.
			if(method_exists($this,$method))
			{
				// On appelle le setter.
				$this->$method($value);
			}
		}
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
	
	//Accesseur
	
	
	public function getId()
	{
<<<<<<< HEAD
		return $this->id;
=======
		return $this->id_prof;
>>>>>>> 6490a593d3f7e233c1d6e368967b6f70ee46f1f0
	}		
	
	public function getNom()
	{
		return $this->nom;
	}	
	
	public function getPrenom()
	{
		return $this->prenom;		
	}
		
	public function getEmail()
	{
		return $this->email;		
	}	
	
	public function getIdentifiant()
	{
		return $this->identifiant;		
	}	
	
	public function getMdp()
	{
		return $this->mdp;		
	}
	
	
	
	
	
	public function setId_Prof($id)
	{
		$this->id = $id;	
	}
	
	public function setNom($nom)
	{
		$this->nom = $nom;
	}
	
	public function setPrenom($prenom)
	{
		$this->prenom = $prenom;
	}
	
	public function setIdentifiant($identifiant)
	{
		$this->identifiant = $identifiant;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function setMdp($mdp)
	{
		$this->mdp = $mdp;
	}	
	
	
}	
	
?>	