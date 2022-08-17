<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/style/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Modifier un article</title>
</head>
<body>
    <h3>Modifier l'article:</h3>
    <form action="" method="post">
        <p>Modifier le nom de l'article:</p>
        <input type="text" name="nom_article" id="nom">
        <p>Modifier le prix de l'article:</p>
        <input type="text" name="prix_article" id="prix">
        <p><input type="submit" value="Modifier" name="update"></p>
    </form>
    <p id="msg"></p>
    <script src="./asset/script/script.js"></script>
</body>
</html>