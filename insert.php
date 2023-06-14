<?php
// Connexion à la base de données
$conn = new mysqli("localhost", "root", "", "eval");

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}

// Récupération des données du formulaire
$login = $_POST['login'];
$pwd = $_POST['pwd'];
$mail = $_POST['mail'];

// Requête d'insertion dans la base de données
$sql = "INSERT INTO user (login, pwd, mail) VALUES ('$login', '$pwd', '$mail')";

if ($conn->query($sql) === TRUE) {
    echo "Utilisateur ajouté avec succès.";
} else {
    echo "Erreur lors de l'ajout de l'utilisateur : " . $conn->error;
}

// Fermeture de la connexion à la base de données
$conn->close();
?>
