<?php   
    include './utils/connect_bdd.php';
    include './model/model_article.php';
    include './view/view_create_article.php';
    // Variable message
    $message = '';
    // Test logiques
    // Test admin
    // if(isset($_SESSION['admin'])){
        // Test clic submit
        if(isset($_POST['submit'])){
            // Test remplissage formulaire
            if(isset($_POST['name']) AND isset($_POST['content']) AND
            !empty($_POST['name']) AND !empty($_POST['content'])){
                // Récup date
                $date = date('Y-m-d');
                // Création d'une nouvelle instance objet Article
                $article = new Article($_POST['name'], $_POST['content'], $date, $_POST['cat']);
                $article->createArticle($bdd);
                $message = 'L\'article '.$_POST['name'].' a été ajouté.';
            }else{
                $message = 'Veuillez remplir le formulaire';
            }
        }else{
            $message = 'Cliquez sur Créer article';
        }
    // }else{
    //     header('Location: /tpblog/connexion');
    // }
    echo $message;
?>