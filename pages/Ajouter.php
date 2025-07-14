<?php 
include '../include/function.php';
$id_objet = $_GET['id_objet'] ?? null;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel objet</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4 w-100" style="max-width: 500px;">
        <h2 class="text-center mb-4">Nouvelle image</h2>

        <form action="../traitement/ajouter.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom de l'objet" required>
                <input type="hidden" name="id_objet" value="<?= htmlspecialchars($id_objet) ?>">
            </div>

            <div class="mb-3">
                <label for="media" class="form-label">Image</label>
                <input type="file" id="media" name="media" class="form-control" accept="image/*" required>
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
