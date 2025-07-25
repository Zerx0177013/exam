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
    <title>Nouvelle publication objet</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
        <h2 class="text-center mb-4">Nouvel objet</h2>

        <form action="../traitement/upload.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom de l'objet" required>
            </div>

            <div class="mb-3">
                <label for="media" class="form-label">Image</label>
                <input type="file" id="media" name="media" class="form-control" accept="image/*" required>
            </div>

            <div class="mb-3">
                <label for="categorie" class="form-label">Catégorie</label>
                <select name="categorie" id="categorie" class="form-select" required>
                    <option value="">-- Choisissez une catégorie --</option>
                    <?php foreach ($categories as $c): ?>
                        <option value="<?= $c['id_categorie'] ?>"><?= htmlspecialchars($c['nom_categorie']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Publier</button>
        </form>

        <div class="text-center mt-3">
            <a href="liste_objet.php" class="text-decoration-none text-muted">⬅ Retour</a>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="mt-3 alert alert-danger text-center">
                <?php if ($_GET['error'] == 1): ?>
                    Ajoutez une image
                <?php elseif ($_GET['error'] == 2): ?>
                    Type de fichier invalide
                <?php else: ?>
                    Erreur lors du déplacement du fichier
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>
