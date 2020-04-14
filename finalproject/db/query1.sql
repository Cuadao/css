create schema Camilo200399644;

USE Camilo200399644;
CREATE TABLE `Camilo200399644`.`customers` (
  `id_cust` INT NOT NULL AUTO_INCREMENT,
  `cust_name` VARCHAR(45) NOT NULL,
  `cust_lastname` VARCHAR(45) NOT NULL,
  `cust_address` VARCHAR(45) NOT NULL,
  `cust_cellphone` VARCHAR(45) NOT NULL,
  `cust_email` VARCHAR(45) NOT NULL,
  `cust_city` VARCHAR(45) NOT NULL,
  `date_birth` VARCHAR(45) NULL,
  PRIMARY KEY (`id_cust`));
  
INSERT INTO `Camilo200399644`.`customers` 
(`id_cust`, `cust_name`, `cust_lastname`, `cust_address`,
 `cust_cellphone`, `cust_email`, `cust_city`, `date_birth`) 
VALUES ('1', 'Panamericana', 'Libreria y Papeleria', '32 Trainn street',
 '245 36 99', 'panamericana@gmail.com', 'bogota', '12-15-96'),
('2', 'Comercial Papelera', 'Arte y Oficina', '127 Colina Ave',
 '987 54 33', 'comercial@gmail.com', 'bogota', '01-11-90');


USE Camilo200399644;  
CREATE TABLE `Camilo200399644`.`categories` (
  `id_categ` INT NOT NULL AUTO_INCREMENT,
  `categ_name` VARCHAR(45) NOT NULL,
  `categ_desc` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id_categ`));
  
INSERT INTO `Camilo200399644`.`categories` 
(`id_categ`, `categ_name`, `categ_desc`) VALUES 
('1', 'Canva and Frame', 'Canvas and Frames to painting profesional Texture'),
('2', 'Easel', 'Easel in wood of different kind of references to floor and table'),
('3', 'Oil Colors', 'Oil colors in different sizes and different brands'),
('4', 'Brush', 'Brush in diferents sizes and brands');

USE Camilo200399644;
   CREATE TABLE `Camilo200399644`.`products` (
  `id_prod` INT NOT NULL AUTO_INCREMENT,
  `prod_name` VARCHAR(60) NOT NULL,
  `prod_descr` VARCHAR(100) NOT NULL,
  `prod_price1` INT(11) NOT NULL,
  `prod_price2` INT(11) NOT NULL,
  `id_category` INT NULL,
  PRIMARY KEY (`id_prod`),
  INDEX `id_category_idx` (`id_category` ASC),
  CONSTRAINT `id_category`
    FOREIGN KEY (`id_category`)
    REFERENCES `Camilo200399644`.`categories` (`id_categ`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
  
INSERT INTO `Camilo200399644`.`products` 
(`id_prod`, `prod_name`, `prod_descr`, `prod_price1`, `prod_price2`, `id_category`) 
VALUES
('1', 'Canva 20 x 30 cm Normal', 'Canva with frame 3cm thickness', '15', '12', '1'),
 ('2', 'Canva 40 x 50 cm Normal', 'Canva with frame 3cm thickness', '17', '15', '1'),
 ('3', 'Easel Studio 140 cm', 'Easel Studio Professional 140 cm to put on floor', '150', '135', '2'),
 ('4', 'Easel Tripod 60 cm', 'Easel Tripod 60 cm to put on table', '40', '35', '2'),
 ('5', 'Oil color Winton #2', 'Oli color Windson & Newton 125 ml color red camin', '19', '19', '3'),
 ('6', 'Oli color Franco', 'Oil color Franco Arte 135ml color blue', '17', '17', '3'),
 ('7', 'Brush 1 inch', 'Brush 1 inch martha hair', '10', '10', '4'),
 ('8', 'Brush 4 inch', 'Brush 4 inch sintetyc hair', '19', '19', '4');

 CREATE TABLE `Camilo200399644`.`users` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(60) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `name_usr` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_user`));

CREATE TABLE `Camilo200399644`.`order_state` (
  `id_state` INT NOT NULL AUTO_INCREMENT,
  `state_name` VARCHAR(45) NOT NULL,
  `state_descr` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_state`));
  
INSERT INTO `Camilo200399644`.`order_state` (`id_state`, `state_name`, `state_descr`) VALUES 
('1', 'recived', 'when customer creat it'),
('2', 'warehouse', 'when is organicing the products to deliver'),
('3', 'manufacturing', 'when the people is working in the order'),
('4', 'deliver', 'when order is delivering'),
('5', 'done', 'when order was reciving '),
('6', 'cancelled', 'when order the customer cancell the order');

CREATE TABLE `Camilo200399644`.`orders` (
  `id_order` INT NOT NULL AUTO_INCREMENT,
  `order_date` VARCHAR(45) NOT NULL,
  `id_customer` INT NOT NULL,
  `state_order` INT NOT NULL,
  `create_by` INT NOT NULL,
  `quatity` INT NOT NULL,
  `id_product` INT NOT NULL,
  `total` INT NOT NULL,
  `observations` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_order`),
  INDEX `id_customer_idx` (`id_customer`),
  INDEX `state_order_idx` (`state_order`),
  INDEX `product_id_idx` (`id_product`),
  INDEX `create_by_idx` (`create_by`),
  CONSTRAINT `id_customer`
    FOREIGN KEY (`id_customer`)
    REFERENCES `Camilo200399644`.`customers` (`id_cust`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `state_order`
    FOREIGN KEY (`state_order`)
    REFERENCES `Camilo200399644`.`order_state` (`id_state`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_product`
    FOREIGN KEY (`id_product`)
    REFERENCES `Camilo200399644`.`products` (`id_prod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `create_by`
    FOREIGN KEY (`create_by`)
    REFERENCES `Camilo200399644`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
    
INSERT INTO `Camilo200399644`.`orders` (`id_order`, `order_date`, `id_customer`, `state_order`,
 `create_by`, `quatity`, `id_product`, `total`, `observations`) VALUES 
('1', '01-01-2020', '1', '1', '1', '2', '1', '50', 'A'),
('2', '01-01-2020', '2', '1', '1', '3', '2', '100', 'B');