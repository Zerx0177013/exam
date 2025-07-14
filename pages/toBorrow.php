<?php
include '../include/function.php';


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Connexion</h3>
            <form action="../traitement/borrowing.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Jour d'emprunt :</label>
                    <input type="number" name="date_emprunt" class="form-control" required>
                    <input type="hidden" name="id_objet" value="<?= htmlspecialchars($_GET['id_objet']) ?>">
                    <input type="hidden" name="id_membre" value="<?= htmlspecialchars($_SESSION['actu_user']['id_membre']) ?>">
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Emprunter</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
