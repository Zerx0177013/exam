<?php
include "connexion.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function get_info_user($email,$mdp) {
    $bdd= connexion();
    $query = "SELECT * FROM membre where mdp='$mdp' and email='$email'";

    return mysqli_query($bdd,$query);
}


function verif_compte_exist ($email,$mdp) {
    $bdd= connexion();
    $query = "SELECT * FROM membre where mdp='$mdp' and email='$email'";

    if (mysqli_num_rows( mysqli_query($bdd,$query)) > 0) {
        return true;
    }
    return false;
}
function inscription ($email,$mdp,$nom,$date,$ville,$genre){
    $bdd= connexion();
    $query = "INSERT INTO membre (nom , date_de_naissance, genre, email, ville, mdp, image_profil) 
    VALUES ('$nom', '$date', '$genre', '$email', '$ville', '$mdp', null)";

    return mysqli_query($bdd,$query);
}

function getListeObjet($id_categorie){
    $bdd = connexion();
    $where = "";

    if ($id_categorie !== null ) {
        $id_categorie = (int)$id_categorie; 
        $where = "WHERE o.id_categorie = $id_categorie";
    }

    $query = "SELECT o.id_objet, o.nom_objet, o.id_categorie, e.date_retour
              FROM objet o
              LEFT JOIN emprunt e ON o.id_objet = e.id_objet
              $where
              ORDER BY o.nom_objet";

    return mysqli_query($bdd, $query);
}


function getCategories() {
    $bdd = connexion();
    $query = "SELECT * FROM categorie_objet";
    return mysqli_query($bdd, $query);
}

?>