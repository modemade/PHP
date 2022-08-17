<?php
    //autorisation JSON
    header("Access-Control-Allow-Origin: *");
    //json error
    $tab = array(
    'error' => 'Pas de Json',);
    //imports
    include './utils/connectBdd.php';
    include './model/model_article.php';
    if(isset($_GET['allArticle'])){
        //instance obj Article
        $article = new Article(null, null);
        //return JSON all article
        echo json_encode($article->showAllArticle($bdd));
    }
    else{
        print_r('{"error" : "'.$tab['error'].'"}');
    }
?>