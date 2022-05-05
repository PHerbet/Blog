<?php
class Categorie{
    //attibuts
    private $id_categorie;
    private $name_cat;
    //constructeur
    public function __construct($name_cat)
    {
        $this->name_cat = $name_cat;
    }
    //Getter and Setter
    public function getIdCategorie():int{
        return $this->id_cat;
    }
    public function getNomCategorie():string{
        return $this->name_cat;
    }
    public function setIdCategorie($id_categorie):void{
        $this->id_cat = $id_categorie;
    }
    public function setNomCategorie($name_cat):void{
        $this->name_cat = $name_cat;
    }
    //method
    public function createCategorie($bdd):void{
        $name_categorie = $this->name_cat;
        try{
            $req = $bdd->prepare('INSERT INTO categorie(name_cat ) VALUES (:name_cat)');
            $req->execute(array(
                'name_cat' => $name_categorie,
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //fonction pour montrer une categorie d'article
    public function showCategorieById($bdd):array{
        try{
            $req = $bdd->prepare('SELECT * FROM categorie 
            WHERE id_cat = :id_cat');
            $req->execute(array(
                'id_cat' => $this->getIdCategorie(),
                ));
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //afficher toute les categorie
    public function showAllCategorie($bdd):array{
        try{
            $req = $bdd->prepare('SELECT * FROM categorie');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
};
?>