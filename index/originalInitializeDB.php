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

		$daShop_users="create table Users(User_ID int auto_increment primary key, User_Profile_Pic varchar(100), User_fName varchar(50) not null, User_lName varchar(50) not null, Gender char not null, PhoneNumber varchar(14) not null, Address varchar(100) not null, Parish varchar(100) not null, EmailAddress varchar(50) not null, Password varchar(35) not null, RegistrationDate varchar(30) not null, Time varchar(10) not null, Activated char not null)";

		$create_daShop_users=@mysqli_query($daShopConn,$daShop_users);

		$dashop_products="create table products(Product_ID int auto_increment primary key, ProductCategory varchar(30) not null, ProductName varchar(50) not null, ProductSellerID int(11) not null, ItemStatus varchar(20) not null)";

		$create_dashop_products=@mysqli_query($daShopConn,$dashop_products);

		$daShop_categories_automobiles="create table automobiles(AutoNum_ID int auto_increment primary key, ItemName varchar(50) not null, Price varchar(20) not null, Year varchar(30) not null, Make varchar(50) not null, BodyType varchar(50) not null, Transmission varchar(30) not null, Mileage varchar(100), ProductOverlay varchar(30) not null, Product_Img varchar(100) not null, DateAdded varchar(30) not null, ItemStatus varchar(20) not null, ProductSellerID int(11) not null)";

		$create_daShop_categories_automobiles=@mysqli_query($daShopConn,$daShop_categories_automobiles);

		$users_log="create table userlogs(Log_ID int auto_increment primary key, User_ID int(11) not null, LastLoggedIn varchar(50) not null, LoggedOut varchar(50) not null)";

		$create_users_log=@mysqli_query($daShopConn,$users_log);

		$activity_log="create table activitylogs(Log_ID int auto_increment primary key, User_ID int(11) null, PurchaseActivity varchar(100) null, SalesActivity varchar(100) null, OtherActivity varchar(100) null, TimeDate varchar(50) not null)";

		$create_activity_log=@mysqli_query($daShopConn,$activity_log);

		$support="create table support(Support_ID int auto_increment primary key, Name varchar(50) not null, EmailAddress varchar(50) not null, Comments varchar(500) not null, TimeDate varchar(50) not null)";

		$create_support=@mysqli_query($daShopConn,$support);

		$purchase="create table purchase(Purchase_ID int auto_increment primary key, ItemCode varchar(50) not null, ItemName varchar(50) not null, Price varchar(50) not null, ProductSellerID varchar(50) not null, Buyer varchar(50) not null)";

		$create_purchase=@mysqli_query($daShopConn,$purchase);

		
	}//end else
	mysqli_close($daShopConn);
?>