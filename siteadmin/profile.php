<?php 
/**
 * Templage    : Profile page
 * Location    : Siteadmin
 * @author     : AL-AMIN
 * @package    : CMS
 */
	require_once( 'site_php.php' );

	/** check for title */
	$title = 'profile';

	require_once( 'header.php' );
	
	$sess_id = session();

	$errors = update_user( $sess_id );

  ?><div class="container content">
		<div class="row">
			<div class="col-md-12 main-content">
				<?php require_once( 'site_menu.php' ); ?>

				<div class="col-md-6">
					<h3 class="lead">Your information</h3>

					<?php $info = site_user( $sess_id ); ?>

					<div class="table-responsive">
						<table class="table table-hover table-bordered">
							<tr class="info">
								<th>Title</th>
								<th>Info</th>
							</tr>
							<tr>
								<td>Username</td>
								<td><?php echo $info->username; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $info->email; ?></td>
							</tr>
							<tr>
								<td>Join Date</td>
								<td><?php echo $info->time; ?></td>
							</tr>
						</table>
					</div>
				</div><!-- .col-md-6  -->

				<div class="col-md-6">
					<h3 class="lead">Change your information.</h3>
				
					<?php if( isset( $errors ) ) : foreach( $errors as $error ) : echo $error; endforeach; endif; ?>

					<form action="profile.php" method="post">
						<div class="form-group">
						   <label for="un">Username</label>
						    <input type="text" class="form-control" name="un" id="un" value="<?php if(isset($_POST['un'])) echo $_POST['un']; ?>" placeholder="Username">
						</div><!--  .form-group -->
						
						<div class="form-group">
						    <label for="email">Email</label>
						    <input type="text" class="form-control" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" id="email" placeholder="Email">
						</div><!--  .form-group -->

						<div class="form-group">
						    <label for="pw">Password</label>
						    <input type="password" class="form-control" name="pw" id="pw" value="<?php if(isset($_POST['pw'])) echo $_POST['pw']; ?>" placeholder="Password">
						</div><!--  .form-group -->

						<div class="form-group">
						    <label for="c-pw">Confirm password</label>
						    <input type="password" class="form-control" name="c_pw" id="c-pw" value="<?php if(isset($_POST['c_pw'])) echo $_POST['c_pw']; ?>" placeholder="Confirm password">
						</div><!--  .form-group -->

					  	<input type="submit" value="Change" name="submit" class="btn btn-primary">
					</form>
				</div><!-- .col-md-6  -->
			</div><!-- .col-md-12  -->
		</div><!-- .row  -->
	<?php require_once( 'footer.php' ); 
?>