
DROP DATABASE IF EXISTS BookExchange;
CREATE DATABASE BookExchange;
GRANT ALL PRIVILEGES ON BookExchange.* to 'assist'@'localhost' identified by 'assist';
USE BookExchange;

DROP TABLE IF EXISTS User;
CREATE TABLE User 
(

ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
User VARCHAR(30) NOT NULL DEFAULT '',
Pass VARCHAR(20) NOT NULL DEFAULT '',
UMWEmail VARCHAR(20) NOT NULL DEFAULT '',
Phone VARCHAR(10),
NBSold INT,
NBBought INT,
NBSell INT

); 


DROP TABLE IF EXISTS Books;
CREATE TABLE Books 
(

User VARCHAR(30) NOT NULL DEFAULT '',
Title VARCHAR(30),
Author VARCHAR(30),
ISBN BIGINT UNSIGNED, 
Class VARCHAR(20),
Price DECIMAL(8,2) UNSIGNED,
Quality VARCHAR(20),
Added TIMESTAMP DEFAULT NOW()

);

INSERT INTO User
VALUES("dzim1", "daniel1", "dzimmerm@mail.umw.edu", "7575464406");
INSERT INTO User
VALUES("bobSaget", "bob", "bob@bobsaget.com", "1234567890");
INSERT INTO User
VALUES("Fonze", "tooCool", "awesomeguy@cool.com", "8675309");

