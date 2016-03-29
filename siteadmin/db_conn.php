<?php 
	// error_reporting( E_ALL ); // for show in error message
	error_reporting( 0 ); // for off an error message

	require_once( 'db_config.php' );

	// Server connection
	$conn = mysql_connect( $dbconn['DB_HOST'], $dbconn['DB_USER'], $dbconn['DB_PASSWORD'] ); 

	$db_name = $dbconn['DB_NAME'];

	// Database connection
	$db_conn = mysql_select_db( $db_name );


	/** store current URL */
	$url = $_SERVER['REQUEST_URI'];

	/** check manualy DB connection and if does not query table in same DB */
	$user_table = mysql_fetch_assoc(mysql_query( "SELECT table_name FROM information_schema.tables WHERE table_type = 'base table' AND table_schema = '$db_name' "));
 	
	if( !$conn AND !$db_conn )
	{
		require_once( dirname( dirname( __FILE__ ) ) .'/install/site_install.php' );
		die();
	}
	else if( !$conn )
	{
		require_once( dirname( dirname( __FILE__ ) ) .'/install/errors_header.php' );

		die( '<p>Oops! your server connection was wrong. please go to your <code>siteadmin</code> folder inside your <code>db_config.php</code> file and set your server.</p></div></div></div>' );
	}

	else if( !$db_conn )
	{
		require_once( dirname( dirname( __FILE__ ) ) .'/install/errors_header.php' );

		die( '<p>Oops! your database name was wrong. please go to your <code>siteadmin</code> folder inside your <code>db_config.php</code> file and set your database.</p></div></div></div>' );
	}
	else if( !$user_table AND $conn == true AND $db_conn == true ) // if table is not available in your DB
	{
		require_once( dirname( dirname( __FILE__ ) ) .'/install/site_config.php' );
		exit();
	}


?>