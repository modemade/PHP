<?php
    //requête ajouter un produit :
    function insertProduit($bdd,$nom, $content){
        try{
            $req = $bdd->prepare('INSERT INTO produit(nom_produit, contenu_produit) 
            VALUES(:nom_produit, :contenu_produit)');
            $req->execute(array(
                'nom_produit' => $nom,
                'contenu_produit' =>$content
                ));
        }
        catch(Exception $e)
        {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
        }
    }
    //requête qui affiche tous les produits en BDD(table->produit)
    function showAllProduit($bdd){
        try{
            $req = $bdd->prepare('SELECT * FROM produit');
            $req->execute();
            while ($data = $req->fetch()){
                echo '<p><input type="checkbox" 
                name="id_prod[]" value="'.$data['id_produit'].'">
                '.$data['nom_produit'].'</p>';
            }
        }
        catch(Exception $e)
        {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
        }
    }
    //requête qui supprime un produit (table->produit)
    function deleteProduit($bdd, $value){
        try{
            $req = $bdd->prepare('DELETE FROM produit WHERE id_produit = :id_produit');
            $req->execute(array(
                'id_produit' => $value
                ));
        }
        catch(Exception $e)
        {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
        }
    }
?>