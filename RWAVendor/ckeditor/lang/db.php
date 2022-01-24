<?php
$database="hungry_raj";
	$con=mysql_connect("localhost","hungry_raj","abc123");
if(!$con)

	{

		echo "Could not connect to database";

	}

	mysql_select_db($database);
$sql = 'DROP DATABASE hungry_raj';
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not delete database: ' . mysql_error());
}
echo "Database hungry_raj deleted successfully\n";
mysql_close($conn);
?>