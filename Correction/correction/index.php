
<?php
    //import des ressources
    
    //import de la connexion à la bdd
    include './utils/connectBdd.php';
    //import du model
    include './model/model_image.php';
    //import des utils
    include './utils/function.php';
    //import de la vue 
    include './view/view_form.php';

    //valeur du compteur
    $cpt = getCpt($bdd);
    
    //tester si il y à une image
    if(isset($_FILES['image']) AND $_FILES['image']['name'] != ''){
        //créer des variables qui vont contenir le contenu des super globales FILES
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        //récupére l'extension du fichier
        $ext = get_file_extension($name);
        //variable qui contient le nouveau nom de l'image
        $name = "image$cpt.$ext";
        //variable qui contient le chemin de l'image
        $url = "./images/$name";
        //déplacer l'image dans le dossier image (rename)
        move_uploaded_file($tmpName, $url);
        //function qui ajoute l'image en  BDD
        addImg($bdd,$name,$url);
        //incrémenter le compteur
        $cpt++;
        //mettre à jour le compteur en BDD
        updateCpt($bdd,$cpt);
        echo 'L\'image '.$name.' à été ajoutée en BDD';
    }
    else{
        echo "Veuillez àjouter une image";
    }
?>