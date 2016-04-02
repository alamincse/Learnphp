# Learnphp
Learnphp (Using php, mysql, html, css, bootstrap)is a simple CMS like wordpress. If you are new in php, you can learn something how to make a CMS using php. 
This code is very pretty and helpful to learn yourself.

INSTALL PROCESS
----------------
1. After download, put your project on your server directory(like C://xampp/htdocs/... ).
2. Go to your phpmyadmin area by your browser(like http://localhost/phpmyadmin).
3. Create a new Database like "learnphp".
4. Finally browse your project by browser like http://localhost/learnphp
5. And you got a installation form and fill up it carefully.
6. That's ok. You've got everything...
7. Thanks.


Others Install
---------------
1. Go to you "siteadmin" folder and open your "db_config.php" file.
2. You got bellow this code. Now set your DB name, DB user, DB password and DB host.
3. Save it and that's ok.

<?php
// DB connection
$dbconn = array(

	'DB_NAME' 	  => 'mysql-db-learnphp',
	
	'DB_USER' 	  => 'root',
	
	'DB_PASSWORD' => 'mysql-learnphp-pw',
	
	'DB_HOST' 	  => 'localhost'
	
);

// end
?>
