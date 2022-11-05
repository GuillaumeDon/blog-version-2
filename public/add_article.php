<?php 

// On démarre la session pour être certain qu'elle est démarrée
session_start();
include '../lib/functions.php';

if(!hasRole(ROLE_ADMIN)){
    http_response_code(403);
    echo 'Accès interdit';
    exit();
}

// Inclusion des dépendances 


// Initialisations
$errors = [];

// Si le formulaire est soumis...
if (!empty($_POST)) {

    // On récupère les données du formulaire
    $title = trim($_POST['title']);
    $abstract = trim($_POST['abstract']);
    $content = trim($_POST['content']);
    $image = trim($_POST['image']);

    // On valide les données (titre et contenu obligatoires)
    if (!$title) {
        $errors['title'] = 'Le champ "Titre" est obligatoire';
    }

    if (!$content) {
        $errors['content'] = 'Le champ "Contenu" est obligatoire';
    }

    // Si tout est OK (pas d'erreurs)...
    if (empty($errors)) {

        // On enregistre l'article
        addArticle($title, $abstract, $content, $image);

        // On redirige l'internaute (pour l'instant vers une page de confirmation)
        header('Location: admin.php');
        exit;
    }
}

// Inclusion du template
$template = 'add_article';
include '../templates/base_admin.phtml';