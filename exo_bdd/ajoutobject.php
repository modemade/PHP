<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produit</title>
</head>
<body>
    <h1>Ajoutez un produit</h1>
    <form action="#" method="post">
        <p>Saisir le nom du prduit :</p>
        <input type="text" name="nom_produit">
        <p>Saisir le contenut du produit :</p>
        <textarea name="contenu_produit" col="30" rows="10"></textarea>
        <input type="submit" value="envoyer">
    </form>
    <?php
include "connect.php";
include "function.php";
if(isset($_POST['nom_produit']) 
AND isset($_POST['contenu_produit']) 
AND $_POST['nom_produit'] != ""
AND $_POST['contenu_produit'] !=""){
$nom = $_POST['nom_produit'];
$content = $_POST['contenu_produit'];
insertProduit($bdd,$nom, $content);
echo "$nom a etait ajouter";
}
else{
    echo "veuiller remplir le formulaire";
}
    ?>
</body>
</html>