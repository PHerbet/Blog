<?php
    class Commentaire {
        private $id_com;
        private $content_com;
        private $date_com;
        private $id_art;
        private $id_util;

        public function __construct($content, $date, $id_art, $id_util) {
            $this->content_com = $content;
            $this->date = $date;
            $this->id_art = $id_art;
            $this->id_util = $id_util;
        }

        public function getContent():string {
            return $this->content_com;
        }

        public function getDate():string {
            return $this->date_com;
        }

        public function setContent($content):void {
            $this->content_com = $content;
        }

        public function setDate($date):void {
            $this->date_com = $date;
        }

        public function addComment($bdd, $content, $date, $id_util, $id_art):void {
            try {
                $req = $bdd->prepare('INSERT INTO commentaire (content_com, date_com, id_util, id_art) 
                VALUES (:content_com, :date_com, :id_util, :id_art'));
                $req->execute(array(
                    'content_com' => $content,
                    'date_com' => $date,
                    'id_util' => $id_util,
                    'id_art' => $id_art
                ));
                
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }
    
        public function showComment($bdd, $id):object {
            try {
                $req = $bdd->prepare('SELECT * FROM commentaire WHERE id_com = :id_com');
                $req->execute(array(
                    'id_com' => $id
                ));
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $data;
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }

        public function showAllComments($bdd, $id):object {
            try {
                $req = $bdd->prepare('SELECT * FROM commentaire WHERE id_art = '.$id.'');
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $data;
            } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }
    }
?>