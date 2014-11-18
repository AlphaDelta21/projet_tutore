<?php

class ConnectionManager{
	
	private $identifiant;
	private $motdepasse;
	
	function connect(){
		try {
				$this->_bdd = new PDO('mysql:host=https://iutdijon.u-bourgogne.fr/sql-pedago/phpmyadmin/index.php , dbname=iq-kidioui',
								'iq-kidioui_adm',
								'TuD8R778');
				}
		
			catch (Exception $e) {
				die('Erreur :' . $e->getMessage());
			}
	}
}

<?