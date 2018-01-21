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

		$dashop_admin="create table admin(AdminEmail varchar(50) not null primary key, Password varchar(35) not null)";

		$dashop_admin_run=@mysqli_query($daShopConn,$dashop_admin);

		$dashop_admin_insert="insert into admin(AdminEmail, Password) values('admin@dashop.com.jm','9834957bda0734b33ce6f78cb18ae575')";

		$dashop_admin_insert_run=@mysqli_query($daShopConn,$dashop_admin_insert);

		$admin_log="create table adminlogs(Log_ID int auto_increment primary key, AdminEmail varchar(30) not null, LastLoggedIn varchar(50) not null, LoggedOut varchar(50) not null)";

		$create_admin_log=@mysqli_query($daShopConn,$admin_log);
		
		mysqli_close($daShopConn);
	}//end else
?>