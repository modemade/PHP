<?php
//fonction qui récupére l'extension du nom du fichier
function get_file_extension($file) {
    return substr(strrchr($file,'.'),1);
}
?>