<?php
    //import
    include './utils/connectBdd.php';
    include './model/model_article.php';

    //test si l'id de l'article à supprimer existe
    if(isset($_GET['id']) AND $_GET['id'] != ""){
        $article = new Article(null, null);
        $_GET['id']= intval($_GET['id']);
    
        $article->setIdArticle($_GET['id']);
        $tab = $article->showArticleById($bdd);
        $nom = $tab[0]['nom_article'];
        $article->deleteArticleById($bdd);
        header("Location: /evalmvc/showArticle?del=$nom");
    }
    //sinon
    else{
        header('Location: /evalmvc/showArticle?noId');
    }

?>