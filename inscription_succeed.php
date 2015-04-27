<?php

	echo ("l'eleve".$_POST['firstname']." ".$_POST['lastname']." a été inscrit à la session ".$_POST['session']);

include 'Eleve.php' ;
$eleve = new Eleve();
$eleve->setNom($_POST['firstname']);
$eleve->setPrenom($_POST['lastname']);

?>
<br>
<a href="index.html"> retour </a>