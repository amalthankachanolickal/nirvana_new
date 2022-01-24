<?php include('model/class.expert.php');
$ModelCall->where("page_name","discussion-forum");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getDiscussionInfo = $ModelCall->get("tbl_cms_management");

$ModelCall->where("page_name","advertise");
$ModelCall->where("client_id", $getClientInfo[0]['id']);
$ModelCall->orderBy("id","desc");
$getCMSAdvertiseInfo = $ModelCall->get("tbl_cms_management");  
//include('CheckCustomerLogin.php');

$ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['TEMP_LOGINID']));

//$ModelCall->where("website_status ='1'");
$ModelCall->orderBy("user_id","asc");
$rec = $ModelCall->get("temp_car_stickers");
//print_r($rec);

?>
<?php

$html = '<!DOCTYPE html>
<html>

<body class="sign-in">

                  <form method="post" enctype="multipart/form-data" >
                  <table   width="600" id="sig" cellspacing="10" cellpadding="10" border-spacing="2" style="margin:10;padding:10;">
                  <tr><td><img src="https://www.nirvanacountry.co.in/RWAVendor/client_logo/5c4af13edde8dhome-logo.png" alt="" width="150px"></td>
                  <td><h3>Application for Car Stickers </h3></tr>
                  </table>
                     <table  width="100%"  cellspacing="10" cellpadding="10" border-spacing="2" style="margin:10;padding:10;">
                     <tr  bgcolor="#f1eee7"><td width="20%">Title</td>
                     <td>First Name </td>
                     <td>Middle Name</td>
                     <td>Last Name</td>
                     </tr>
                     <tr bgcolor="#d3d7de"><td >'.
                     $rec[0]['user_title'].'</td>
                     <td>'.
                     $rec[0]['first_name'].' </td>
                     <td>'.
                     $rec[0]['middle_name'].'</td>
                     <td>'.
                     $rec[0]['last_name'].'</td>
                     </tr>
                     <tr  bgcolor="#f1eee7"><td colspan="2">Block Name</td>
                     <td>House Number </td>
                     <td>Floor Number</td>
                     </tr>
                     <tr bgcolor="#d3d7de"><td colspan="2">'.
                     $rec[0]['block_id'].'</td>
                     <td>'.
                     $rec[0]['house_number_id'].' </td>
                     <td>'.
                     $rec[0]['floor_number'].'</td>
                     </tr>
                     <tr><td colspan="2" bgcolor="#f1eee7" > Member Type</td>
                     <td  bgcolor="#d3d7de" colspan="2">'.
                     $rec[0]['owner_tenant'].' </td>
                     <td>&nbsp;</td>
                     </tr>
                     <tr><td colspan="2" bgcolor="#f1eee7" >Mobile</td>
                     <td bgcolor="#d3d7de" colspan="2">'.
                     $rec[0]['mobile'].'</td></tr>
                     <tr><td colspan="2" bgcolor="#f1eee7" >Email Address</td>
                     <td bgcolor="#d3d7de" colspan="2">'.
                     $rec[0]['email_id'].'</td></tr>
                     <tr><td colspan="2" bgcolor="#f1eee7" >Landline</td>
                     <td bgcolor="#d3d7de" colspan="2">'.
                     $rec[0]['landline_user'].'</td></tr>

                     <tr><td bgcolor="#f1eee7"  colspan="2" > Owner Name</td>
                     <td bgcolor="#d3d7de" colspan="2">'. $rec[0]['owner_name'].'</td>
                     </tr>
                     <tr><td bgcolor="#f1eee7"  colspan="2">Owner Address</td>
                     <td bgcolor="#d3d7de" colspan="2">'. $rec[0]['owner_address'].'</td>
                     </tr>
                     <tr><td bgcolor="#f1eee7"  colspan="2">Mobile</td>
                     <td bgcolor="#d3d7de" colspan="2">'. $rec[0]['owner_mobile'].'</td>
                     </tr>
                     <tr><td bgcolor="#f1eee7"  colspan="2"> Email Address </td>
                     <td bgcolor="#d3d7de" colspan="2">'. $rec[0]['owner_email_id'].'</td>
                     </tr>
                     <tr><td bgcolor="#f1eee7"  colspan="2">Landline</td>
                     <td bgcolor="#d3d7de" colspan="2">'. $rec[0]['owner_landline'].'</td>
                     </tr>
                     <tr bgcolor="#f1eee7">
                     <th>Car Number</th>
                     <th>Make/Model </th>
                     <th>Colour </th>
                     <th>Sticker # </th>
                     </tr>
                      <tr bgcolor="#d3d7de" > <td >'. $rec[0]['car_number'].'</td>
                      <td>'. $rec[0]['make_model'].'</td>
                      <td>'. $rec[0]['color'].'</td>
                      <td>&nbsp;</td>
                      </tr> 
                    
                      <tr><td bgcolor="#f1eee7"  colspan="4">Date of Application : '. date("j/M/Y").'</td>
                    
                     </tr>
                     </table>
                    
                  </form>
                
</body>
</html>';
$filename = $_SESSION['TEMP_LOGINID'];

// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$options = new Options();
$options->set('isRemoteEnabled', TRUE);
$dompdf = new Dompdf($options);
$contxt = stream_context_create([ 
    'ssl' => [ 
        'verify_peer' => FALSE, 
        'verify_peer_name' => FALSE,
        'allow_self_signed'=> TRUE
    ] 
]);
$dompdf->setHttpContext($contxt);
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename);

// $output = $dompdf->output();
// file_put_contents("file.pdf", $output);


