<?php 
ob_start();
session_start();
error_reporting(1);
//require_once('MysqliDb.php');
//$ModelCall = new MysqliDb ('localhost', 'innovzzy_Ncoln', 'Adminadmin!@123456', 'innovzzy__NCoIn');


require_once('PDODB.php');
$ModelCall = new PDODB('mysql', 'localhost', 'innovmly_nirvana', 'nirvana@1234', 'innovmly_nirvana');

// echo "Hai";exit;

$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';

define('SITE_URL', $protocol.'://master.innovatuslimited.com/nirvana/');
define('MAINADMIN','RWAVendor/');
define('ROOTACCESS','RootAccess/');
define('DIRECTORYACCESS','directoryImage/');
define('NOIMAGE','food-truck.png');
define("TWILIO_PHONE", '2403770820');
define('SMSUSERNAME','fcf162708');
define('SMSPASSWORD','18067');
define('SMSSENDER','FCFIND');
define('SMSURL','http://www.kit19.com/ComposeSMS.aspx?');
define('FBAPPID','146642739006772');
define('FBSECRETID','91f5c74b8267996b1879f2bdbdee28c1');
define('RETURN_URL','https://www.master.innovatuslimited.com/nirvana/');
define('FB_PERMISSIONS','publish_actions,email');
define('DOMAIN','https://www.master.innovatuslimited.com/nirvana/');
define('GOOGLE_MAP_KEY','AIzaSyCRcG8HLwk97Ys24u78JZFY3TkcmEV2mvQ');

define('FIRBASE_SERVER_KEY','AAAAXxhaMtY:APA91bFHUtBoF26ZfkWer3VwcQVH69hbwuuolKx0ZJVWbXMpcFNgOthCuiG0xgfgS78vSKB6fHxS2dDAokE_CDJZMLe6_7evu7-dUzETHlr2-JpUNcBw32O_wp5j8oR7fWWpHhuko0yt');

define('IPHONE_FIRBASE_SERVER_KEY','AAAAXxhaMtY:APA91bFHUtBoF26ZfkWer3VwcQVH69hbwuuolKx0ZJVWbXMpcFNgOthCuiG0xgfgS78vSKB6fHxS2dDAokE_CDJZMLe6_7evu7-dUzETHlr2-JpUNcBw32O_wp5j8oR7fWWpHhuko0yt');

	global $AdminSitting;
   global $AdminSittingPayment;
   global $getClientInfo;

$ModelCall->where("id", 2);
$ModelCall->orderBy("id","desc");
$getClientInfo = $ModelCall->get("tbl_clients");

function send_twilio_text_sms($from, $to, $body)
{
$id="AC8dbbb469207ba21c94668a5590cfeb1b";
$token="1d7b656225842a76efd308ec2361cbff";
$url = "https://api.twilio.com/2010-04-01/Accounts/".$id."/SMS/Messages";
$data = array (
    'From' => $from,
    'To' => $to,
    'Body' => $body,
);
$post = http_build_query($data);
$x = curl_init($url );
curl_setopt($x, CURLOPT_POST, true);
curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
curl_setopt($x, CURLOPT_POSTFIELDS, $post);
$y = curl_exec($x);
curl_close($x);
return $y;
}

function get_client_ip_raj() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }


// echo"<pre>"; print_r($getClientInfo);exit;
define('SITECOPYRIGHTS',$getClientInfo[0]['website_copyrights']);
define('SITELOGO','/client_logo/'.$getClientInfo[0]['client_logo']);
define('ADMINSETTINGID',$getClientInfo[0]['id']);
define('SITENAME',$getClientInfo[0]['client_company_name']);
define('SITEADDRESS',$getClientInfo[0]['client_address']);
define('WEBSITESUPPORTEMAIL',$getClientInfo[0]['client_support_email']);

?>
<?php
function convertToHoursMins11777777777($time, $format = '%02d:%02d') {
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}
function seo_friendly_url_creation_front($string){
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
    return trim(strtolower($string), '-');
}

?>
