<?php
include '../include/function.php';
$id_objet = (int)$_GET['id'];

$objet = getHistoriqueObjetById($id_objet);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fiche objet</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Fiche Objet : <?= getNomObjet($id_objet) ?> </h1>

        <?php foreach (getImageObjetById($id_objet) as $img) { ?>
            <div class="media-card">
                <img src="../assets/pics/<?= $img['nom_image'] ?>" alt="Non Dispo"></a>
            <?php } ?>

            <?php while ($histo = mysqli_fetch_assoc($objet)) {
                $date_emprunt = $histo['date_emprunt'] ? date('d/m/Y', strtotime($histo['date_emprunt'])) : 'Non emprunté';
                $date_retour = $histo['date_retour'] ? date('d/m/Y', strtotime($histo['date_retour'])) : 'Non retourné';
            ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($histo['nom_objet']) ?></h5>
                        <p class="card-text">Date d'emprunt: <?= $date_emprunt ?></p>
                        <p class="card-text">Date de retour: <?= $date_retour ?></p>
                    </div>
                </div>
            <?php  } ?>

            <a href="Ajouter.php?id_image=<?php echo $id_objet ?>">Ajouter plus d'Image</a>
            <a href="liste_objet.php" class="btn btn-primary">Retour</a>
    </div>

</body>

</html>