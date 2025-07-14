<?php
include '../include/function.php';
session_start();
$result_cat = getCategories();
$categories = [];
while ($row = mysqli_fetch_assoc($result_cat)) {
    $categories[] = $row;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/uploader.css">
    <title>Nouvelle publication objet</title>
</head>

<body>

    <div class="upload-container">
        <h2>Nouvel objet</h2>
        <form action="../traitement/upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Nom de l'objet" required>
            </div>

            <div class="form-group">
                <label for="media">Image</label>
                <input type="file" id="media" name="media" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="categorie">Catégorie</label>
                <select name="categorie" required>
                    <option value="">-- Choisissez une catégorie --</option>
                    <?php foreach ($categories as $c): ?>
                        <option value="<?= $c['id_categorie'] ?>"><?= htmlspecialchars($c['nom_categorie']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn-upload">Publier</button>
        </form>

        <div class="back-link">
            <a href="liste_objet.php">⬅ Retour </a>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <?php if ($_GET['error'] == 1): ?>
                <p style="color: red;">Ajoutez une image</p>
            <?php elseif ($_GET['error'] == 2): ?>
                <p style="color: red;">Type de fichier invalide</p>
            <?php else: ?>
                <p style="color: red;">Erreur lors du déplacement du fichier</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

</body>

</html>
