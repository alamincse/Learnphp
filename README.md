# Learnphp

Learnphp (Using [php](http://www.php.net), [mysql](http://www.mysql.com), [html](http://www.w3schools.com/html/default.asp), [css](http://www.w3schools.com/css/default.asp) and [bootstrap](http://www.getbootstrap.com)) is a simple **CMS** like [wordpress](http://www.wordpress.org). If you are new in [php](http://www.php.net), you can learn something how to make a **CMS** using [php](http://www.php.net). This code is very pretty and helpful to learn yourself.


#Install process


1. After download, upzip it then put your project on your server directory like **C://xampp/htdocs/here your project**.

2. Go to your phpmyadmin area by your browser like **http://localhost/phpmyadmin**.

3. Create a new Database like **"learnphp"**.

4. Finally browse your project by browser like **http://localhost/learnphp**

5. And you got a installation form and fill up it carefully.

6. That's ok. You've got everything...

7. Thanks.



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
	 * 
	 * @author     Al-Amin Sarker
	 * @package    CMS
	 * @subpackage Learnphp
	 * @url        http://parbona.net
	 * @version    1.0
	 * @copyright  2016
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

## Author
[Al-Amin Sarker](http://www.parbona.net)
