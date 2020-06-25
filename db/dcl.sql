-- db_zeitschloss DCL Data Control Language
GRANT INSERT, SELECT, UPDATE, DELETE ON db_zeitschloss.*
    TO a@localhost IDENTIFIED BY 'a';

-- Usertabelle noch mal einlesen
FLUSH PRIVILEGES;