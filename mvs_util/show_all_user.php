<?php

include './utils/connectBdd.php';
include './model/model_user.php';
include './view/view_show_all_user.php';

    $list = showAllUser($bdd);
    foreach($list as $value){
        echo '<p><a href="update_mti.php?id='.$value['id_util'].'">
        le prenom est égal à : '.$value['prenom_util'].' le mdp est est égal à :
        '.$value['mdp_util'].'</a></p>';
    }
?>