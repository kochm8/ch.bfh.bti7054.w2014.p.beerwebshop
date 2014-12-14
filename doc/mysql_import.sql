CREATE DATABASE IF NOT EXISTS webshop;

USE webshop;

DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS beer;
DROP TABLE IF EXISTS category;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS user;



CREATE TABLE IF NOT EXISTS user(
	user_ID int(10) NOT NULL AUTO_INCREMENT,
	username VARCHAR(50) NOT NULL,
	firstname VARCHAR(50),
	lastname VARCHAR(50),
	password VARCHAR(50) NOT NULL,
	salt VARCHAR(64) NOT NULL,
	street_name VARCHAR(50),
	street_number INT(5),
	city_name VARCHAR(50),
	city_number INT(10),
	PRIMARY KEY (user_ID)
);


CREATE TABLE IF NOT EXISTS category(
	category_ID INT(10) NOT NULL AUTO_INCREMENT,
	category_name VARCHAR(50) NOT NULL,
	PRIMARY KEY (category_ID)
);

INSERT INTO category (category_ID, category_name) VALUES
(1, 'Belgian Strong Beer');


CREATE TABLE IF NOT EXISTS beer (
	  beer_ID INT(10) NOT NULL AUTO_INCREMENT,
	  beer_name VARCHAR(50) NOT NULL,
	  beer_desc VARCHAR(500) NOT NULL,
	  beer_country VARCHAR(50) NOT NULL,
	  beer_size INT(5) NOT NULL,
          beer_alcohol DECIMAL(3,1),
	  beer_price DECIMAL(10,2) NOT NULL,
	  beer_image VARCHAR(50) NOT NULL,
	  FK_categoryID INT(10) NOT NULL,
	  PRIMARY KEY (beer_ID),
          FOREIGN KEY (FK_categoryID) REFERENCES category(category_ID)
);
		
INSERT INTO beer (beer_ID, beer_name, beer_desc, beer_country, beer_size, beer_alcohol, beer_price, beer_image, FK_categoryID) VALUES
(1, 'Beer1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', 'Switzerland', 50, 4.6, 2.50, 'B1.jpg', 1),
(2, 'Beer2', 'ege in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum', 'Belgium', 33, 5.2, 2.50, 'B2.jpg', 1),
(3, 'Beer3', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form', 'Germany', 50, 6.6, 2.50, 'B3.jpg', 1),
(4, 'Beer4', 'that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many d', 'Germany', 50, 8.0, 2.50, 'B4.jpg', 1);