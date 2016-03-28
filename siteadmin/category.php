<?php 
/**
 * Template : Category
 * @author  : AL-AMIN
 * @package : CMS
 */
	require_once( 'site_php.php' );

	$sess_id = session();

	/** only can access siteadmin */
	user_access( $sess_id );

	/** check for title */
	$title = 'category';

	require_once( 'header.php' );
	
	/** Edit category */
	if( isset( $_GET['cats'] ) AND isset($_GET['name']) )
	{
		$cat_id = $_GET['cats'];

		$cat_name = $_GET['name'];

		$cat_data = mysql_query( "SELECT * FROM category WHERE id = '$cat_id' " );

		$cat_count = mysql_num_rows( $cat_data );

		$data = mysql_fetch_assoc( $cat_data );

		/** Update category */
		$errors = update_category( $cat_id, $cat_name );
	}
	else
	{
		// add new category
		$errors = admin_cat();

		$cat_count = 0;
	}
  ?><div class="container content">
		<div class="row">
			<div class="col-md-12 main-content">
				<?php require_once( 'site_menu.php' ); ?>
				
				<div class="row">
					<div class="col-md-6">
						<?php 
							if( $cat_count > 0 )
								require_once( 'edit_category.php' );
							else
								require_once( 'new_category.php' ); 
						?>
					</div><!-- .col-md-6  -->

					<div class="col-md-6">
						<?php require_once( 'all_categories.php' ); ?>
					</div><!-- .col-md-6  -->
				</div><!-- .row  -->
			</div><!-- .col-md-12  -->
		</div><!-- .row  -->
	<?php require_once( 'footer.php' ); 
?>