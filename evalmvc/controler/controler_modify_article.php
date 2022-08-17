<?php
    //import
    include './utils/connectBdd.php';
    include './model/model_article.php';
    //menu 
    include './view/view_menu.php';
    include './view/view_modify_article.php';
    //variable message
    $msg = "Article en attente de modification";
    //test si l'id existe
    if(isset($_GET['id']) AND $_GET['id'] !=""){
        //instance d'un nouvel objet Article
        $art = new Article(null, null);
        //injection de l'id (obj)->setIdArticle
        $art->setIdArticle($_GET['id']);
        //récupération des valeurs de l'article (Array)
        $tab = $art->showArticleById($bdd);
        //stockage des valeurs (nom et prix)
        $nom_art = $tab[0]['nom_article'];
        $price_art=  $tab[0]['prix_article'];
        //script JS (injection des valeurs existante de l'article en bdd)
        echo "<script>
                let name = '$nom_art';
                let price = '$price_art';
                let nom = document.querySelector('#nom');
                let prix = document.querySelector('#prix');
                nom.value = name;
                prix.value = price;
        </script>";
        //test si clic sur modifier
        if(isset($_POST['update'])){
            //test si les champs sont remplies
            if(isset($_POST['nom_article']) AND isset($_POST['prix_article'])
            AND $_POST['nom_article'] !="" AND $_POST['prix_article'] !=""){
                //instance d'un nouvel objet Article avec le constructeur
                $article = new Article($_POST['nom_article'], $_POST['prix_article']);
                //affectation de l'id de l'article (setter-> setIdArticle)
                $article->setIdArticle($_GET['id']);
                //modification de l'article
                $article->modifyArticle($bdd);
                //récupération du nouveau nom et prix 
                $newNom = $_POST['nom_article'];
                $newPrix = $_POST['prix_article'];
                //message de modification
                $msg =  "L\'article à été modifié";
                echo "<script>
                nom.value = '$newNom';
                prix.value = '$newPrix';
                setTimeout(()=>{
                    document.location.href='/evalmvc/showArticle'; 
                    }, 1500);
                </script>";
            }
        }
    }
    else{
        header('Location: /evalmvc/showArticle?noId');
    }
    //Affichage en JS des Messages 
    echo "<script>zoneMsg.innerHTML = '$msg';</script>";

?>