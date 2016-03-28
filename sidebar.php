<h3 class="page-header">Recent Post</h3>
<?php 
	$result = mysql_query("SELECT * FROM article ORDER BY id DESC LIMIT 5"); 
	while( $row = mysql_fetch_object($result) ) : ?>
		<ul class="nav">
			<li <?php if( isset($_GET['id']) AND $row->id == $_GET['id'] ) echo 'class="actives"'; ?>><a href="<?php echo $base_url; ?>/single.php?id=<?php echo $row->id; ?>&amp;title=<?php echo $row->title; ?>"><?php echo $row->title; ?></a></li>
		</ul><!-- .nav  -->
<?php endwhile; ?>


<h3 class="page-header">Category</h3>
<?php 
	$cat = mysql_query( "SELECT * FROM article, category WHERE article.cat = category.id GROUP BY category.id" );
	echo '<ul class="nav">';
	while( $row = mysql_fetch_object($cat) ) : ?>
		<li <?php if( isset($_GET['cat']) AND $row->name == $_GET['cat'] ) echo 'class="actives"'; ?>>
			<a href="<?php echo $base_url; ?>/category.php?cat=<?php echo $row->name; ?>"><?php echo $row->name; ?></a>
		</li>
	<?php endwhile; 
?>
</ul><!-- .nav  -->