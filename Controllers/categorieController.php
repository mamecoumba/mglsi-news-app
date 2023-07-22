<?php

require_once 'Models/fonctions.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $categorie_id = $_GET['id'];
    $bdd = dbConnect(); // Assurez-vous d'avoir une fonction dbConnect dans votre modèle
    $articles = getArticlesByCategorie($bdd, $categorie_id); // Assurez-vous d'avoir une fonction getArticlesByCategorie dans votre modèle

    if ($articles) {
        // Afficher les articles de la catégorie dans la vue
        require_once 'Views/categorie.php';
    } else {
        // Gérer l'erreur si l'ID de la catégorie n'est pas valide ou si aucun article n'est associé à cette catégorie
        echo "Aucun article trouvé dans cette catégorie";
    }
} else {
    // Gérer l'erreur si l'ID de la catégorie n'est pas spécifié ou n'est pas valide
    echo "ID de la catégorie invalide";
}
