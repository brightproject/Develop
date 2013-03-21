CREATE TABLE `product` (
  `product_id` mediumint(9) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`product_id`)
);

-- 
-- Dumping data for table `product`
-- 

INSERT INTO `product` (`product_id`, `name`) VALUES 
(1, 'product 1'),
(2, 'product 2');