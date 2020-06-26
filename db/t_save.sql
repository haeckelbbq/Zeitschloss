-- DDL (data definition language bezieht sich auf die Struktur der Datenbank)
DROP DATABASE IF EXISTS db_zeitschloss;

CREATE DATABASE db_zeitschloss;
USE db_zeitschloss;

CREATE TABLE t_user (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(45) NOT NULL, passwort VARCHAR(45) NOT NULL,
                                   statistikTode INT, statistikKills INT, statistikSpielA INT, statistikSpielB INT,
                                   erfolg1 BOOL, erfolg2 BOOL) ENGINE = InnoDB;
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
