<?php
class Eleve
{
	/*Constructeur de classe Eleve, initialise la connexion à la BDD*/
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
	
	
	/*Fonction permettant la prise en compte du vote d'un eleve, sur la réponse d'id $idReponse*/
	public function vote($idReponse)
	{
		$requete = $this->bdd->prepare('update reponse set compteur=compteur+1 where id_reponse= :idReponse');
		$requete->execute(array('idReponse'=>$idReponse));
	}
}
?>