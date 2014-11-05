<?php


class question
{	
	private $id;
	private $nom;
	
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
	
}		
?>