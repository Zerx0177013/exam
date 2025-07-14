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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Liste des objets</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center mb-4">Liste des objets</h1>

        <form method="get" action="../traitement/recherche.php" class="mb-4">
            <div class="row g-3 align-items-end justify-content-center">
                <div class="col-md-4">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control"
                        placeholder="Rechercher un objet..."
                        value="<?= isset($_GET['nom']) ? htmlspecialchars($_GET['nom']) : '' ?>">
                </div>

                <div class="col-md-4">
                    <label for="categorie" class="form-label">Catégories</label>
                    <select name="categorie" id="categorie" class="form-select">
                        <option value="">-- Toutes les catégories --</option>
                        <?php foreach ($categories as $c): ?>
                            <option value="<?= $c['id_categorie'] ?>"
                                <?= ($c['id_categorie'] == (int)$id_categorie) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($c['nom_categorie']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-3 d-flex align-items-center">
                    <div class="form-check">
                        <input type="checkbox" name="disponibilite" id="disponibilite" value="1"
                            class="form-check-input"
                            <?= (isset($_GET['disponibilite']) && $_GET['disponibilite'] == '1') ? 'checked' : '' ?>>
                        <label for="disponibilite" class="form-check-label ms-2">
                            Afficher uniquement les objets disponibles
                        </label>
                    </div>
                </div>

                <div class="col-md-auto d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                    <a href="liste_objet.php" class="btn btn-secondary">Afficher tous</a>
                </div>
            </div>
        </form>

        <div class="mb-3 text-end">
            <a href="uploadImage.php" class="btn btn-success">Ajouter objet</a>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php while ($ob = mysqli_fetch_assoc($liste)): ?>
                <?php
                $images = getImageObjetById($ob['id_objet']);
                $firstImage = $images ? mysqli_fetch_assoc($images) : null;
                ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <a href="fiche_objet.php?id=<?= $ob['id_objet'] ?>" class="text-decoration-none text-dark">
                            <?php if ($firstImage && !empty($firstImage['nom_image'])): ?>
                                <img src="../assets/pics/<?= htmlspecialchars($firstImage['nom_image']) ?>"
                                    class="card-img-top" alt="<?= htmlspecialchars($ob['nom_objet']) ?>">
                            <?php else: ?>
                                <img src="../assets/pics/placeholder.jpg" class="card-img-top" alt="Image non disponible">
                            <?php endif; ?>
                        </a>

                        <div class="card-body d-flex flex-column">
                            <a href="fiche_membre.php?id=<?= $ob['id_membre'] ?>"
                                class="text-decoration-none text-dark flex-grow-1">
                                <h5 class="card-title text-truncate" title="<?= htmlspecialchars($ob['nom_objet']) ?>">
                                    <?= htmlspecialchars($ob['nom_objet']) ?>
                                </h5>
                            </a>

                            <?php if (!empty($ob['date_retour'])): ?>
                                <span class="badge bg-danger mb-3">Disponible le <?= htmlspecialchars($ob['date_retour']) ?></span>
                            <?php else: ?>
                                <span class="badge bg-success mb-3">Disponible</span>
                            <?php endif; ?>

                            <a href="toBorrow.php?id_objet=<?= $ob['id_objet'] ?>" class="btn btn-sm btn-primary mt-auto">
                                Emprunter
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</body>

</html>
