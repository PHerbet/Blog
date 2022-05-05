<?php
    // Session start
    session_start();

    // Analyse l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    // Soit l'URL a une route soit on renvoie à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    // Menu 

    if ($_SESSION['id_role'] == 1) {
        include './view/view_menu_utilisateur.php';
        }
    else if ($_SESSION['id_role'] == 2) {
        include './view/view_menu_administrateur.php';
    }
    else {

        include './view/view_menu_visiteur.php';
    }
    /*--------------------------ROUTER -----------------------------*/
    // Test de la valeur $path dans l'URL et import de la ressource
    switch($path){
        case $path === "/blog/create_article":

            include './controler/controler_create_article.php';


		    break ;
        case $path === "/blog/modify_article":
            include './controler/controler_modify_article.php';    
            break ;
        case $path === "/blog/delete_article":
            include './controler/controler_delete_article.php';    
            break ;
        case $path === "/blog/categorie":
            include './controler/controler_categorie.php';
		    break ;
        case $path === "/blog/show_article":
            include './controler/controler_show_article.php';
		    break ;
        case $path === "/blog/inscription":
            include './controler/controler_inscription.php';
		    break ;
        case $path === "/blog/connexion":
            include './controler/controler_connexion.php';
		    break ;
        case $path === "/blog/deconnexion":
            include './controler/controler_deconnexion.php';
		    break ;

        case $path === "/blog/show_all_user":
            include './controler/controler_show_all_user.php';
            break ;

        case $path === "/blog/error":
            include './error.php';
		    break ;
        case $path !== "/blog/":
            include './error.php';
		    break ;

    }
?>
