<?php
    class Article{
        // Atributs
        protected $id_art;
        protected $name_art;
        protected $content_art;
        protected $date_art;
        protected $id_cat;
        // Constructeur
        public function __construct($name, $content, $date, $cat)
        {
            $this->name_art = $name;
            $this->content_art = $content;
            $this->date_art = $date;
            $this->id_cat = $cat;
        }
        // Getter and setter
        public function getIdArt():int{
            return $this -> id_art;
        }
        public function getNameArt():string{
            return $this -> name_art; 
        }
        public function getContentArt():string{
            return $this -> content_art;
        }
        public function getDateArt():string{
            return $this -> date_art;
        }
        public function setIdArt($id):void{
            $this -> id_art = $id;
        }
        public function setNameArt($name):void{
            $this -> name_art = $name;
        }
        public function setContentArt($content):void{
            $this -> content_art = $content;
        }
        public function setDateArt($date):void{
            $this -> date_art = $date;
        }
        //afficher tous les articles
        public function showArticle($bdd):array{
            try{
                $req = $bdd->prepare('SELECT id_art, name_art, content_art, date_art, categorie.name_cat as name_cat
                FROM article INNER JOIN categorie where 
                article.id_cat = categorie.id_cat');
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
        //afficher le détail d'un article
        public function showArticleById($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM article 
                WHERE id_art = :id_art');
                $req->execute(array(
                    'id_art' => $this->getIdArt(),
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
        //creer un article
        public function createArticle($bdd){
            $name = $this->getNameArt();
            $content = $this->getContentArt();
            $date = $this->getDateArt();
            $cat = $this-> id_cat;
            try{
                $req = $bdd->prepare('INSERT INTO article(name_art, content_art, date_art, id_cat)
                VALUES(:name_art, :content_art, :date_art, :id_cat)');
                $req->execute(array(
                    'name_art' => $name,
                    'content_art' =>$content,
                    'date_art' => $date,
                    'id_cat' => $cat
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        //modifier un article
        public function modifyArticle($bdd):void{
            $name = $this->getNameArt();
            $content = $this->getContentArt();
            $id = $this->getIdArt();
            try{
                $req = $bdd->prepare('UPDATE article SET name_art = :name_art, 
                content_art = :content_art WHERE id_art = :id_art');
                $req->execute(array(
                    'name_art' => $name,
                    'content_art' =>$content,
                    'id_art' => $id
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        // Supprimer un article
        public function deleteArticleById($bdd):void{
            try{
                $req = $bdd->prepare('DELETE FROM article 
                WHERE id_art = :id_art');
                $req->execute(array(
                    'id_art' => $this->getIdArt(),
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }       
    }
?>