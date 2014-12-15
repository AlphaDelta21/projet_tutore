<?php

class Question
{
	private $bdd;
	
	private $idQuestion;
	private $idProf;
	private $question;
	private $code;
	private $publiable;
	
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
	
	public function hydrate(array$donnees)
	{
		foreach($donnees as $key=>$value)
		{
			$method='set'.ucfirst($key);
			if(method_exists($this,$method))
				$this->$method($value);
		}
	}
	
	public function toString()
	{
		$chaine = $this->idQuestion . '/' . $this->idProf . '/' . $this->question . '/' . $this->code . '/' . $this->publiable;
		
		$reponse = $this->getReponse();
		
		for($i=0;$i<count($reponse); $i++)
		{
			$chaine+= $reponse[$i];
		}	
		
		return $chaine;
	}
	
	public function ajouter($arrayReponse)
	{
		
		$requete= $this->bdd->prepare('
		INSERT INTO question(id_prof, nomQuestion, code)
		VALUES(:id_prof, :nomQuestion, :code)');
		
		$requete->execute(array(
			'id_prof' => $this->idProf,
			'nomQuestion' => $this->question,
			'code' => $this->code));
					
				
		$requete=$this->bdd->prepare('
		SELECT id_question
		FROM question
		WHERE nomQuestion = :nomQuestion');
		
		$requete->execute(array('nomQuestion' => $this->question));
		
		$result = $requete->fetch();
		
		$idQuestion=intval($result[0]);		
				
		for($i=0;$i<count($arrayReponse); $i++)
		{
									
			$requete2 = $this->bdd->prepare('
			INSERT INTO reponse(id_question, nomReponse)
			VALUES(:id_question, :nomReponse)');
			
			$requete2->execute(array(
			'id_question' => $idQuestion,
			'nomReponse' => $arrayReponse[$i]));

		}
		
	}
	
	public function modifier($id, $arrayReponse)
	{
				
		$requete3 = $this->bdd->prepare('SELECT id_reponse FROM reponse WHERE id_question = :id');
		
		$requete3->execute(array('id' => $id));
		
		$j=0;
		$idReponse = array();
		while($resultat = $requete3->fetch(PDO::FETCH_NUM))
		{
				foreach($resultat as $valeur)
				{
					$idReponse[$j] = $valeur;
					$j++;
				}
					
		}
			
		for($i=0;$i<count($arrayReponse);$i++)
		{
			$updateReponse=$this->bdd->prepare('UPDATE reponse
			SET nomReponse = :reponse WHERE id_reponse = '. $idReponse[$i]);
		
			$updateReponse->execute(array('reponse' => $arrayReponse[$i]));
		}
		
		$updateQuestion=$this->bdd->prepare('UPDATE question
		SET nomQuestion = :question WHERE id_question = :id');
		
		$updateQuestion->execute(array('question' => $this->question,'id' => $id));
		
		$updateCode=$this->bdd->prepare('UPDATE question
		SET code = :code WHERE id_question = :id' );
		
		$updateCode->execute(array('code' => $this->code,'id' => $id));
		
		
	
	}
	
	
	public function supprimer($id)
	{

		$deleteReponse=$this->bdd->exec('DELETE FROM reponse
		WHERE id_question = '. $id);
		
		$deleteQuestion=$this->bdd->exec('DELETE FROM question
		WHERE id_question = '. $id);
		
	}

	
	
	public function afficher($code)
	{
		$requete= $this->bdd->prepare('
		SELECT *  
		FROM question
		WHERE code = :code');
		
		$requete->execute(array('code' => $code));
		
		
		$result = $requete->fetch(PDO::FETCH_ASSOC);
		print_r($result);
		
		/*$result = $requete->fetch(PDO::FETCH_ASSOC);
		$this->hydrate($result);*/
		
		return $this->toString();
	}
	
	
	public function getListeQuestion()
	{
		$requete = $this->bdd->query('SELECT nomQuestion FROM question');
				
		
		while($donnees=$requete->fetch(PDO::FETCH_NUM))
		{
			foreach($donnees as $valeur)
				$array[] = $valeur;
		}
		return $array;
	}
	
	public function getReponse()
	{
		$requete = $this->bdd->prepare('SELECT nomReponse FROM reponse WHERE id_question = :id');
		
		$requete->execute(array('id' => $this->idQuestion));				
		
		while($donnees=$requete->fetch(PDO::FETCH_NUM))
		{
			foreach($donnees as $valeur)
				$array[] = $valeur;
		}
		return $array;
	}
	
	
	
	
	//Accesseurs
	
	public function getIdQuestion()
	{
		return $this->id_question;
	}
	
	public function getIdProf()
	{
		return $this->id_prof;
	}
	
	public function getQuestion()
	{
		return $this->question;
	}
	
	public function getCode()
	{
		return $this->code;
	}
	
	public function isPubliable()
	{
		return $this->publiable;
	}
	
	
	
	
	public function setId_question($id)
	{
		$this->idQuestion = $id;
	}
	
	public function setId_prof($id)
	{
		$this->idProf = $id;
	}
	
	public function setNomQuestion($question)
	{
		$this->question = $question;
	}
	
	public function setCode($code)
	{
		$this->code =$code;
	}
	
	public function setPubliable($bool)
	{
		$this->publiable = $bool;
	}
	
	
	
	
}

?>