<?php 
$form=$_POST['response'];
print_r($form);
$connection = mysqli_connect("localhost", "innovzzy_Ncoln", "Adminadmin!@123456", "innovzzy__NCoIn");
//new MysqliDb ('localhost', 'innovzzy_Ncoln', 'Adminadmin!@123456', 'innovzzy__NCoIn');
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$resp= json_decode($_POST['response']);
$keys=array_keys(json_decode($_POST['response'],true));
$mkeys=$keys;
$table= $resp->formid;
$create = "CREATE TABLE IF NOT EXISTS `form_response".$table."`(";
for($i=0;$i<sizeof($keys)-1;$i++)
{
	$keys[$i] = str_replace(' ', '', $keys[$i]);
	$keys[$i+1] = str_replace(' ', '', $keys[$i+1]);

	$create.=$keys[$i];
	$create.=" TEXT,";
}
	$create.=$keys[$i];
	$create.=" TEXT";
	$create.=");";
$run = mysqli_query($connection, $create);
//echo $create;
$entry="INSERT INTO `form_response".$table."`( ";
for($i=0;$i<sizeof($mkeys)-1;$i++){
$entry.="`".$keys[$i];
$entry.="`,";
} 
$entry.="`".$keys[$i];
$entry.="`) VALUES ('";
for($i=0;$i<sizeof($mkeys)-1;$i++){
$s1=$mkeys[$i];
$s2=$resp->$s1;
$entry.=$s2;
$entry.="','";
}
$s1=$mkeys[$i];
$s2=$resp->$s1;
$entry.=$s2;
$entry.="');";
$run = mysqli_query($connection, $entry);
echo $entry;
?>
