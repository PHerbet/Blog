<?php
    // import
    include './utils/connect_bdd.php';
    include './model/model_categorie.php';
    include './view/view_categorie.php';
    // instancier un nouvel objet
    $categorie = new Categorie(null);
    // stocke dans un tableau la liste des articles de la BDD
    $tab = $categorie->showAllCategorie($bdd);
    //boucle pour afficher la liste des articles (avec le nom et le prix)
    foreach($tab as $data){
        echo '<option>
        '.$data->name_cat.'
        </option>';
    }
    // affichage fin de la liste 
    echo ' </select>
    <form action="" method="post">';
    //test si on clique sur le bouton
    if(isset($_POST['add'])){
        //test si le champs et rempli
        if(isset($_POST['name_cat']) && $_POST['name_cat'] != "" ){
            //instance du nouvel objet
            $categorie = new Categorie($_POST['name_cat']);
            $categorie->createCategorie($bdd);
            echo 'la categorie a été ajouté';
            echo'<script>setTimeout(()=>{
                document.location.href="/blog/categorie"; 
                }, 1500);
            </script>';
        }
    }
        echo'<p><input type="text" name="name_cat" id="categorie"><p>
            <p><input type="submit" name="add" id="add"></p>
    </form>
</body>
</html>';

?>