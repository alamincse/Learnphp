<?php 
/**
 * Description : New Category
 * @author     : AL-AMIN
 * @package    : CMS
 */
?><h3 class="lead">Create your category</h3>
						
<?php if( isset( $errors ) ) : foreach( $errors as $error ) : echo $error; endforeach; endif; ?>

<form action="category.php" method="post">
	<div class="form-group">
	   <label for="category">Category Name</label>
	    <input type="text" class="form-control" name="cat" id="category" value="<?php if( isset($_POST['cat']) ) echo $_POST['cat']; ?>" placeholder="Post category">
	</div>
	
  	<input type="submit" value="Submit" name="submit" class="btn btn-primary">
</form>