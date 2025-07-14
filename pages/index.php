<?php
include '../include/function.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
</head>
<body>
    <h3>Login</h3>
    <form class="form-control" action="../traitement/login.php" method="post">
        <p>Email: <input type="email" name="email" required> </p>
        <p>Mot de passe: <input type="password" name="mdp" required></p>
        <button type="submit">Se connecter</button>
    </form>
    
</body>
</html>