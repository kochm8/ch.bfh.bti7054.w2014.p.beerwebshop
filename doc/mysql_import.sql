CREATE DATABASE IF NOT EXISTS webshop;

USE webshop;

DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS rel_order_beer;
DROP TABLE IF EXISTS beer;
DROP TABLE IF EXISTS beerheavenOrder;
DROP TABLE IF EXISTS category;
DROP TABLE IF EXISTS user;

CREATE TABLE IF NOT EXISTS user(
	user_ID int(10) NOT NULL AUTO_INCREMENT,
	salutation VARCHAR(5) NOT NULL,
	firstname VARCHAR(50) NOT NULL,
	lastname VARCHAR(50) NOT NULL,
	street_name VARCHAR(50),
	street_number INT(5),
	city_name VARCHAR(50),
	city_number INT(10),
	birthdate DATE,
	email VARCHAR(50) NOT NULL,
	tel VARCHAR(50),
	mobile VARCHAR(50),
	language VARCHAR(50) NOT NULL,
	username VARCHAR(50) NOT NULL,
	password VARCHAR(50) NOT NULL,
	salt VARCHAR(64) NOT NULL,
	PRIMARY KEY (user_ID),
	UNIQUE(username)
);


CREATE TABLE IF NOT EXISTS category(
	category_ID INT(10) NOT NULL AUTO_INCREMENT,
	category_name VARCHAR(50) NOT NULL,
	PRIMARY KEY (category_ID)
);

INSERT INTO category (category_ID, category_name) VALUES
(1, 'Abbey Beer'),
(2, 'Belgian Strong Ale'),
(3, 'India Pale Ale'),
(4, 'Low-Alcohol Beer'),
(5, 'Cider'),
(6, 'UK Beer'),
(7, 'Christmas Beer');


CREATE TABLE IF NOT EXISTS beer (
	  beer_ID INT(10) NOT NULL AUTO_INCREMENT,
	  beer_name VARCHAR(50) NOT NULL,
	  beer_desc VARCHAR(500) NOT NULL,
	  beer_country VARCHAR(50) NOT NULL,
	  beer_size INT(5) NOT NULL,
          beer_alcohol DECIMAL(3,1),
	  beer_price DECIMAL(10,2) NOT NULL,
	  beer_image VARCHAR(50) NOT NULL,
	  is_new TINYINT(1) NOT NULL,
	  FK_categoryID INT(10) NOT NULL,
	  PRIMARY KEY (beer_ID),
          FOREIGN KEY (FK_categoryID) REFERENCES category(category_ID)
);
		
INSERT INTO beer (beer_ID, beer_name, beer_desc, beer_country, beer_size, beer_alcohol, beer_price, beer_image, is_new, FK_categoryID) VALUES
(1, 'Leffe', 'Leffe Blonde is a top fermentation beer with a golden blond color. It is Leffe’s most famous beer and probably even Belgium’s best known abbey beer. It has a full, sweet and fruity taste and a full and spicy aftertaste.', 'Belgium', 50, 4.6, 9.00, 'Leffe.jpg', 0, 2),
(2, 'Duvel', 'Duvel is one of Belgiums most renowned beers. This blond top fermentation beer is the flagship of Brewery Duvel-Moortgat. It was launched in its current form in 1970 and was one of the very first beers to be drunk from a tulip-shape glass. Duvel has a pale golden color and a nice, white head. It has a light and fruity aroma, a subtle dry and hoppy flavor', 'Belgium', 33, 5.2, 6.00, 'Duvel.jpg', 1, 2),
(3, 'Chimay', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form', 'Belgium', 50, 6.6, 2.50, 'Chimay.jpg', 0, 2),
(4, 'Gouden Carolus', 'Gouden Carolus Easter Beer is a dark beer by Brewery Het Anker. It has a ruby red color and a dense white head. The beer has a rich and full flavor, which is supposed to give you back your vitality after a long and cold winter. There are also clear hints of the ‘secret’ spices that the brewer adds to this Easter beer. ', 'Germany', 50, 10.5, 6.80, 'Goudenr_Carolus.jpg', 0, 1),
(5, 'Abbaye de Forest', 'Belgium has a very long tradition when it comes to abbey beers. For centuries, monks have been brewing beer for themselves and for the towns and villages around their abbey. Lately, more and more abbeys have stopped brewing the beers themselves, and they have outsourced the brewing process to a nearby brewery that uses the same authentic recipe the monks have been using for centuries.', 'Belgium', 50, 4.6, 2.50, 'B1.jpg', 0, 1),
(6, 'Abbaye de la Thure', 'elgium has a very long tradition when it comes to abbey beers. For centuries, monks have been brewing beer for themselves and for the towns and villages around their abbey. Lately, more and more abbeys have stopped brewing the beers themselves, and they have outsourced the brewing process to a nearby brewery that uses the same authentic recipe the monks have been using for centuries.', 'Belgium', 33, 5.2, 6.00, 'B2.jpg', 0, 1),
(7, 'Hop Verdomme IPA', 'Hop Verdomme (Hop Dam It) is a copper-colored IPA by Brewery Kerkom. It has an aroma of hops and grapefruit; its flavor is hoppy, but not as much as one would expect from an IPA. It has an alcohol content of 7.0%.', 'India', 50, 6.6, 7.50, 'B3.jpg', 0, 3),
(8, 'Jupiler Blue', 'Jupiler Blue is a lighter version of the popular pils beer Jupiler. This beer is mainly sold during summer at music festivals and football games. It has an alcohol content of 3.3%. ', 'Germany', 50, 3.3, 2.50, 'blue_jupiter.jpg', 1, 4),
(9, 'Strongbow', 'Strongbow is a dry cider produced by H. P. Bulmer in England since 1962. It is the worlds leading cider with a 15 per cent volume share of the global cider market, and a 29 per cent volume share of the UK cider market.[2][3] Bulmers is a subsidiary of Heineken International, the multinational Dutch brewer', 'UK', 50, 4.6, 6.30, 'Strongbow.jpg', 0, 6),
(16, 'Kopparberg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', 'UK', 50, 4.6, 6.30, 'Kopparberg.jpg', 0, 6),
(10, 'Stoute Bie', 'Stoute Bie is a dark brown beer by Brewery De Bie. It has a creamy head and a rather sweet flavor with hints of cider and honey. This beer is a mixture between a stout and a Belgian dark ale. It has an alcohol content of 5.5%', 'Belgium', 33, 5.5, 2.90, 'Stoute_Bie.jpg', 0, 5),
(11, 'Somersby Cider', 'Somersby is an international cider brand, launching in Scandinavia five years ago. The ingredients for the cider to be sold in Australia will be imported from Europe then bottled at Independent Distillers australias plant in Laverton, Victoria', 'Germany', 50, 6.6, 8.00, 'Somersby_Cider.jpg', 0, 5),
(12, 'Irish Cider', 'that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many d', 'Germany', 50, 8.0, 2.50, 'B4.jpg', 0, 5),
(13, 'Affligem Patersvat', 'Affligem Patersvat is a blond abbey beer of exceptionnal quality. This beer is brewed once a year and is one of the very rare blond Christmas beers. The name Patersvat means  and it is brewed once a year at the end of summer, using fresh Affligem hop. It has an alcohol content of 6.8%', 'Belgium', 50, 6.8, 1.80, 'Affligem_Patersvat.jpg', 0, 7),
(14, 'Delirium Christmas', 'Delirium Christmas is a strong dark beer with a thin white head. It has a complex aroma of caramel and spices. Its taste is rather strong with hints of herbs and the aftertaste is one of alcohol and spices.', 'Switzerland', 33, 5.2, 2.50, 'delirium.jpg', 1, 7),
(15, 'Sante Bee', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form', 'Germany', 50, 6.6, 3.50, 'Sante_Bee.jpg', 0, 7),
(17, 'Grimbergen Winter', 'that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many d', 'Germany', 50, 8.0, 2.50, 'B4.jpg', 0, 7);


CREATE TABLE IF NOT EXISTS beerheavenOrder (
	  order_ID INT(10) NOT NULL AUTO_INCREMENT,
	  FK_userID INT(10) NOT NULL,
	  date DATE NOT NULL,
	  price_total DECIMAL(10,2) NOT NULL,
	  is_giftbox TINYINT(1) NOT NULL,
	  status VARCHAR(50) NOT NULL,
	  PRIMARY KEY (order_ID),
          FOREIGN KEY (FK_userID) REFERENCES user(user_ID)
);

CREATE TABLE IF NOT EXISTS rel_order_beer (
	  rel_order_beer_ID INT(10) NOT NULL AUTO_INCREMENT,
	  FK_orderID  INT(10) NOT NULL,
	  FK_beerID INT(10) NOT NULL,
	  quantity INT(10) NOT NULL,
	  PRIMARY KEY (rel_order_beer_ID),
          FOREIGN KEY (FK_orderID) REFERENCES beerheavenOrder(order_ID),
          FOREIGN KEY (FK_beerID) REFERENCES beer(beer_ID)
);