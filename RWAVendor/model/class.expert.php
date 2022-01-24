<?php 
session_start();
error_reporting(0);
require_once('MysqliDb.php');
$ModelCall = new MysqliDb ('mysql', 'localhost', 'innovmly_nirvana', 'nirvana@1234', 'innovmly_nirvana');
define('DOMAIN','https://www.master.innovatuslimited.com/nirvana/');
define('AdminDirectory','RWAVendor/');
define('includes','include/');
define('NOIMAGE','noimage.png');
define('DATE',date('d l Y'));
define("TWILIO_PHONE", '2403770820');
define('SITE_URL','https://www.master.innovatuslimited.com/nirvana/');

if($_SESSION['ADMIN_CLIENT_LOGINID']!='')
{
$ModelCall->where("id", $_SESSION['ADMIN_CLIENT_LOGINID']);
$ModelCall->orderBy("id","asc");
$getAdminSubInfo = $ModelCall->get("tbl_client_sub_account");

$ModelCall->where("id", $getAdminSubInfo[0]['client_id']);
$ModelCall->orderBy("id","asc");
$getClientInfo = $ModelCall->get("tbl_clients");
}
define('SITECOPYRIGHTS',$getClientInfo[0]['website_copyrights']);
define('SITELOGO','http://myrwa.co/nirwana-img/home-logo.png');
//define('SITELOGO','/directoryImage/websiteImg/'.$AdminSitting[0]['sitelogo']);
define('ADMINSETTINGID',$getClientInfo[0]['id']);
define('SITENAME',$getClientInfo[0]['client_name']);
define('SITEADDRESS',$getClientInfo[0]['client_address']);
define('WEBSITESUPPORTEMAIL',$getClientInfo[0]['client_support_email']);

define('SMSUSERNAME','vijayverma');
define('SMSPASSWORD','9219170976');
define('SMSSENDER','STRUPS');
define('AUTH_KEY','224276AXuP5J75wuu5b3cf6f3');
define('SMSURL','http://api.msg91.com/api/sendhttp.php?');



define('GOOGLE_MAP_KEY','AIzaSyAXOwB9hf9Ciez-YbH7BuQm50KQtPqkmRY');

//define('GOOGLE_MAP_KEY','AIzaSyDNyevW_K3I8Nk_6Rg6jntytgi0W0rNu58');

define('FIRBASE_SERVER_KEY','AAAAYd_4Nc0:APA91bFNhHu-J2wmOKgHSYTU3iUXrWIh0YlwpZd4sU77Se25s7jggmUy7x_DJQ9dN7HnvcAdfuhRC5k2Q1PTCrf7YqN8PL91g6kwb8NqgGQstZdMdUj4FpZFynkkZWBVohhN7QKIXLZl');


function formMonth(){
  $month = strtotime(date('Y').'-'.date('m').'-'.date('j').' - 12 months');
  $end = strtotime(date('Y').'-'.date('m').'-'.date('j').' + 0 months');
  while($month < $end){
      $selected = (date('F', $month)==date('F'))? ' selected' :'';
      echo '<option'.$selected.' value="'.date('F', $month).'">'.date('F', $month).'</option>'."\n";
      $month = strtotime("+1 month", $month);
  }
}


function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

function convertToBTCFromSatoshi($value) {
    $BTC = $value / 100000000 ;
    return $BTC;
}
function formatBTC($value) {
    $value = sprintf('%.8f', $value);
    $value = rtrim($value, '0') . ' BTC';
    return $value;
}

function utf8_encode_all($dat) // -- It returns $dat encoded to UTF8 
{ 
  if (is_string($dat)) return utf8_encode($dat); 
  if (!is_array($dat)) return $dat; 
  $ret = array(); 
  foreach($dat as $i=>$d) $ret[$i] = utf8_encode_all($d); 
  return $ret; 
} 
/* ....... */ 

function utf8_decode_all($dat) // -- It returns $dat decoded from UTF8 
{ 
  if (is_string($dat)) return utf8_decode($dat); 
  if (!is_array($dat)) return $dat; 
  $ret = array(); 
  foreach($dat as $i=>$d) $ret[$i] = utf8_decode_all($d); 
  return $ret; 
} 

function seo_friendly_url($string){
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    return trim(strtolower($string), '-');
}
define('CURRENTDATE',date('Y-m-d'));

?>
