<?php
	$daShopConn=@mysqli_connect("localhost","root");

	if(!$daShopConn){
		die("Connection error! ".mysqli_error());
	}//if there is error connecting
	else{

		$select_db="use dashop";

		$select_daShopDb=@mysqli_query($daShopConn,$select_db);

		if(!$select_daShopDb){//check if the database already exists before creating it
			$create_daShopDb="create database dashop";
			$create_daShopDb_run=@mysqli_query($daShopConn,$create_daShopDb);
		}
	$sql="

CREATE TABLE IF NOT EXISTS `activitylogs` (
  `Log_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) DEFAULT NULL,
  `PurchaseActivity` varchar(100) DEFAULT NULL,
  `SalesActivity` varchar(100) DEFAULT NULL,
  `OtherActivity` varchar(100) DEFAULT NULL,
  `TimeDate` varchar(50) NOT NULL,
  PRIMARY KEY (`Log_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

INSERT INTO `activitylogs` (`Log_ID`, `User_ID`, `PurchaseActivity`, `SalesActivity`, `OtherActivity`, `TimeDate`) VALUES
(1, NULL, NULL, NULL, 'Attempt to reset account, account doesn''t exist', 'Wednesday, April 22, 2015, 5:09 AM'),
(2, NULL, NULL, NULL, 'New user, just registered', 'Wednesday, April 22, 2015, 5:12 AM'),
(3, NULL, NULL, NULL, 'User account activated', 'Wednesday, April 22, 2015, 5:13 AM'),
(4, 1, NULL, NULL, 'User deleted account', 'Wednesday, April 22, 2015, 5:37 AM'),
(5, 1, NULL, NULL, 'User '' just logged out', 'Wednesday, April 22, 2015, 5:37 AM'),
(6, NULL, NULL, NULL, 'New user, just registered', 'Wednesday, April 22, 2015, 5:40 AM'),
(7, NULL, NULL, NULL, 'User account activated', 'Wednesday, April 22, 2015, 5:41 AM'),
(8, 2, NULL, NULL, 'User deleted account', 'Wednesday, April 22, 2015, 5:41 AM'),
(9, 2, NULL, NULL, 'User '' just logged out', 'Wednesday, April 22, 2015, 5:41 AM'),
(10, NULL, NULL, NULL, 'New user, just registered', 'Wednesday, April 22, 2015, 5:43 AM'),
(11, NULL, NULL, NULL, 'User account activated', 'Wednesday, April 22, 2015, 5:44 AM'),
(12, 3, NULL, NULL, 'Add item Brand new X6', 'Wednesday, April 22, 2015, 5:49 AM'),
(13, 3, NULL, NULL, 'Add item Honda Civic', 'Wednesday, April 22, 2015, 5:51 AM'),
(14, 3, NULL, NULL, 'User just logged out', 'Wednesday, April 22, 2015, 5:51 AM'),
(15, NULL, NULL, NULL, 'New user, just registered', 'Wednesday, April 22, 2015, 5:53 AM'),
(16, NULL, NULL, NULL, 'User account activated', 'Wednesday, April 22, 2015, 5:53 AM'),
(17, 4, NULL, NULL, 'Add item Toyota Runx', 'Wednesday, April 22, 2015, 5:54 AM'),
(18, 4, NULL, NULL, 'Add item Trailer head', 'Wednesday, April 22, 2015, 5:57 AM'),
(19, 4, NULL, NULL, 'User removed item from cart', 'Wednesday, April 22, 2015, 6:05 AM'),
(20, 4, NULL, NULL, 'User removed item from cart', 'Wednesday, April 22, 2015, 6:05 AM'),
(21, 4, NULL, NULL, 'User added item to cart', 'Wednesday, April 22, 2015, 6:05 AM'),
(22, 4, NULL, NULL, 'User emptied shopping cart', 'Wednesday, April 22, 2015, 6:06 AM'),
(23, 4, NULL, NULL, 'User added item to cart', 'Wednesday, April 22, 2015, 6:20 AM'),
(24, 0, NULL, NULL, 'Admin deletes Class', 'Wednesday, April 22, 2015, 6:52 AM'),
(25, 4, NULL, NULL, 'User deletes item Toyota Runx', 'Wednesday, April 22, 2015, 6:53 AM'),
(26, 4, NULL, NULL, 'User deletes item Trailer head', 'Wednesday, April 22, 2015, 6:53 AM'),
(27, 4, NULL, NULL, 'User just logged out', 'Wednesday, April 22, 2015, 6:53 AM'),
(28, NULL, NULL, NULL, 'New user, just registered', 'Wednesday, April 22, 2015, 6:54 AM'),
(29, NULL, NULL, NULL, 'User account activated', 'Wednesday, April 22, 2015, 6:54 AM'),
(30, 5, NULL, NULL, 'Add item Toyota Runx', 'Wednesday, April 22, 2015, 6:55 AM'),
(31, 5, NULL, NULL, 'Add item Trailer head', 'Wednesday, April 22, 2015, 6:56 AM'),
(32, 5, NULL, NULL, 'User just logged out', 'Wednesday, April 22, 2015, 7:37 AM'),
(33, 5, NULL, NULL, 'User just logged out', 'Wednesday, April 22, 2015, 7:40 AM'),
(34, 0, NULL, NULL, 'Admin changed password', 'Wednesday, April 22, 2015, 8:06 AM'),
(35, 0, NULL, NULL, 'Admin changed password', 'Wednesday, April 22, 2015, 8:07 AM'),
(36, 0, NULL, NULL, 'Admin changed password', 'Wednesday, April 22, 2015, 8:07 AM'),
(37, 0, NULL, NULL, 'Admin changed password', 'Wednesday, April 22, 2015, 8:07 AM'),
(38, 0, NULL, NULL, 'Admin changed password', 'Wednesday, April 22, 2015, 8:09 AM'),
(39, 0, NULL, NULL, 'Admin changed password', 'Wednesday, April 22, 2015, 8:10 AM'),
(40, 0, NULL, NULL, 'Admin changed password', 'Wednesday, April 22, 2015, 8:12 AM'),
(41, 0, NULL, NULL, 'Admin changed password', 'Wednesday, April 22, 2015, 8:14 AM'),
(42, 0, NULL, NULL, 'Admin changed password', 'Wednesday, April 22, 2015, 8:14 AM'),
(43, 0, NULL, NULL, 'Admin changed password', 'Wednesday, April 22, 2015, 8:15 AM'),
(44, 0, NULL, NULL, 'Admin changed password', 'Wednesday, April 22, 2015, 8:16 AM'),
(45, 5, NULL, NULL, 'User added item to cart', 'Wednesday, April 22, 2015, 8:20 AM'),
(46, 5, 'User purchased items', NULL, NULL, 'Wednesday, April 22, 2015, 8:57 AM'),
(47, 5, NULL, NULL, 'User added item to cart', 'Wednesday, April 22, 2015, 8:59 AM'),
(48, 5, 'User purchased items', NULL, NULL, 'Wednesday, April 22, 2015, 8:59 AM'),
(49, 5, NULL, NULL, 'User added item to cart', 'Wednesday, April 22, 2015, 9:05 AM'),
(50, 5, 'User purchased items', NULL, NULL, 'Wednesday, April 22, 2015, 9:05 AM'),
(51, 5, NULL, NULL, 'User added item to cart', 'Wednesday, April 22, 2015, 9:24 AM'),
(52, 5, NULL, NULL, 'User emptied shopping cart', 'Wednesday, April 22, 2015, 9:27 AM'),
(53, 5, NULL, NULL, 'User just logged out', 'Wednesday, April 22, 2015, 9:31 AM');

CREATE TABLE IF NOT EXISTS `admin` (
  `AdminEmail` varchar(50) NOT NULL,
  `Password` varchar(35) NOT NULL,
  PRIMARY KEY (`AdminEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`AdminEmail`, `Password`) VALUES
('admin@dashop.com.jm', '738cf25196ca2625206e7249bbc76dc6');

CREATE TABLE IF NOT EXISTS `adminlogs` (
  `Log_ID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminEmail` varchar(30) NOT NULL,
  `LastLoggedIn` varchar(50) NOT NULL,
  `LoggedOut` varchar(50) NOT NULL,
  PRIMARY KEY (`Log_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

INSERT INTO `adminlogs` (`Log_ID`, `AdminEmail`, `LastLoggedIn`, `LoggedOut`) VALUES
(1, 'admin@dashop.com.jm', 'Monday, April 20, 2015, 7:43 PM', 'Monday, April 20, 2015, 7:43 PM'),
(2, 'admin@dashop.com.jm', 'Tuesday, April 21, 2015, 9:03 PM', 'Tuesday, April 21, 2015, 9:03 PM'),
(3, 'admin@dashop.com.jm', 'Tuesday, April 21, 2015, 9:03 PM', 'Tuesday, April 21, 2015, 9:03 PM'),
(4, '', '', 'Wednesday, April 22, 2015, 5:09 AM'),
(5, 'admin@dashop.com.jm', 'Wednesday, April 22, 2015, 5:09 AM', 'Wednesday, April 22, 2015, 5:09 AM'),
(6, 'admin@dashop.com.jm', 'Wednesday, April 22, 2015, 7:40 AM', 'Wednesday, April 22, 2015, 7:41 AM'),
(7, 'admin@dashop.com.jm', 'Wednesday, April 22, 2015, 7:41 AM', 'Wednesday, April 22, 2015, 7:43 AM'),
(8, 'admin@dashop.com.jm', 'Wednesday, April 22, 2015, 7:44 AM', 'Wednesday, April 22, 2015, 8:15 AM'),
(9, 'admin@dashop.com.jm', 'Wednesday, April 22, 2015, 8:15 AM', 'Wednesday, April 22, 2015, 8:15 AM'),
(10, 'admin@dashop.com.jm', 'Wednesday, April 22, 2015, 8:15 AM', 'Wednesday, April 22, 2015, 8:16 AM');

CREATE TABLE IF NOT EXISTS `automobiles` (
  `AutoNum_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemName` varchar(50) NOT NULL,
  `Price` varchar(20) NOT NULL,
  `Year` varchar(30) NOT NULL,
  `Make` varchar(50) NOT NULL,
  `BodyType` varchar(50) NOT NULL,
  `Transmission` varchar(30) NOT NULL,
  `Mileage` varchar(100) DEFAULT NULL,
  `ProductOverlay` varchar(30) NOT NULL,
  `Product_Img` varchar(100) NOT NULL,
  `DateAdded` varchar(30) NOT NULL,
  `ItemStatus` varchar(20) NOT NULL,
  `ProductSellerID` int(11) NOT NULL,
  PRIMARY KEY (`AutoNum_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

INSERT INTO `automobiles` (`AutoNum_ID`, `ItemName`, `Price`, `Year`, `Make`, `BodyType`, `Transmission`, `Mileage`, `ProductOverlay`, `Product_Img`, `DateAdded`, `ItemStatus`, `ProductSellerID`) VALUES
(1, 'Brand new X6', '$12,000,000', '2015', 'BMW', 'SUV', 'Tiptronic', '30120', 'recently imported X6', 'items_pictures/automobiles/AkeemBrandnewX61429674574.jpg', 'Wednesday 2015-04-22', 'Sold', 3),
(2, 'Honda Civic', '$1,200,000', '2012', 'Honda', 'Sedan', 'Tiptronic', '12000', 'mad honda civic', 'items_pictures/automobiles/AkeemHondaCivic1429674668.JPG', 'Wednesday 2015-04-22', 'Available', 3),
(5, 'Toyota Runx', '$1,200,000', '2007', 'Toyota', 'Wagon', 'Manual', '30120', 'custom runx', 'items_pictures/automobiles/ClassToyotaRunx1429678551.JPG', 'Wednesday 2015-04-22', 'Available', 5),
(6, 'Trailer head', '$5,200,100', '1992', 'International', 'Truck', 'Manual', '1200012', 'big 18 box HID lights', 'items_pictures/automobiles/ClassTrailerhead1429678605.JPG', 'Wednesday 2015-04-22', 'Available', 5);

CREATE TABLE IF NOT EXISTS `products` (
  `Product_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductCategory` varchar(30) NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `ProductSellerID` int(11) NOT NULL,
  `ItemStatus` varchar(20) NOT NULL,
  PRIMARY KEY (`Product_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `purchase` (
  `Purchase_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ItemCode` varchar(50) NOT NULL,
  `ItemName` varchar(50) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `ProductSellerID` varchar(50) NOT NULL,
  `Buyer` varchar(50) NOT NULL,
  PRIMARY KEY (`Purchase_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

INSERT INTO `purchase` (`Purchase_ID`, `ItemCode`, `ItemName`, `Price`, `ProductSellerID`, `Buyer`) VALUES
(1, '1', 'Brand new X6', '$12,000,000', '3', '5');

CREATE TABLE IF NOT EXISTS `support` (
  `Support_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `Comments` varchar(500) NOT NULL,
  `TimeDate` varchar(50) NOT NULL,
  PRIMARY KEY (`Support_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `userlogs` (
  `Log_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `LastLoggedIn` varchar(50) NOT NULL,
  `LoggedOut` varchar(50) NOT NULL,
  PRIMARY KEY (`Log_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

INSERT INTO `userlogs` (`Log_ID`, `User_ID`, `LastLoggedIn`, `LoggedOut`) VALUES
(1, 1, 'Wednesday, April 22, 2015, 5:13 AM', 'Wednesday, April 22, 2015, 5:37 AM'),
(2, 2, 'Wednesday, April 22, 2015, 5:41 AM', 'Wednesday, April 22, 2015, 5:41 AM'),
(3, 3, 'Wednesday, April 22, 2015, 5:44 AM', 'Wednesday, April 22, 2015, 5:51 AM'),
(4, 4, 'Wednesday, April 22, 2015, 5:53 AM', 'Wednesday, April 22, 2015, 6:53 AM'),
(5, 5, 'Wednesday, April 22, 2015, 6:54 AM', 'Wednesday, April 22, 2015, 7:37 AM'),
(6, 5, 'Wednesday, April 22, 2015, 7:39 AM', 'Wednesday, April 22, 2015, 7:40 AM'),
(7, 5, 'Wednesday, April 22, 2015, 8:20 AM', 'Wednesday, April 22, 2015, 9:31 AM');

CREATE TABLE IF NOT EXISTS `users` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Profile_Pic` varchar(100) DEFAULT NULL,
  `User_fName` varchar(50) NOT NULL,
  `User_lName` varchar(50) NOT NULL,
  `Gender` char(1) NOT NULL,
  `PhoneNumber` varchar(14) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Parish` varchar(100) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `Password` varchar(35) NOT NULL,
  `RegistrationDate` varchar(30) NOT NULL,
  `Time` varchar(10) NOT NULL,
  `Activated` char(1) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

INSERT INTO `users` (`User_ID`, `User_Profile_Pic`, `User_fName`, `User_lName`, `Gender`, `PhoneNumber`, `Address`, `Parish`, `EmailAddress`, `Password`, `RegistrationDate`, `Time`, `Activated`) VALUES
(3, 'users_profile_pictures/Akeem1429674233.jpg', 'Akeem', 'Osbourne', 'M', '1-876-362-2819', 'Hayes', 'Clarendon', 'aousbourne@stu.ncu.edu.jm', '6c66bdcce968469944c8913bbb6ed789', 'Wednesday 2015-04-22', '5:43 AM', '1'),
(5, 'users_profile_pictures/Class1429678486.jpg', 'Class', 'Trial', 'M', '1-876-258-1298', 'NCU, Mandeville', 'Manchester', 'email@dashop.com.jm', '6c66bdcce968469944c8913bbb6ed789', 'Wednesday 2015-04-22', '6:54 AM', '1');

";
mysqli_multi_query($daShopConn,$sql);
mysqli_close($daShopConn);
}//end else
?>