<?php

    include './utils/connectBdd.php';
    include './model/model_user.php';
    include './view/view_add_user.php';

    if(isset($_POST['submit'])){
        if(isset($_POST['name']) 
            AND isset($_POST['firstname']) 
            AND isset($_POST['mail']) 
            AND isset($_POST['mdp']) 
    
            AND $_POST['name'] !='' 
            AND $_POST['firstname'] !='' 
            AND $_POST['mail'] !='' 
            AND $_POST['mdp'] !=''){
                $nom =$_POST['name'];
                $prenom =$_POST['firstname'];
                $mail =$_POST['mail'];
                $mdp =$_POST['mdp'];

            adduser($bdd, $nom, $prenom, $mail,$mdp) ;

        echo "$nom à été ajouté en  BDD";
    }
    else{
        echo 'Veuillez compléter les champs du formulaire';
    }
}    
?>