<?php 
	require_once( 'site_php.php' );
	
	/** session destroy */
	session_destroy();

	/** redirect to login page */
	Redirect( $base_url.'?logout=success&' .rawurlencode( $base_url ) );
?>

