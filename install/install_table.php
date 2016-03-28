<?php 
/**
 * Description : Automatic create table
 * @author     : AL-AMIN
 * @package    : CMS
 */
	/*  Create users table */
	$user_table = "CREATE TABLE IF NOT EXISTS `user` (
		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`username` varchar(255) DEFAULT NULL,
		`email` varchar(255) DEFAULT NULL,
		`password` varchar(255) DEFAULT NULL,
		`time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (`id`),
		UNIQUE(`username`),
		UNIQUE(`email`)							
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
	
	mysql_query( $user_table );



	/*  Create article table */
	$article_table = "CREATE TABLE IF NOT EXISTS `article` (
		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`title` varchar(255) DEFAULT NULL,
		`content` text DEFAULT NULL,
		`author` int(11) DEFAULT NULL,
		`cat` int(11) DEFAULT NULL,
		`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (`id`)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
	
	mysql_query( $article_table );


	/*  Create category table */
	$category_table = "CREATE TABLE IF NOT EXISTS `category` (
		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`name` varchar(255) DEFAULT NULL,
		PRIMARY KEY (`id`)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
	
	mysql_query( $category_table );



	/*  Create site setting table */
	$info_table = "CREATE TABLE IF NOT EXISTS `siteinfo` (
		`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		`name` varchar(255) DEFAULT NULL,
		`description` varchar(255) DEFAULT NULL,
		`date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (`id`)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
	
	mysql_query( $info_table );
?>