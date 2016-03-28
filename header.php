<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php 
		$info = mysql_query_data( 'siteinfo' ); 
		
		$s_info = mysql_fetch_object( $info );

		$title = $s_info->name;

		/** Single page */
		if( isset($_GET['id']) ) 
			echo $title .' | ' . $_GET['title'];

		/** Category page */
		else if( isset($_GET['cat']) )
			echo $title .' | category | ' .$_GET['cat'];

		/** Search page */
		else if( isset($_GET['search']) ) 
			echo $title .' | search | ' .$_GET['search'];

		/** Article page */
		else if( isset($_GET['user']) ) 
			echo $title .' &raquo; article | user | ' .$_GET['user'];

		/** Home page */
		else
			echo $title;
	?></title>
	<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/style.css">
</head>
<body>