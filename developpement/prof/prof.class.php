<?

class prof
{
	private $id;
	private $nom;
	private $prenom;
	private $email;
	private $identifiant;
	private $mdp;
	
	//constructeur par defaut
	public function __construct()
	{
		
	}
	
	//renvoi les données séparées par un slash.
	public function toString()
	{
		return $this->id.'/'.$this->nom.'/'.$this->prenom.'/'.$this->email.'/'.$this->identifiant.'/'.$this->mdp;
	}
	
	
	//permet d'alimenter toutes les variables privées de la classe
	public function hydrate(array $donnees)
	{
		foreach($donnees as $key=>$value)
		{
			$method= 'set'.ucfirst($key);
			
			if(method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
	
	public function setid($id)
	{
		$this->id = $id;	
	}
	
	public function getid()
	{
		return $this->id;
	}	
	
	public function setnom($nom)
	{
		$this->nom = $nom;
	}
	
	public function getnom()
	{
		return $this->nom;
	}	

	public function setprenom($prenom)
	{
		$this->prenom = $prenom;
	}
	
	public function getprenom()
	{
		return $this->prenom;		
	}
	
	public function setemail($email)
	{
		$this->email = $email;
	}
	
	public function getemail()
	{
		return $this->email;		
	}	
	
	public function setidentifiant($identifiant)
	{
		$this->identifiant = $identifiant;
	}
	
	public function getidentifiant()
	{
		return $this->identifiant;		
	}	
	
	public function setmdp($mdp)
	{
		$this->mdp = $mdp;
	}
	
	public function getmdp()
	{
		return $this->mdp;		
	}



}
?>