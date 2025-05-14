CREATE TABLE Compagnie_aerienne (
    idCompagnie BIGINT AUTO_INCREMENT PRIMARY KEY,
    nomComp VARCHAR(50),
    NationaliteComp VARCHAR(50)
);

CREATE TABLE Passagers (
    idPassager BIGINT AUTO_INCREMENT PRIMARY KEY,
    nomPassager VARCHAR(50),
    pnomPassager VARCHAR(50)
);

CREATE TABLE Avion (
    idAvion BIGINT AUTO_INCREMENT PRIMARY KEY,
    Modele VARCHAR(50),
    CapacitePassagers VARCHAR(50),
    NumeroSerie VARCHAR(50),
    Immatriculation VARCHAR(50),
    Statut VARCHAR(50),
    Historique VARCHAR(50)
);

CREATE TABLE Personnel (
    idPersonnel BIGINT AUTO_INCREMENT PRIMARY KEY,
    nomPers VARCHAR(50),
    pnomPers VARCHAR(50),
    DateNaissPersonnel DATE
);

CREATE TABLE Etat (
    idEtat BIGINT AUTO_INCREMENT PRIMARY KEY,
    retard VARCHAR(50),
    RaisonRetard VARCHAR(50)
);

CREATE TABLE Porte (
    idPorte BIGINT AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE Ressources (
    idRessources BIGINT AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE Types (
    idTypes BIGINT AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE Vol (
    idVol BIGINT AUTO_INCREMENT PRIMARY KEY,
    LieuDepart VARCHAR(50),
    LieuArrive VARCHAR(50),
    HeureDepart DATETIME,
    HeureArrive DATETIME,
    idPorte BIGINT,
    idCompagnie BIGINT,
    idAvion BIGINT,
    idEtat BIGINT,
    FOREIGN KEY (idPorte) REFERENCES Porte(idPorte),
    FOREIGN KEY (idCompagnie) REFERENCES Compagnie_aerienne(idCompagnie),
    FOREIGN KEY (idAvion) REFERENCES Avion(idAvion),
    FOREIGN KEY (idEtat) REFERENCES Etat(idEtat)
);

CREATE TABLE Pistes (
    idPiste BIGINT AUTO_INCREMENT PRIMARY KEY,
    idVol BIGINT,
    FOREIGN KEY (idVol) REFERENCES Vol(idVol)
);

CREATE TABLE Taches (
    idTaches BIGINT AUTO_INCREMENT PRIMARY KEY,
    idTypes BIGINT,
    FOREIGN KEY (idTypes) REFERENCES Types(idTypes)
);

CREATE TABLE Billet (
    idBillet BIGINT AUTO_INCREMENT PRIMARY KEY,
    validite VARCHAR(50),
    Siege VARCHAR(50),
    idVol BIGINT,
    idPassager BIGINT,
    FOREIGN KEY (idVol) REFERENCES Vol(idVol),
    FOREIGN KEY (idPassager) REFERENCES Passagers(idPassager)
);

CREATE TABLE Bagages (
    idBagages BIGINT AUTO_INCREMENT PRIMARY KEY,
    taille TINYINT,
    poids INT,
    idBillet BIGINT,
    FOREIGN KEY (idBillet) REFERENCES Billet(idBillet)
);

CREATE TABLE Effectuer (
    idVol BIGINT AUTO_INCREMENT,
    idPersonnel BIGINT,
    idTaches BIGINT,
    PRIMARY KEY (idVol, idPersonnel, idTaches),
    FOREIGN KEY (idVol) REFERENCES Vol(idVol),
    FOREIGN KEY (idPersonnel) REFERENCES Personnel(idPersonnel),
    FOREIGN KEY (idTaches) REFERENCES Taches(idTaches)
);

CREATE TABLE Associer (
    idTaches BIGINT AUTO_INCREMENT,
    idRessources BIGINT,
    qtd VARCHAR(50),
    PRIMARY KEY (idTaches, idRessources),
    FOREIGN KEY (idTaches) REFERENCES Taches(idTaches),
    FOREIGN KEY (idRessources) REFERENCES Ressources(idRessources)
);

CREATE TABLE Utilisateurs (
    idUsers BIGINT AUTO_INCREMENT,
    username VARCHAR(100),
    pwd VARCHAR(300),
    PRIMARY KEY (idUsers)
);


INSERT INTO Compagnie_aerienne (nomComp, NationaliteComp) VALUES
('Air France', 'Française'),
('Lufthansa', 'Allemande'),
('Emirates', 'Émiratie'),
('American Airlines', 'Américaine'),
('Qatar Airways', 'Qatarie');

INSERT INTO Porte () VALUES (), (), (), (), ();

INSERT INTO Etat (retard, RaisonRetard) VALUES
('Non', 'Aucun'),
('Oui', 'Conditions météo'),
('Oui', 'Problème technique'),
('Oui', 'Retard passagers'),
('Non', 'Aucun');

INSERT INTO Avion (Modele, CapacitePassagers, NumeroSerie, Immatriculation, Statut, Historique) VALUES
('Airbus A320', '180', 'AF12345', 'F-GKXA', 'Opérationnel', 'RAS'),
('Boeing 777', '396', 'LH77701', 'D-ABXY', 'En maintenance', 'Dernier vol : 2025-04-15'),
('Airbus A350', '325', 'QR35009', 'A7-ALY', 'Opérationnel', 'RAS'),
('Boeing 737', '189', 'AA73745', 'N123AA', 'Retiré', 'Collision avec oiseau'),
('A380', '853', 'EM38022', 'A6-EDJ', 'Opérationnel', 'Mise à jour logicielle récente');

INSERT INTO Vol (
    LieuDepart, LieuArrive, HeureDepart, HeureArrive, 
    idPorte, idCompagnie, idAvion, idEtat
) VALUES
('Paris CDG', 'New York JFK', '2025-06-01 10:00:00', '2025-06-01 13:00:00', 1, 1, 1, 1),
('Francfort FRA', 'Tokyo HND', '2025-06-02 09:30:00', '2025-06-02 23:45:00', 2, 2, 2, 2),
('Doha DOH', 'Londres LHR', '2025-06-03 12:00:00', '2025-06-03 16:30:00', 3, 3, 3, 1),
('Dallas DFW', 'Los Angeles LAX', '2025-06-04 07:15:00', '2025-06-04 09:00:00', 4, 4, 4, 3),
('Dubai DXB', 'Sydney SYD', '2025-06-05 20:00:00', '2025-06-06 06:00:00', 5, 5, 5, 1),
('Madrid MAD', 'Rome FCO', '2025-06-06 13:20:00', '2025-06-06 15:30:00', 2, 1, 2, 4),
('Tokyo HND', 'Seoul ICN', '2025-06-07 08:10:00', '2025-06-07 11:10:00', 3, 2, 3, 5),
('Londres LHR', 'Paris CDG', '2025-06-08 09:50:00', '2025-06-08 11:10:00', 1, 4, 1, 1);
