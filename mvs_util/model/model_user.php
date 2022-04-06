<?php
function adduser($bdd, $nom ,$prenom ,$mail ,$mdp){
    try{
        $req = $bdd->prepare('INSERT INTO utilisateur(nom_util, prenom_util, mail_util, mdp_util) 
        VALUES (:nom_util, :prenom_util, :mail_util, :mdp_util)');
        $req->execute(array(
            'nom_util' => $nom,
            'prenom_util' =>$prenom,
            'mail_util' =>$mail,
            'mdp_util' =>$mdp
        ));
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function showAllUser($bdd){
    $sql = "SELECT * FROM utilisateur";
    $req = $bdd->prepare($sql);
    $req ->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function updateUtilisateur($bdd, $nom ,$prenom ,$mail ,$mdp ,$id){
        try{
            $req = $bdd->prepare('UPDATE utilisateur SET nom_util = :nom_util,
            prenom_util = :prenom_util, mail_util = :mail_util, mdp_util = :mdp_util WHERE id_util = :id_util');
            $req->execute(array(
                'id_util' => $id,
                'nom_util' => $nom,
                'prenom_util' => $prenom,
                'mail_util' =>$mail,
                'mdp_util' =>$mdp,
                ));
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
?>