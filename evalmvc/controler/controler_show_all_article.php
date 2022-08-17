<?php
    //import
    include './utils/connectBdd.php';
    include './model/model_article.php';
    //menu 
    include './view/view_menu.php';
    include './view/view_show_all_article.php';
    
    //message d'erreur
    $msg = "Sélectionnez un article à Modifier ou supprimer";
    //test si aucun id existe (modification ou suppression)
    if(isset($_GET['noId'])){
        //message d'erreur
        $msg = "Veuillez sélectionner un article";
    }
    //test si un article à été supprimé
    if(isset($_GET['del']) AND $_GET['del'] !=""){
        //message d'erreur
        $msg = 'Article '.$_GET['del'].' à été supprimé';
        //refresh de la page 1500 ms en JS
        echo "<script>
            setTimeout(()=>{
                document.location.href='/evalmvc/showArticle'; 
                }, 1500);
        </script>";
    }
    //instancier un nouvel objet
    $article = new Article(null, null);
    //stocke dans un tableau la liste des articles de la BDD
    $tab = $article->showAllArticle($bdd);
    //boucle pour afficher la liste des articles (avec le nom et le prix)
    foreach($tab as $value){
        echo '<li>
        '.$value->nom_article.', '.$value->prix_article.' €
        <a href="/evalmvc/modifyArticle?id='.$value->id_article.'"><img src="./asset/image/edit.png"class="logo"></a>
        <a href="/evalmvc/deleteArticle?id='.$value->id_article.'"><img src="./asset/image/delete.png"class="logo"></a>
        </li>';
    }
    //affichage fin de la liste zone message erreur et 
    //script affichage des messages d'erreurs
    echo "</ul>
    <p id='msg'></p>
    <script>
        document.querySelector('#msg').innerHTML = '$msg';
    </script>
    </body>
    </html>";
?>