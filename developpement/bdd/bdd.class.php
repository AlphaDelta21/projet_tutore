<?php

class bdd
{
	private $id;
	private $nom;
	private $prenom;
	private $mail;
	private $identifiant;
	private $mdp;
	private $bdd;
	
	

	//constructeur 	
	public function __construct()
	{
	
	}
	
	//non utilisé
	public function __destruct()
	{
		
	}
	
	public function connect()
	{
		try 
		{
			//$this->bdd = new PDO('mysql:host=https://phpmyadmin.iq.iut21.u-bourgogne.fr/; dbname=grp-124', 'grp-124', 'abYxNbGD');
			$this->bdd = new PDO('mysql:host=https://iutdijon.u-bourgogne.fr/sql-pedago/phpmyadmin/index.php; dbname=iq-kidioui', 'iq-kidioui_adm', 'TuD8R778');
		}
		catch (Exception $e) 
		{
			die('Erreur : ' . $e->getMessage());
		}
	}
	
/*	public function getBdd()
	{
		return $this->bdd;	
	}	
*/	


	//recupère l'objet crée.
	public function add(animal $animal)
	{
		/**requete d'insertion
		*assignation des attributs de l'animal
		*execution requete
		*/
		
		$q= $this->bdd->prepare('INSERT INTO question SET nom=:nom');

		$q->bindParam(':nom', $question->getnom(), PDO::PARAM_STR, 250);
		return $q->execute();
	}
	
	
	
	public function remove(Animal $animal)
	{
		$this->bdd->exec('DELETE FROM animal WHERE id = '.$animal->getid());

	}	

	
	public function getList()
	{
		
		$animal = array();
		$q = $this->bdd->query("SELECT * FROM animal");
		
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) 
		{
			$tmpanimal = new animal();
			$tmpanimal->hydrate ($donnees);
			$animal[] = $tmpanimal;
		}
		
		//retourne un tableau rempli d'objet 'animal'
		return $animal;		
	}	


	public function getAnimal($id)
	{
		$q = $this->bdd->query("SELECT * FROM animal WHERE id='".$id."'");
		
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		
		if(count($donnees) ==0 ) return FALSE;
		
		$animal = new animal();
		$animal->hydrate($donnees);
		
		return $animal;
	}	
		
		
	public function update(animal $animal)
	{
		
		$q= $this->bdd->prepare("UPDATE animal 
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