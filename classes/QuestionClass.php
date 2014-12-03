<?php

class Question
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
	
	public function ajouter($question, $prof, $code,  $arrayReponse)
	{
<<<<<<< HEAD
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
		
=======
		echo("Bonjour");
>>>>>>> 020e6c338b9641da96a1b9ee3ecb63f509924c96
		
		$requete= $this->bdd->prepare('
		INSERT INTO question(id_prof, nomQuestion, code)
		VALUES(:id_prof, :nomQuestion, :code)');
		
		$requete->execute(array(
			'id_prof' => $prof,
			'nomQuestion' => $question,
			'code' => $code));
			
		$requete=$this->bdd->prepare('
		SELECT id_question
		FROM question
		WHERE nomQuestion = :nomQuestion');
		
		$requete->execute(array('nomQuestion' => $question));
		
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
	
	public function supprimer($question)
	{

		$requete =$this->bdd->prepare('
		SELECT id_question 
		FROM question
		WHERE nomQuestion = :nomQuestion');
		
		$requete->execute(array('nomQuestion' => $question));
		
		$idQuestion = $requete->fetch();
		
		$deleteReponse=$this->bdd->exec('DELETE FROM reponse
		WHERE id_question = '. $idQuestion[0]);
		
		$deleteQuestion=$this->bdd->exec('DELETE FROM question
		WHERE id_question = '. $idQuestion[0]);
		
	}
	
	public function modifier($question, $arrayReponse, $newQuestion)
	{
	
		$requete =$this->bdd->prepare('
		SELECT id_question 
		FROM question
		WHERE nomQuestion = :nomQuestion');
		
		$requete->execute(array('nomQuestion' => $question));
		
		$idQuestion = $requete->fetch();
			
		$requete3 = $this->bdd->prepare('SELECT id_reponse FROM reponse WHERE id_question = :question');
		
		$requete3->execute(array('question' => $idQuestion[0]));
		
		$j=0;
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
		SET nomQuestion = :question WHERE id_question = '. $idQuestion[0]);
		
		$updateQuestion->execute(array('question' => $newQuestion));
	
	}
	
	public function publier()
	{
	
	}
	
	public function getId($question)
	{
		$requete = $this->bdd->prepare('SELECT id_question FROM question WHERE nomQuestion = :question');
		
		$requete->execute(array('question' => $question));
		
		$result = $requete->fetch();
		
		return $result[0];
	}
	
	public function getQuestion($id)
	{
		$requete = $this->bdd->prepare('SELECT nomQuestion FROM question WHERE id_question = :id');
		
		$requete->execute(array('id' => $id));
		
		$result = $requete->fetch();
		
		return $result[0];
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
	
	public function getCode($id)
	{
		$requete = $this->bdd->prepare('SELECT code FROM question WHERE id_question = :id');
		
		$requete->execute(array('id' => $id));
		
		$result = $requete->fetch();
		
		return $result[0];
	}
	
	public function getIdProf($id)
	{
		$requete = $this->bdd->prepare('SELECT id_prof FROM question WHERE id_question = :id');
		
		$requete->execute(array('id' => $id));
		
		$result = $requete->fetch();
		
		return $result[0];
	}
	
	public function getReponse($id)
	{
		$requete = $this->bdd->prepare('SELECT nomReponse FROM reponse WHERE id_question = :id');
		
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
