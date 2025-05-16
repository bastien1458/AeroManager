<?php
session_start();
require_once('BDD.php');

if(isset($_POST['username'])){
    $username = $_POST ['username'];
}

else {
    $username = '';
}

if(isset($_POST ['password'])){
    $password = $_POST['password'];
}

else {
    $password = '';
}

$hashedPassword = hash('sha256', $password);

$request_login = mysqli_query($liaison, "SELECT * FROM Utilisateurs Where username = '$username' AND pwd ='$hashedPassword'");
$ligne = mysqli_fetch_assoc($request_login);

if($ligne){
    header("Location: ./Avions.php");
    exit();
}

else{
    echo("Nom d'utilisateurs ou mots de passe incorectes");
}
?>


else{
    echo("Nom d'utilisateurs ou mots de passe incorectes");
}
?>
