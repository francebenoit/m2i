<?php
//include "Personne.php";
//include "Eleve.php";
include "Formateur.php";
//include "Session.php";

	$nom = 'homer';
	$prenom = 'simpson';
	$mdp='mdp';

	$nomf = 'billy';
	$prenomf = 'the kid';
	$ent= 'farwest';
	
	/*$eleve = new Eleve();
	$eleve->createEleve($nom,$prenom,$mdp);

	$form = new Formateur();
	$form->createFormateur($nomf,$prenomf,$ent);*/


//find formateurbyID
	/*$formateur=new Formateur();
	$formateur->findFormateurById(6);
echo $formateur;die('here');*/


//Modify formateur
$id=6;
$value = "m2i";
$field = "entreprise";
	$formateur = new Formateur();
	$formateur->updateFormateur($id,$value,$field);
	
//delete formateur
	/*$formateur = new Formateur();
	$formateur->remove(5);
	echo " <br> end";*/

?>

<a href="test.php"> retest </a>