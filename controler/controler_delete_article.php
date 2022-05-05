<?php
    include './utils/connect_bdd.php';
    include './model/model_article.php';
    if(isset($_GET['id']) AND $_GET['id'] != ""){
        $article = new Article(null, null,null, null);
        $_GET['id']= intval($_GET['id']);
        var_dump($_GET['id']);
        $article->setIdArt($_GET['id']);
        $tab = $article->showArticleById($bdd);
        $nom = $tab[0]['name_art'];
        $article->deleteArticleById($bdd);
        header("Location: /blog/show_article?del=$nom");
    }
?>