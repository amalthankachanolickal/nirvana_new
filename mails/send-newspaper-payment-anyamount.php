<?php  include('../model/class.expert.php');
      require('../mailin-lib/Mailin.php');
   
  
    $getrec = $ModelCall->rawQuery("SELECT * FROM `Wo_Users` where phone_valid=1 and user_status='Active' and (payment_consent is NULL or payment_consent=1) ORDER BY `Wo_Users`.`payment_consent` DESC
    ");
    echo "<pre>". count($getrec);
   //print_r($getrec);
   //exit(0);

    foreach($getrec as $rec){
   
  // // $toArray= array($value['email']=>$value['first_name']);
  //     if($rec['user_email']!='' && $rec['user_status']=='Active' && $rec['email_valid']=='1'){
  //     send_email_event_successful_transaction($rec);
  //     }

      if($rec['phone_number']!='' || $rec['phone_number']!=NULL){
        send_sms($rec);
      }
     // exit(0);
    }


    function send_email_event_successful_transaction($rec){
     // print_r($rec);
      $mailin = new Mailin("https://api.sendinblue.com/v2.0","GTVkQBjMmKb7h085");
        $toArray= array($rec['user_email']=>$rec['first_name']);
    //    $bccArray= array("nishthagupta@gmail.com"=>"Nishtha", $rec['user_email']=>$rec['firstname']);
        $data = array( "to" => $toArray,
        "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Pay your CAM Bills online",
           "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
      <tbody>
        <tr>
          <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
              <tbody>
                <tr>
                  <td height='80' align='center' valign='middle'><a href='' target='_blank' ></a></td>
                </tr>
                <tr>
                  <td>
                  <table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                      <tbody  style='background:#fff'>
                        <tr>
                          <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                        </tr>
                        <tr>
                          <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ></a></td>
                        </tr>
                        <tr>
                          <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$rec['user_title']." ".ucfirst($rec['first_name'])." ".ucfirst($rec['last_name']).",</strong> <span style='padding-bottom:4px;display:block'><a href='".DOMAIN."bills.php'>Click here </a> to  view & pay your CAM Bills online on <a href='".DOMAIN."'>Nirvana online </a> using Net Banking or Credit Cards.</span></p>
                          <ul style='text-align:justify'>
                            <li>ZERO Transaction Charges* for Net Banking and low charges for Credit Cards and Debit Cards</li>
                            <li>NIL Convenience Fees </li>
                            <li>You can also see your previous bills history online. </li>
                        </ul></td>
                        </tr>
                        <tr><td style='padding:5px 15px 5px 55px; background:#fff' align='left'>For ease of access your User Name and password is enclosed here </td>
                        </tr>
                        <tr>
                          <td style='padding:5px 15px 5px 55px; background:#fff' align='left'>Username:". $rec['user_name']."</td>
                        </tr>
                        <tr>
                          <td style='padding:5px 15px 5px 55px; background:#fff' align='left' valign='middle'>Password :".$rec['password']." </td>
                          
                        </tr><tr>
                        <td style='padding:15px 15px 15px 55px; background:#fff'>
                        <a  href='".DOMAIN."bills.php' style=' display:inline-block;padding:12px 10px;margin-left:150px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff; border-radius: 20px; background:#0badf2' target='_blank' align='center' >Pay Now</a>
                       </td>
                       </tr>
                       </td></tr>
                       <tr><td style='padding:15px 15px 15px 55px; background:#fff'>
                       <p> Please note that in the previous bill, (Bill Due Date 15th Jan 2020), due to an error  for a few houses, the  quarter's DG reading did not get charged. The same was added to the dues  and if they remain due, it’s been added to to this quarter in the Bills Due Date 20th Mar 2020 . 
                       <br><br>
                       Please note that in case you cleared all your dues until last month, in time, other than these charges, and the system has levied a Surcharge for Late Payment, then the same is being reversed by the office shortly and your account outstanding will reflect the same. 
                       <br><br>
                       We apologise for the error and thank you for your cooperation. <br>
                      </p>
                       </td></tr>
                       <tr><td style='padding:15px 15px 15px 55px; background:#fff'>
                          <p> <u>Unreconciled Payments</u>
                          </p><p>
                          Please also note that the some past receipts are not yet posted to the User Accounts due to insufficient information. <a href='https://www.nirvanacountry.co.in/UnRecon-converted.pdf'>Click Here </a>to view the same. If these payments have been made by you then kindly click on the same to email us on office.nrwa@nirvanacountry.co.in the following details
                          </p>
                          <ul style='text-align:justify'>
                          a) Your Block Name, House Numbers Floor Number <br>
                          b) Excerpt of Your Bank Statement with Transaction Ref Number. <br>
                          c) Date of Payment  <br>
                          d) Payment Amount  <br>
                          </ul>
                          <br>
                          Basis the same, we will update your account and intimate you of the same. 
                          <br>
                      
                        <tr>
                          <td align='left' valign='middle' style='padding:15px 15px 15px 55px; background:#fff'>Warm Regards,<br>NRWA Office
                          <br><a  href='mailto:office.nrwa@nirvanacountry.co.in'>office.nrwa@nirvanacountry.co.in</a>
                          <br><a  href='".DOMAIN."'>www.nirvanacountry.co.in</a></td>
                        </tr>
                        <tr>
                          <td align='center' valign='middle'>&nbsp;</td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
                <tr>
                  <td height='30'>&nbsp;</td>
                </tr>
                <tr>
                  <td style='border-top:1px solid #ccc;border-bottom:1px solid #ccc;padding:2px 0'><table width='100%' border='0' cellspacing='0' cellpadding='0'>
                     
                            </table></td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table></td>
        </tr>
      </tbody>
    </table>"
     );
            $data1 = array( "to" => $toArray,
            "from" => array("office.nrwa@nirvanacountry.co.in", "NRWA Office"),
            "subject" => "Pay your CAM Bills online",
            "html" => "<table width='100%' border='0' cellspacing='0' cellpadding='0' style='font-size:14px;font-family:Arial,Helvetica,sans-serif'>
      <tbody>
        <tr>
          <td style='background:#f3f4fe'><table width='600' border='0' align='center' cellpadding='0' cellspacing='0' style='width:600px;margin:0 auto'>
              <tbody>
                <tr>
                  <td height='80' align='center' valign='middle'><a href='' target='_blank' ></a></td>
                </tr>
                <tr>
                  <td><table width='100%' border='0' cellspacing='0' cellpadding='0' style='background:#fff'>
                      <tbody>
                        <tr>
                          <td align='center' valign='middle' style='background:#37a000; height:30px;'></td>
                        </tr>
                        <tr>
                          <td align='center' valign='middle'><a  style='display:inline-block' target='_blank' ></a></td>
                        </tr>
                        <tr>
                        <td style='padding:15px 15px 15px 55px' align='left' valign='middle'><p><strong style='padding-bottom:9px;display:block;font-size:16px'>Dear ".$rec['user_title']." ".ucfirst($rec['first_name'])." ".ucfirst($rec['last_name']).",</strong> <span style='padding-bottom:4px;display:block'><a href='".DOMAIN."bills.php'>Click here </a> to  view & pay your CAM Bills online on <a href='".DOMAIN."'>Nirvana online </a> using Net Banking or Credit Cards.</span></p>
                        <ul style='text-align:justify'>
                          <li>ZERO Transaction Charges* for Net Banking and low charges for Credit Cards and Debit Cards</li>
                          <li>NIL Convenience Fees </li>
                          <li>You can also see your previous bills history online. </li>
                      </ul></td>
                        </tr>
                        </tr>
                        <tr>
                        <td style='padding:15px 15px 15px 55px; background:#fff'>
                        <a  href='".DOMAIN."bills.php' style=' display:inline-block;padding:12px 10px;margin-left:150px;text-decoration:none;font-size:14px;font-weight:bold;color:#fff; border-radius: 20px; background:#0badf2' target='_blank' >Pay Now</a>
                       </td>
                       </tr>
                       <tr><td style='padding:15px 15px 15px 55px; background:#fff'>
                       <p>  Please note that in the previous bill, (Bill Due Date 15th Jan 2020), due to an error  for a few houses, the  quarter's DG reading did not get charged. The same was added to the dues  and if they remain due, it’s been added to to this quarter in the Bills Due Date 20th Mar 2020 . 
                       <br><br>
                       Please note that in case you cleared all your dues until last month, in time, other than these charges, and the system has levied a Surcharge for Late Payment, then the same is being reversed by the office shortly and your account outstanding will reflect the same. 
                       <br><br>
                       We apologise for the error and thank you for your cooperation. <br><br>
                      </p>
                       </td></tr>
                       <tr><td style='padding:15px 15px 15px 55px; background:#fff'>
                          <p> <u>Unreconciled Payments</u>
                          </p><p>
                          Please also note that the some past receipts are not yet posted to the User Accounts due to insufficient information about the payments received.  <a href='https://www.nirvanacountry.co.in/UnRecon-converted.pdf'>Click Here </a>to view the same. If these payments have been made by you then kindly click on the same to email us on office.nrwa@nirvanacountry.co.in the following details
                          </p>
                          <ul>
                          a) Your Block Name, House Numbers Floor Number <br>
                          b) Excerpt of Your Bank Statement with Transaction Ref Number. <br>
                          c) Date of Payment  <br>
                          d) Payment Amount  <br>
                          </ul>
                          <br>
                          Basis the same, we will update your account and intimate you of the same.  
                          <br>
                          </td></tr>
                         
                        <tr>
                        <td align='left' valign='middle' style='padding:15px 15px 15px 55px; background:#fff'>Warm Regards,<br>NRWA Office
                        <br><a  href='mailto:office.nrwa@nirvanacountry.co.in'>office.nrwa@nirvanacountry.co.in</a>
                        <br><a  href='".DOMAIN."'>www.nirvanacountry.co.in</a></td>
                        </tr>
                        <tr>
                          <td align='center' valign='middle'>&nbsp;</td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td style='font-size:12px;color:#8c8c8c;line-height:18px' align='center' valign='middle'></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table></td>
        </tr>
      </tbody>
    </table>"
   );
   print_r($toArray);
      if($rec['first_login']){
        print_r($mailin->send_email($data1));
        } else{
        print_r($mailin->send_email($data));      
       }
    }

    function send_sms($value){
      $SENDER ='NRWAOB';
      $smstype='TRANS';
      $apikey = '4a03ec2a5ef64eb2965bb95fe79615a2';
      $message= 'Dear '.$value['first_name'].' '.$value['last_name'].', You can also pay your newspaper bill online with Credit Cards or Net Banking with NIL Transaction changes. https://bit.ly/2JKx5gS .';
      if($value['first_login']==0){
      $message= $message.'  Login: '.$value['user_name'].' Pwd: '.$value['password'];
      }
     $message= $message.'System allows you to PAY ANY AMOUNT, as per your decision. No Bill data is collected to provide you for this facility. You can also view and pay your outstanding CAM Bills  here https://bit.ly/3dzZHXx Warm Regards, NRWA Office';

     echo $message. '<br>';

   $numbers=$value['phone_number'];
   // $numbers='9560889608';
    // $numbers='9560889608, 8013333816, 9871349731';
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

    ?>