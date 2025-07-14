<?php 
include '../include/function.php';
session_start();
if (verif_compte_exist($_POST['email'],$_POST['mdp'])) {
    $_SESSION['actu_user'] = mysqli_fetch_assoc(get_info_user($_POST['email'],$_POST['mdp']));
    header('Location:../pages/liste_objet.php');
}else {
    header('Location: ../pages/inscription.php');
}

?>