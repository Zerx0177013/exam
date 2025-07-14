<?php
include '../include/function.php';

session_start();
$date_emprunt = $_POST['date_emprunt'];
$id_objet = $_POST['id_objet'];
$id_membre = $_SESSION['actu_user']['id_membre'];
$dateajourdui = date('Y-m-d');
$new_date = date('Y-m-d', strtotime($dateajourdui . ' + ' . $date_emprunt . ' days'));

emprunterObjet($id_objet, $id_membre, $new_date);

header('Location: ../pages/liste_objet.php');
exit;
?>