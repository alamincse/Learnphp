<?php 
/**
 * Description : Edit Category
 * @author     : AL-AMIN
 * @package    : CMS
 */
?><h3 class="lead">Edit your category</h3>
						
<?php if( isset($errors) ) : foreach( $errors as $error ) : echo $error; endforeach; endif; ?>

<form action="<?php echo $base_url; ?>/category.php?cats=<?php echo $cat_id; ?>&amp;name=<?php echo $cat_name; ?>" method="post">
	<div class="form-group">
	   <label for="category">Category Name</label>
	    <input type="text" class="form-control" name="cat" id="category" value="<?php echo $data['name'] ?>">
	</div>
	
  	<input type="submit" value="Update" name="submit" class="btn btn-primary">
</form>