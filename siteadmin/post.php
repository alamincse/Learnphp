<?php 
/**
 * Templage    : Article Post page
 * Location    : Siteadmin
 * @author     : AL-AMIN
 * @package    : CMS
 */
	require_once( 'site_php.php' );
	
	/** check for title */
	$title = 'post';
	$sess_id = session();

	require_once( 'header.php' );

	/** store user post */
	$result = show_user_post( $sess_id );

	$count = mysql_num_rows( $result );

	/** check delete article  */
	if( isset( $_GET['delete_id'] ) ) :

		$d_id = $_GET['delete_id'];

		/** Go delete function with article ID by '$d_id' */
		$delete = delete_article( $d_id );

	endif; ?>
	<div class="container content">
		<div class="row">
			<div class="col-md-12 main-content">
				<?php require_once('site_menu.php'); ?>
				
				<h3 class="page-header">My articles</h3>

				<?php if( isset( $delete ) ) : foreach( $delete as $error ) : echo $error; endforeach; endif; ?>
				
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<tr class="info">
							<th>Title</th>
							<th>Content</th>
							<th>Category</th>
							<th>Author</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
						<?php if( $count > 0 ) :
							while( $row = mysql_fetch_object( $result ) ) : // start while loop  ?>
								<tr>
									<td><?php echo $row->title; ?></td>
									<td><?php echo $row->content; ?></td>
									<td><?php echo $row->name; ?></td>
									<td><?php echo $row->username; ?></td>
									<td><?php echo $row->date; ?></td>
									<td>
										<a href="<?php echo $base_url; ?>/post_edit.php?id=<?php echo $row->article_id; ?>&amp;title=<?php echo $row->title; ?>">Edit</a> | 
										<a onclick="return confirm('Are you sure you want to delete this ?');" href="<?php echo $base_url; ?>/post.php?delete_id=<?php echo $row->article_id; ?>">Delete</a>
									</td>
								</tr>
							<?php endwhile; // end while loopt 
							else :
								echo '<tr><td>You have no post!</td></tr>';
						endif; ?>					
					</table><!-- .table  -->
				</div><!-- .table-responsive  -->
			</div><!-- .col-md-12  -->
		</div><!-- .row  -->
	<?php require_once( 'footer.php' ); 
?>