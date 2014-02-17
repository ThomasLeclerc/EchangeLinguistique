drop table if exists PARLE;
drop table if exists PERFECTIONNE;
drop table if exists LINK;
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
	age int,
	sexe char(1),
	adresse varchar(255),
	codePostal varchar(5),
	ville varchar(255),
	numeroTelephone varchar(10),
	mail varchar(100),
	profession varchar(255),
	complement varchar(500),
	idLink int,
	idTandem int,
	PRIMARY KEY(idFiche),
	CONSTRAINT fkFiche FOREIGN KEY(idLink) REFERENCES FICHE(idFiche) ON DELETE CASCADE
)engine=InnoDB;

CREATE TABLE LINK(
	idFiche1 int not null,
	idFiche2 int not null,
	PRIMARY KEY(idFiche1, idFiche2),
	CONSTRAINT fkLink1 FOREIGN KEY(idFiche1) REFERENCES FICHE(idFiche) ON DELETE CASCADE,
	CONSTRAINT fkLink2 FOREIGN KEY(idFiche2) REFERENCES FICHE(idFiche) ON DELETE CASCADE
)engine=InnoDB;

CREATE TABLE PARLE(
	idFiche int,
	idLangue int,
	primary key (idFiche, idLangue),
	constraint fkParle1 foreign key (idFiche) references FICHE(idFiche) on delete cascade,
	constraint fkParle2 foreign key (idLangue) references LANGUE(idLangue) on delete cascade
)engine=InnoDB;

CREATE TABLE PERFECTIONNE(
	idFiche int,
	idLangue int,
	niveau varchar(50),
	niveauUE varchar(2),
	primary key (idFiche, idLangue),
	constraint fkPerf1 foreign key (idFiche) references FICHE(idFiche) on delete cascade,
	constraint fkPerf2 foreign key (idLangue) references LANGUE(idLangue) on delete cascade
)engine=InnoDB;


INSERT INTO UTILISATEUR values(null, "Leclerc", "Thomas", "tleclerc", sha1("quenelle"));
INSERT INTO UTILISATEUR values(null, "Petracca", "Charlélie", "cpetracc", sha1("quenelle"));

INSERT INTO LANGUE values(null, "Francais", "france.png");
INSERT INTO LANGUE values(null, "Anglais", "royaume-uni.png");
INSERT INTO LANGUE values(null, "Allemand", "allemagne.png");
INSERT INTO LANGUE values(null, "Espagnol", "espagne.png");
INSERT INTO LANGUE values(null, "Italien", "italie.png");


INSERT INTO FICHE values(null, "Leclerc",	"Thomas", 22, "M", "14 rue de Beaupaquier",		"25240", "MOUTHE", 		"0600000000", "leclercthomas@yahoo.fr", "Etudiant", "Je fais du gros son avec mes amis",null,null);
INSERT INTO FICHE values(null, "Petracca",	"Charlélie", 25, "M", "Rue de l'ancien abreuvoir", "25870", "VALLEROY", 	"0600000000", "charlelie.petracca@gmail.com", "Etudiant", "J'aime la guitare, les jeux vidéos et Dieudo!",null,null);
INSERT INTO FICHE values(null, "Petterson", "John", 87, "M", "Rue de la mairie", 			"25000", "BESANCON", 	"0600000000", "john.peterson@yahoo.com", "Chercheur d'or", "",null,null);
INSERT INTO FICHE values(null, "Jefferson", "Doug", 18, "M", "Rue de l'église", 			"25000", "BESANCON", 	"0600000000", "doug.jefferson@jesus-mail.com", "Inspecteur", "Je suis très religieux",null,null); 
INSERT INTO FICHE values(null, "Morisson",	"Phil", 23, "M", "Avenue de Montrapon", 		"25000", "BESANCON", 	"0600000000",  "phil.morison@yahoo.com", "Culturiste", "",null,null);
INSERT INTO FICHE values(null, "Erikson",	"Britany", 19, "F", "Rue Bersot", 				"25000", "BESANCON", 	"0600000000",  "brit.erikson@hotmail.com", "Etudiant", "J'aime l'équitation, j'ai deux poneys",null,null);
INSERT INTO FICHE values(null, "Gonzales",	"Jennifer", 26, "F", "Rue Jouchoux", 				"25000", "BESANCON", 	"0600000000",  "jen.garyson@yahoo.com", "Coach sportif", "",null,null);
INSERT INTO FICHE values(null, "Fuije",	"Elias", 38, "M", "Rue Alain Savary", 				"25000", "BESANCON", 	"0600000000",  "elias.juif@yahoo.com", "Chasseur de primes", "",null,null);


INSERT INTO PARLE VALUES(1,1);
INSERT INTO PARLE VALUES(2,1);
INSERT INTO PARLE VALUES(3,2);
INSERT INTO PARLE VALUES(4,2);
INSERT INTO PARLE VALUES(5,2);
INSERT INTO PARLE VALUES(6,3);
INSERT INTO PARLE VALUES(7,1);
INSERT INTO PARLE VALUES(7,4);
INSERT INTO PARLE VALUES(8,1);

INSERT INTO PERFECTIONNE VALUES(1,2,"Debutant","A1");
INSERT INTO PERFECTIONNE VALUES(2,5,"Intermediaire","B2");
INSERT INTO PERFECTIONNE VALUES(3,1,"Avance","no");
INSERT INTO PERFECTIONNE VALUES(4,1,"Intermediaire","no");
INSERT INTO PERFECTIONNE VALUES(5,4,"Avance","A2");
INSERT INTO PERFECTIONNE VALUES(5,1,"Intermediaire","no");
INSERT INTO PERFECTIONNE VALUES(6,1,"Intermediaire","B2");
INSERT INTO PERFECTIONNE VALUES(7,2,"Avance","no");
INSERT INTO PERFECTIONNE VALUES(7,3,"Intermediaire","no");
INSERT INTO PERFECTIONNE VALUES(8,3,"Debutant","no");


