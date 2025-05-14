<?php
$liaison = mysqli_connect("localhost", "root", "", "gestion_aéroportuaire");

if (!$liaison) {
    die("Erreur de connexion à la base de données : " . mysqli_connect_error());
}
?>