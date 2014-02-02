drop table if exists FICHE;
drop table if exists UTILISATEUR;



CREATE TABLE UTILISATEUR(
	idUtilisateur int not null auto_increment,
	nomUtilisateur varchar(30),
	prenomUtilisateur varchar(30),
	loginUtilisateur varchar(30),
	password varchar(255),
	PRIMARY KEY(idUtilisateur)
)engine=InnoDB;

CREATE TABLE FICHE(
	idFiche int not null auto_increment,
	langueMaternelle varchar(50),
	languePerfectionnement varchar(50),
	age int,
	civilite varchar(4),
	adresse varchar(255),
	codePostal varchar(5),
	ville varchar(255),
	numeroTelephone varchar(10),
	mail varchar(100),
	profession varchar(255),
	niveauLanguePerfectionnement varchar(20),
	niveauLangueSysteme varchar(2) default null,
	complement varchar(500),
	idUtilisateur int not null,
	PRIMARY KEY(idFiche),
	CONSTRAINT fk_utilisateur FOREIGN KEY(idUtilisateur) REFERENCES UTILISATEUR(idUtilisateur)	
)engine=InnoDB;

INSERT INTO UTILISATEUR values(null, "Leclerc", "Thomas", "tleclerc", sha1("quenelle"));
INSERT INTO UTILISATEUR values(null, "Petracca", "Charlélie", "cpetracc", sha1("quenelle"));

INSERT INTO FICHE values(null, "Francais", "Italien", 22, "M.", "14 rue de Beaupaquier", "25240", "MOUTHE", "0600000000", "leclercthomas@yahoo.fr", "Etudiant", "avancé", null, "Je fais du gros son avec mes amis", 1);
INSERT INTO FICHE values(null, "Francais", "Anglais", 25, "M.", "Rue de l'ancien abreuvoir", "25870", "VALLEROY", "0600000000", "charlelie.petracca@gmail.com", "Etudiant", "avancé", null, "J'aime la guitare, les jeux vidéos et Dieudo!", 2);


