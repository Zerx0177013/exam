<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body class="bg-light">

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 500px;">
            <h3 class="text-center mb-4">Inscription</h3>

            <form action="../traitement/inscrire.php" method="post">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom :</label>
                    <input type="text" name="nom" id="nom" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="genre" class="form-label">Genre :</label>
                    <select name="genre" id="genre" class="form-select" required>
                        <option value="">-- Genre --</option>
                        <option value="M">Masculin</option>
                        <option value="F">Feminin</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="mdp" class="form-label">Mot de passe :</label>
                    <input type="password" name="mdp" id="mdp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="ville" class="form-label">Ville :</label>
                    <input type="text" name="ville" id="ville" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="date_de_naissance" class="form-label">Date de naissance :</label>
                    <input type="date" name="date_de_naissance" id="date_de_naissance" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>