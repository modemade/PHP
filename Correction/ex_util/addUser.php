<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Ajouter utilisateur</title>
</head>
<body>
    <?php
        //import menu
        include 'menu.php';
    ?>
    <h3>Ajouter un utilisateur :</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <p>Saisir le nom de l'utilisateur :</p>
        <input type="text" name="nom_util">
        <p>Saisir le prénom de l'utilisateur :</p>
        <input type="text" name="prenom_util">
        <p>Saisir le mail de l'utilisateur :</p>
        <input type="email" name="mail_util">
        <p>Saisir le mot de passe de l'utilisateur :</p>
        <input type="password" name="mdp_util">
        <p>Ajoutez une image de profil:</p>
        <input type="file" name="img_util">
        <p><input type="submit" value="Ajouter"></p>
    </form>
    <?php
        //import connexion BDD
        include './utils/connectBdd.php';
        //import fichier requête SQL
        include './utils/function.php';
        //test si le fichier existe
       
        //test si les champs du formulaire sont remplis
        if(isset($_POST['nom_util']) AND isset($_POST['prenom_util']) AND
        isset($_POST['mail_util']) AND isset($_POST['mdp_util']) AND 
        $_POST['nom_util'] !='' AND $_POST['prenom_util'] !='' AND
        $_POST['mail_util'] !='' AND $_POST['mdp_util'] !=''){
            //test si l'image est importé
            if(isset($_FILES['img_util']) AND $_FILES['img_util']['name'] !=''){
                //variable super globale FILE
                $name = $_FILES['img_util']['name'];
                $tmpName = $_FILES['img_util']['tmp_name'];
                $img = "./image/$name";
                $state = true;
                //fonction déplacer et renommer l'image
                move_uploaded_file($tmpName, $img);
            }
            //sinon image par défaut
            else{
                $img = "./image/defaut.png";
                $state = false;
            }
            //variables qui vont stocker les super Globales POST
            $nom = $_POST['nom_util'];
            $prenom = $_POST['prenom_util'];
            $mail = $_POST['mail_util'];
            $mdp = $_POST['mdp_util'];
            $mdp = md5($_POST['mdp_util']);
            //fonction ajouté l'utilisateur en BDD
            addUser($bdd,$nom,$prenom,$mail,$mdp, $img);
            //si image importé
            if($state){
                echo '<p>l\'utilisateur '.$nom.' à été ajouté en BDD 
                avec une image perso</p>';
            }
            //sinon image par défaut
            else{
                echo '<p>l\'utilisateur '.$nom.' à été ajouté en BDD 
                avec l\'image par défaut</p>';
            }     
        }

        else{
            echo "<p>Veuillez remplir les champs du formulaire</p>";
        }
    ?>
</body>
</html>