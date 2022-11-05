<?php 

// On démarre la session pour être certain qu'elle est démarrée
session_start();

// Inclusion des dépendances
include '../lib/functions.php';

// Initialisations
$email = '';

// Si le formulaire est soumis...
if (!empty($_POST)) {

    // On récupère les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // On vérifie les identifiants
    $user = checkUser($email, $password);

    // On a trouvé l'utilisateur, les identifiants sont corrects...
    if ($user) {

        // Enregistrement du user en session
        registerUser($user['id'], $user['firstname'], $user['lastname'], $user['email']);
    
        // Redirection pour le moment vers la page d'accueil du site
        header('Location: home.php');
        exit;
    } 
        
    $error = 'Identifiants incorrects';
}

// Inclusion du template
$template = 'login';
include "../templates/base.phtml";