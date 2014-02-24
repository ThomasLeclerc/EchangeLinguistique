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
	emailUtilisateur varchar(255),
	recoitEmail boolean,
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


INSERT INTO UTILISATEUR values(null, "Administrateur", "Admin", "tAdmin", sha512("lpro2014"), "leclercthomas@yahoo.fr", true);

INSERT INTO LANGUE values(null, "Francais", "france.png");
INSERT INTO LANGUE values(null, "Anglais", "royaume-uni.png");
INSERT INTO LANGUE values(null, "Allemand", "allemagne.png");
INSERT INTO LANGUE values(null, "Espagnol", "espagne.png");
INSERT INTO LANGUE values(null, "Italien", "italie.png");
INSERT INTO LANGUE values(null, "Portugais", "portugais.png");
INSERT INTO LANGUE values(null, "Chinois", "chine.png");


