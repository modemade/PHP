<?php
     //import
     include './utils/connectBdd.php';
     include './model/model_user.php';
     include './view/view_add_user.php';
    //test logique:
    //variable qui va contenir les messages erreurs
    $message = "";
    //test si on à cliqué sur le bouton submit (test si les champs existes)
    if(isset($_POST['addUser'])){
        //test si les champs existent et ne sont pas vides
        if($_POST['name_util'] !="" AND $_POST['first_name_util'] !=""
        AND $_POST['mail_util'] !="" AND $_POST['pwd_util'] !=""){
            //instance d'un nouvel objet Utilisateur
            $util = new Utilisateur($_POST['name_util'], $_POST['first_name_util'],
            $_POST['mail_util'], $_POST['pwd_util']);
            //hashage du mot de passe -> setPwdUtil()
            $util->setPwdUtil(password_hash($util->getPwdUtil(),PASSWORD_DEFAULT));
            //appel de la méthode qui recherche un utilisateur par son mail
            $mail = $util->showUserByMail($bdd);
            //test si le mail n'existe pas 
            if(empty($mail)){
                $util->createUser($bdd);
                //message compté ajouté
                $message = 'Le compte '.$util->getMailUtil().' à été ajouté en BDD';
            }
            else{
                //message erreur le compte existe déja
                $message = "les informations sont incorrectes";
            }
        }
        else{
            //message erreur veuillez compléter les champs de formulaire
            $message =  "Veuillez compléter tous les champs du formulaire";
        }
    }
    //test si on à pas cliqué sur ajouter
    else{
        $message = "Cliquez sur ajouter pour créer un compte utilisateur";
    }
    //affichage des erreurs
    echo $message;
?>