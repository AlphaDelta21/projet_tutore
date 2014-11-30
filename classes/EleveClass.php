<?php
class Eleve
{

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
	
	public function vote($idReponse)
	{
		$requete = $this->bdd->prepare('update reponse set compteur=compteur+1 where id_reponse= :idReponse');
		$requete->execute(array('idReponse'=>$idReponse));
	}
}
?>