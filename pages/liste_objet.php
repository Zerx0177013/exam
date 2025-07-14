<?php
include '../include/function.php';
session_start();
$liste = getListeObjet();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php while($ob = (mysqli_fetch_assoc($liste))) { ?>
        <p>Nom: <?php echo $ob['nom_objet'] ?></p>
        
    <?php }?>

</body>
</html>