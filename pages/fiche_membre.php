<?php
session_start();
include '../include/function.php';

$id_membre = isset($_GET['id']) ? (int)$_GET['id'] : $_SESSION['user_id'];

$membre_result = getMembreById($id_membre);
if (mysqli_num_rows($membre_result) == 0) {
    echo "Membre non trouvé";
    exit();
}
$membre = mysqli_fetch_assoc($membre_result);

$objets_result = getObjetsByMembreGroupedByCategorie($id_membre);
$objets_par_categorie = [];
while ($objet = mysqli_fetch_assoc($objets_result)) {
    $objets_par_categorie[$objet['nom_categorie']][] = $objet;
}

$nombre_objets = getNombreObjetsByMembre($id_membre);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Membre - <?php echo htmlspecialchars($membre['nom']); ?></title>
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">

    <div class="bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 text-center">
                    <?php if ($membre['image_profil'] && $membre['image_profil'] !== 'placeholder'): ?>
                        <img src="../assets/pics/<?php echo htmlspecialchars($membre['image_profil']); ?>" 
                             alt="Photo de profil" class="rounded-circle border border-white border-3" >
                    <?php else: ?>
                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center border border-white border-3 mx-auto" >
                            <span class="text-white display-4">👤</span>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-9">
                    <h1 class="mb-2"><?php echo htmlspecialchars($membre['nom']); ?></h1>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Email:</strong> <?php echo htmlspecialchars($membre['email']); ?></p>
                            <p class="mb-1"><strong>Ville:</strong> <?php echo htmlspecialchars($membre['ville']); ?></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Date de naissance:</strong> 
                                <?php echo date('d/m/Y', strtotime($membre['date_de_naissance'])); ?>
                            </p>
                            <p class="mb-1"><strong>Genre:</strong> 
                                <?php echo $membre['genre'] == 'M' ? 'Masculin' : 'Féminin'; ?>
                            </p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-light text-dark fs-6">
                            <?php echo $nombre_objets; ?> objet(s) possédé(s)
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">
                    Objets de <?php echo htmlspecialchars($membre['nom']); ?> par catégorie
                </h2>

                <?php if (empty($objets_par_categorie)): ?>
                    <div class="alert alert-info text-center">
                        Aucun objet trouvé pour ce membre.
                    </div>
                <?php else: ?>
                    <div class="row">
                        <?php foreach ($objets_par_categorie as $nom_categorie => $objets): ?>
                            <div class="col-lg-6 col-xl-4 mb-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="card-title mb-0">
                                            <?php echo htmlspecialchars(ucfirst($nom_categorie)); ?>
                                            <span class="badge bg-light text-dark ms-2">
                                                <?php echo count($objets); ?>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($objets as $objet): ?>
                                            <div class="p-2 mb-2 bg-light border-start border-primary border-3">
                                                <a href="fiche_objet.php?id=<?php echo $objet['id_objet']; ?>" 
                                                   class="text-decoration-none">
                                                    <?php echo htmlspecialchars($objet['nom_objet']); ?>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

</body>
</html>