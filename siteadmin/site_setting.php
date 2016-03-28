<?php 
/**
 * Templage    : Site setting page
 * Location    : Siteadmin
 * @author     : AL-AMIN
 * @package    : CMS
 */
	require_once( 'site_php.php' );

	$sess_id = session();

	/** only can access siteadmin */
	user_access( $sess_id );

	/** check for title */
	$title = 'Site';

	require_once( 'header.php' );

	$errors = update_siteinfo();

  ?><div class="container content">
		<div class="row"> 
			<div class="col-md-12 main-content">
				<?php require_once( 'site_menu.php' ); ?>

				<div class="col-md-6">
					<h3 class="lead">Site information</h3>
					<div class="table-responsive">
						<table class="table table-hover table-bordered">
							<tr class="info">
								<th>Title</th>
								<th>Info</th>
							</tr>
							<tr>
								<td>Site title</td>
								<td><?php echo $s_info->name; ?></td>
							</tr>
							<tr>
								<td>Description</td>
								<td><?php echo $s_info->description; ?></td>
							</tr>
							<tr>
								<td>Run time</td>
								<td><?php echo $s_info->date; ?></td>
							</tr>
						</table>
					</div>
				</div><!-- .col-md-6  -->

				<div class="col-md-6">
					<h3 class="lead">Change site information.</h3>
				
					<?php if( isset( $errors ) ) : foreach( $errors as $error ) : echo $error; endforeach; endif; 

						if( isset($_GET['action']) AND $_GET['action'] == 'success' )
							echo success( 'Well done! you\'ve successfully changed your site info.' );

					?>

					<form action="site_setting.php" method="post">
						<div class="form-group">
						   <label for="title">Site title</label>
						    <input type="text" class="form-control" name="title" id="title" value="<?php if(isset($_POST['title'])) echo $_POST['title']; ?>" placeholder="Site title">
						</div><!--  .form-group -->
						
						<div class="form-group">
						    <label for="desc">Site description</label>
						    <input type="text" class="form-control" name="desc" value="<?php if(isset($_POST['desc'])) echo $_POST['desc']; ?>" id="desc" placeholder="Site description">
						</div><!--  .form-group -->

					  	<input type="submit" value="Change" name="submit" class="btn btn-primary">
					</form>
				</div><!-- .col-md-6  -->
			</div><!-- .col-md-12  -->
		</div><!-- .row  -->
	<?php require_once( 'footer.php' ); 
?>