<?php 
include '../include/function.php';

rendreUnObjet($_GET['id_emprunt']);

header('location: ../pages/fiche_membre.php?id=' . $_GET['id_retour']);
?>