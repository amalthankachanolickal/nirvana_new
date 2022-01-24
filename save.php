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
$user_name=$ModelCall->utf8_decode_all($rec[0]['first_name']).' '.$ModelCall->utf8_decode_all($rec[0]['last_name']);
?>
<?php
//Get the base-64 string from data
$filteredData=substr($_POST['img_val'], strpos($_POST['img_val'], ",")+1);

//Decode the string
$unencodedData=base64_decode($filteredData);

//Save the image
file_put_contents('img.png', $unencodedData);

$html = "User Data : ".print_r($rec).
"Logged in ID -". $_SESSION['TEMP_LOGINID']."<br/> <img src='img.png'>";

$filename = "newpdffile";

// include autoloader
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

$output = $dompdf->output();
file_put_contents("file.pdf", $output);


?>