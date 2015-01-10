<?php

class Question
{
	private $bdd;
	
	private $idQuestion;
	private $idProf;
	private $question;
	private $code;
	private $publiable;
	private $theme;
	
	/*Constructeur de la classe Question, initialise la connexion à la BDD*/
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
		
		$this->theme="";
	}
	/*Permet l'hydration de la question, c'est à dire l'initialision des attributs via le tableau recu en parametres $donnes*/
	public function hydrate(array $donnees)
	{
		foreach($donnees as $key=>$value)
		{
			$method='set'.ucfirst($key);

			if(method_exists($this,$method))
				$this->$method($value);
		}
	}
	
	/*Retourne les propriétés de la question et les réponses, sous forme d'une chaine de caractere, séparé par des '*' */
	public function toString()
	{
		$chaine = $this->idQuestion . '*' . $this->idProf . '*' . $this->question . '*' . $this->code . '*' . $this->publiable . '*' . $this->theme;
		
		$reponse = $this->getReponse($this->idQuestion);
		for($i=0;$i<count($reponse); $i++)
		{
			$chaine= $chaine. '*' . $reponse[$i] ;
		}
		
		return $chaine;
	}
	
	/*Retourne les propriétés de la question et les réponses, sous forme d'un tableau */
	public function toArray()
	{
	$array = array($this->idQuestion, $this->idProf, $this->question, $this->code, $this->publiable, $this->theme);
	
	$reponse = $this->getReponse($this->idQuestion);
		for($i=0;$i<count($reponse); $i++)
		{
			$array[] = $reponse[$i] ;
		}
		
	return $array;
	
	}
	/* Fonction permettant d'ajouter la question actuelle dans la BDD, ainsi que les réponses correspondante, contenu dans $arrayReponse*/
	public function ajouter($arrayReponse)
	{
		
		$requete= $this->bdd->prepare('
		INSERT INTO question(id_prof, nomQuestion, code, id_theme)
		VALUES(:id_prof, :nomQuestion, :code, :theme)');
		
		$requete->execute(array(
			'id_prof' => $this->idProf,
			'nomQuestion' => $this->question,
			'code' => $this->code,
			'theme' => $this->theme));
					
				
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
	
	/*Fonction permettant de modifier la question d'id $id, avec le tableau de reponse $arrayReponse*/
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
		
		$updateTheme=$this->bdd->prepare('UPDATE question
		SET id_theme = :theme WHERE id_question = :id' );
		
		$updateCode->execute(array('theme' => $this->theme,'id' => $id));
		
	
	}
	
	/*Fonction permettant de supprimer la question d'id $id*/
	public function supprimer($id)
	{
		$deleteVote=$this->bdd->exec('DELETE FROM vote
		WHERE id_question = '. $id);

		$deleteReponse=$this->bdd->exec('DELETE FROM reponse
		WHERE id_question = '. $id);
		
		$deleteQuestion=$this->bdd->exec('DELETE FROM question
		WHERE id_question = '. $id);
		
		if($deleteReponse!=false && $deleteQuestion!=false)
			return true;
		else
			return false;
		
	}

	
	/* Fonction renvoyant une chaine de caractere via la fonction toString(), contenant la question de code $code*/
	public function afficher($code)
	{
		$requete= $this->bdd->prepare('SELECT * FROM question WHERE code = :code');
		
		$requete->execute(array('code' => $code));
		
		$result = $requete->fetch(PDO::FETCH_ASSOC);

		if(gettype($result)=="array")
		{
			
			$this->hydrate($result);
			
			return $this->toString();
		}
		else
			return false;
		
		
		
	}
	
	/*Fonction permettant d'initialiser les attributs de la question via la question d'id $id dans la BDD*/
	public function hydrateId($id)
	{
		$requete= $this->bdd->prepare('SELECT * FROM question WHERE id_question = :id');
		
		$requete->execute(array('id' => $id));
		if($requete!=false)
		{
			$result = $requete->fetch(PDO::FETCH_ASSOC);
			$this->hydrate($result);
		}
		
	}
	
	public function publier($id)
	{
		$requete = $this->bdd->exec('UPDATE question SET publiable = 1 WHERE id_question = ' .$id);
	}
	
	
	public function getListeQuestion($idProf)
	{
			$result = array();
			$requete= $this->bdd->query('SELECT id_question FROM question WHERE id_prof ="'.$idProf.'";');
			
			$i=0;
			while($val = $requete->fetch(PDO::FETCH_NUM))
			{
				$result[$i]=$val[0];
				$i++;
			}
			
			$j;
			$array = array();
			
			for($j=0;$j<count($result);$j++)
			{
				$requete= $this->bdd->prepare('SELECT * FROM question WHERE id_question = :id');
				$requete->execute(array('id' => $result[$j]));

				$resultat = $requete->fetch(PDO::FETCH_ASSOC);
				$this->hydrate($resultat);

				$array[$j]=$this->toArray();
			}
			
			return $array;
	}
	
	public function getReponse($id)
	{
		$requete = $this->bdd->prepare('SELECT nomReponse FROM reponse WHERE id_question = :id');
		
		$requete->execute(array('id' => $id));				
		
		$array = array();
		while($donnees=$requete->fetch(PDO::FETCH_NUM))
		{
			foreach($donnees as $valeur)
				$array[] = $valeur;
		}
		return $array;
	}
	
	public function getIdReponse($reponse)
	{
		$requete = $this->bdd->prepare('SELECT id_reponse FROM reponse WHERE nomReponse = :reponse');
		
		$requete->execute(array('reponse' => $reponse));				
		
		$result=$requete->fetch(PDO::FETCH_NUM);

		return $result[0];
	}
	
	function afficheListe($bigArray, $i)
	{
	
		$array = $bigArray[$i];
		echo '<tr>';
			echo '<td>'.$array[2].'</td>';
			echo '<td>'.$array[3].'</td>';
			
			
			echo 	'<td><input type="button" value="Modifier" onclick="location.assign(\'http://iutdijon.u-bourgogne.fr/pedago/iq/kidioui/admin/trait_mod.php?nom=' . $array[0] . '\')" </td>
					<td><input type="button" value="Supprimer" onclick="location.assign(\'http://iutdijon.u-bourgogne.fr/pedago/iq/kidioui/admin/trait_sup.php?nom=' . $array[0] . '\')" </td>
					<td><input type="button" value="Publier" onclick="location.assign(\'http://iutdijon.u-bourgogne.fr/pedago/iq/kidioui/admin/trait_pub.php?nom=' . $array[0] . '\')" </td>										
				</tr>';
	}
	
	
	
	
	//Accesseurs
	
	public function getIdQuestion()
	{
		return $this->idQuestion;
	}
	
	public function getIdProf()
	{
		return $this->idProf;
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
	
	public function getTheme()
	{
		return $this->theme;
	}
	
	
	
	
	public function setId_question($idQ)
	{
		$this->idQuestion = $idQ;
	}
	
	public function setId_prof($idP)
	{
		$this->idProf = $idP;
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
	
	public function setTheme($theme)
	{
		$this->theme = $theme;
	}
	
	
	
	
}

?>