<?php
    //function qui renvoi la valeur du compteur(table nbr->cpt_nbr)
    function getCpt($bdd):int{
        try
        {
            $reponse = $bdd->prepare('SELECT cpt_nbr FROM nbr WHERE id_nbr = 1');
            $reponse->execute();
            //boucle pour parcourir et afficher le contenu de chaque ligne de la requete
            while ($donnees = $reponse->fetch())
            {   
                $cpt = $donnees['cpt_nbr'];                    
            }
            return $cpt;
        }
        catch(Exception $e)
        {   //affichage d'une exception
            die('Erreur : '.$e->getMessage());
        }  
    }
    //function qui va ajouter un enregistrement en BDD(table image)
    function addImg($bdd,$name,$url){
        try{
            $req = $bdd->prepare('INSERT INTO image(nom_img, url_img) 
            VALUES(:nom_img, :url_img)');
            $req->execute(array(
                'nom_img' => $name,
                'url_img' =>$url
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //function qui met à jour le compteur
    function updateCpt($bdd,$cpt){
        try{
            $req = $bdd->prepare('UPDATE nbr SET cpt_nbr = :cpt_nbr WHERE id_nbr = 1');
            $req->execute(array(
                'cpt_nbr' =>$cpt
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    //function qui compte les enregistrements 
    function getNbr($bdd):int{
        try
        {
            $reponse = $bdd->prepare('SELECT count(id_img) FROM image;');
            $reponse->execute();
            //boucle pour parcourir et afficher le contenu de chaque ligne de la requete
            while ($donnees = $reponse->fetch())
            {   
                $nbr = $donnees['id_img'];                    
            }
            return $nbr;
        }
        catch(Exception $e)
        {   //affichage d'une exception
            die('Erreur : '.$e->getMessage());
        }  
    }
?>