<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 well install-form">
			<h3 class="page-header" style="color:#101;">Learnphp - Installation  Form</h3>
			<?php 
				$errors = site_install();

				if( isset( $errors ) ) : foreach( $errors as $error ) : echo $error; endforeach; endif;
			?>
			<form action="" method="post" class="form-horizontal">
				<div class="form-group">
			    	<label for="db-n" class="col-sm-4 control-label">Database Name</label>
		    		<div class="col-sm-8">
		      			<input type="text" id="db-n" class="form-control" name="db_name" value="<?php echo (isset($_POST['db_name'])) ? $_POST['db_name'] : $_POST['db_name'] = ''; ?>" placeholder="Database name" required>
		    		</div><!-- .col-sm-8  -->
		  		</div><!-- .form-group  -->

		  		<div class="form-group">
			    	<label for="db-uname" class="col-sm-4 control-label">Database Username</label>
		    		<div class="col-sm-8">
		      			<input type="text" id="db-uname" name="db_uname" class="form-control" value="<?php echo (isset($_POST['db_uname'])) ? $_POST['db_uname'] : $_POST['db_uname'] = ''; ?>" placeholder="Database username" required>
		    		</div><!-- .col-sm-8  -->
		  		</div><!-- .form-group  -->

		  		<div class="form-group">
			    	<label for="pw" class="col-sm-4 control-label">Database Password</label>
		    		<div class="col-sm-8">
		      			<input type="password" id="pw" name="db_pass" class="form-control" value="<?php echo (isset($_POST['db_pass'])) ? $_POST['db_pass'] : $_POST['db_pass'] = ''; ?>" placeholder="Database password">
		    		</div><!-- .col-sm-8  -->
		  		</div><!-- .form-group  -->

		  		<div class="form-group">
			    	<label for="host" class="col-sm-4 control-label">Database Hostname</label>
		    		<div class="col-sm-8">
		      			<input type="text" id="host" name="host" class="form-control" value="<?php echo (isset($_POST['host'])) ? $_POST['host'] : $_POST['host'] = ''; ?>" placeholder="Database hostname" required>
		    		</div><!-- .col-sm-8  -->
		  		</div><!-- .form-group  -->


		  		<div class="form-group">
			    	<label for="title" class="col-sm-4 control-label">Site Title</label>
		    		<div class="col-sm-8">
		      			<input type="text" id="title" name="title" class="form-control" value="<?php echo (isset($_POST['title'])) ? $_POST['title'] : $_POST['title'] = ''; ?>" placeholder="Site title" required>
		    		</div><!-- .col-sm-8  -->
		  		</div><!-- .form-group  -->

		  		<div class="form-group">
			    	<label for="desc" class="col-sm-4 control-label">Site Description</label>
		    		<div class="col-sm-8">
		      			<input type="text" id="desc" name="desc" class="form-control" value="<?php echo (isset($_POST['desc'])) ? $_POST['desc'] : $_POST['desc'] = ''; ?>" placeholder="Site description" required>
		    		</div><!-- .col-sm-8  -->
		  		</div><!-- .form-group  -->

		  		<div class="form-group">
			    	<label for="un" class="col-sm-4 control-label">Username</label>
		    		<div class="col-sm-8">
		      			<input type="text" id="un" name="un" class="form-control" value="<?php echo (isset($_POST['un'])) ? $_POST['un'] : $_POST['un'] = ''; ?>" placeholder="Admin username" required>
		    		</div><!-- .col-sm-8  -->
		  		</div><!-- .form-group  -->

		  		<div class="form-group">
			    	<label for="email" class="col-sm-4 control-label">Email</label>
		    		<div class="col-sm-8">
		      			<input type="email" id="email" name="email" class="form-control" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : $_POST['email'] = ''; ?>" placeholder="Email" required>
		    		</div><!-- .col-sm-8  -->
		  		</div><!-- .form-group  -->

		  		<div class="form-group">
			    	<label for="apw" class="col-sm-4 control-label">Password</label>
		    		<div class="col-sm-8">
		      			<input type="password" id="apw" name="apw" class="form-control" value="<?php echo (isset($_POST['apw'])) ? $_POST['apw'] : $_POST['apw'] = ''; ?>" placeholder="Password" required>
		    		</div><!-- .col-sm-8  -->
		  		</div><!-- .form-group  -->

		  		<div class="form-group">
			    	<label for="capw" class="col-sm-4 control-label">Confirm password</label>
		    		<div class="col-sm-8">
		      			<input type="password" id="capw" name="capw" class="form-control" value="<?php echo (isset($_POST['capw'])) ? $_POST['capw'] : $_POST['capw'] = ''; ?>" placeholder="Confirm password" required>
		    		</div><!-- .col-sm-8  -->
		  		</div><!-- .form-group  -->

		  		<div class="form-group">
			    	<label for="capw" class="col-sm-4 control-label"></label>
		    		<div class="col-sm-8">
		      			<input type="submit" name="submit" value="Install Learnphp" class="btn btn-primary">
		    		</div><!-- .col-sm-8  -->
		  		</div><!-- .form-group  -->
			</form><!-- .form-horizontal  -->

			<div class="col-md-12" style="padding:20px;">
				<span class="pull-right">Developed by <a href="http://facebook.com/alaminbosscseru09" target="_blank" data-toggle="tooltip" data-placement="top" title="Web Application Developer">AL-AMIN</a></span>
			</div><!--  .col-md-12  -->
		</div><!-- .col-md-6  -->
	</div><!-- .row  -->
</div><!-- .container  -->