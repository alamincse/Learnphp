<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4" style="background:#fff;padding-bottom:10px;margin-top:100px;">
			<h3 class="page-header">Login to your account.</h3>
			<?php 

				$errors = doLogin();
				
				/** show login error message */
				if( isset($errors) ) : foreach( $errors as $error ) : echo $error; endforeach; endif;
				
				/** show logout message */
				echo logout_message(); 

				echo install_message();
			?>
			<form method="post" action="?action=login">
				<div class="form-group">
			    	<label for="un">Username</label>
			    	<input type="text" class="form-control" id="un" name="uname" value="<?php if( isset($_SESSION['admin_un']) ) echo $_SESSION['admin_un']; else if(isset($_POST['uname'])) echo $_POST['uname']; ?>" placeholder="Username">
			  	</div><!-- .form-group  -->

			  	<div class="form-group">
			    	<label for="pw">Password</label>
			    	<input type="password" name="pw" class="form-control" value="<?php if(isset($_POST['pw'])) echo $_POST['pw']; ?>" id="pw" placeholder="Password">
			  	</div><!-- .form-group  -->
			  
			  	<input type="submit" name="submit" value="Login" class="btn btn-primary">&nbsp;
			  	<a href="?action=sign_up">Sign up</a>
			</form>
		</div><!-- .col-md-4  -->
	</div><!-- .row  -->
