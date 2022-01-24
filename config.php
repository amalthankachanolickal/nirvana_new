<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'shinzekr_allrwa');
define('DB_PASSWORD', 'c8!Fjh7Qw+Xa');
define('DB_NAME', 'shinzekr_allrwa');
 
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ( mysqli_connect_errno() ) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

define('DOMAIN','https://www.nirvanacountry.co.in/');
define('AdminDirectory','RWAVendor/');
define('includes','include/');
define('NOIMAGE','noimage.png');
define('DATE',date('d l Y'));
define('CURRENTDATE',date('Y-m-d'));
?>