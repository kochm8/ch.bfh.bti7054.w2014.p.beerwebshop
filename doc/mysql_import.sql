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
(1, 'B1', 'Beer1', 'Basdas das dasdassfg trh zuk zikz ukz u', 'B1.jpg', 2.50),
(2, 'B2', 'Beer2', 'sdkfmimsdi v misf midf mdfi mdif midf idn dni', 'B2.jpg', 8.85),
(3, 'B3', 'Beer3', 'sdofcmsd sdpfnd ffg o os v v dfbd', 'B3.jpg', 1.00),
(4, 'B4', 'Beer4', 'zu izu izu izuizuizui trh rhtht', 'B4.jpg', 4.30);
