<?php

	echo ("le centre".$_POST['firstname']." a été inscrit";

include 'Centre.php' ;
$centre = new Centre();
$centre->setNom($_POST['firstname']);

?>

<a href="index.html"> retour </a>