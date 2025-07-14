<?php
include '../include/function.php';

$nom = isset($_GET['nom']) ? trim($_GET['nom']) : null;
$categorie = isset($_GET['categorie']) && $_GET['categorie'] !== '' ? $_GET['categorie'] : null;
$disponibilite = isset($_GET['disponibilite']) && $_GET['disponibilite'] == '1';

$parametres = [];

if ($nom !== null && $nom !== '') {
    $parametres[] = 'nom=' . $nom;
}

if ($categorie !== null) {
    $parametres[] = 'categorie=' . $categorie;
}

if ($disponibilite) {
    $parametres[] = 'disponibilite=1';
}

$url = '../pages/liste_objet.php';
if (!empty($parametres)) {
    $url = $url . '?' . implode('&', $parametres);
}

header('Location: ' . $url);
exit;
?>
