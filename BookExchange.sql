
DROP DATABASE IF EXISTS BookExchange;
CREATE DATABASE BookExchange;
GRANT ALL PRIVILEGES ON BookExchange.* to 'assist'@'localhost' identified by 'assist';
USE BookExchange;

DROP TABLE IF EXISTS User;
CREATE TABLE User 
(

ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
User VARCHAR(30) NOT NULL DEFAULT '',
Pass VARCHAR(40) NOT NULL DEFAULT '',
UMWEmail VARCHAR(20) NOT NULL DEFAULT '',
Phone VARCHAR(10)

) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;


DROP TABLE IF EXISTS Books;
CREATE TABLE Books 
(

BID Int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
Title VARCHAR(30),
Author VARCHAR(30),
ISBN BIGINT UNSIGNED, 
Added TIMESTAMP DEFAULT NOW()

) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

INSERT INTO `User` (`ID`, `User`, `Pass`, `UMWEmail`,`Phone`) VALUES
(1, 'Eddy', SHA('tomato'), 'Ed@umw.edu','5554443333'),
(2, 'Pat', SHA('cloud'), 'Pat@umw.edu','5556667777'),
(3, 'Daniel', SHA('Daniel'), 'Dan@umw.edu','5552221111'),
(4, 'David', SHA('David'), 'Dave@umw.edu','5559990000');


INSERT INTO `Books` (`BID`, `Title`, `Author`, `ISBN`) VALUES
(1, 'Harry Potter', 'J.K. Rowling', 1948723482398),
(2, '1984', 'George Orwell', 1908238728742),
(3, 'Atlas Shrugged', 'Ayn Rand', 19897823872),
(4, 'Head First SQL', 'Lyn Beighley', 24323434534);

DROP TABLE IF EXISTS Junction;
CREATE TABLE Junction 
(

UID INT NOT NULL,
BID INT NOT NULL,
PRIMARY KEY (UID, BID), 
FOREIGN KEY (UID) REFERENCES User (ID),
FOREIGN KEY (BID) REFERENCES Books (BID),
Class VARCHAR(20),
Price DECIMAL(8,2) UNSIGNED,
Quality VARCHAR(20)
)ENGINE=InnoDB;

INSERT INTO `Junction` (`UID`, `BID`, `Class`, `Price`, `Quality`) VALUES
(1,1, 'English', 20.00, 'Nice'),
(2,2, 'Cat', 30.00, 'Horrible'), 
(3,3, 'Science', 40.00, 'Nice'), 
(4,4, 'Comp Sci', 50.00, 'Good');



