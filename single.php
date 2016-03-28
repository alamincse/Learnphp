<?php 
/**
 * Template    : Single page
 * @author     : AL-AMIN
 * @package    : CMS
 */
	require_once( 'siteadmin/site_php.php' );
	require_once( 'header.php'); 

	if( isset($_GET['id']) AND $_GET['id'] <> NULL ) :

		$result = single_post( $_GET['id'] );

		$check = mysql_num_rows( $result );
	else :
		$check = false;
	endif; ?>
		<div class="container content">
			<?php require_once('menu.php'); ?>

			<div class="row">
				<div class="col-md-9">
					<div class="main-content">
						<?php 
							if( $check == true ) :
								while( $row = mysql_fetch_object($result) ) : // start while loop ?>
									<h3><a href="<?php echo $base_url; ?>/single.php?id=<?php echo $row->id; ?>&amp;title=<?php echo $row->title; ?>"><?php echo $row->title; ?></a></h3>
									<?php 
										$dates = date_create( $row->date );
									?>
									<span class="empty-author">
										Author: <a href="<?php echo $base_url; ?>/article.php?user=<?php echo $row->username; ?>"><?php echo $row->username; ?></a> Category: <a href="<?php echo $base_url; ?>/category.php?cat=<?php echo $row->name; ?>"><?php echo $row->name; ?></a> Time : <a href=""><?php echo date_format( $dates, 'd-M-Y h:i:s A' ); ?></a>
									</span><!-- .empty-author  -->

									<p class="empty-content" style="margin-top:10px;">
										<?php echo $row->content; ?>
									</p>
								<?php endwhile;  //end while loop 
							else : 
								echo '<h2>Oops! Post not found!';
							endif; 
						?>
					</div><!-- .main-content  -->
				</div><!-- .col-md-9  -->
				
				<div class="col-md-3 thumbnail">
					<?php require_once( 'sidebar.php' ); ?>
				</div><!-- .col-md-3 .thumbnail  -->
			</div><!-- .row  -->
	<?php require_once('footer.php'); 
?>