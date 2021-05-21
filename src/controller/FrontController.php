<?php

namespace App\src\controller;

class FrontController
{
    private $articleDAO;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
    }

    public function home()
    {
        $articles = $this->articleDAO->getAllArticles();

        // var_dump($articles);

        require '../templates/home.php';
    }
}
