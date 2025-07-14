<?php
include "../include/function.php";
session_start();
$id_objet = $_GET['id_objet'] ?? null;
$uploadDir = '../assets/pics/';
$allowedMimeTypesImage = ['image/jpeg', 'image/png', 'image/jpg'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['media'])) {
    $file = $_FILES['media'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        die('Erreur lors de l’upload : ' . $file['error']);
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = null;
    $htmlForm = null;
    $media = null;
    
    $newName = "img" . '_' . uniqid() . '.' . $extension;
    $media = "image";

    if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
        // addMedia($_SESSION['user']['id_user'], $_POST['description'], $uploadDir . $newName, $media);
        // addEverythingObjet($_SESSION['actu_user']['id_membre'], $_POST['nom'], $_POST['categorie'], $newName);
        header('location: ../pages/liste_objet.php');
    } else {
        header('location: ../pages/uploadImage.php?error=3');
        exit();
    }


} else {
    header('location: ../pages/uploadImage.php?error=1');
}
?>