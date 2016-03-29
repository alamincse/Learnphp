<?php 
/**
 * when user do manually configure in DB(db_config.php)
 * @author     : AL-AMIN
 * @package    : CMS
 */
	function site_config()
	{
		if( isset($_POST['submit']) )
		{
			extract( $_POST );

			/** store hostname */
			$hosts =  $_SERVER['HTTP_HOST'];

			/** store error message */
			$errors = array();

			if( $apw <> $capw )
			{
				$errors[] = errors( 'Oops! Your password and confirm password does not match.' ) ;
			}
			else 
			{
				/** Load this file for real DB connection */
				require_once( dirname( dirname( __FILE__ ) ) .'/siteadmin/db_config.php' );
				
				/** Load DB table */
				require_once( 'install_table.php' );

				require_once( 'insert_table_data.php' );

				/** store current URL */
				$url = $_SERVER['REQUEST_URI'];

				$_SESSION['admin_un'] = $un;
	
				if( strpos( $url, 'siteadmin' ) !== FALSE )
				{
					Redirect( '?install=success' );
				}
				else
				{
					Redirect( 'siteadmin/?install=success' );
				}
			}

			return $errors;
		}
	}
?>