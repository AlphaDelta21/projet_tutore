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
		echo("Bonjour");
		
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
	
	}
	
	public function getQuestion($id)
	{
	}
	
	public function getListeQuestion()
	{
	}
	
	public function getCode($id)
	{
	}
	
	public function getIdProf($id)
	{
	}
	
	public function getReponse($id)
	{
	}
}

?>