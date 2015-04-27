<?php

/*include('Eleve.php');
include('Formateur.php');*/

class Session
{
	private $dateD;
	private $description;
	private $id;
	private $formateur;
	
	public function Session($dateD,$description,Formateur $formateur)
	{
		$this->dateD = $dateD ;
		$this->description = $description ;
		$this->formateur = $formateur;
	}
	public function setDateD($dateD)
	{
		$this->dateD = $dateD ;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}
	private function setId($id)
	{
		$this->id = $id ;
	}
	
	public function getId()
	{
		return $this->id;
	}
	private function setFormateur(Formateur $formateur)
	{
		$this->formateur = $formateur ;
	}
	
	public function getFormateur()
	{
		return $this->formateur;
	}
	public function getDateD()
	{
		return $this->dateD ;
	}

	public function getDescription()
	{
		return $this->description ;
	}
	
	public function createSession($session) //to do add centre and formation and handle eleve
	{
		$id_formateur = $session->getFormateur->getId();
		$dateD = $session->getDateD();
		$description = $session->getDescription();

		try { 
				$dbh = new PDO('mysql:host=localhost;dbname=m2i', 'root', ''); 
			  	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			 	$dbh->beginTransaction();

				$sth = $dbh->prepare('INSERT INTO session (dateD,description,id_animateur,id_centre,id_formation)
									VALUES (:dateD,:description,:id_formateur,:id_centre,:id_formation)');
				
				$sth->bindParam(':id_formateur', $id_formateur);
				$sth->bindParam(':dateD', $dateD);
				$sth->bindParam(':description', $description);
				$sth->bindParam(':id_centre', null);
				$sth->bindParam(':id_formation', null);

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