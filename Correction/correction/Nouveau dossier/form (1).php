<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>error form</title>
</head>
<body>
    <h3>Ajouter un utilisateur :</h3>
    <!--Formulaire HTML-->
    <form action="" method="post">
        <p>Saisir votre nom :</p>
        <input type="text" name="name">
        <p>Saisir votre prénom :</p>
        <input type="text" name="firstname">
        <p>Saisir votre mail :</p>
        <input type="email" name="mail">
        <p>Saisir votre mot de passe :</p>
        <input type="password" name="mdp">
       <p><input type="submit" value="test" name="submit"></p>
    </form>
    <!--Zone HTML qui va recevoir et afficher les messages d'erreur -->
    <p id="zone"></p>
</body>
</html>
<?php
    //variable message erreur
    $msg;
    //test si on à cliqué sur le bouton submit du formulaire
    if(isset($_POST['submit'])){
        //test si les champs du formulaire existent et sont remplis
        if(isset($_POST['name']) AND isset($_POST['firstname']) AND
        isset($_POST['mail']) AND isset($_POST['mdp']) AND
        !empty($_POST['name']) AND !empty($_POST['firstname']) AND 
        !empty($_POST['mail']) AND !empty($_POST['mdp'])){
            //message d'erreur
            $msg = ''.$_POST['name'].' à été ajouté';
        }
        //sinon (champs vides)
        else{
            //message d'erreur
            $msg = 'Veuillez remplir les champs du formulaire';
        }
    }
    //test si le bouton submit n'a pas été cliqué
    else{
        //message d'erreur
        $msg = 'Ajouter un utilisateur';
    }
//affichage des erreurs PHP en JS
echo '<script>
    //variable récupération de la zone HTML
    let zone = document.querySelector(\'#zone\');
    //variable qui récupére le message d\'erreur depuis PHP
    let msg = "'.$msg.'";
    //fonction qui affiche les erreurs dans zone
    function showError(msg){
        zone.innerHTML = msg;
    }
    //appel de la fonction
    showError(msg);
</script>';
?>