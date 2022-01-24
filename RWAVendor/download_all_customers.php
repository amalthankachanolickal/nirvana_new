<?php include('model/class.expert.php');
include('adminsession_checker.php');

$ModelCall->where ("email ='Email'");
$result111111 =  $ModelCall->delete('Wo_Users');

$ModelCall->where ("username =' '");
$result11111111111 =  $ModelCall->delete('Wo_Users');

if($_REQUEST['first_name']!='')
{
$ModelCall->where("(first_name ='".$ModelCall->utf8_decode_all($_REQUEST['first_name'])."')" );
}
if($_REQUEST['user_email']!='')
{
$ModelCall->where("(email ='".$ModelCall->utf8_decode_all($_REQUEST['user_email'])."')" );
}
if($_REQUEST['user_phone']!='')
{
$ModelCall->where("(user_phone ='".$ModelCall->utf8_decode_all($_REQUEST['user_phone'])."')" );
}
$ModelCall->where("(client_id ='".$ModelCall->utf8_decode_all($getAdminInfo[0]['id'])."')" );
$ModelCall->where("admin ='0'");
$ModelCall->orderBy("user_id","desc");
$getDriverInfo = $ModelCall->get("Wo_Users");
  
$filename = date('Y-m-d')."_all_customers.csv";         //File Name
// Create connection 
	$fp = fopen('php://output', 'w'); 
               $headers  = array('0'=> "Title", 
				'1'=> "First Name", 
				'2'=> "Middle Name",
				'3'=> "Last Name",
				'4'=> "Block Name",
				'5'=> "House Number", 
				'6'=> "Floor Number",
				'7'=> "Email Address",
				'8'=>"Member Type",
				'9'=>"Resident Type");
 
//print_r($headers);
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, $headers);

foreach($getDriverInfo as $row)
{ 
$ModelCall->where("(id ='".$ModelCall->utf8_decode_all($row['block_id'])."')" );
$ModelCall->orderBy("id","desc");
$getBlockInfo = $ModelCall->get("tbl_block_entry");

if($row['user_type']==0)
{
$user_type = "Landlord";
}
if($row['user_type']==1)
{
$user_type ="Tenant";
}

if($row['user_resident_type']==0)
{
$user_resident_type = "Residing in the society";
}
if($row['user_resident_type']==1)
{
$user_resident_type ="Non Resident";
}

$user_arr  = array(
'user_title'=>$row['user_title'],
'first_name'=>$row['first_name'],
'middle_name'=>$row['middle_name'],
'last_name'=>$row['last_name'],
'block_name'=>ucwords($getBlockInfo[0]['block_name']).'-'.ucwords($getBlockInfo[0]['block_code']),
'house_number_id'=>$row['house_number_id'],
'floor_number'=>$row['floor_number'],
'email'=>$row['email'],
'user_type'=>$user_type ,  
'user_resident_type'=>$user_resident_type);  
//	print_r($user_arr);
//	die();
			        fputcsv($fp, $user_arr);					   
} 
exit;
?>