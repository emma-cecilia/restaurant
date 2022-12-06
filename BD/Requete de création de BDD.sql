DROP TABLE IF EXISTS CLIENT;
CREATE TABLE CLIENT(
  idClient SMALLINT AUTO_INCREMENT NOT NULL,
  nomClient VARCHAR(50),
  prenomClient VARCHAR(50),
  dateNaissance DATE,
  adresse VARCHAR(100),
  ville VARCHAR(50),
  codePostal VARCHAR(10),
  telephone VARCHAR(20),
  email VARCHAR(50),
  motDePasse VARCHAR(20),
  PRIMARY KEY(idClient)
) ENGINE = InnoDB;
DROP TABLE IF EXISTS
  TableRestaurant;
CREATE TABLE TableRestaurant(
  idTableRestaurant SMALLINT AUTO_INCREMENT NOT NULL,
  maxCouvert INT(10),
  PRIMARY KEY(idTableRestaurant)
) ENGINE = InnoDB;
DROP TABLE IF EXISTS
  Produit;
CREATE TABLE Produit(
  idProduit SMALLINT AUTO_INCREMENT NOT NULL,
  nomProduit VARCHAR(50),
  descriptionProduit TEXT,
  prixProduit FLOAT(10),
  PRIMARY KEY(idProduit)
) ENGINE = InnoDB;
DROP TABLE IF EXISTS
  Commande;
CREATE TABLE Commande(
  idCommande SMALLINT AUTO_INCREMENT NOT NULL,
  dateCommande DATE,
  client_idclient SMALLINT,
  PRIMARY KEY(idCommande)
) ENGINE = InnoDB;
DROP TABLE IF EXISTS
  Reserver;
CREATE TABLE Reserver(
  idReserver SMALLINT AUTO_INCREMENT NOT NULL,
  idClient SMALLINT NOT NULL,
  idTableRestaurant SMALLINT NOT NULL,
  dateReservation DATE,
  nombreCouvert INT(10),
  PRIMARY KEY(idReserver)
) ENGINE = InnoDB;
DROP TABLE IF EXISTS
  produitCommande;
CREATE TABLE produitCommande(
  idProduitCommande SMALLINT AUTO_INCREMENT NOT NULL,
  idCommande SMALLINT NOT NULL,
  idProduit SMALLINT NOT NULL,
  quantite INT(10),
  PRIMARY KEY(idProduitCommande)
) ENGINE = InnoDB;
ALTER TABLE
  Commande ADD CONSTRAINT FK_Commande_client_idclient FOREIGN KEY(client_idclient) REFERENCES CLIENT(idClient);
ALTER TABLE
  Reserver ADD CONSTRAINT FK_Reserver_idClient FOREIGN KEY(idClient) REFERENCES CLIENT(idClient);
ALTER TABLE
  Reserver ADD CONSTRAINT FK_Reserver_idTableRestaurant FOREIGN KEY(idTableRestaurant) REFERENCES TableRestaurant(idTableRestaurant);
ALTER TABLE
  produitCommande ADD CONSTRAINT FK_produitCommande_idCommande FOREIGN KEY(idCommande) REFERENCES Commande(idCommande);
ALTER TABLE
  produitCommande ADD CONSTRAINT FK_produitCommande_idProduit FOREIGN KEY(idProduit) REFERENCES Produit(idProduit);
  
-- Ajout de l'url de limage 
ALTER TABLE `produit` ADD `imageProduit` VARCHAR(100) NOT NULL AFTER `prixProduit`;