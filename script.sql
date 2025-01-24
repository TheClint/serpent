CREATE TABLE serpent
(
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom varchar(255),
    poids float,
    dureeDeVie int,
    dateHeureNaissance DATETIME,
    race varchar(255),
    genre varchar(255)
)