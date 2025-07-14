<?php
include '../include/function.php';

$id_image = $_POST['id_image'];

deleteImage($id_image);

header('Location: ../pages/liste_objet.php');

?>