<?php
     /*---------------------------------------
                    IMPORT
    -----------------------------------------*/
    //importer la connexion à la bdd
    include './utils/connectBdd.php';
    //importer le model
    include './model/model_user.php';
    //importer la vue(interface)
    include './view/view_show_all_user.php';
    /*---------------------------------------
                    LOGIQUE
    -----------------------------------------*/
    //version 1
    //showAllUser($bdd);

    //version 2 (conseillé)
    //on stocke le tableau dans une variable
    $list = showAllUserV2($bdd);
    //on parcours le tableau
    foreach($list as $value){
        //on affiche à chaque tour un paragraphe avec les valeurs du tableau
        echo '<p><a href="update_user.php?id='.$value['id_util'].'">le prenom est égal à : '.$value['prenom_util'].' le mdp est est égal à :
        '.$value['mdp_util'].'</a></p>';
    }
    //version 3
    /*$obj = showAllUserV3($bdd);
    foreach($obj as $value){
        echo '<p>le prenom est égal à : '.$value->nom_util.' 
        le mdp est est égal à :'.$value->mdp_util.'</p>';
    }
    */
?>