<?php 
session_start();
error_reporting(0);
require_once('MysqliDb.php');
$ModelCall = new MysqliDb ('localhost', 'allrwas1_nirvana', 'Nirvana@1234', 'allrwas1_nirvana');
 
define('DOMAIN','https://www.nirvana.allrwas.com/');
define('AdminDirectory','RWAVendor/');
define('includes','include/');
define('NOIMAGE','noimage.png');
define('DATE',date('d l Y'));
define('CURRENTDATE',date('Y-m-d'));
?>
