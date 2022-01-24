<?php include("../model/class.expert.php");
//include("../RWAVendor/controller/custom_mailer_functions.php");
print_r($_REQUEST);
?>

<?php
 $data=array(
    'tenant_name'=>$_POST['tenant_name'],
    'staying'=>$_POST['staying'],
    'lease_period'=>$_POST['lease_period'],
    'permanent_address'=>$_POST['permanent_address'],
    'tenant_mobile'=>$_POST['mobile'],
    'tenant_landline'=>$_POST['landline_user'],
    'tenant_email_id'=>$_POST['email_id'],
    'emergency_contact_name'=>$_POST['emergency_contact_name'],
    'emergency_contact_number'=>$_POST['emergency_contact_number'],
     );
  $ModelCall->insert('tbl_tenant_registration',$data);
?>