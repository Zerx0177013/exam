<?php
function connexion() {  
    static $bdd = null;
    if ($bdd === null) {
        $bdd = mysqli_connect("localhost", "root", "", "final_project");
        // $bdd = mysqli_connect("localhost", "ETU003918", "s7mSG5Zt", "");
        // $bdd = mysqli_connect("localhost", "ETU004014", "MHV18XnP", "");

        
        if (!$bdd) {
            die("Erreur de connexion à la base de données : " . mysqli_connect_error());
        }
        
    }
    return $bdd;
}
?>