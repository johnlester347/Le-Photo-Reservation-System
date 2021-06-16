

#@creating database if not exist//
#gawa ka ng database sa loob ng my sql nag eerror saken dito pag ginagawa ko yung create DB
#@ bali gawa ka ng DB name na 'finaltest' tas import mo nalang to sa loob ng db

#@creating tables
#@dropig table if exist
DROP TABLE IF EXISTS `records`;
CREATE TABLE records(id int NOT NULL AUTO_INCREMENT,name varchar(255)NOT NULL,event varchar(50) NOT NULL,venue varchar(50) NOT NULL,address varchar(255)NOT NULL,school varchar(50)NOT NULL,email varchar(255) NOT NULL,contact int(50)NOT NULL,message varchar(255)NOT NULL,date date,timeslot varchar(100)NOT NULL,PRIMARY KEY(id));

DROP TABLE IF EXISTS `request`;
CREATE TABLE request(id int NOT NULL AUTO_INCREMENT,name varchar(255)NOT NULL,event varchar(50) NOT NULL,venue varchar(50) NOT NULL,address varchar(255)NOT NULL,school varchar(50)NOT NULL,email varchar(255) NOT NULL,contact int(50)NOT NULL,message varchar(255)NOT NULL,date date,timeslot varchar(100)NOT NULL,PRIMARY KEY(id));

DROP TABLE IF EXISTS `registerd`;
CREATE TABLE registerd(id int NOT NULL AUTO_INCREMENT,name varchar(255)NOT NULL,event varchar(50) NOT NULL,venue varchar(50) NOT NULL,address varchar(255)NOT NULL,school varchar(50)NOT NULL,email varchar(255) NOT NULL,contact int(50)NOT NULL,message varchar(255)NOT NULL,date date,timeslot varchar(100)NOT NULL,PRIMARY KEY(id));

DROP TABLE IF EXISTS `useraccount`;
CREATE TABLE useraccount(id int NOT NULL AUTO_INCREMENT,username varchar(255)NOT NULL,email varchar(255)NOT NULL
,password varchar(100) NOT NULL,PRIMARY KEY(id));

DROP TABLE IF EXISTS `admindb`;
CREATE TABLE admindb(id int NOT NULL AUTO_INCREMENT,username varchar(255) NOT NULL,password varchar(100)NOT NULL,PRIMARY KEY(id));

DROP TABLE IF EXISTS `password_reset_temp`;
CREATE TABLE password_reset_temp(id int NOT NULL AUTO_INCREMENT,email varchar(255) NOT NULL,keyy varchar(100)NOT NULL,date date,timeslot varchar(100)NOT NULL,PRIMARY KEY(id));

DROP TABLE IF EXISTS `payment`;
CREATE TABLE payment (id int NOT NULL AUTO_INCREMENT,price varchar(255)NOT NULL,name varchar(50) NOT NULL,amount varchar(255)NOT NULL,namount varchar(255)NOT NULL,PRIMARY KEY (id));


DROP TABLE IF EXISTS `price`;
CREATE TABLE price (id int NOT NULL AUTO_INCREMENT,price varchar(50) NOT NULL,event varchar(255)NOT NULL,PRIMARY KEY (id));