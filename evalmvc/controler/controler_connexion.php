<?php
    //import
    include './utils/connectBdd.php';
    include './model/model_user.php';
    include './view/view_connexion.php';
    //test logique
    $message= "";
    if(isset($_GET['deco'])){
        $message= "Déconnecté";
    }
    //test si on à cliqué sur le bouton connexion
    if(isset($_POST['connexion'])){
        //test si les champs sont remplis
        if($_POST['mail_util'] !="" AND $_POST['pwd_util'] !=""){
            //instance d'un nouvel objet
            $util = new Utilisateur("", "", $_POST['mail_util'], $_POST['pwd_util']);
            //stocker un tableau utilisateur
            $test = $util->showUserByMail($bdd);
            //test si test est différent de vide
            if(!empty($test)){
                //récupére le hash
                $hash = $test[0]['pwd_util'];
                //vérifie si le mot de passe correspond
                $password = password_verify($_POST['pwd_util'], $hash);
                if($password){
                    //créer les super globales SESSION
                    $_SESSION['connected'] = true;
                    $_SESSION['id'] = $test[0]['id_util'];
                    $_SESSION['name'] = $test[0]['name_util'];
                    $_SESSION['mail'] = $test[0]['mail_util'];
                    //message connecté
                    $message ="Connecté";
                }
                else{
                    //message les informations sont incorrectes
                    $message =" les informations sont incorrectes";
                }
            }
        }
        //test si les champs sont vides
        else{
            $message = "Veuillez compléter les champs du formulaire";
        }

    }
    else{
        $message = "Pour se connecter cliquez sur connexion";
    }
    echo $message;
?>