<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Modifier utilisateur</title>
</head>
<body>
    <?php
        //import menu
        include 'menu.php';
    ?>
    <h3>Ajouter un utilisateur :</h3>
    <form action="" method="post">
        <p>Saisir le nom de l'utilisateur :</p>
        <input type="text" name="nom_util">
        <p>Saisir le prénom de l'utilisateur :</p>
        <input type="text" name="prenom_util">
        <p>Saisir le mail de l'utilisateur :</p>
        <input type="email" name="mail_util">
        <p>Saisir le mot de passe de l'utilisateur :</p>
        <input type="password" name="mdp_util">
        <p><input type="submit" value="Modifier"></p>
    </form>
    <?php
        //import connexion BDD
        include './utils/connectBdd.php';
        //import fichier requête SQL
        include './utils/function.php';
        //test si l'id existe
        if(isset($_GET['id']) AND $_GET['id'] != ''){
            $value = $_GET['id'];
            //test si les champs du formulaire sont remplis
            if(isset($_POST['nom_util']) AND isset($_POST['prenom_util']) AND
            isset($_POST['mail_util']) AND isset($_POST['mdp_util']) AND 
            $_POST['nom_util'] !='' AND $_POST['prenom_util'] !='' AND
            $_POST['mail_util'] !='' AND $_POST['mdp_util'] !=''){
                //variables qui vont stocker les super Globales POST
                $nom = $_POST['nom_util'];
                $prenom = $_POST['prenom_util'];
                $mail = $_POST['mail_util'];
                $mdp = $_POST['mdp_util'];
                $mdp = md5($_POST['mdp_util']);
                updateUser($bdd,$nom,$prenom,$mail,$mdp,$value);
                echo 'l\'utilisateur '.$nom.' à été ajouté en BDD';        
            }
            else{
                echo "Veuillez remplir les champs du formulaire";
            }
        }
        else{
            header('Location: showUser.php?error');
        }
    ?>
</body>
</html>