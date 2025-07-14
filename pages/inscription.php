<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
</head>

<body>
    <h3>Inscription</h3>
    <form class="form-control" action="../traitement/inscrire.php" method="post">
        <p><input type="text" name="nom" placeholder="Nom" required></p>

        <select name="genre" required>
            <option value="">-- Genre --</option>
            <option value="M">Masculin</option>
            <option value="F">Feminin</option>
        </select>

        <p><input type="email" name="email" placeholder="Email" required></p>
        <p><input type="password" name="mdp" placeholder="Mot de passe" required></p>
        <p><input type="text" name="ville" placeholder="Ville" required></p>
        <p><input type="date" name="date_de_naissance" required></p>
        <button type="submit">S'inscrire</button>
    </form>

</body>

</html>