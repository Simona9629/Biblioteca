CREATE DATABASE biblioteca;
USE biblioteca;

CREATE TABLE carte(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    titlu VARCHAR(100) NOT NULL,
    autor VARCHAR(100) NOT NULL,
    editura VARCHAR(100) NOT NULL,
    isbn CHAR(5) NOT NULL,
    gen ENUM('Clasici', 'SF', 'Thriller','Poezie','Istorie'),
    imagine TEXT
);
SELECT * FROM carte;

DROP DATABASE biblioteca;

TRUNCATE carte;