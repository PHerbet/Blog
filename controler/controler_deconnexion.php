<?php
    session_destroy();
    //test si $_COOKIE['PHPSESSID'] existe
    if(isset($_COOKIE['PHPSESSID'])){
        //on le supprime
        unset($_COOKIE['PHPSESSID']);
    }
    //redirection vers la page connexion
    header('Location:/blog/connexion');
?>