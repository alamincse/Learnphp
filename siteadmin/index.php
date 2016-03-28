<?php 
/**
 * Templage    : Login / Sign up page
 * @author     : AL-AMIN
 * @package    : CMS
 * @subpackage : Learnphp
 * @version    : 1.0
 */
	/** Include php file */
	require_once( 'site_php.php' ); 

	/** Include site header */
	require_once( 'header.php' ); 

	/** check user logged in */
	if( isset( $_SESSION['id'] ) ) :
		/** Load siteadmin user page */
		require_once( 'user.php' );
	else :
		if( isset( $_GET['action'] ) AND $_GET['action'] == 'sign_up' )
			/** Load signup form */
			require_once( 'signup.php' );
		else
			/** Load login form */
			require_once( 'login.php' ); 

		require_once( 'login_footer.php' ); 
		exit();
	endif;

	require_once( 'footer.php' ); 
?>