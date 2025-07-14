<?php
include '../include/function.php';

session_start();
$nom = $_POST['nom'];
$genre = $_POST['genre'];
$email = $_POST['email'];
$mdp = $_POST['mdp'];
$ville = $_POST['ville'];
$date_de_naissance = $_POST['date_de_naissance'];

$resultat = inscription($email, $mdp, $nom, $date, $ville, $genre);
$SESSION['actu_user'] = mysqli_fetch_assoc(get_info_user($_POST['email'],$_POST['mdp']));
header('Location: ../pages/liste_objet.php')
?>