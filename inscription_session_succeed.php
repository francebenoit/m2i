<?php

	echo ("la session début".$_POST['dateDebut']." fin ".$_POST['dateFin']." a été cree";

include 'Session.php' ;
include 'Formation.php';
$session = new Session($_POST['dateDebut'],$_POST['dateFin']);
$formation = $_POST['formation'];
//to do sql query to get object
//$formation->addSession($session);

?>

<a href="index.html"> retour </a>