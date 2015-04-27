<?php

	echo ("le formateur".$_POST['firstname']." ".$_POST['lastname']." a été inscrit");

include 'Formateur.php' ;
$formateur = new formateur($_POST['firstname'],$_POST['lastname'],);
$formateur->setNom($_POST['firstname']);
$formateur->setPrenom($_POST['lastname']);

?>
<a href="index.html"> retour </a>