<?php
include("../model/class.expert.php"); 
include("custom_mailer_functions.php");
include('PHPMailer-master/PHPMailerAutoload.php');
include('spreadsheet-reader-master/php-excel-reader/excel_reader2.php');
include('spreadsheet-reader-master/SpreadsheetReader.php');
$from_id=1295;
$to_id=1296;
for($i=$from_id;$i<=$to_id;$i++){
   echo $i;
    $ModelCall->where("user_id", $i);
    $rec = $ModelCall->get("Wo_Users");
  
    user_info_mail($rec[0]);
 

  } ?>
    
