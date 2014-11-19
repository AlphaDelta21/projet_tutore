<?php

class profManager
{
	private $id;
	private $nom;
	private $prenom;
	private $email;
	private $identifiant;
	private $mdp;
	private $bdd;
	
	

	//constructeur 	
	public function __construct()
	{
	
	}
	
	//destructeur 
	public function __destruct()
	{
		
	}
	
	public function connect()
	{
		try 
		{
			//$this->bdd = new PDO('mysql:host=https://phpmyadmin.iq.iut21.u-bourgogne.fr/; dbname=grp-124', 'grp-124', 'abYxNbGD');
			$this->bdd = new PDO('mysql:host=sql-pedago; dbname=iq-kidioui', 'iq-kidioui', 'VaC4tD85');
		}
		catch (Exception $e) 
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	

	//recupère l'objet prof crée.
	public function add(animal $animal)
	{
		/**requete d'insertion
		*assignation des attributs de l'animal
		*execution requete
		*/
		
		$q= $this->bdd->prepare('INSERT INTO professeur SET nom=:nom, prenom=:prenom, email=:email, identifiant=:identifiant, mdp=:mdp');

		$q->bindParam(':nom', $prof->getnom(), PDO::PARAM_STR, 50);
		$q->bindParam(':prenom', $prof->getprenom(), PDO::PARAM_STR, 50);
		$q->bindParam(':email', $prof->getemail(), PDO::PARAM_STR,50);
		$q->bindParam(':identifiant', $prof->getidentifiant(), PDO::PARAM_STR, 50);
		$q->bindParam(':mdp', $prof->getmdp(), PDO::PARAM_STR, 50);
		return $q->execute();
	}
	
	
	
	public function remove(prof $prof)
	{
		$this->bdd->exec('DELETE FROM professeur WHERE id = '.$prof->getid());
	}	

	
	public function getList()
	{
		
		$animal = array();
		$q = $this->bdd->query("SELECT * FROM professeur");
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
		{
			$tmpprof = new prof();
			$tmpprof->hydrate ($donnees);
			$prof[] = $tmpprof;
		}
		
		//retourne un tableau rempli d'objet 'prof'
		return $prof;		
	}	



	public function getProf($id)
	{
		$q = $this->bdd->query("SELECT * FROM professeur WHERE id='".$id."'");
		
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		if(count($donnees) ==0 ) return FALSE;
		
		$prof = new prof();
		$prof->hydrate($donnees);
		
		return $prof;
	}	
		
		
	public function update(animal $prof)
	{
		
		$q= $this->bdd->prepare("UPDATE professeur 
										SET nom=:nom, espece=:espece, cri=:cri, proprietaire=:proprietaire, age=:age 
										WHERE id = :id");

		$q->bindParam(':id', $animal->getid(), PDO::PARAM_INT);
		$q->bindParam(':nom', $animal->getnom(), PDO::PARAM_STR, 50);
		$q->bindParam(':espece', $animal->getespece(), PDO::PARAM_STR, 50);
		$q->bindParam(':cri', $animal->getcri(), PDO::PARAM_STR,50);
		$q->bindParam(':proprietaire', $animal->getproprietaire(), PDO::PARAM_STR, 50);
		$q->bindParam(':age', $animal->getage(), PDO::PARAM_INT);
		return $q->execute();
	}		
}	
	
?>	