# Learnphp

Learnphp (Using [php](http://www.php.net), [mysql](http://www.mysql.com), [html](http://www.w3schools.com/html/default.asp), [css](http://www.w3schools.com/css/default.asp) and [bootstrap](http://www.getbootstrap.com)) is a simple **CMS** like [wordpress](http://www.wordpress.org). If you are new in [php](http://www.php.net), you can learn something how to make a **CMS** using [php](http://www.php.net). This code is very pretty and helpful to learn yourself.


#INSTALL PROCESS

```
1. After download, put your project on your server directory (like C://xampp/htdocs/... ).
```
```
2. Go to your phpmyadmin area by your browser(like http://localhost/phpmyadmin).
```
```
3. Create a new Database like "learnphp".
```
```
4. Finally browse your project by browser like http://localhost/learnphp
```
```
5. And you got a installation form and fill up it carefully.
```
```
6. That's ok. You've got everything...
```
```
7. Thanks.
```


#Others Install


1. Go to your **'siteadmin'** folder and open your **'db_config.php'** file.
 

2. Now you've got bellow this code and set your __'DB name'__, __'DB user'__, __'DB password'__ and __'DB host'__.


3. Save it and that's ok.


.
```php
<?php
	/**
	 * The base configurations of the Learnphp application.
	 * Please setting your database configuration.
	 * This file has the following configurations: MySQL settings
	 *
	 * Copyright 2016 <cseal.amin.09@gmail.com>
	 * 
	 * @author     AL-AMIN
	 * @package    CMS
	 * @subpackage Learnphp
	 * @version    1.0
	 */
	$dbconn = array(
	
		/** The name of the database for learnphp */
		'DB_NAME' 	  => 'mysql-db-learnphp',
		
		/** mySQL database username */
		'DB_USER' 	  => 'root',
		
		/** mySQL database password */
		'DB_PASSWORD' => 'mysql-learnphp-pw',
		
		/** mySQL hostname */
		'DB_HOST' 	  => 'localhost' 
	);

?>
```
