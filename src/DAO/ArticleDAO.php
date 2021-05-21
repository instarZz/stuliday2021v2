<?php

namespace App\src\DAO;

class ArticleDAO extends DAO
{
    public function buildArticle($row)
    {
        return new Article($row);
    }

    public function getAllArticles()
    {
        $articles = [];
        $sql = 'SELECT * FROM article ORDER BY created_at DESC';
        $req = $this->createQuery($sql);
        $result = $req->fetchAll();
        // var_dump($result);

        foreach ($result as $row) {
            $id = $row['id'];
            $articles[$id] = $this->buildArticle($row);
        }

        return $articles;
    }

    public function getArticle($id)
    {
        $sql = 'SELECT * FROM article WHERE id = ?';
        $result = $this->createQuery($sql, [$id]);
        $article = $result->fetch();

        return $this->buildArticle($article);
    }
}
