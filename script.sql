drop table if exists FICHE;
drop table if exists UTILISATEUR;



CREATE TABLE UTILISATEUR(
	idUtilisateur int not null auto_increment,
	nomUtilisateur varchar(20),
	prenomUtilisateur varchar(20),
	loginUtilisateur char(30),
	password varchar(40),
	PRIMARY KEY(idUtilisateur)
)engine=InnoDB;

CREATE TABLE FICHE(
	idFiche int not null auto_increment,
	langueMaternelle varchar(50),
	languePerfectionnement varchar(50),
	age int,
	adresse char(200),
	numeroTelephone varchar(10),
	mail varchar(100),
	profession char(250),
	niveauLanguePrefectionnement varchar(20),
	niveauLangueSysteme varchar(2) default null,
	complement varchar(500),
	idUtilisateur int not null,
	PRIMARY KEY(idFiche),
	CONSTRAINT fk_utilisateur FOREIGN KEY(idUtilisateur) REFERENCES UTILISATEUR(idUtilisateur)	
)engine=InnoDB;

INSERT INTO UTILISATEUR values(null, "Leclerc", "Thomas", "tleclerc", sha1("quenelle"));
INSERT INTO UTILISATEUR values(null, "Petracca", "Charlélie", "cpetracca", sha1("quenelle"));

INSERT INTO FICHE values(null, "Francais", "Italien", 22, "14 rue de Beaupaquier 25240 Mouthe", "0600000000", "leclercthomas@yahoo.fr", "Etudiant", "avancé", null, "je fais du gros son avec mes amis", 1);
INSERT INTO FICHE values(null, "Francais", "Anglais", 25, "In th street", "0600000000", "charlelie.petracca@gmail.com", "Etudiant", "avancé", null, "j\'aime la guitare, les jeux vidéos et Marc Dorcel", 2);


