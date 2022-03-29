<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>afficher la liste des produits</title>
</head>
<body>
    <h3>Liste des produits :</h3>
    <form action="" method="post">
    <?php
        //fichier de connexion à la BDD
        include 'connectBdd.php';
        //function requête SQL
        include 'function.php';
        showAllProduit($bdd);
    ?>
        <input type="submit" value="Supprimer">
    </form>
    <?php
        //vérification de la super globale $_POST['id_prod']
        if(isset($_POST['id_prod'])){
            //boucle pour parcourir chaque case cochés ($value équivaut à value en HTML)
            foreach($_POST['id_prod'] as $value){
                deleteProduit($bdd, $value);
                echo "<p>Suppression de l'article $value</p>";
            }
        }
        else{
        echo "<p>Veuillez cocher un ou plusieurs produit à supprimer</p>";
        }
    ?>
</body>
</html>