<?php 
include( dirname(__FILE__) .'/../model/class.expert.php');
echo "In service";
$getrec = $ModelCall->rawQuery("SELECT * FROM `tbl_transations_payu` where status='success' and (payment_status is NULL or payment_status !='Payment Completed')");
echo "<pre>". count($getrec);
//exit(0);
foreach($getrec as $value){
    $tdr_by_payu =0;
    $settlement_amount =0;
    $tableData= array();
    echo "<pre>";
    $payu = json_decode($value['payuMoneyId']) ;
    echo $payu->paymentId;
    $result =  CheckStatus($payu->paymentId);
    $resultArray = json_decode($result);
    print_r($resultArray);
  $payment_status = $resultArray->result->status;
    if($resultArray->result->status=='Payment Completed' || $resultArray->result->status=='Settlement In Progress'){
        $txnid = $resultArray->result->merchantTxnId;
        echo $resultArray->result->merchantTxnId . "<br>";
        echo  $resultArray->result->transactionDate . "<br>";
      //  print_r($resultArray->result->transactionJourney->paymentCompleted) ;
      if($resultArray->result->transactionJourney->paymentCompleted->date !=""){
        $settlement_date =  date('Y-m-d', strtotime($resultArray->result->transactionJourney->paymentCompleted->date));
      }else {
        $settlement_date = NULL;
      }
        // print_r($resultArray->result->paymentBreakUp) ;
        $tdr_by_payu = $resultArray->result->paymentBreakUp->tdr+$resultArray->result->paymentBreakUp->sTax+$resultArray->result->paymentBreakUp->convenienceFees;
        $settlement_amount = $resultArray->result->paymentBreakUp->amount - $tdr_by_payu;
        echo $tdr_by_payu. "<br>";
        echo $settlement_amount. "<br>";
        echo $payment_status. "<br>";
        echo $settlement_date. "<br>";
        if($payu->paymentId=='366588943'){
             $tableData = array(
        "payment_status"=>$payment_status,
        "settlement_date"=>$settlement_date);
        }else{
        $tableData = array("tdr_by_payu"=> $tdr_by_payu, 
        "settlement_amount"=>$settlement_amount,
        "payment_status"=>$payment_status,
        "settlement_date"=>$settlement_date);
        }
        
            print_r(  $tableData);
     //   echo date('Y-m-d', strtotime($resultArray->result->transactionJourney->paymentCompleted->date));
      $ModelCall->where("txnid",$txnid);
      $updateInfo = $ModelCall->update("tbl_transations_payu", $tableData, 1 );
      print_r($updateInfo);
    }
   // exit(0);
}


function CheckStatus($paymentid){
//The URL you're sending the request to.
$url = 'https://www.payumoney.com/payment/api/v3/getCompletePaymentDetails/'.$paymentid;
 
//Create a cURL handle.
$ch = curl_init($url);
 
//Create an array of custom headers.
$customHeaders = array(
    'Authorization: n5YZodrmY1ALMOIPrfjml3XyBnSjCLEfOv7k2g4DZ3o='
);
 
//Use the CURLOPT_HTTPHEADER option to use our
//custom headers.
curl_setopt($ch, CURLOPT_HTTPHEADER, $customHeaders);
 
//Set options to follow redirects and return output
//as a string.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
 
//Execute the request.
$result = curl_exec($ch);
 
echo "<pre>";
return( $result);
}
?>