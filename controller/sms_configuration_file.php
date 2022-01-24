<?php  include('../model/class.expert.php');
// http://sms.pearlsms.com/public/sms/send?sender=NRWAOB&smstype=TRANS&numbers=9560889608&apikey=4a03ec2a5ef64eb2965bb95fe79615a2&message='Dear Sandeep Mirakhur,

// NRWA website now offers you to make your Newspaper Bill Payments online. 
// Your consent is mandatory.

// You can
// a) Pay bills online. 
// b) Up to 50% Discount* 
// c) Avail Zero Transaction Charges

// To avail this benefit, please Click here to reply send your confirmation via WhatsApp
// https://tinyurl.com/Newspaper-Yes

// or sms YES to 8130032363 

// We will only receive the bill amount due but no information pertaining to what you subscribe.

// The vendor has also requested us to intimate AG & BC residents not too make any payments to him through Google Pay or Paytm as he has closed these accounts. (Until further instructions from him). 

// For terms of reference for the same you may click https://bit.ly/2PhKQGa 

// Regards
// NRWA Office'
// $ModelCall->where("user_status","Active");
// $ModelCall->where("payment_consent","1");
// $ModelCall->Where("user_id ","353");
// //$ModelCall->Where("user_id ", Array(283,365,383,381), 'NOT IN');
// $getrec = $ModelCall->get("Wo_Users");

$getrec = $ModelCall->rawQuery("SELECT email, first_name, last_name, username, password, user_status, phone_number, phone_valid, first_login, b.bill_no, b.month_name, b.flat_no, b.total_bill_amt FROM `Wo_Users` w, tbl_newspaper_bill b  where w.user_status='Active' and w.phone_valid=1 and w.payment_consent =1 and w.block_id = b.block_number and w.house_number_id = b.house_number and b.month_name='2020MAR'and b.amt_paid=''");
echo "<pre>". count($getrec);
//print_r($getrec);
//exit(0);

$SENDER ='NRWAOB';
$smstype='TRANS';
$apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';

foreach($getrec as $value){

    if($value['phone_number']!=NULL && $value['phone_valid']==1 ){
        $message= 'Dear '.$value['first_name'].' '.$value['last_name'].',
        
        Your March Newspaper Bill is uploaded on the website. Please click here to pay the bill now. https://bit.ly/2MJjwjI
        
        For terms of reference for the same you may click https://bit.ly/2PhKQGa 

        Regards
        NRWA Office<br>';
        //echo $message;
        //exit(0);
     //   $numbers=$value['phone_number'];
        $numbers=$value['phone_number'];
       
        // set post fields
        $post = [
            'sender' => $SENDER,
            'smstype' => $smstype,
            'numbers'   => $numbers,
            'apikey' => $apikey,
            'message' => $message
        ];

        $ch = curl_init('http://sms.pearlsms.com/public/sms/send');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        // execute!
        $response = curl_exec($ch);

        // close the connection, release resources used
        curl_close($ch);

        // do anything you want with your response
        var_dump($response);
    }


}

exit(0);



?>