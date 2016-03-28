<?php 
/**
  * Auto create db_config.php file,
  * when user install this Leranphp application.
  * 
  * @author 	AL-AMIN
  * @package 	CMS
  * @subpackage Learnphp
  * @version    1.0
  */ 

	
	/* create config.php file by user */
	
	$url = $_SERVER['REQUEST_URI'];
	
	if( strpos( $url, 'siteadmin' ) !== FALSE )
	{
		$filename = '../siteadmin/db_config.php';
	}
	else
	{
		$filename = 'siteadmin/db_config.php';
	}
	
	$filehandle = fopen( $filename, 'w' ) or die( 'Oops! File can\'t open.' );


	$write = '<?php';
	$write .= ' ';
	$write .= '
	/**
	 * The base configurations of the Learnphp application.
	 * Please setting your database configuration.
	 * This file has the following configurations: MySQL settings
	 *
	 * This program is free software; you can redistribute it and/or modify
	 * it under the terms of the GNU General Public License as published by
	 * the Free Software Foundation; either version 1.0 of the License, or
	 * (at your option) any later version.
	 * 
	 * This program is distributed in the hope that it will be useful,
	 * but WITHOUT ANY WARRANTY; without even the implied warranty of
	 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 * GNU General Public License for more details.
	 * 
	 * You should have received a copy of the GNU General Public License
	 * along with this program; if not, write to the Free Software
	 * Foundation, Inc. Room No: 307, A-Block, Second Floor, Mondal Mension, 
	 * Binodpur, Motihar, Rajshahi, BD. -> Date : 28.03.2016
	 *
	 * Copyright 2016 AL-AMIN <cseal.amin.09@gmail.com>
	 * 
	 * @author     AL-AMIN
	 * @package    CMS
	 * @subpackage Learnphp
	 * @version    1.0
	 */';

	/* define $dbconnt is a variable name for config.php file */	
	$write .= '
	$dbconn = ';
	
	/* store all database functionality by variable */
	$db_name  	 = $_POST['db_name'];
	$db_pass  	 = $_POST['db_pass'];
	$db_uname 	 = $_POST['db_uname'];
	$db_host  	 = $_POST['host'];

	$write .= "array(
		/** The name of the database for learnphp */
		'DB_NAME' 	  => '$db_name',

		/** mySQL database username */
		'DB_USER' 	  => '$db_uname',

		/** mySQL database password */
		'DB_PASSWORD' => '$db_pass',

		/** mySQL hostname */
		'DB_HOST' 	  => '$db_host'
	);";
	
	$write .= '
?>';


	fwrite( $filehandle, $write );
	
	fclose( $filehandle );
?>