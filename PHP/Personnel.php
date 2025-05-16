<?php 
session_start();
require_once('BDD.php');


$sql = "SELECT * FROM Personnel"; // ou ta requête JOIN

$result = $liaison->query($sql);

if (!$liaison) {
    die("Erreur dans la requête : " . $liaison->error);
}

// On crée un tableau pour stocker les vols
$personnels = [];

while ($row = $result->fetch_assoc()) {
    $personnels[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personnel</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- NE PAS OUBLIER LE ../css/style.css-->
</head>
<body>

    <header>
        <h1>Personnel</h1>
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
            <input type="text" placeholder="Nom" name="nomPers">
            <input type="text" placeholder="Prenom" name="pnomPers">
            <input type="text" placeholder="Date de naissance" name="DateNaissPersonnel">
            <input type="submit" placeholder="Ajouter" name="insert-button">  
        </form>
    </div> 
    
    <?php 
    
        
        if(isset($_POST['insert-button'])){
            $nomPers = $_POST['nomPers'];
            $pnomPers = $_POST['pnomPers'];
            $DateNaissPersonnel = $_POST['DateNaissPersonnel'];
            
            $addRequest = "INSERT INTO Personnel (nomPers, pnomPers, DateNaissPersonnel) 
                    VALUES ('$nomPers','$pnomPers','$DateNaissPersonnel')";   
            
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
                    <th>id Personnel</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Date de Naissance</th>
                </tr>
            </thead>
            
            <tbody>
            <?php foreach ($personnels as $personnel): ?>
         <tr>
            <td><?= $personnel['idPersonnel'] ?></td>
            <td><?= $personnel['nomPers'] ?></td>
            <td><?= $personnel['pnomPers'] ?></td>
            <td><?= $personnel['DateNaissPersonnel'] ?></td>
        </tr>
        
        
        <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</body>
</html>
