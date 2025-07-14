<?php
include '../include/function.php';
session_start();

$id_categorie = isset($_GET['categorie']) && $_GET['categorie'] !== '' ? $_GET['categorie'] : null;
$nom = isset($_GET['nom']) ? trim($_GET['nom']) : null;
$disponible_seulement = isset($_GET['disponibilite']) && $_GET['disponibilite'] == '1';

$liste = getListeObjet($id_categorie, $nom, $disponible_seulement);

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
        <form method="get" action="../traitement/recherche.php" class="mb-4">
            <div class="row justify-content-center g-2 align-items-center">
                <div class="col-md-12">
                    <label for="nom">
                        <p>Nom : </p>
                    </label>
                    <input type="text" name="nom" id="nom" class="form-control mb-2"
                        placeholder="Rechercher un objet..."
                        value="<?= isset($_GET['nom']) ? htmlspecialchars($_GET['nom']) : '' ?>">

                    <label for="categorie">
                        <p>Catégories : </p>
                    </label>
                    <select name="categorie" id="categorie" class="form-select mb-2">
                        <option value="">-- Toutes les catégories --</option>
                        <?php foreach ($categories as $c): ?>
                            <option value="<?= $c['id_categorie'] ?>"
                                <?php
                                if ($c['id_categorie'] == (int) $id_categorie) {
                                    echo 'selected';
                                }
                                ?>>
                                <?= htmlspecialchars($c['nom_categorie']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <div class="form-check">
                        <label for="disponibilite" class="form-check-label">
                            Afficher uniquement les objets disponibles
                        </label>
                        <input type="checkbox" name="disponibilite" id="disponibilite" value="1" class="form-check-input"
                            <?php if (isset($_GET['disponibilite']) && $_GET['disponibilite'] == '1') echo 'checked'; ?>>
                    </div>

                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                    <a href="liste_objet.php" class="btn btn-secondary">Afficher tous</a>
                </div>
            </div>
        </form>

        <a href="uploadImage.php">Ajouter objet</a>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php while ($ob = mysqli_fetch_assoc($liste)): ?>
                <div class="col">

                    <div class="card h-100 shadow-sm">
                        <a href="fiche_objet.php?id=<?= $ob['id_objet'] ?>" class="text-decoration-none text-dark">
                        <?php if (!empty($ob['nom_image'])): ?>
                            <img src="../uploads/<?= htmlspecialchars($ob['nom_image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($ob['nom_objet']) ?>">
                        <?php else: ?>
                            <img src="../uploads/placeholder.png" class="card-img-top" alt="Image non disponible">
                        <?php endif; ?>
                        </a>
                        <a href="fiche_membre.php?id=<?= $ob['id_membre'] ?>" class="text-decoration-none text-dark">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($ob['nom_objet']) ?></h5>
                                <?php if (!empty($ob['date_retour'])): ?>
                                    <span class="badge bg-danger">Emprunté jusqu'au <?= htmlspecialchars($ob['date_retour']) ?></span>
                                <?php else: ?>
                                    <span class="badge bg-success">Disponible</span>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>