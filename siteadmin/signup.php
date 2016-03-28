<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4" style="background:#fff;padding-bottom:10px;margin-top:100px;">
			<h3 class="page-header">Create your new account.</h3>
			<?php 
				$errors = doSignup();
				
				/** show error message */
				if( isset($errors) ) : foreach( $errors as $error ) : echo $error; endforeach; endif; 
			?>

			<form method="post" action="?action=sign_up">
				<div class="form-group">
			    	<label for="un">Username</label>
			    	<input type="text" class="form-control" id="un" name="un" value="<?php if(isset($_POST['un'])) echo $_POST['un']; ?>" placeholder="Username">
			  	</div>

			  	<div class="form-group">
			    	<label for="email">Email</label>
			    	<input type="text" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Email">
			  	</div>

			  	<div class="form-group">
			    	<label for="pw">Password</label>
			    	<input type="password" name="pw" class="form-control" value="<?php if(isset($_POST['pw'])) echo $_POST['pw']; ?>" id="pw" placeholder="Password">
			  	</div>

			  	<div class="form-group">
			    	<label for="c-pw">Confirm password</label>
			    	<input type="password" name="c_pw" class="form-control" value="<?php if(isset($_POST['c_pw'])) echo $_POST['c_pw']; ?>" id="c-pw" placeholder="Confirm password">
			  	</div>
			  
			  	<input type="submit" name="submit" value="Sign up" class="btn btn-primary">&nbsp;
			  	<a href="./">Login</a>
			</form>
		</div><!-- .col-md-4  -->
	</div><!-- .row  -->
