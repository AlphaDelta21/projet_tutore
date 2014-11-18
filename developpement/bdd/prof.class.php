<?php


class prof
{	
	private $id;
	private $nom;
	private $prenom;
	private $email;
	private $identifiant;
	private $mdp;
	
	function __construct()
	{
	
	}
	
	function __destruct()
	{
	
	}
	
	function getid()
	{
		return $this->id;
	}	
	
	function setid($id)
	{
		$this->id = $id;
	}
	
	function getnom()
	{
		return $this->nom;
	}	
	
	function setnom($nom)
	{
		$this->nom = $nom;
	}	
		
	function getemail()
	{
		return $this->email;
	}	
	
	function setemail($email)
	{
		$this->email = $email;
	}
	
	function inscription()
	{
		
	}
	
}		
?>