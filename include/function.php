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

function getListeObjet(){
    $bdd= connexion();
    $query = "SELECT * FROM objet ORDER BY nom_objet ASC";
    return mysqli_query($bdd, $query);
}

function getProprio($id_objet){
    
}

?>