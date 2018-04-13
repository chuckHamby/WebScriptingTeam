CREATE DATABASE myKart;
USE myKart;
CREATE TABLE admin(adminID varchar(20) not null PRIMARY KEY ,
password varchar(25) not null ,
name varchar(50) not null ,
activeIndicator bool not null ,
createdDate DATETIME not null ,
lastUpdated DATETIME,
email varchar(50)) ENGINE = INNODB;
CREATE TABLE products(ProductID varchar(25) not null PRIMARY KEY ,
adminID varchar(20) not null,
name varchar(20) not null ,
prodDesc varchar(100) not null ,
unitPrice decimal(13, 2) not null ,
bulkPice decimal(13,2) ,
bulkMinAmt INT,
qoh INT,
dateAdded DATETIME not null ,
dateUpdated DATETIME not null )ENGINE=INNODB;
ALTER TABLE products ADD FOREIGN KEY (adminID) REFERENCES admin(adminID);