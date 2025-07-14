<?php
include '../include/function.php';
session_start();

if (isset($_GET['categorie']) && $_GET['categorie'] !== '') {
    $id_categorie = $_GET['categorie'];
} else {
    $id_categorie = null;
}

$liste = getListeObjet($id_categorie);

$result_cat = getCategories();
$categories = [];
while ($row = mysqli_fetch_assoc($result_cat)) {
    $categories[] = $row;
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des objets</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des objets</h1>

        <form method="get" class="mb-4">
            <div class="row justify-content-center g-2 align-items-center">
                <div class="col-md-6">
                    <select name="categorie" class="form-select">
                        <option value="">-- Toutes les catégories --</option>
                        <?php foreach ($categories as $c): ?>
                            <option value="<?= $c['id_categorie'] ?>" <?php
                              if ($c['id_categorie'] == (int) $id_categorie) {
                                  echo 'selected';
                              }
                              ?>>
                                <?= htmlspecialchars($c['nom_categorie']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                </div>
            </div>
        </form>

        <a href="uploadImage.php">Ajouter objet</a>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php while ($ob = mysqli_fetch_assoc($liste)): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <?php if (!empty($ob['nom_image'])): ?>
                            <img src="../uploads/<?= htmlspecialchars($ob['nom_image']) ?>" class="card-img-top"
                                alt="<?= htmlspecialchars($ob['nom_objet']) ?>">
                        <?php else: ?>
                            <img src="../uploads/placeholder.png" class="card-img-top" alt="Image non disponible">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($ob['nom_objet']) ?></h5>
                            <?php if (!empty($ob['date_retour'])): ?>
                                <span class="badge bg-danger">Emprunté jusqu'au
                                    <?= htmlspecialchars($ob['date_retour']) ?></span>
                            <?php else: ?>
                                <span class="badge bg-success">Disponible</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>