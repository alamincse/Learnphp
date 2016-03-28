<?php if( isset($_SESSION['id']) ) : ?>
	<div class="row">
		<div class="col-md-12 login-menu">
			<span class="pull-right">
				<ul>
					<li><a href="<?php echo $base_url; ?>/siteadmin/">Dashboard</a></li>
					<li><a href="<?php echo $base_url; ?>/siteadmin/logout.php">Logout</a></li>
				</ul>
			</span><!-- .pull-right  -->
		</div><!-- .col-md-12  -->
	</div><!-- .row  -->
<?php endif; ?>

<div class="row page-header">
	<div class="col-md-4">
		<h1><a href="<?php echo $base_url; ?>"><?php echo $s_info->name; ?></a></h1>
		<span><?php echo $s_info->description; ?></span>
	</div><!-- .col-md-4  -->

	<div class="col-md-4 col-md-offset-4" style="margin-top:15px;">
		<form class="form-inline" method="get" action="<?php echo $base_url; ?>/search.php">
			<div class="form-group">
		    	<input type="text" class="form-control" name="search" placeholder="Search...">
		  	</div><!-- .form-group  -->
		  	<input type="submit" name="submit" value="Search" class="btn btn-info">
		</form><!-- .form-inline  -->
	</div><!--  .col-md-12 -->
</div><!-- .row .page-header -->