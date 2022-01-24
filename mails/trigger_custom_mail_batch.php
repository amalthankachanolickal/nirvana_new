<?php  include('../model/class.expert.php');
require '../BackgroundProcess.php';
     error_reporting(E_ALL);
    $proc = new BackgroundProcess('php ./sending_custom_mail.php');

$pid = $proc->getProcessId();
$output = $proc->getOutput();


echo "Process id: " . $pid . "\n";

print_r($output);
    ?>