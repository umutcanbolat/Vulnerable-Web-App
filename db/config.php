<?php
	//Fill in the database username and password fields
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'USER');
    define('DB_PASSWORD', 'PASS');
    define('DB_DATABASE', 'kouhack');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    // Check connection
    if (!$db) {
       die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
?>
