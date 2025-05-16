<?php 
session_start();
require_once('BDD.php');


$sql = "SELECT * FROM Vol"; // ou ta requête JOIN

$result = $liaison->query($sql);

if (!$liaison) {
    die("Erreur dans la requête : " . $liaison->error);
}

// On crée un tableau pour stocker les vols
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
    <link rel="stylesheet" href="../css/style.css"> <!-- NE PAS OUBLIER LE ../css/style.css-->
</head>
<body>

    <header>
        <h1>Vols</h1>
        <img src="" alt="">
    </header>

    <nav>
        <div class="text-section">
            <a href="">Tableau de bord</a>
            <a href="./Avions.php">Avions</a>
            <a href="./vols.php">Vols</a>
            <a href="./Personnel.php">Personnel</a>
            <a href="./Passagers.php">Passagers</a>
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
            <input type="text" placeholder="Lieux de départ" name="LieuDepart">
            <input type="text" placeholder="Lieux d'arrivée" name="LieuArrive">
            <input type="text" placeholder="Heure de départ" name="HeureDepart">
            <input type="text" placeholder="Heure d'arrivée" name="HeureArrive">
            <input type="text" placeholder="IdPorte" name="idPorte">
            <input type="text" placeholder="IdCompagnie" name="idCompagnie">
            <input type="text" placeholder="IdAvion" name="idAvion">
            <input type="text" placeholder="IdEtat" name="idEtat">
            <input type="submit" placeholder="Ajouter" name="insert-button">  
        </form>
    </div> 
    
    <?php 
    
        
        if(isset($_POST['insert-button'])){
            $lieuDepart = $_POST['LieuDepart'];
            $lieuArrive = $_POST['LieuArrive'];
            $heureDepart = $_POST['HeureDepart'];
            $heureArrive = $_POST['HeureArrive'];
            $idPorte = $_POST['idPorte'];
            $idCompagnie = $_POST['idCompagnie'];
            $idAvion = $_POST['idAvion'];
            $idEtat = $_POST['idEtat'];
            
            
            $addRequest = "INSERT INTO Vol (LieuDepart, LieuArrive, HeureDepart, HeureArrive, idPorte, idCompagnie,
            idAvion, idEtat) 
                    VALUES ('$lieuDepart', '$lieuArrive', '$heureDepart', '$heureArrive','$idPorte','$idCompagnie',
                            '$idAvion','$idEtat')";   
            
            if ($liaison->query($addRequest)) {
                echo "Vol ajouté avec succès.";
                header("Location: ".$_SERVER['PHP_SELF']); 
                exit;
            }
        } 
    ?> 

    <div class="flight-status">
        <table>
            <thead>
                <tr>
                    <th>Vol</th>
                    <th>Départ</th>
                    <th>Arrivée</th>
                    <th>Heure de départ</th>
                    <th>Heure d'arrivée</th>
                    <th>idPorte</th>
                    <th>idCompagnie</th>
                    <th>idAvion</th>
                    <th>idEtat</th>
                </tr>
            </thead>
            
            <tbody>
            <?php foreach ($vols as $vol): ?>
        <tr>
            <td><?= $vol['idVol'] ?></td>
            <td><?= $vol['LieuDepart'] ?></td>
            <td><?= $vol['LieuArrive'] ?></td>
            <td><?= $vol['HeureDepart'] ?></td>
            <td><?= $vol['HeureArrive'] ?></td>
            <td><?= $vol['idPorte'] ?></td>
            <td><?= $vol['idCompagnie'] ?></td>
            <td><?= $vol['idAvion'] ?></td>
            <td><?= $vol['idEtat'] ?></td>
        </tr>
        
        <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</body>
</html>
