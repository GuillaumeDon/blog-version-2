<?php 

// On démarre la session pour être certain qu'elle est démarrée
session_start();

// Inclusion des dépendances
include '../lib/functions.php';

// On déconnecte l'utilisateur
logout();

// On le redirige vers l'accueil
header('Location: home.php');
exit;

