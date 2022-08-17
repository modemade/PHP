<?php
    class Utilisateur{
        //attributs
        private $id_util;
        private $name_util;
        private $first_name_util;
        private $mail_util;
        private $pwd_util;
        //constructeur
        public function __construct($name, $first, $mail, $password){
            $this->name_util = $name;
            $this->first_name_util = $first;
            $this->mail_util = $mail;
            $this->pwd_util = $password;
        }
        //Getter and Setter
        public function getIdUtil():int{
            return $this->id_util;
        }
        public function getNameUtil():string{
            return $this->name_util;
        }
        public function getFirstNameUtil():string{
            return $this->first_name_util;
        }
        public function getMailUtil():string{
            return $this->mail_util;
        }
        public function getPwdUtil():string{
            return $this->pwd_util;
        }
        public function setIdUtil($id):void{
            $this->id_util = $id;
        }
        public function setNameUtil($name):void{
            $this->name_util = $name;
        }
        public function setFirstNameUtil($first):void{
            $this->first_name_util = $first;
        }
        public function setMailUtil($mail):void{
            $this->mail_util = $id;
        }
        public function setPwdUtil($password):void{
            $this->pwd_util = $password;
        }
        //Méthodes
        //création d'un utilisateur en BDD (utilisateur)
        public function createUser($bdd):void{
            //récupérer les valeurs de l'objet
            $name = $this->getNameUtil();
            $first = $this->getFirstNameUtil();
            $mail = $this->getMailUtil();
            $password = $this->getPwdUtil();
            try{
                $req = $bdd->prepare('INSERT INTO utilisateur(name_util, first_name_util,
                mail_util, pwd_util) VALUES (:name_util, :first_name_util, :mail_util, :pwd_util)');
                $req->execute(array(
                    'name_util' => $name,
                    'first_name_util' => $first,
                    'mail_util' => $mail,
                    'pwd_util' => $password,
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        //récupérer si l'utilisateur (mail_util) existe en BDD (utilisateur)
        public function showUserByMail($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM utilisateur 
                WHERE mail_util = :mail_util');
                $req->execute(array(
                    'mail_util' => $this->getMailUtil(),
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
    }



?>