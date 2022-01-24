<?php

function trackingstart($var){

$myfile = fopen("loggers_trackers.txt", "a");
$txt = "<br></br> <br></br> <br></br>";
fwrite($myfile, $txt);
$txt =$var."<br>";
fwrite($myfile, $txt);
 
    
}


function trackit($var,$tracking){
    echo "you";
if($tracking=='ON'){
$var=get_defined_vars(); 
print_r($var);
exit;

fwrite($myfile, print_r($var));
    
}
exit;
    
}
function trackingstop(){


$txt = "<br></br> //////////////  <br></br>";
fwrite($myfile, $txt);
fclose($myfile);

    
}

?>