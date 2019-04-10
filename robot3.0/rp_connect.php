<?php

// This file contains the database access information.
// This file also establishes a connection to MySQL,
// selects the database, and sets the encoding.

// Set the database access information as constants
define('DB_PASSWORD', 'pi');
define('DB_USER', 'robot');
define('DB_HOST', 'localhost');
define('DB_NAME', 'rp');


// Make and test the connection
$conn = @mysqli_connect(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME) or die('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set encoding
mysqli_set_charset($conn, 'utf8');


// Successful Connection Message

/* echo "Connected successfully. You are now connected to the web server database rp with tables lib and res.";
echo '<br><br>';

// Scan NFSSERVER folder, create array of file names, and print array contents to page

echo "List of files and directories in /var/www/html/mnt/nfs/nfsserver/";
echo '<br><br>';

*/
?>
