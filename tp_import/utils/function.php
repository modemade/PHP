<?php
function get_file_extension($file) {
return substr(strrchr($file,'.'),1);
}


function updateImg($bdd,$img,$nbr,$cpt,$url){
    try{
        $req = $bdd->prepare('UPDATE FROM image WHERE id_img = :id_img');
        $req->execute(array(
            'id_img' => $value
        ));
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}

function insertImage($bdd,$img,$nbr,$cpt,$url){
        try{
            $req = $bdd->prepare('INSERT INTO image (nom_img,
            url_img)
            VALUES(:nom_img, :url_img)');

            $req->execute(array(
                'nom_img' => $nom,
                'url_img' =>$url
                ));
        }
        catch(Exception $e)
        {
        die('Erreur : '.$e->getMessage());
        }
    }
?>