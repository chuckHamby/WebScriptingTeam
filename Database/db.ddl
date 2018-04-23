CREATE DATABASE myKart;
USE myKart;

CREATE TABLE admin(adminID varchar(20) not null PRIMARY KEY ,
password varchar(25) not null ,
name varchar(50) not null ,
activeIndicator bool not null ,
createdDate VARCHAR(20) not null ,
lastUpdated VARCHAR(20),
email varchar(50)) ENGINE = INNODB;

CREATE TABLE products(ProductID varchar(25) not null PRIMARY KEY ,
adminID varchar(20) not null,
name varchar(20) not null ,
prodDesc varchar(100) not null ,
unitPrice decimal(13, 2) not null ,
bulkPice decimal(13,2) ,
bulkMinAmt INT,
qoh INT,
dateAdded VARCHAR(20) not null ,
dateUpdated VARCHAR(20) )ENGINE=INNODB;

ALTER TABLE products ADD FOREIGN KEY (adminID) REFERENCES admin(adminID);

INSERT INTO admin VALUES ('admin','Password123','Administrator',1,'2018-04-13T12:00:01Z',null,null);