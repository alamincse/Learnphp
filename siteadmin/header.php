<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php 
		$info = mysql_query_data( 'siteinfo' ); 

		$s_info = mysql_fetch_object( $info );

		$site_name = $s_info->name;

		/** Single page */
		if( isset( $_GET['id'] ) ) 
			echo $site_name .' | edit post | ' . $_GET['title'];

		/** Edit category page */
		else if( isset( $_GET['cats'] ) )
			echo $site_name .' | category | edit category';

		/** Category page */
		else if( isset( $title ) and $title == 'category' )
			echo $site_name .' | category.';

		/** Article post page */
		else if( isset( $title ) and $title == 'post' )
			echo $site_name .' | article post.';


		/** Profile page */
		else if( isset( $title ) and $title == 'profile' )
			echo $site_name .' | Profile.';

		/** Profile page */
		else if( isset( $title ) and $title == 'Site' )
			echo $site_name .' | Site setting.';

		/** Home page */
		else
			echo $site_name;
	?></title>
	<link rel="stylesheet" href="<?php echo $base_url ?>/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $base_url ?>/assets/css/style.css">
</head>
<body>