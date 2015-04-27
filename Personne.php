<?php

class Personne
{
	private $nom;
	private $prenom;
	private $id;

	public function setNom($nom)
	{
		$this->nom = $nom ;
	}

	public function setPrenom($prenom)
	{
		$this->prenom = $prenom ;
	}

	public function setId($id)
	{
		$this->id = $id ;
	}

	public function getId()
	{
		return $this->id;
	}
	public function getNom()
	{
		return $this->nom ;
	}

	public function getPrenom()
	{
		return $this->prenom ;
	}

	public function create($nom,$prenom)
	{
		try { 
				$dbh = new PDO('mysql:host=localhost;dbname=m2i', 'root', ''); 
			  	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			 	$dbh->beginTransaction();

				$sth = $dbh->prepare('INSERT INTO personne (nom,prenom)
									VALUES (:nom,:prenom)');
				$sth->bindParam(':nom', $nom);
				$sth->bindParam(':prenom', $prenom);

				$sth->execute();
				$this->id = $dbh->lastInsertId();
				$dbh->commit();

			}
			catch (Exception $e) {
				  
				  echo "Failed: " . $e->getMessage();
				  $dbh->rollback();
			}


			$dbh=null;
	}
	public function updatePersonne($id,$value,$field)
	{
		try { 
				$dbh = new PDO('mysql:host=localhost;dbname=m2i', 'root', ''); 
			  	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			 	$dbh->beginTransaction();

				$sth = $dbh->prepare('UPDATE personne
									SET :field=:value
									WHERE id=:id');

				$sth->bindParam(':field', $field);
				$sth->bindParam(':id', $id);
				$sth->bindParam(':value', $value);

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