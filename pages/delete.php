<?php
$id = $_GET['id_image']

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Supprimer ?</h3>
            <form action="../traitement/delete.php" method="post">
                <div class="form-check mb-3">
                    <input type="hidden" value="<?php echo $id ?>" name="id_image">
                    <input class="form-check-input" type="checkbox" name="yesOrNo" id="yesOrNo" value="1">
                    <label class="form-check-label" for="yesOrNo">Oui</label>
                </div>
                <button type="submit" class="btn btn-danger w-100">Confirmer</button>
            </form>
        </div>
    </div>

</body>

</html>