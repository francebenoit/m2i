<?php

	echo ("la formation".$_POST['firstname']." a été cree";

include 'Centre.php' ;
include 'Formation.php';
$formation = new Formation($_POST['firstname']);
$centre = $_POST['centre'];
//to do sql query to get object
//$centre->setFormation($formation);

?>

<a href="index.html"> retour </a>