<?php
//import
include './utils/connect_bdd.php';
include './model/model_utilisateur.php';
include './view/view_show_all_user.php';
//instancier un nouvel objet
$util = new Utilisateur(null, null);
//stocke dans un tableau la liste des utilisateurs de la BDD
$tab = $util->showAllUser($bdd);
//boucle pour afficher la liste des utilisateurs (avec le nom et le mail)
foreach($tab as $value){
    echo '<li>
    '.$value->nom_util.', '.$value->mail_util.' </li>';
}
//affichage fin de la liste zone message erreur et 
//script affichage des messages d'erreurs
echo "</ul>
<p id='msg'></p>
<script>
    document.querySelector('#msg').innerHTML = '$msg';
</script>
</body>
</html>";
?>