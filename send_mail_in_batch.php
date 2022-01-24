<?php
include("../model/class.expert.php"); 
include("custom_mailer_functions.php");
$from_id=1295;
$to_id=1295;
for($i=$from_id;$i<=$to_id;$i++){
   echo $i;
    $ModelCall->where("user_id", '$i');
    $rec = $ModelCall->get("Wo_Users");
     
    user_info_mail($rec[0]);
  

  } ?>
    
