<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>import de fichier</title>
</head>

<body>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <h2>importer une image</h2>
        <input type="file" name="img">
        <p><button type="submit">importer</button></p>
    </form>
<?php
include './utils/connect.php';
include './utils/function.php';

// $nomTemp = $_FILES['img']['tmp_name'];
//     $name = $_FILES['img']['name'];
//     $url = "./image/$name";
//     move_uploaded_file($nomTemp, $url);
$cpt;
if(isset($_POST['img'])){
    $tmpName = $_FILES['file']['tmp_name'];
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$error = $_FILES['file']['error'];
}
$req = $bdd->prepare('SELECT * FROM nbr');

            $req->execute();
            $data = $req->fetch();{
            $cpt = $data['cpt_nbr'] ;
            return $cpt;
            }

    $ext = get_file_extension($name);

    $nameFile = "image$cpt.$ext";

    move_uploaded_file($tmpName, "./image/$nameFile");

    $cpt += 1 ;

    updateImg($bdd,$img,$nbr,$cpt,$url);
            echo "L'image a bien était upadate";
    insertImg($bdd,$img,$nbr,$cpt,$url);
    echo "L'image a bien était insert";
?>

</html>