<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produit</title>
</head>
<body>
    <h3>Ajouter un produit :</h3>
    <form action="" method="post">
        <p>Saisir le nom du produit :</p>
        <input type="text" name="nom_produit">
        <p>Saisir le contenu du produit:</p>
        <textarea name="contenu_produit" cols="30" rows="10">
        </textarea>
        <p><input type="submit" value="Ajouter"></p>
    </form>
    <?php
        //fichier de connexion à la BDD
        include 'connectBdd.php';
        //function requête SQL
        include 'function.php';
        //test si les champs existent et sont remplis
        if(isset($_POST['nom_produit'])AND isset($_POST['contenu_produit']) AND
        $_POST['nom_produit'] != "" AND $_POST['contenu_produit'] !=""){
            $nomProd = $_POST['nom_produit'];
            $contentProd = $_POST['contenu_produit'];
            insertProduit($bdd,$nomProd, $contentProd);
            echo "$nomProd à été ajouté en BDD";
        }
        else{
            echo 'Veuillez remplir les champs du  formulaire';
        }
    ?>
</body>
</html>