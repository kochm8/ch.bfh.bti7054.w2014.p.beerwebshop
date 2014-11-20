CREATE TABLE IF NOT EXISTS `products` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `product_id` varchar(60) NOT NULL,
	  `product_name` varchar(60) NOT NULL,
	  `product_desc` tinytext NOT NULL,
	  `product_img_name` varchar(60) NOT NULL,
	  `price` decimal(10,2) NOT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `product_id` (`product_id`)
) AUTO_INCREMENT=1 ;
	
	
INSERT INTO `products` (`id`, `product_id`, `product_name`, `product_desc`, `product_img_name`, `price`) VALUES
(1, 'B1', 'Beer1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged', 'B1.jpg', 2.50),
(2, 'B2', 'Beer2', 'ege in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum', 'B2.jpg', 8.85),
(3, 'B3', 'Beer3', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form', 'B3.jpg', 1.00),
(4, 'B4', 'Beer4', 'that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many d', 'B4.jpg', 4.30);
	
	
CREATE TABLE users(
	id int(10) NOT NULL AUTO_INCREMENT,
	username varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	firstname varchar(255),
	lastname varchar(255),
	salt varchar(32) NOT NULL,
	PRIMARY KEY (id)
);

insert into users (username, password, firstname, lastname) values('test1', 'test1', 'fgh', 'fgh');
insert into users (username, password, firstname, lastname) values('test2', 'test2', 'asd', 'asd');
