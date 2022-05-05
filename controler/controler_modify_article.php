<?php
    include './utils/connect_bdd.php';
    include './model/model_article.php';
    include './view/view_modify_article.php';
    // Var message
    $msg = 'Veuillez modifier l\'article';
    // Test ID article
    if(isset($_GET['id']) AND !empty($_GET['id'])){
        // Instance nouvel objet Article
        $art = new Article(null, null, null, null);
        // Ajout de l'ID objet
        $art->setIdArt($_GET['id']);
        $tab = $art->showArticleById($bdd);
        // Stockage des valeurs
        // $name_art = $tab[0]['name_art'];
        // $content_art = $tab[0]['content_art'];
        // Test clic
        if(isset($_POST['update'])){
            if(isset($_POST['name']) AND isset($_POST['content'])
            AND !empty($_POST['name']) AND !empty($_POST['content'])){
                $article = new Article($_POST['name'], $_POST['content'], '', '');
                $article->setIdArt($_GET['id']);
                $article->modifyArticle($bdd);
                $msg = 'L\'Article a été modifié';
            }else{
                $msg = 'Informations incorrectes';
            }
        }else{
            $msg = "Veuillez completer le formulaire";
        }
    }
    echo $msg;
?>