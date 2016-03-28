<?php 
	// session start
	session_start();
	
	// Include DB connection
	require_once( 'db_conn.php' );
	require_once( 'db_php.php' );
	require_once( dirname( dirname( __FILE__ ) ) .'/host_conn.php' );

	
	/**
	 * For Admin Login
	 */
	function doLogin()
	{
		global $base_url;

		// when submit button was clicked.
		if( isset($_POST['submit']) )
		{
			// store username and password value
			$un = $_POST['uname'];

			$pws = $_POST['pw'];

			$errors = array(); 

			// check empty username
			if( empty($un) )
			{
				$errors[] = errors( 'Oops! Username field is empty.' );
			}
			else if( empty($pws) ) // check empty password
			{
				$errors[] = errors( 'Oops! Password field is empty.' );
			}
			else
			{
				$result = mysql_query("SELECT * FROM user");

				// default 'usename' and 'password' are false
				$username = false;

				$password = false;

				while( $row = mysql_fetch_assoc($result) )
				{
					$db_un = $row['username'];

					$db_pw = $row['password'];

					// when usename is correct
					if( $un == $db_un )
					{
						$username = true;
					}

					// when password is correct
					if( md5($pws) == $db_pw )
					{
						$password = true;
					}


					if( $un == $db_un AND md5($pws) == $db_pw )
					{
						$db_id = $row['id'];
					}
					
				} // end while loop


				if( $username == true AND $password == true )
				{
					// store username by session variable
					$_SESSION['username'] = $un;

					$_SESSION['id'] = $db_id;
					
					// redirect to siteadmin user page
					Redirect( $base_url );
				}
				else
				{
					$errors[] = errors( 'Oops! Something was wrong.' );
				}
			}

			return $errors;
		}
	}


	/** store user data by session */
	function session()
	{
		if( isset($_SESSION['id']) )
		{
			return $_SESSION['id'];
		}
		else
		{
			// redirect to home/index page
			return header( 'location:./' );
		}
	}

	/** New member register */
	function doSignup()
	{
		if( isset($_POST['submit']) )
		{
			extract( $_POST );

			$errors = array();
			
			if( empty($un) )
			{
				$errors[] = errors( 'Username field is empty.' );
			}
			else if( empty($email) )
			{
				$errors[] = errors( 'Email field is empty.' );
			}
			else if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) )
			{
				$errors[] = errors( 'Oops! your email is not valid.' );
			}
			else if( empty($pw) )
			{
				$errors[] = errors( 'Password field is empty.' );
			}
			else if( empty($c_pw) )
			{
				$errors[] = errors( 'Confirm password field is empty.' );
			}
			else if( $pw <> $c_pw )
			{
				$errors[] = errors( 'Oops! password and confirm password does not match.' );
			}
			else
			{
				$n_pw = md5( $pw );

				$email = mysql_real_escape_string( $email );

				$un = mysql_real_escape_string( $un );

				$old_email = mysql_fetch_row( mysql_query( "SELECT * FROM user WHERE email = '$email'" ) );

				$old_un = mysql_fetch_row( mysql_query( "SELECT * FROM user WHERE username = '$un'" ) );

				if( $old_un > 0 )
				{
					$errors[] = errors( 'Oops! username already exist. please try another.' );
				}
				else if( $old_email > 0 )
				{
					$errors[] = errors( 'Oops! Email already exist. please try another.' );
				}
				else
				{
					$result = mysql_query("INSERT INTO user VALUES('', '$un', '$email', '$n_pw', NOW())");

					if( $result )
					{
						$errors[] = success( 'Well done! You\'ve successfully create your account.' );
					}
					else
					{
						$errors[] = errors( 'Oops! Somethng was wrong.' );
					}
				}

			}

			return $errors;
		}
	}


	/** test */
	function update_user( $id )
	{
		if( isset($_POST['submit']) )
		{
			extract( $_POST );

			$errors = array();
			
			if( empty($un) )
			{
				$errors[] = errors( 'Username field is empty.' );
			}
			else if( empty($email) )
			{
				$errors[] = errors( 'Email field is empty.' );
			}
			else if( !filter_var( $email, FILTER_VALIDATE_EMAIL ) )
			{
				$errors[] = errors( 'Oops! your email is not valid.' );
			}
			else if( empty($pw) )
			{
				$errors[] = errors( 'Password field is empty.' );
			}
			else if( empty($c_pw) )
			{
				$errors[] = errors( 'Confirm password field is empty.' );
			}
			else if( $pw <> $c_pw )
			{
				$errors[] = errors( 'Oops! password and confirm password does not match.' );
			}
			else
			{
				$pw = md5( $pw );

				$sess_id = $_SESSION['id'];

				/** store user email by logged in user */
				$old_email = mysql_fetch_object( mysql_query( "SELECT * FROM user WHERE email = '$email' AND id = '$sess_id'" ) );

				/** store all email */
				$n_email = mysql_fetch_row( mysql_query( "SELECT * FROM user WHERE email = '$email'" ) );

				/** store user username by logged in user */
				$old_un = mysql_fetch_row( mysql_query( "SELECT * FROM user WHERE username = '$un' AND id = '$sess_id'" ) );

				/** store all username */
				$n_un = mysql_fetch_row( mysql_query( "SELECT * FROM user WHERE username = '$un'" ) );

				/** check username exist */
				if( $old_un == FALSE AND $n_un > 0 )
				{
					$errors[] = errors( 'Oops! Username already exist. please try another...' );
				}
				else if( $old_email == FALSE AND $n_email > 0 ) // check email exist
				{
					$errors[] = errors( 'Oops! Email already exist. please try another...' );
				}
				else
				{
					/** Update user info */
					$result = mysql_query( "UPDATE user SET username = '$un', email = '$email', password = '$pw' WHERE id = '$id'" );

					if( $result )
					{
						$errors[] = success( 'You\'ve successfully updated your info.' );
					}
					else
					{
						$errors[] = errors( 'Oops! Somethng was wrong.' );
					}
				}
			}

			return $errors;
		}
	}


	/**
	 * For article
	 */
	function article( $author )
	{
		if( isset($_POST['submit']) )
		{
			$title = $_POST['title'];
			
			$content = $_POST['content'];

			$category = $_POST['cat'];

			$errors = array();

			// check empty title
			if( empty($title) )
			{
				$errors[] = errors( 'Title field is empty.' );
			}
			else if( empty($content) ) // check empty content
			{
				$errors[] = errors( 'Content field is empty.' );
			}
			else if( empty($category) ) // check empty cat
			{
				$errors[] = errors( 'Category field is empty.' );
			}
			else
			{
				$result = mysql_query("INSERT INTO article VALUES('', '$title', '$content', '$author', '$category', NOW())");

				if( $result )
				{
					$errors[] = success( 'You\'ve successfully added your new article.' );
				}
				else
				{
					$errors[] = errors( 'Oops! Somethng was wrong.' );
				}
			}

			return $errors;
		}
	}



	/** Update article */
	function update_article( $id )
	{

		$errors = array();

		if( isset($_POST['submit']) )
		{
			$title = $_POST['title'];

			$content  = $_POST['content'];

			$cat  = $_POST['cat'];

			// check empty title
			if( empty($title) )
			{
				$errors[] = errors( 'Title field is empty.' );
			}
			else if( empty($content) ) // check empty content
			{
				$errors[] = errors( 'Content field is empty.' );
			}
			else if( empty($cat) ) // check empty content
			{
				$errors[] = errors( 'Category field is empty.' );
			}
			else
			{

				/** Update for article by article ID */
				$update = mysql_query( "UPDATE article SET title = '$title', content = '$content', cat = '$cat' WHERE id = '$id' " );

				if( $update )
				{
					$errors[] = success( 'You\'ve successfully updated your article.' );
				}
				else
				{
					$errors[] = errors( 'Oops! Something was wrong.' );
				}
			}
		}

		return $errors;
	}


	/** show user article */
	function show_user_post( $id )
	{
		$result = mysql_query(
			"SELECT 
			article.id as article_id, article.title, 
			article.content, article.cat, article.date, 
			user.id, user.username, 
			category.name 

			FROM article, user, category 
			WHERE article.author = '$id' 
			AND article.cat = category.id
			AND user.id = article.author
			ORDER BY article.id DESC"
		);

		return $result;
	}



	/** delete article */
	function delete_article( $id )
	{
		$errors = array();

		/** Delete article by article ID using delete method */
		$delete = mysql_query( "DELETE FROM article WHERE id = '$id' " );

		if( $delete )
		{
			$errors[] = success( 'You\'ve successfully deleted your article.' );

			header( 'location:post.php' );
		}
		else
		{
			$errors[] = errors( 'Oops! Something was wrong.' );
		}

		return $errors;
	}


	/** add new category */
	function admin_cat()
	{
		$errors = array();

		if( isset($_POST['submit']) )
		{
			$cat  = $_POST['cat'];

			if( empty($cat) )
			{
				$errors[] = errors( 'Category field is empty.' );
			}
			else
			{
				/** store previous category */
				$old_cat = mysql_num_rows( mysql_query( "SELECT * FROM category WHERE name = '$cat' " ) );

				/** check previous cat */
				if( $old_cat > 0 )
				{
					$errors[] = errors( 'Oops! category already exist. please try another...' );
				}
				else
				{
					$result = mysql_query( "INSERT INTO category VALUES('', '$cat')" );

					if( $result )
					{
						$errors[] = success( 'You\'ve successfully added new category.' );
					}
					else
					{
						$errors[] = errors( 'Oops! Something was wrong.' );
					}
				}
			}

		}

		return $errors;
	}


	/** Update category */
	function update_category( $id, $name )
	{
		$errors = array();

		if( isset($_POST['submit']) )
		{
			$cat = $_POST['cat'];

			if( empty($cat) )
			{
				$errors[] = errors( 'Category field is empty.' );
			}
			else
			{
				$n_cat = mysql_num_rows( mysql_query( "SELECT * FROM category WHERE name = '$cat' " ) );

				if( $name <> $cat AND $n_cat > 0 )
				{
					$errors[] = errors( 'Oops! category already exist.' );
				}
				else
				{
					$result = mysql_query( "UPDATE category SET name = '$cat' WHERE id = '$id'" );

					if( $result )
					{
						$errors[] = success( 'You\'ve successfully updated your category.' );
					}
					else
					{
						$errors[] = errors( 'Oops! Something was wrong.' );
					}
				}

			}
		}

		return $errors;
	}


	/** word limit for article in home page */
	function limit_text( $text, $limit ) 
	{
      if( str_word_count( $text, 0 ) > $limit )  
      {
          $words = str_word_count( $text, 2 );

          $pos = array_keys( $words );

          $text = substr( $text, 0, $pos[$limit] );
      }

      return $text;
    }

	/** success message */
	function success( $message )
	{
		$msg  = '<div class="alert alert-success alert-dismissible">';
		$msg .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$msg .= '<p>'.$message.'</p>';
		$msg .= '</div><!--  .alert .alert-success -->';

		return $msg;
	}


	/** errors message */
	function errors( $message )
	{
		$msg  = '<div class="alert alert-danger alert-dismissible">';
		$msg .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$msg .= '<p>'.$message.'</p>';
		$msg .= '</div><!--  .alert .alert-danger -->';

		return $msg;
	}


	/** show public article */
	function show_article()
	{
		$data = mysql_query( 
			"SELECT 
			article.id, article.title, article.content, 
			article.author, article.cat, article.date, 
			user.username,
			category.name
			FROM article, user, category 
			WHERE article.author = user.id 
			AND article.cat = category.id
			ORDER BY article.id DESC LIMIT 10" 
		); 

		return $data;
	}


	/** show single post */
	function single_post( $id )
	{
		$result = mysql_query(
			"SELECT 
			
			article.id, article.title, 
			article.content, article.author, 
			article.date, user.username, category.name

			FROM article, user, category
			WHERE article.id = '$id' 
			AND article.author = user.id
			AND article.cat = category.id"
		); 

		return $result;
	}


	/** user post */
	function user_post( $user )
	{
		$q_user = mysql_query( "SELECT * FROM user WHERE username = '$user'" );

		$user_data = mysql_fetch_object( $q_user );

		$user_id = $user_data->id;

		$result = mysql_query( 
			"SELECT article.id, article.title, article.content, article.cat, article.date, user.username, category.name 
			FROM article, user, category
			WHERE article.author = '$user_id' 
			AND article.cat = category.id
			AND article.author = user.id ORDER BY article.id DESC"
		);

		return $result;
	}


	/** show category post */
	function category_post( $cat )
	{
		/** get search value */
		$cat = $_GET['cat'];

		if( !empty($cat) )
		{
			$cat_r = mysql_query("SELECT * FROM category WHERE name = '$cat'");

			$cat_data = mysql_fetch_array($cat_r);

			$cat_id = $cat_data['id'];

			$result = mysql_query( 
				"SELECT article.id, article.title, article.content, article.cat, article.date, user.username, category.name 
				FROM article, user, category
				WHERE article.cat = '$cat_id' 
				AND article.cat = category.id
				AND article.author = user.id ORDER BY article.id DESC"
			);

			return $result;
		}
		else
		{
			return false;			
		}
	}


	/** search page */
	function search( $value )
	{
		if( !empty($value) )
		{
			$result = mysql_query( 
				"SELECT article.id, article.title, article.content, article.author, article.date, user.username, category.name 
				FROM article, user, category 
				WHERE article.title LIKE '%$value%' OR article.content LIKE '%$value%'
				

				AND article.author = user.id
				AND article.cat = category.id

				GROUP BY article.id DESC LIMIT 10" 
			); 

			return $result;
		}
		else
		{
			return false;
		}
	}


	/** redirect method */
	function Redirect( $url ) 
    {
        session_write_close();
        
        if ( headers_sent() ) 
        {
            echo "<script>document.location.href='" .$url. "';</script>\n";
        } 
        else 
        {
            header('HTTP/1.1 301 Moved Permanently');
        
            header('Location: '. $url);
        }
        
        die();
    }


    /** Logged out msg */
    function logout_message()
    {
    	if( isset( $_GET['logout'] ) AND $_GET['logout'] == 'success' ) 
    	{
    		return success( 'You\'ve successfully logged out!' );
    	}
    	else
    	{
    		return false;
    	}
    }


    /** Logged out msg */
    function install_message()
    {
    	if( isset( $_GET['install'] ) AND $_GET['install'] == 'success' ) 
    	{
    		return success( 'Well done! You\'ve successfully install your package. Now you can login.' );
    	}
    	else
    	{
    		return false;
    	}
    }


    /** site information update */
    function update_siteinfo()
    {
    	if( isset($_POST['submit']) )
    	{
    		extract( $_POST );

    		$errors = array();

    		if( empty($title) )
    		{
    			$errors[] = errors( 'Oops! Site title is empty.' );
    		}
    		else
    		{
				$update = mysql_query( "UPDATE siteinfo SET name = '$title', description = '$desc' WHERE id = 1 " );

				if( $update )
				{
					Redirect( '?action=success' );
				}
				else
				{
					$errors[] = errors( 'Oops! something was wrong' );
				}
    		}

    		return $errors;
    	}

    }


    /** user access area only for siteadmin */
    function user_access( $id )
    {
    	if( isset( $id ) AND $id == 1 )
    	{
    		return true;
    	}
    	else
    	{
    		return header( 'location:./' );
    	}
    }
?>