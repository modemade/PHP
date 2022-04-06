CREATE DATABASE produits;
USE produits;
CREATE table produit(
    id_produit int primary key auto_increment not null,
    nom_produit varchar(50) not null,
    contenu_produit text null
)engine= InnoDB;