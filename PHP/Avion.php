<?php 
session_start();
require_once('BDD.php');


$sql = "SELECT * FROM Avion"; 

$result = $liaison->query($sql);

if (!$liaison) {
    die("Erreur dans la requête : " . $liaison->error);
}

$avions = [];

while ($row = $result->fetch_assoc()) {
    $avions[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avions</title>
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
            <a href="./Avions.php">Avions</a>
            <a href="./vols.php">Vols</a>
            <a href="./Personnel.php">Personnel</a>
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

            
            $addRequest = "INSERT INTO Avion (Modele, CapacitePassagers, NumeroSerie, Immatriculation, Statut, Historique) 
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
            <?php foreach ($avions as $avion): ?>
            <tr>
                <td><?= $avion['idAvion'] ?></td>
                <td><?= $avion['Modele'] ?></td>
                <td><?= $avion['CapacitePassagers'] ?></td>
                <td><?= $avion['NumeroSerie'] ?></td>
                <td><?= $avion['Immatriculation'] ?></td>
                <td><?= $avion['Statut'] ?></td>
                <td><?= $avion['Historique'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


</body>
</html>
