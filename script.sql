drop table if exists UTILISATEUR;


CREATE TABLE UTILISATEUR(
	idUtilisateur int not null auto_increment,
	nomUtilisateur varchar(20),
	prenomUtilisateur varchar(20),
	loginUtilisateur char(30),
	password varchar(40),
	PRIMARY KEY(idUtilisateur)
)engine=InnoDB;

CREATE TABLE RENSEIGNEMENTS(
	idRenseignements int not null auto_increment,
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
	PRIMARY KEY(idRenseignements),
	CONSTRAINT fk_utilisateur FOREIGN KEY(idUtilisateur) REFERENCES UTILISATEUR(idUtilisateur)	
)engine=InnoDB;
