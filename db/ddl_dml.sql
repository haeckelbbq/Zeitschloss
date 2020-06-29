-- DDL (data definition language bezieht sich auf die Struktur der Datenbank)
DROP DATABASE IF EXISTS zeitschloss;

CREATE DATABASE zeitschloss;
USE zeitschloss;

CREATE TABLE t_user (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(45) NOT NULL, passwort VARCHAR(45) NOT NULL,
                     statistikTode INT, statistikKills INT, statistikSpielA INT, statistikSpielB INT,
                     erfolg1 BOOLEAN, erfolg2 BOOLEAN) ENGINE = InnoDB;
CREATE TABLE t_save (id INT PRIMARY KEY AUTO_INCREMENT, user_id INT, name VARCHAR(45), zeitstempel DATETIME, daten TEXT);

-- Constraints
ALTER TABLE t_save ADD FOREIGN KEY fk_save_user (user_id) REFERENCES t_user(id) ON DELETE CASCADE;

-- DML (data manipulation language bezieht sich auf die Datensätze)
INSERT INTO t_user (id, name, passwort, statistikTode, statistikKills, statistikSpielA, statistikSpielB, erfolg1, erfolg2)
VALUES(NULL, 'a', 'a', 0, 0, 0 ,0, FALSE, FALSE);
INSERT INTO t_save (id, user_id, name, zeitstempel, daten)
VALUES(NULL, 1, 'Speicherstand 1', '2020-06-25 12:30:00','Testdaten 1');
INSERT INTO t_save (id, user_id, name, zeitstempel, daten)
VALUES(NULL, 1, 'Speicherstand 2', '2020-06-25 12:30:00','Testdaten 2');
INSERT INTO t_save (id, user_id, name, zeitstempel, daten)
VALUES(NULL, 1, 'Speicherstand 3', '2020-06-25 12:30:00','Testdaten 3');

-- für 1. Anzeige Spielbrett
CREATE TABLE t_spielbrett(id INT PRIMARY KEY AUTO_INCREMENT, etage INT, zeitebene VARCHAR(45));
INSERT INTO t_spielbrett (id, etage, zeitebene) VALUES (NULL, 0, 'Gegenwart');

CREATE TABLE t_spielfeld(id INT PRIMARY KEY AUTO_INCREMENT, spielbrett_id INT, kartennebel BOOLEAN, x int, y int);
INSERT INTO t_spielfeld(id, spielbrett_id, kartennebel, x, y) VALUES(NULL, 1, TRUE, 0, 0);
INSERT INTO t_spielfeld(id, spielbrett_id, kartennebel, x, y) VALUES(NULL, 1, TRUE, 1, 0);
INSERT INTO t_spielfeld(id, spielbrett_id, kartennebel, x, y) VALUES(NULL, 1, TRUE, 2, 0);
INSERT INTO t_spielfeld(id, spielbrett_id, kartennebel, x, y) VALUES(NULL, 1, TRUE, 0, 1);
INSERT INTO t_spielfeld(id, spielbrett_id, kartennebel, x, y) VALUES(NULL, 1, TRUE, 1, 1);
INSERT INTO t_spielfeld(id, spielbrett_id, kartennebel, x, y) VALUES(NULL, 1, TRUE, 2, 1);
INSERT INTO t_spielfeld(id, spielbrett_id, kartennebel, x, y) VALUES(NULL, 1, TRUE, 0, 2);
INSERT INTO t_spielfeld(id, spielbrett_id, kartennebel, x, y) VALUES(NULL, 1, TRUE, 1, 2);
INSERT INTO t_spielfeld(id, spielbrett_id, kartennebel, x, y) VALUES(NULL, 1, TRUE, 2, 2);

CREATE TABLE t_gegenstand(id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(45), spielfeld_id INT NULL);
INSERT INTO t_gegenstand(id, name, spielfeld_id) VALUES (NULL, 'rostiger Schlüssel', 6);
INSERT INTO t_gegenstand(id, name, spielfeld_id) VALUES (NULL, 'kleines Lederetui', 5);
INSERT INTO t_gegenstand(id, name, spielfeld_id) VALUES (NULL, 'goldener Knopf', 5);

-- Erweiterung Anzeige NSCs
CREATE TABLE t_nsc(id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(45), spielfeld_id INT NULL,
                   leben INT, ausdauer INT, schaden INT, schutz INT, typ INT);

INSERT INTO t_nsc(id, name, spielfeld_id, leben, ausdauer, schaden, schutz, typ)
VALUES (NULL, 'verfaulter Zombie', 3, 20, 1000, 3, 2, 0);
INSERT INTO t_nsc(id, name, spielfeld_id, leben, ausdauer, schaden, schutz, typ)
VALUES (NULL, 'wandelnde Ritterrüstung', 5, 30, 15, 2, 4, 1);
INSERT INTO t_nsc(id, name, spielfeld_id, leben, ausdauer, schaden, schutz, typ)
VALUES (NULL, 'rote Fledermaus', 1, 10, 10, 1, 0, 2);
INSERT INTO t_nsc(id, name, spielfeld_id, leben, ausdauer, schaden, schutz, typ)
VALUES (NULL, 'fette Wolfsspinne', 6, 14, 24, 5, 0, 2);

-- Erweiterung Anzeige Character
CREATE TABLE t_character(id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(45), spielfeld_id INT NULL,
                         leben INT, ausdauer INT, schaden INT, schutz INT, geschlecht VARCHAR(8), klasse VARCHAR(45),
                         attrSt INT, attrGe INT, attrIn INT, attrWa INT, attrCh INT, attrGl INT,
                         fertigkeit1 INT, fertigkeit2 INT, talent1 VARCHAR(45), talent2 VARCHAR(45),
                         ep INT, aktuelleWaffe VARCHAR(45), aktuelleRuest VARCHAR(45));

INSERT INTO t_character(id, name, spielfeld_id,
                        leben, ausdauer, schaden, schutz, geschlecht, klasse,
                        attrSt, attrGe, attrIn, attrWa, attrCh, attrGl,
                        fertigkeit1, fertigkeit2, talent1, talent2,
                        ep, aktuelleWaffe, aktuelleRuest)
VALUES (NULL, 'Thomas Morton', 7,
        18, 10, 2, 1, 'männlich', 'Internatsschüler',
        8, 14, 13, 13, 14, 9,
        4, 2, 'Latein', 'Feine Nase',
        0, 'Brotmesser', 'Schuluniform');

-- CREATE TABLE t_item(id INT PRIMARY KEY AUTO_INCREMENT, gegenstand_id INT);
-- INSERT INTO t_item(id, gegenstand_id) VALUES (NULL, 1);