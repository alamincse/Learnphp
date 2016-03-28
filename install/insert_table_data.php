<?php 
/**
 * Default insert data into tables
 * @author     : AL-AMIN
 * @package    : CMS
 */
	/**
	 * Set default post by user installation(Admin)
	 * @author AL-AMIN
	 */
	$a_title = 'Learn php more easy.';
	$a_content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum quasi, neque sunt provident quos eveniet veritatis accusantium fugit eos sit maiores natus praesentium rerum atque, temporibus id quidem aut soluta!';

	mysql_query( "INSERT INTO `article` VALUES('', '$a_title', '$a_content', '1', '1', NOW())");
	

	/**
	 * Set default category by user installtion(Admin)
	 */
	$cat_name = 'PHP';
	mysql_query( "INSERT INTO `category` VALUES('', '$cat_name')" );


	/**
	 * Set default user by installtion(Admin)
	 */
	$apw = md5( $apw );

	mysql_query( "INSERT INTO `user` VALUES('', '$un', '$email', '$apw', NOW())" );


	/**
	 * Set default siteinfo by installtion(Admin)
	 */
	mysql_query( "INSERT INTO `siteinfo` VALUES('', '$title', '$desc', NOW())" );
?>