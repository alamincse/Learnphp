<div class="page-header">
	<h1><a href="<?php echo $base_url; ?>"><?php echo $s_info->name; ?></a>
		
		<span style="font-size:14px;color:green;">( 
		<?php 
			$infos = site_user( $sess_id );
			
			echo 'Welcome ' .$infos->username;
		?> 
		)</span>

		<span class="pull-right">
			<ul class="site-menu">
				<li><a href="<?php echo $base_url; ?>">Home</a></li>
				<li><a href="<?php echo $base_url; ?>/post.php">article</a></li>
				<li><a href="<?php echo $base_url; ?>/profile.php">profile</a></li>
				<?php if( $sess_id == 1 ) : ?>
					<li><a href="<?php echo $base_url; ?>/category.php">category</a></li>
					<li><a href="<?php echo $base_url; ?>/site_setting.php">setting</a></li>
				<?php endif; ?>
				<li><a href="../" target="_blank">view site</a></li>
				<li><a href="<?php echo $base_url; ?>/logout.php">logout</a></li>
			</ul>
		</span><!-- .pull-right  -->
	</h1>
</div><!-- .page-header  -->