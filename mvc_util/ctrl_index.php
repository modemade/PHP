<?php
    /*---------------------------------------
                    IMPORT
    -----------------------------------------*/
    //importer la connexion à la bdd
    include './utils/connectBdd.php';
    //importer le model
    include './model/model_user.php';
    //importer la vue(interface)
    include './view/view_add_user.php';
    /*---------------------------------------
                    TEST
    -----------------------------------------*/
    //test si le bouton submit à été cliqué
    
        //test pour vérifier si les champs du formulaire sont remplis
        if(isset($_POST['nom_util']) AND isset($_POST['prenom_util']) 
            AND isset($_POST['mail_util']) AND isset($_POST['mdp_util']) AND 
            $_POST['nom_util'] !='' AND $_POST['prenom_util'] !='' AND 
            $_POST['mail_util'] !='' AND $_POST['mdp_util'] !=''){
            //stocker les super globales POST dans des variables
            $nom =$_POST['nom_util'];
            $prenom =$_POST['prenom_util'];
            $mail =$_POST['mail_util'];
            $mdp =$_POST['mdp_util'];
            echo "$nom<br>";
            echo "$prenom<br>";
            echo "$mail<br>";
            echo "$mdp";
            //appel de la fonction ajouter  un user en BDD
            adduser($bdd, $nom, $prenom, $mail,$mdp) ;
            //message
            echo "$nom à été ajouté en  BDD";
        }
        //sinon vides
        else{
            echo 'Veuillez compléter les champs du formulaire';
        }
    
?>