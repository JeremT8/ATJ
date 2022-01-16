-- Activation de la BD
USE atj_database;
-- Création de la table
CREATE TABLE IF NOT EXISTS persons (
  id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  last_name VARCHAR(30) NOT NULL,
  first_name VARCHAR(30) NOT NULL
);
-- Insertion de données
INSERT INTO
  persons (first_name, last_name)
VALUES
  ('Ada', 'Lovelace'),
  ('Sinead', 'O''Connor'),
  ('Algernon', 'Lovelace');
-- suppression des données
DELETE FROM
  persons
WHERE
  id = 2;
-- modification des données
UPDATE
  persons
SET
  first_name = 'Siobhan'
WHERE
  id = 3;
-- affichage des données
SELECT
  *
FROM
  persons
WHERE
  last_name = 'Lovelace';
--
  CREATE TABLE IF NOT EXISTS addresses (
    id SMALLINT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    rue VARCHAR(38) NOT NULL,
    code_postal CHAR(5) NOT NULL,
    ville VARCHAR(33) Not NULL
  );
CREATE TABLE IF NOT EXISTS orders (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    date_commande DATE NOT NULL,
    montant DECIMAL(6, 2) NOT NULL
  );
-- Permet de filtrer dans la table persons pour la ligne first_name commencant par un a.
SELECT
  *
FROM
  persons
WHERE
  first_name LIKE 'A%';
-- Permet de filtrer dans la table persons pour la ligne first_name qui correspond au info dans le tableau apres le IN.
SELECT
  *
FROM
  persons
WHERE
  first_name IN ('Martin', 'Tillet');
-- Donne le resultat de toutes les persons dont le prenom est different de 'Martin'
SELECT
  *
FROM
  persons
WHERE
  first_name != 'Martin';
DROP TABLE IF EXISTS `livres_simples`;
CREATE TABLE `livres_simples` (
    `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
    `titre` varchar(80) NOT NULL,
    `prix` decimal(5, 2) NOT NULL,
    `auteur` varchar(50) NOT NULL,
    `editeur` varchar(50) NOT NULL,
    `genre` varchar(50) NOT NULL,
    `date_publication` date DEFAULT NULL,
    `nationalite_auteur` varchar(50) DEFAULT NULL,
    `langue` varchar(50) DEFAULT NULL,
    `auteur_prenom` varchar(50) DEFAULT NULL,
    `auteur_nom` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`id`)
  );
-- Recuperer tous les livres de la catégorie Informatique ecris en Francais
SELECT
  *
FROM
  livres_simples
WHERE
  genre = 'Informatique'
  AND langue = 'français';
-- Recuperer tous les livres ecrits en italien et en castillan
SELECT
  *
FROM
  livres_simples
WHERE
  langue = 'italien'
  OR langue = 'castillan';
-- OU
SELECT
  *
FROM
  livres_simples
WHERE
  langue IN ('italien', 'castillan');
-- Recuperer les livres qui NE sont PAS ecrits en Anglais et dont le prix est inferieur à 12
SELECT
  *
FROM
  livres_simples
WHERE
  langue != 'anglais'
  AND prix < 12
ORDER BY
  prix DESC;
-- Les livres edité par Hachette
SELECT
  *
FROM
  livres_simples
WHERE
  editeur = 'Hachette';
-- Les livres ecrits par Joe Celko
SELECT
  *
FROM
  livres_simples
WHERE
  auteur_nom = 'Celko'
  AND auteur_prenom = 'Joe';


CREATE TABLE `adherent` (
    `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
    `nom` varchar(80) NOT NULL,
    `prenom` varchar(80) NOT NULL,
    `date_naissance` date DEFAULT NULL,
    `email` varchar(50) NOT NULL,
    `numero_rue` tinyint NOT NULL,
    `rue` varchar(38) NOT NULL,
    `code_postal` varchar(5) NOT NULL,
    `ville` varchar(33) Not NULL,
    `date_souscription` date DEFAULT NULL,
    PRIMARY KEY (`id`)
  );


  INSERT INTO `adherent` VALUES ('', 'Ostillet', 'Osjeremy', '1997-06-08', 'jeremytillet8@gùail.com', '3', 'route de chauvigny', '86210', 'Pouillé', '2022-01-15');


  
  CREATE TABLE `jeu` (
    `id` mediumint unsigned NOT NULL AUTO_INCREMENT,
    `titre` varchar(80) NOT NULL,
    `editeur` varchar(80) NOT NULL,
    `type_jeu` varchar(80) NOT NULL,
    `duree` TINYINT NOT NULL,
    `date_ajout` date DEFAULT NULL,
    PRIMARY KEY (`id`)
  );

    INSERT INTO `jeu` VALUES ('', 'Kluster', 'Kluster', 'Ambiance', '15','2022-01-15');
    INSERT INTO `jeu` VALUES ('', 'JustOne', 'JustOne', 'AMbiance', '13','2022-01-15');
    INSERT INTO `jeu` VALUES ('', 'Mission galerapagos', 'Mission galerapagos', 'aventure', '4','2022-01-15');
    INSERT INTO `jeu` VALUES ('', 'Mito', 'Mito', 'Adulte', '99','2022-01-15');
    INSERT INTO `jeu` VALUES ('', 'R6 ', 'R6 ', 'Enfant', '12','2020-03-13');
