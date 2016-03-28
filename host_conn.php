<?php 
	/** site url setting */
	$host =  $_SERVER['HTTP_HOST'];
	
	/** store current URL */
	$url = dirname( $_SERVER['PHP_SELF'] );

	if( isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off' ) 
		$http =  'https';
	else 
		$http = 'http';

	$base_url = $http .'://' .$host .$url;

?>