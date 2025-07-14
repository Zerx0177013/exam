<?php
include "connexion.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function get_info_user($email,$mdp) {
    $bdd= connexion();
    $query = "SELECT * FROM final_project_membre where mdp='$mdp' and email='$email'";

    return mysqli_query($bdd,$query);
}


function verif_compte_exist ($email,$mdp) {
    $bdd= connexion();
    $query = "SELECT * FROM final_project_membre where mdp='$mdp' and email='$email'";

    if (mysqli_num_rows( mysqli_query($bdd,$query)) > 0) {
        return true;
    }
    return false;
}
function inscription ($email,$mdp,$nom,$date,$ville,$genre){
    $bdd= connexion();
    $query = "INSERT INTO final_project_membre (nom , date_de_naissance, genre, email, ville, mdp, image_profil) 
    VALUES ('$nom', '$date', '$genre', '$email', '$ville', '$mdp', null)";

    return mysqli_query($bdd,$query);
}

function getListeObjet($id_categorie, $nom = null, $disponible_seulement = false){
    $bdd = connexion();
    $conditions = [];

    if ($id_categorie !== null && $id_categorie !== '') {
        $id_categorie = (int)$id_categorie; 
        $conditions[] = "o.id_categorie = $id_categorie";
    }

    if ($nom !== null && $nom !== '') {
        $conditions[] = "o.nom_objet LIKE '%$nom%'";
    }

    if ($disponible_seulement) {
        $conditions[] = "e.date_retour IS NULL";
    }

    $where = "";
    if (!empty($conditions)) {
        $where = "WHERE " . implode(" AND ", $conditions);
    }

    $query = "SELECT o.id_objet, o.nom_objet, o.id_categorie, e.date_retour
              FROM final_project_objet o
              LEFT JOIN final_project_emprunt e ON o.id_objet = e.id_objet
              $where
              ORDER BY o.nom_objet";

    return mysqli_query($bdd, $query);
}


function getCategories() {
    $bdd = connexion();
    $query = "SELECT * FROM final_project_categorie_objet";
    return mysqli_query($bdd, $query);
}

function getNombreObjet(){
    $bdd = connexion();
    $query = "SELECT * FROM final_project_objet";

    return mysqli_num_rows(mysqli_query($bdd, $query));

}

function addObjet($id_user, $nomObjet, $id_categorie, $bdd) {
    // $bdd = connexion();
    $query = "INSERT INTO final_project_objet (id_membre, nom_objet, id_categorie) VALUES ($id_user, '$nomObjet', '$id_categorie')";
    return mysqli_query($bdd, $query);
}

function addImageToObjet($id_objet, $nom_image, $bdd) {
    // $bdd = connexion();
    $query = "INSERT INTO final_project_images_objet (id_objet, nom_image) VALUES ($id_objet, '$nom_image')";
    return mysqli_query($bdd, $query);
}

function getNomObjet($id_objet) {
    $bdd = connexion();
    $query = "SELECT nom_objet FROM final_project_objet WHERE id_objet = $id_objet";

    $result = mysqli_query($bdd, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        return $row['nom_objet'];
    }
    
    return null; 
}
function getHistoriqueObjetById($id_objet) {
    $bdd = connexion();
    $query = "SELECT o.id_objet, o.nom_objet, e.date_emprunt, e.date_retour
              FROM final_project_objet o
              LEFT JOIN final_project_emprunt e ON o.id_objet = e.id_objet
              WHERE o.id_objet = $id_objet
              ORDER BY e.date_emprunt ASC";

    return mysqli_query($bdd, $query);
}
function getImageObjetById($id_objet)  {
    $bdd = connexion();
    $query = "SELECT nom_image FROM final_project_images_objet WHERE id_objet = $id_objet";

    return mysqli_query($bdd, $query);
}

function addEverythingObjet($id_user, $nomObjet, $id_categorie, $nom_image){
    $bdd = connexion();
    addObjet($id_user, $nomObjet, $id_categorie, $bdd);
    $id_objet = mysqli_insert_id($bdd); 
    addImageToObjet($id_objet, $nom_image, $bdd);
}


?>