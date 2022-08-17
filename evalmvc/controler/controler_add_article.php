<?php
    //import
    include './utils/connectBdd.php';
    //model
    include './model/model_article.php';
     //menu 
    include './view/view_menu.php';
    //vue
    include './view/view_add_article.php';
   
    //variable message
    $msg = "Ajoutez un article";
    $art = new Article(null, null);
    //test si le bouton ajouté est cliqué
    if(isset($_POST['add'])){
        //test si les champs sont rempli
        if(isset($_POST['nom_article']) AND isset($_POST['prix_article']) AND 
        $_POST['nom_article'] != "" AND $_POST['prix_article'] !=""){
            //instancier un nouvel objet Article (appel au constructeur)
            $article = new Article($_POST['nom_article'], $_POST['prix_article']);
            //appel à la méthode addArticleV2 de la classe Article
            $article->addArticle($bdd);
            //utiliser le getter pour afficher le nom
            $msg = ''.$_POST['nom_article'].' à été ajouté';
        }
        //si vide
        else{
            $msg = 'Veuillez remplir les champs du formulaire';
        }
    }    
    //Affichage en JS des Messages 
    echo "<script>zoneMsg.innerHTML = '$msg'</script>";
?>