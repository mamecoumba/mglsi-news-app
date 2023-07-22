<?php
require_once 'models/articleModel.php';

class ArticleController {
    public function index() {
        // Récupérer la liste des articles depuis le modèle
        $articles = ArticleModel::getAllArticles();

        // Afficher la vue pour afficher les articles
        require 'views/articleView.php';
    }

    public function show($id) {
        // Récupérer l'article spécifique depuis le modèle en fonction de l'id
        $article = ArticleModel::getArticleById($id);

        // Afficher la vue pour afficher l'article spécifique
        require 'views/articleSingleView.php';
    }
}
