<?php 
/**
 * Description : Categories
 * @author     : AL-AMIN
 * @package    : CMS
 */
	/** DB table name */
	$table_name = 'category';

	/** row check */
	$cat_data = mysql_num_row( $table_name );

	/** data query */
	$cats = mysql_query_data( $table_name );

	if( $cat_data > 0 ) : ?>

	<h3 class="lead">Categories</h3>
	
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<tr class="info">
				<th>Name</th>
				<th>Action</th>
			</tr><!-- .info  -->
			<?php while( $row = mysql_fetch_object( $cats ) ) :  // start while loop ?>
				<tr>
					<td><?php echo $row->name; ?></td>
					<td><a href="<?php echo $base_url; ?>/category.php?cats=<?php echo $row->id; ?>&amp;name=<?php echo $row->name; ?>">Edit</a></td>
				</tr>
			<?php endwhile; //end while loop ?>
		</table><!-- .table.table-hover.table-bordered  -->
	</div><!-- .table-responsive  -->
<?php endif; // end if condition ?>