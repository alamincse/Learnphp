<?php 
/**
 * Learnphp install
 * @author     : AL-AMIN
 * @package    : CMS
 */
	require_once( dirname( dirname( __FILE__ ) ) .'/siteadmin/site_php.php' );

	function site_install()
	{
		if( isset($_POST['submit']) )
		{
			extract( $_POST );

			/** store hostname */
			$hosts =  $_SERVER['HTTP_HOST'];

			/** store error message */
			$errors = array();

			if( $host <> $hosts )
			{
				$errors[] = errors( 'Oops! Your hostname was wrong.' );
			}
			else if( $apw <> $capw )
			{
				$errors[] = errors( 'Oops! Your password and confirm password does not match.' );
			}
			else if( !mysql_connect( $host, $db_uname, $db_pass ) )
			{
				$errors[] = errors( 'Oops! Your database username or password may be wrong.' );
			}
			else if( !mysql_select_db( $db_name ) )
			{
				$errors[] = errors( 'Oops! Your database name was wrong.' );
			}
			else 
			{
				/** Load this file for real DB connection */
				require_once( 'install_db_conn.php' );
				
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