<?php

// On démarre la session pour être certain qu'elle est démarrée
session_start();

// Inclusion des dépendances
include '../lib/functions.php';

// Traitements 

// Validation du paramètre id de l'URL
if (!array_key_exists('id', $_GET) || !$_GET['id']) {

    http_response_code(404);
    echo 'Article introuvable';
    exit; // Si pas d'id dans l'URL => message d'erreur et on arrête tout ! 
}

// On récupère l'id de l'article à afficher depuis la chaîne de requête
$idArticle = $_GET['id'];

// On va chercher l'article correspondant
$article = getOneArticle($idArticle);

// On vérifie qu'on a bien récupéré un article, sinon => 404
if (!$article) {

    http_response_code(404);
    echo 'Article introuvable';
    exit; // Si pas d'article => message d'erreur et on arrête tout ! 
}

// Affichage : inclusion du fichier de template
$template = 'article';
include '../templates/base.phtml';
