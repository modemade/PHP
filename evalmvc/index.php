<?php
    //session start
    session_start();
    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    /*--------------------------ROUTER -----------------------------*/
    //test de la valeur $path dans l'URL et import de la ressource
    switch($path){
        //route /evalmvc/test -> ./test.php
        case $path === "/evalmvc/test" : 
            include './test.php';
            break ;
        //route /evalmvc/addArticle -> ./controler/controler_add_article.php
        case $path === "/evalmvc/addArticle":
            include './controler/controler_add_article.php';
		    break ;
        //route /evalmvc/showArticle -> ./controler/controler_show_all_article.php
        case $path === "/evalmvc/showArticle":
            include './controler/controler_show_all_article.php';
		    break ;
        //route /evalmvc/modifyArticle -> ./controler/controler_modify_article.php
        case $path === "/evalmvc/modifyArticle":
            include './controler/controler_modify_article.php';
		    break ;
        //route /evalmvc/deleteArticle -> ./controler/controler_delete_article.php
        case $path === "/evalmvc/deleteArticle":
            include './controler/controler_delete_article.php';
		    break ;
        //route /evalmvc/getApi -> ./api/api.php
        case $path === "/evalmvc/getApi":
            include './api/api.php';
		    break ;
        //route /evalmvc/apiAllArticle -> ./controler/controler_api_all_article.php
        case $path === "/evalmvc/apiAllArticle":
            include './controler/controler_api_all_article.php';
		    break ;
        
        //route /evalmvc/error -> ./error.php
        case $path === "/evalmvc/error":
            include './error.php';
		    break ;
        //route en cas d'erreur
        default:
            include './controler/controler_show_all_article.php';
		    break ;
    }
?>