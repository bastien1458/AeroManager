<?php 
session_start();
require_once('BDD.php');


$sql = "SELECT * FROM avion";

$result = $liaison->query($sql);

if (!$liaison) {
    die("Erreur dans la requête : " . $liaison->error);
}


$vols = [];

while ($row = $result->fetch_assoc()) {
    $vols[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vols</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <header>
        <h1>Avions</h1>
        <img src="" alt="">
    </header>

    <nav>
        <div class="text-section">
            <a href="">Tableau de bord</a>
            <a href="">Avions</a>
            <a href="./vols.php">Vols</a>
            <a href="">Personnel</a>
            <a href="">Passagers</a>
            <a href="">Billets</a>
            <a href="">Pistes</a>
            <a href="">Tâches</a>
            <a href="">Rapports</a>
            <a href="">Réglages</a>
        </div>

        <div class="logo-section">
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
            <a href=""></a>
        </div>

        <div class="top-section">

        </div>
    </nav>

    <div class="add-flight">
        <form method="POST" action="">
            <input type="text" placeholder="Modele" name="Modele">
            <input type="text" placeholder="Capacite Passagers" name="CapacitePassagers">
            <input type="text" placeholder="Numero Serie" name="NumeroSerie">
            <input type="text" placeholder="Immatriculation" name="Immatriculation">
            <input type="text" placeholder="Statut" name="Statut">
            <input type="text" placeholder="Historique" name="Historique">
            <input type="submit" placeholder="Ajouter" name="insert-button">  
        </form>
    </div> 
    
    <?php 
    
        
        if(isset($_POST['insert-button'])){
            $Modele = $_POST['Modele'];
            $CapacitePassagers = $_POST['CapacitePassagers'];
            $NumeroSerie = $_POST['NumeroSerie'];
            $Immatriculation = $_POST['Immatriculation'];
            $Statut = $_POST['Statut'];  
            $Historique = $_POST['Historique'];  

            
            $addRequest = "INSERT INTO avion (Modele, CapacitePassagers, NumeroSerie, Immatriculation, Statut, Historique) 
                    VALUES ('$Modele', '$CapacitePassagers', '$NumeroSerie', '$Immatriculation', '$Statut', '$Historique')";   
            
            if ($liaison->query($addRequest)) {
                echo "Avion ajouté avec succès.";
                header("Location: ".$_SERVER['PHP_SELF']); 
                exit;
            }
        }
    ?> 

<div class="flight-status">
    <table>
        <thead>
            <tr>
                <th>idAvion</th>
                <th>Modele</th>
                <th>Capacité Passagers</th>
                <th>Numéro Série</th>
                <th>Immatriculation</th>
                <th>Statut</th>
                <th>Historique</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vols as $vol): ?>
            <tr>
                <td><?= $vol['idAvion'] ?></td>
                <td><?= $vol['Modele'] ?></td>
                <td><?= $vol['CapacitePassagers'] ?></td>
                <td><?= $vol['NumeroSerie'] ?></td>
                <td><?= $vol['Immatriculation'] ?></td>
                <td><?= $vol['Statut'] ?></td>
                <td><?= $vol['Historique'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


</body>
</html>
