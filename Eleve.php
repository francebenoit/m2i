<?php

include ('Personne.php');

class Eleve extends Personne
{
	private $id;
	private $mdp;
	private $id_personne;

	public function setMdp($mdp)
	{
		$this->mdp = $mdp ;
	}
	private function setId($id)
	{
		$this->id = $id ;
	}
	
	public function getId()
	{
		return $this->id;
	}
	public function getMdp()
	{
		return $this->mdp ;
	}
	public function createEleve($nom,$prenom,$mdp)
	{
		parent::create($nom,$prenom);
		$id_personne = parent::getId();

		try { 
				$dbh = new PDO('mysql:host=localhost;dbname=m2i', 'root', ''); 
			  	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			 	$dbh->beginTransaction();

				$sth = $dbh->prepare('INSERT INTO eleve (id_personne,mdp)
									VALUES (:id_personne,:mdp)');
				
				$sth->bindParam(':id_personne', $id_personne);
				$sth->bindParam(':mdp', $mdp);

				$sth->execute();

				$dbh->commit();

			}
			catch (Exception $e) {
				  
				  echo "Failed: " . $e->getMessage();
				  $dbh->rollback();
			}

			$dbh=null;
	}


}

?>