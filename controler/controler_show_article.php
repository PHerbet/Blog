<?php
    include './utils/connect_bdd.php';
    include './model/model_article.php';
    include './view/view_show_article.php';
    $msg='';
    if(isset($_GET['del']) AND $_GET['del'] !=""){
        //message d'erreur
        $msg = 'Article '.$_GET['del'].' à été supprimé';
        //refresh de la page 1500 ms en JS
        echo "<script>
            setTimeout(()=>{
                document.location.href='/blog/show_article'; 
                }, 1500);
        </script>";
    }
    // Instance d'un nouvel article objet Article
    $article = new Article('', '', '', '');
    $tab = $article -> showArticle($bdd);
    // Boucle affichage des articles
    foreach($tab as $value){
        echo '<h2>'.$value->name_art.'</h2><br/>
        <article>'.$value->content_art.'</article><br/>
        <p>'.$value->date_art.'</p><br/>
        <p>'.$value->name_cat.'</p>
        <p><a href="./modify_article?id='.$value->id_art.'">Modifier</a></p>
        <p><a href="./delete_article?id='.$value->id_art.'">Supprimer</a></p>';
    }
    echo $msg.
    '</body>
    </html>';

    
?>