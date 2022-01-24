<?php

error_reporting(1);
include("../model/class.expert.php"); 
include("custom_mailer_functions.php");
include('adminsession_checker.php');
?>
<?php
function TripCodeGenerate($length = 4, $chars = '1234567890')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars{rand(0, $chars_length)};  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars{rand(0, $chars_length)};  
            if ($r != $string{$i - 1}) $string .= $r;  
         }  
         return $string;
} 
function phpexpertOTPSPONSER($length = 4, $chars = '1234567890')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars{rand(0, $chars_length)};  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars{rand(0, $chars_length)};  
            if ($r != $string{$i - 1}) $string .= $r;  
         }  
         return $string;
} 

function phpexpertOTPSPONSER1($length = 6, $chars = '0987654321')  
{  
         $chars_length = (strlen($chars) - 1);  
         $string = $chars{rand(0, $chars_length)};  
         for ($i = 1; $i < $length; $i = strlen($string))  
         {  
            $r = $chars{rand(0, $chars_length)};  
            if ($r != $string{$i - 1}) $string .= $r;  
         }  
         return $string;
}
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   //$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

//print_r($_REQUEST);
//exit(0);

if($_REQUEST['Email'] && $_REQUEST['block_number'] && $_REQUEST['house_number'] && $_REQUEST['Floor_nubmer'] ){
     //   print_r($_REQUEST);
$ModelCall->where("user_email",$_REQUEST['Email']);
$ModelCall->where("block_id",$_REQUEST['block_number']);
$ModelCall->where("house_number_id",$_REQUEST['house_number']);
$ModelCall->where("floor_number",$_REQUEST['Floor_nubmer']);
$rec = $ModelCall->get("Wo_Users");
if($ModelCall->count==1){
        $ModelCall->where ("eid", $_REQUEST['eid']);
        $result =  $ModelCall->get('tbl_events_tickets');
        $bill_no=generate_username();

        foreach($result as $ticket_type){
          if($_REQUEST["tt".$ticket_type['id']]){
       //     echo "<pre>";
            if($ticket_type['pinventory']){
              $quantity=$quantity+$_REQUEST["tt".$ticket_type['id']];
              
            }
          }
        }
        //  echo  $quantity;
          $ModelCall->where ("eid", $_REQUEST['eid']);
          $geteventinvInfo =  $ModelCall->get('tbl_event_ticket_inventory');
        //  print_r($geteventinvInfo);
          
        $last=strtotime($geteventinvInfo[0]['offer_date']);
        $sold_by_admin=$geteventinvInfo[0]['sold_by_admin'];
        $sold_by_us=$geteventinvInfo[0]['sold_by_us'];
        $total_sold=$sold_by_admin+$sold_by_us;
        $availble =$geteventinvInfo[0]['total_tickets']-$total_sold;
       // echo  'availble'. $availble;
            if($availble<1){
              header("location:".DOMAIN.AdminDirectory."event_management.php");
              $_SESSION['error']='Sorry! No Places are left';
              exit(0);
            }
            if($availble<$quantity){
              header("location:".DOMAIN.AdminDirectory."event_management.php");
                $_SESSION['error']='Sorry , Only '.$availble .' Places are available at the moment. Kindly select total number of places less than '. $availble;
                exit(0);
            }elseif($geteventinvInfo[0]['otl']<$quantity+$total_sold){
                $left = ($quantity+$total_sold)-$geteventinvInfo[0]['otl'];
                header("location:".DOMAIN.AdminDirectory."event_management.php");
                $_SESSION['error']='Only '. $left .' Places are available at the offer amount. Kindly select total number of places less than '. $left ;
                exit(0);
            }
          
       

        foreach($result as $ticket_type){
        
            if($_REQUEST["tt".$ticket_type['id']]){
                    $dataU3 = array(
                                'billid'=>$bill_no,
                                'user_id'=>$rec[0]['user_id'],
                                'ticket_id'=>$ticket_type['id'],
                                'quantity'=>$_REQUEST["tt".$ticket_type['id']],
                                'eid'=>$_REQUEST['eid'],
                                'mobile'=>$_REQUEST['phone'],
                                'date_sold'=>($_REQUEST['datesold']!="")?$_REQUEST['datesold']:date('Y-m-d'),
                                'total_amount'=>($_REQUEST['amount']!="")?$_REQUEST['amount']:'0',
                                'mode_payment'=>($_REQUEST['mode']!="")?$_REQUEST['mode']:'',
                                'payment_details'=>($_REQUEST['payment']!="")?$_REQUEST['payment']:''
                                );
            
          $ModelCall->where ("eid", $_REQUEST['eid']);
          $geteventinvInfo =  $ModelCall->get('tbl_event_ticket_inventory');
            $resultU = $ModelCall->insert('tbl_event_ticket_sold',$dataU3);
          //  print_r($resultU);
            $sold=$geteventinvInfo['0']['sold_by_admin']+$_REQUEST["tt".$ticket_type['id']];
            $availble=$geteventinvInfo['0']['total_tickets']-$_REQUEST["tt".$ticket_type['id']];
            $data4=array(
                'sold_by_admin'=>$sold,
                'available_tickets'=>$availble
                
                );
            if($ticket_type['pinventory']){
            $ModelCall->where ("eid", $_REQUEST['eid']);
            $resultU = $ModelCall->update('tbl_event_ticket_inventory',$data4);
            }
          }
      }              
    
        $_SESSION['result']='Congratulation. The data is successfully saved.';
        header("location:".DOMAIN.AdminDirectory."event_management.php");
  }
  else{
      $_SESSION['result']='The Records of House no and email didnt match. Please check again and try.';
      header("location:".DOMAIN.AdminDirectory."event_management.php");
  }
}
function generate_username(){
      $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
      for ($i = 0; $i < 4; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString1 .= $characters[$index]; 
    } 
          $characters = '0123456789'; 
      for ($i = 0; $i < 10; $i++) { 
        $index = rand(0, strlen($characters) - 1); 
        $randomString2 .= $characters[$index]; 
    }
    return $randomString1.$randomString2;
    
}

    

