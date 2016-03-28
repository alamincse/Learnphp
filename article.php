<?php 
/**
 * Templage    : Article
 * @author     : AL-AMIN
 * @package    : CMS
 */
	require_once( 'siteadmin/site_php.php' );
	require_once( 'header.php' ); 

	if( isset($_GET['user']) AND $_GET['user'] <> NULL )
	{
		$result = user_post( $_GET['user'] );

		$data = mysql_num_rows( $result );
	}
	else
	{
		$data = 0;
	}?><div class="container content">
		
		<?php require_once( 'menu.php' ); ?>

		<div class="row">
			<div class="col-md-9">
				<div class="main-content">
					<?php if( $data > 0 ) : while( $row = mysql_fetch_object( $result ) ) : // start while loop ?>
						<h3><a href="<?php echo $base_url; ?>/single.php?id=<?php echo $row->id; ?>&amp;title=<?php echo $row->title; ?>"><?php echo $row->title; ?></a></h3>
						
						<?php $dates = date_create( $row->date ); ?>

						<span class="empty-author">
							Author: <a href="<?php echo $base_url; ?>/article.php?user=<?php echo $row->username; ?>"><?php echo $row->username; ?></a> Category: <a href="<?php echo $base_url; ?>/category.php?cat=<?php echo $row->name; ?>"><?php echo $row->name; ?></a> Time : <a href=""><?php echo date_format( $dates, 'd-M-Y h:i:s A' ); ?></a>
						</span><!-- .empty-author  -->

						<p class="empty-content">
							<?php 
								if( str_word_count($row->content) > 50 )
								{
									echo limit_text( $row->content, 100 );

									echo ' <a href="<?php echo $base_url; ?>/single.php?id=' . $row->id . "title=" . $row->title. '">Read more...</a>';
								}
								else
								{
									echo $row->content;
								}
							?>
						</p><!-- .empty-content  -->
					<?php endwhile;  // end while loop 
					else :
						echo '<h3>Oops! post not found! please try again...</h3>';
					endif;	?>
				</div><!-- .main-content  -->
			</div><!-- .col-md-9  -->

			<div class="col-md-3 thumbnail">
				<?php require_once( 'sidebar.php' ); ?>
			</div><!-- .col-md-3 .thumbnail  -->
		</div><!-- .row  -->
	
<?php require_once('footer.php'); ?>