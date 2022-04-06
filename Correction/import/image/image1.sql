#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: session
#------------------------------------------------------------

CREATE TABLE session(
        id_session  Int  Auto_increment  NOT NULL ,
        nom_session Varchar (50) NOT NULL
	,CONSTRAINT session_PK PRIMARY KEY (id_session)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: stagiaire
#------------------------------------------------------------

CREATE TABLE stagiaire(
        id_stg     Int  Auto_increment  NOT NULL ,
        nom_stg    Varchar (50) NOT NULL ,
        prenom_stg Varchar (50) NOT NULL ,
        id_session Int
	,CONSTRAINT stagiaire_PK PRIMARY KEY (id_stg)

	,CONSTRAINT stagiaire_session_FK FOREIGN KEY (id_session) REFERENCES session(id_session)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: role
#------------------------------------------------------------

CREATE TABLE role(
        id_role  Int  Auto_increment  NOT NULL ,
        nom_role Varchar (50) NOT NULL
	,CONSTRAINT role_PK PRIMARY KEY (id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateur
#------------------------------------------------------------

CREATE TABLE utilisateur(
        id_util     Int  Auto_increment  NOT NULL ,
        nom_util    Varchar (50) NOT NULL ,
        prenom_util Varchar (50) NOT NULL ,
        login_util  Varchar (50) NOT NULL ,
        mdp_util    Varchar (50) NOT NULL ,
        id_role     Int
	,CONSTRAINT utilisateur_PK PRIMARY KEY (id_util)

	,CONSTRAINT utilisateur_role_FK FOREIGN KEY (id_role) REFERENCES role(id_role)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: type
#------------------------------------------------------------

CREATE TABLE type(
        id_type  Int  Auto_increment  NOT NULL ,
        nom_type Varchar (50) NOT NULL
	,CONSTRAINT type_PK PRIMARY KEY (id_type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: module
#------------------------------------------------------------

CREATE TABLE module(
        id_module      Int  Auto_increment  NOT NULL ,
        nom_module     Varchar (50) NOT NULL ,
        nbr_module_max Int NOT NULL ,
        id_type        Int
	,CONSTRAINT module_PK PRIMARY KEY (id_module)

	,CONSTRAINT module_type_FK FOREIGN KEY (id_type) REFERENCES type(id_type)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: crenaux
#------------------------------------------------------------

CREATE TABLE crenaux(
        id_crenaux  Int  Auto_increment  NOT NULL ,
        nom_crenaux Varchar (5) NOT NULL
	,CONSTRAINT crenaux_PK PRIMARY KEY (id_crenaux)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: seance
#------------------------------------------------------------

CREATE TABLE seance(
        id_seance   Int  Auto_increment  NOT NULL ,
        date_seance Date NOT NULL ,
        id_module   Int ,
        id_crenaux  Int ,
        id_util     Int
	,CONSTRAINT seance_PK PRIMARY KEY (id_seance)

	,CONSTRAINT seance_module_FK FOREIGN KEY (id_module) REFERENCES module(id_module)
	,CONSTRAINT seance_crenaux0_FK FOREIGN KEY (id_crenaux) REFERENCES crenaux(id_crenaux)
	,CONSTRAINT seance_utilisateur1_FK FOREIGN KEY (id_util) REFERENCES utilisateur(id_util)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: rattacher
#------------------------------------------------------------

CREATE TABLE rattacher(
        id_type Int NOT NULL ,
        id_util Int NOT NULL
	,CONSTRAINT rattacher_PK PRIMARY KEY (id_type,id_util)

	,CONSTRAINT rattacher_type_FK FOREIGN KEY (id_type) REFERENCES type(id_type)
	,CONSTRAINT rattacher_utilisateur0_FK FOREIGN KEY (id_util) REFERENCES utilisateur(id_util)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: participer
#------------------------------------------------------------

CREATE TABLE participer(
        id_seance Int NOT NULL ,
        id_stg    Int NOT NULL ,
        presence  Bool NOT NULL ,
        retard    Bool NOT NULL ,
        detail    Text NOT NULL
	,CONSTRAINT participer_PK PRIMARY KEY (id_seance,id_stg)

	,CONSTRAINT participer_seance_FK FOREIGN KEY (id_seance) REFERENCES seance(id_seance)
	,CONSTRAINT participer_stagiaire0_FK FOREIGN KEY (id_stg) REFERENCES stagiaire(id_stg)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: valider
#------------------------------------------------------------

CREATE TABLE valider(
        id_module Int NOT NULL ,
        id_stg    Int NOT NULL ,
        validate  Bool NOT NULL
	,CONSTRAINT valider_PK PRIMARY KEY (id_module,id_stg)

	,CONSTRAINT valider_module_FK FOREIGN KEY (id_module) REFERENCES module(id_module)
	,CONSTRAINT valider_stagiaire0_FK FOREIGN KEY (id_stg) REFERENCES stagiaire(id_stg)
)ENGINE=InnoDB;

