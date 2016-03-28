<?php 
/**
 * Templage    : Article page
 * Location    : Siteadmin
 * @author     : AL-AMIN
 * @package    : CMS
 */
	require_once( 'site_php.php' );
	require_once( 'header.php' );
	$sess_id = session();

	$errors = article( $sess_id );

  ?><div class="container content">
		<div class="row">
			<div class="col-md-12 main-content">
				<?php require_once( 'site_menu.php' ); ?>
				
				<h3 class="lead">Create your article</h3>
				
				<?php if( isset( $errors ) ) : foreach( $errors as $error ) : echo $error; endforeach; endif; ?>

				<form action="" method="post">
					<div class="form-group">
					   <label for="title">Title</label>
					    <input type="text" class="form-control" name="title" id="title" placeholder="Title">
					</div><!-- .form-group  -->
					
					<div class="form-group">
					    <label for="content">Content</label>
					    <textarea class="form-control" id="content" name="content" rows="10"></textarea>
					</div><!-- .form-group  -->

					<div class="form-group">
					    <label for="content">Category</label>
					    <select name="cat" id="cat" class="form-control">
					    	<option value="">Select category</option>
					    	<?php 
					    		$cat = mysql_query_data( "category" );

					    		while( $row = mysql_fetch_object($cat) )
					    		{
					    			echo '<option value="'.$row->id.'">'. $row->name. '</option>';
					    		}
					    	?>
					    </select>
					</div><!-- .form-group  -->
					  
				  	<input type="submit" value="Submit" name="submit" class="btn btn-primary">
				</form>
			</div><!-- .col-md-12  -->
		</div><!-- .row  -->
	<?php require_once( 'footer.php' ); 
?>