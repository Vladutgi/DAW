

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";







create Database `compozitori`;
use `compozitori`;
CREATE TABLE `compozitori` (
  `ID` varchar(255) NOT NULL,
  `produs` varchar(255) DEFAULT NULL,
  `pret` varchar(255) DEFAULT NULL,
  `categoria` varchar(255) DEFAULT NULL,
  `POZA` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `compozitori` (`ID`, `produs`, `pret`, `categoria`,`POZA`) VALUES
('01', 'Laptop Gaming Lenovo Legion 5', '5.499,99 Lei', 'Laptop','lenovo.png'),
('02', 'Laptop Acer Aspire 5', '3.949,99 Lei', 'Laptop','acer.png'),
('03', 'Telefon mobil Apple iPhone 14', '5.399,99 Lei', 'Telefon mobil','iphone14.png'),
('04', 'Telefon mobil Samsung Galaxy S23', '4.199,99 Lei', 'Telefon mobil','s23.png'),
('05', 'Apple Watch SE 2', '1.599,99 Lei', 'Smartwatch','SE.png'),
('06', 'Ceas smartwatch ARMANI Connected', '35.700,00 Lei', 'Smartwatch','armani.png'),
('07', 'Casti Apple Airpods Pro (2nd Generation)', '1.349,99 Lei', 'Casti wireless','airpods.png'),
('08', 'Casti wireless Huawei FreeBuds 3', '1.038,01 Lei', 'Casti wireless','freebuds.png'),
('09', 'Bratara fitness Fitbit Charge 4', '1.099,99 Lei', 'Bratari fitness','fitbit.png'),
('10', 'Bratara fitness Garmin vivosmart 5', '770,99 Lei', 'Bratari fitness','vivosmart.png'),
('11', 'Tableta Samsung Galaxy Tab S8 Ultra', '5.499,99 Lei', 'Tablete','s8.png'),
('12', 'Tableta Lenovo Tab P11 Plus', '1.359,99 Lei', 'Tablete','p11.png'),
('13', 'Consola Nintendo Switch OLED', '1.799,99 Lei', 'Console','nswitch.png'),
('14', 'Controller Sony DualShock 4 ', '279,90 Lei', 'Accesorii','joystick.png');


ALTER TABLE `compozitori`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_2` (`ID`),
  ADD KEY `ID` (`ID`);

