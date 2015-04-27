<?php

	echo ("l'eleve".$_POST['firstname']." ".$_POST['lastname']." a été inscrit";

include 'Eleve.php' ;
$eleve = new Eleve();
$eleve->setNom($_POST['firstname']);
$eleve->setPrenom($_POST['lastname']);
/*try { 
	$dbh = new PDO('mysql:host=localhost;dbname=m2i', 'root', ''); 
  	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 
	$sth = $dbh->prepare('INSERT INTO personne (nom,prenom)
						VALUES (:nom,:prenom)');
	$sth->bindParam(':nom', $_POST['lastname'], PDO::PARAM_STR,50);
	$sth->bindParam(':prenom', $_POST['firstname'], PDO::PARAM_STR, 50);

	$sth->execute();

	$sth = $dbh->prepare('INSERT INTO eleve (id_personne,mdp)
						VALUES (:id,:mdp)');
	$id_personne = $dbh->lastInsertId();
	$sth->bindParam(':id', $id_personne, PDO::PARAM_INT);
	$sth->bindParam(':mdp', $_POST['mdp'], PDO::PARAM_STR, 50);//TO DO encrypt mdp

	$sth->execute();

	} catch (Exception $e) {
	  
	  echo "Failed: " . $e->getMessage();
}

$dbh=null;*/

?>

<a href="index.html"> retour </a>