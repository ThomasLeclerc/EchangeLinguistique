drop table if exists FICHE;
drop table if exists UTILISATEUR;
drop table if exists LANGUE;


CREATE TABLE UTILISATEUR(
	idUtilisateur int not null auto_increment,
	nomUtilisateur varchar(30),
	prenomUtilisateur varchar(30),
	loginUtilisateur varchar(30),
	password varchar(255),
	PRIMARY KEY(idUtilisateur)
)engine=InnoDB;

CREATE TABLE LANGUE(
	idLangue int not null auto_increment,
	libelleLangue varchar(30),
	imageDrapeau varchar(255),
	primary key(idLangue)
)engine=InnoDB;

CREATE TABLE FICHE(
	idFiche int not null auto_increment,
	nomFiche varchar(50),
	prenomFiche varchar(50),
	idLangueMaternelle varchar(50),
	idLanguePerfectionnement varchar(50),
	age int,
	sexe char(1),
	adresse varchar(255),
	codePostal varchar(5),
	ville varchar(255),
	numeroTelephone varchar(10),
	mail varchar(100),
	profession varchar(255),
	niveauLanguePerfectionnement varchar(20),
	niveauLangueSysteme varchar(2) default null,
	complement varchar(500),
	PRIMARY KEY(idFiche)
)engine=InnoDB;

INSERT INTO UTILISATEUR values(null, "Leclerc", "Thomas", "tleclerc", sha1("quenelle"));
INSERT INTO UTILISATEUR values(null, "Petracca", "Charlélie", "cpetracc", sha1("quenelle"));

INSERT INTO LANGUE values(null, "Francais", "france.png");
INSERT INTO LANGUE values(null, "Anglais", "royaume-uni.png");
INSERT INTO LANGUE values(null, "Allemand", "allemagne.png");
INSERT INTO LANGUE values(null, "Espagnol", "espagne.png");
INSERT INTO LANGUE values(null, "Russe", null);
INSERT INTO LANGUE values(null, "Chinois", null);
INSERT INTO LANGUE values(null, "Breton", null);
INSERT INTO LANGUE values(null, "Italien", "italie.png");


INSERT INTO FICHE values(null, "Leclerc",	"Thomas",	1, 2, 22, "M", "14 rue de Beaupaquier",		"25240", "MOUTHE", 		"0600000000", "leclercthomas@yahoo.fr", "Etudiant", "avancé", null, "Je fais du gros son avec mes amis");
INSERT INTO FICHE values(null, "Petracca",	"Charlélie",1, 8, 25, "M", "Rue de l'ancien abreuvoir", "25870", "VALLEROY", 	"0600000000", "charlelie.petracca@gmail.com", "Etudiant", "avancé", null, "J'aime la guitare, les jeux vidéos et Dieudo!");
INSERT INTO FICHE values(null, "Petterson", "John",		2, 1, 87, "M", "Rue de la mairie", 			"25000", "BESANCON", 	"0600000000", "john.peterson@yahoo.com", "Chercheur d'or", "intermédiaire", "B1", "");
INSERT INTO FICHE values(null, "Jefferson", "Doug", 	3, 2, 18, "M", "Rue de l'église", 			"25000", "BESANCON", 	"0600000000", "doug.jefferson@jesus-mail.com", "Inspecteur", "avancé", "B1", "Je suis très religieux"); 
INSERT INTO FICHE values(null, "Morisson",	"Phil", 	2, 4, 23, "M", "Avenue de Montrapon", 		"25000", "BESANCON", 	"0600000000",  "phil.morison@yahoo.com", "Culturiste", "faible", null, "");
INSERT INTO FICHE values(null, "Erikson",	"Britany", 	7, 6, 19, "F", "Rue Bersot", 				"25000", "BESANCON", 	"0600000000",  "brit.erikson@hotmail.com", "Etudiant", "faible", null, "J'aime l'équitation, j'ai deux poneys");
INSERT INTO FICHE values(null, "Garyson",	"Jennifer", 4, 1, 26, "F", "Rue Jouchoux", 				"25000", "BESANCON", 	"0600000000",  "jen.garyson@yahoo.com", "Coach sportif", "avancé", "A2", "");
