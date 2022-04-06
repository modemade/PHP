<?php
    /*-----------------------------------------------------
                        import :
    -----------------------------------------------------*/

    include './utils/bddconnect.php';
    /*-----------------------------------------------------
                        variables :
    -----------------------------------------------------*/
    //variable compteur(pour renommer les fichiers)
    $cpt;
    /*-----------------------------------------------------
                        Requête BDD :
    -----------------------------------------------------*/
    //récupération du compteur en bdd (numéro de l'image cpt_nbr de la table nbr)
    try
    {
        $reponse = $bdd->query('SELECT cpt_nbr FROM nbr WHERE id_nbr = 1');
        //boucle pour parcourir et afficher le contenu de chaque ligne de la requete
        while ($donnees = $reponse->fetch())
        {   
            $cpt = $donnees['cpt_nbr'];                    
        }
    }
    catch(Exception $e)
    {   //affichage d'une exception
        die('Erreur : '.$e->getMessage());
    }    
    /*-----------------------------------------------------
                    Test (import du fichier) :
    -----------------------------------------------------*/
    //test si le fichier importé existe
    if(isset($_FILES['file'])){
       
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
        //récupération de l'extension
        $ext = get_file_extension($name);
        //rename du fichier(image + numéro + .extension de fichier)
        $nameFile = "image$cpt.$ext";
        //déplacer le fichier importé
        $fichier = move_uploaded_file($tmpName, "./image/$nameFile");
        //incrémentation du compteur (champ cpt_nbr dans la table nbr de la BDD img)
        $cpt++;
        /*-----------------------------------------------------
                             Requête BDD :
        -----------------------------------------------------*/
        //mise à jour du compteur en bdd
        try
        {   
            //préparation de la requête
            $req = $bdd->prepare('UPDATE nbr SET cpt_nbr = :cpt WHERE id_nbr = 1');
            //éxécution de la requête SQL
            $req->execute(array(
                'cpt' => $cpt,
            ));
        }
        catch(Exception $e)
        {   //affichage d'une exception
            die('Erreur : '.$e->getMessage());
        }
        //insertion dans la bdd image de l'image avec:
        //(nom + url du fichier importé) en bdd
        try
        {   
            //requête ajout d'une image (préparation)
            $req = $bdd->prepare('INSERT INTO image(nom_img, url_img) 
            VALUES (:nom_img, :url_img)');
            //éxécution de la requête SQL
            $req->execute(array(
            'nom_img' => $nameFile,
            'url_img' => "/image/$nameFile",
        ));
        }
        catch(Exception $e)
        {   //affichage d'une exception
            die('Erreur : '.$e->getMessage());
        }        
    }
    /*-----------------------------------------------------
                        Fonctions :
    -----------------------------------------------------*/
    //fonction qui récupére le format du fichier (extension)
    function get_file_extension($file) {
        return substr(strrchr($file,'.'),1);
    }
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <h2>importer une image</h2>
        <input type="file" name="file">
        <p><button type="submit">importer</button></p>
    </form>
</html>
