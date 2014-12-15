<?php

class Resultat
{
	private $bdd;
	
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
	
	
	public function resultat($id)
	{
		$requete=$this->bdd->prepare('SELECT compteur FROM reponse WHERE id_question = :id');
		$requete->execute(array('id' => $id));
		
		while($donnees=$requete->fetch(PDO::FETCH_NUM))
		{
			foreach($donnees as $valeur)
				$array[] = $valeur;
		}


		return $array;
	}
	
	
}
?>