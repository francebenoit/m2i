<?php
include ('Personne.php');
include('Session.php');

class Formateur extends Personne
{
	private $entreprise;
	private $id;
	private $sessions;

	public function Formateur1($nom,$prenom,$entreprise)
	{
		$this.parent::setNom($nom);
		$this.parent::setPrenom($prenom);
		$this->entreprise = $entreprise;
		$this->sessions = null;
	}
	public function setEntreprise($entreprise)
	{
		$this->entreprise = $entreprise ;
	}

	public function setId($id)
	{
		$this->id = $id ;
	}
	
	public function getId()
	{
		return $this->id;
	}
	public function addSessions(Session $session)
	{
		$this->sessions[$this->sessions->count()] = $session ;
	}

	public function getSessions()
	{
		return $this->sessions;
	}
	
	public function getEntreprise()
	{
		return $this->entreprise ;
	}

	public function createFormateur($nom,$prenom,$entreprise)
	{
		parent::create($nom,$prenom);
		$id_personne = parent::getId();

		try { 
				$dbh = new PDO('mysql:host=localhost;dbname=m2i', 'root', ''); 
			  	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			 	$dbh->beginTransaction();

				$sth = $dbh->prepare('INSERT INTO animateur (id_personne,entreprise)
									VALUES (:id_personne,:ent)');

				$sth->bindParam(':ent', $entreprise);
				$sth->bindParam(':id_personne', $id_personne);

				$sth->execute();

				$dbh->commit();

			}
			catch (Exception $e) {
				  
				  echo "Failed: " . $e->getMessage();
				  $dbh->rollback();
			}

			$dbh=null;
	}
	public function updateFormateur($id,$value,$field)
	{

		try { 
				$dbh = new PDO('mysql:host=localhost;dbname=m2i', 'root', ''); 
			  	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			 	$dbh->beginTransaction();

			 	if ($field == "entreprise")
			 	{
			 		$sth = $dbh->prepare("UPDATE animateur
									SET $field=:value
									WHERE id=:id"	);

					//comment
					$sth->bindParam(':value', $value);
					$sth->bindParam(':id', $id);
					$sth->execute();
					$dbh->commit();
			 	}
			 	else
			 	{
			 		$sth = $dbh->prepare('SELECT id_personne 
			 							FROM animateur
			 							WHERE id=:id');
					$sth->bindParam(':id', $id);
					$sth->execute();
					$row_id = $sth->fetchall(PDO::FETCH_ASSOC);
					$id=$row_id[0]["id"];
					$sth->commit();

					parent::updatePersonne($id,$value,$field);

			 	}		

			}
			catch (Exception $e) {
				  
				  echo "Failed: " . $e->getMessage();
				  $dbh->rollback();
			}

			$dbh=null;
	}
	public function findFormateurById($id)
	{
		try { 
				$dbh = new PDO('mysql:host=localhost;dbname=m2i', 'root', ''); 
			  	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			 	$dbh->beginTransaction();

				$sth = $dbh->prepare('SELECT * from animateur
									WHERE id=:id');

				$sth->bindParam(':id', $id);

				$sth->execute();
				$row_id = $sth->fetchall(PDO::FETCH_ASSOC);

				$this->convertTabToObject($row_id);

				$dbh->commit();

			}
			catch (Exception $e) {
				  
				  echo "Failed: " . $e->getMessage();
				  $dbh->rollback();
			}

			$dbh=null;
	}
	public function __toString()
	{
		return ("nom : ".parent::getNom()." prenom : ".parent::getPrenom()." entreprise : ".$this->entreprise."<br>");
	}
	public function setParent($id)
	{
		//create parent
		try { 
				$dbh = new PDO('mysql:host=localhost;dbname=m2i', 'root', ''); 
			  	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			 	$dbh->beginTransaction();

				$sth = $dbh->prepare('SELECT * from personne
									WHERE id=:id');

				$sth->bindParam(':id', $id);

				$sth->execute();
				$row_id = $sth->fetchall(PDO::FETCH_ASSOC);

				$parent_values = $this->getParent($row_id);
				
				$dbh->commit();

			}
			catch (Exception $e) {
				  
				  echo "Failed: " . $e->getMessage();
				  $dbh->rollback();
			}

			$dbh=null;
			parent::setNom($parent_values[1]);
			parent::setPrenom($parent_values[2]);
			parent::setId($parent_values[0]);

	}

	public function convertTabToObject($tab)
	{
		foreach ($tab[0] as $key => $value)
		{
			if ($key!='id_personne')
			{
				$Key = ucfirst($key) ;//set first letter to uppercase
				$setter = "set".$Key ;
				$this->$setter($value);
			}
			else
				$id_parent = $value;
		}
		$this->setParent($id_parent);
	}
	//return tab with id, nom, prenom
	public function getParent($tab)
	{	
		$i=0;
		foreach ($tab[0] as $key => $value)
		{
			$values[$i] = $value;
			$i++;	
		}
		return $values;
	}
	public function remove($id)
	{
		try { 
				$dbh = new PDO('mysql:host=localhost;dbname=m2i', 'root', ''); 
			  	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			 	$dbh->beginTransaction();

				$sth = $dbh->prepare('SELECT id_personne 
			 							FROM animateur
			 							WHERE id=:id');
				$sth->bindParam(':id', $id);
				$sth->execute();
				$row_id = $sth->fetchall(PDO::FETCH_ASSOC);
				
				$id_personne=$row_id[0]["id_personne"];
				$dbh->commit();
			}
			catch (Exception $e) {
				  
				  echo "Failed: " . $e->getMessage();
				  $dbh->rollback();
			}
			try { 
				$dbh = new PDO('mysql:host=localhost;dbname=m2i', 'root', ''); 
			  	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			 	$dbh->beginTransaction();

				$sth = $dbh->prepare('DELETE FROM animateur
			 							WHERE id=:id');
				$sth->bindParam(':id', $id);
				$sth->execute();

				$sth = $dbh->prepare('DELETE FROM personne
			 							WHERE id=:id');
				$sth->bindParam(':id', $id_personne);
				$sth->execute();
			}
			catch (Exception $e) {
				  
				  echo "Failed: " . $e->getMessage();
				  $dbh->rollback();
			}		


			$dbh=null;
	}
}

?>