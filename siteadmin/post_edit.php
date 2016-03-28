<?php 
/**
 * Templage    : Article Edit page
 * Location    : Siteadmin
 * @author     : AL-AMIN
 * @package    : CMS
 */
	require_once( 'site_php.php' );
	require_once( 'header.php' );
	$sess_id = session();

	/** store article ID */
	$a_id = $_GET['id'];

	/** query article by article ID and User ID */
	$result = mysql_query( "SELECT * FROM article WHERE id = '$a_id' AND author = '$sess_id'" );

	$article = mysql_fetch_object( $result );

	/** update article */
	$errors = update_article( $a_id );
  ?><div class="container content">
		<div class="row">
			<div class="col-md-12">
				<?php require_once('site_menu.php'); ?>
				
				<h3 class="page-header">Edit Article</h3>
				
				<?php if( isset($errors) ) : foreach( $errors as $error ) : echo $error; endforeach; endif; ?>

				<form action="" method="post">
					<div class="form-group">
					   <label for="title">Title</label>
					    <input type="text" class="form-control" value="<?php echo $article->title; ?>" name="title" id="title">
					</div>
					
					<div class="form-group">
					    <label for="content">Content</label>
					    <textarea class="form-control" id="content" name="content" rows="10"><?php echo $article->content; ?></textarea>
					</div>
					<div class="form-group">
					    <label for="content">Category</label>
					    <select name="cat" id="cat" class="form-control">
					    	<option value="">Select category</option>
					    	<?php 

					    		$cat = mysql_query( "SELECT * FROM category" );

					    		while( $row = mysql_fetch_object($cat) ) : ?>
					    			<option value="<?php echo $row->id?>" <?php if( $row->id == $article->cat ) echo 'selected'; ?>><?php echo $row->name; ?></option>
					    		<?php endwhile; // end while loop.
					    	?>
					    </select>
					</div>
					  
				  	<input type="submit" value="Update" name="submit" class="btn btn-primary">
				</form>
			</div><!-- .col-md-12  -->
		</div><!-- .row  -->
	<?php require_once( 'footer.php' ); 
?>