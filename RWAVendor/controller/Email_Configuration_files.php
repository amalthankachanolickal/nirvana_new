<?php
function smtpmailer($to, $from, $from_name, $subject, $body) { 

global $error;
 $CompanyMail = new PHPMailer();  // create a new object
// $CompanyMail->IsSMTP(); // enable SMTP
 $CompanyMail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
 $CompanyMail->SMTPAuth = true;  // authentication enabled
// $CompanyMail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
//  $CompanyMail->Host = 'smtp.gmail.com';
//  $CompanyMail->Port = 465; 
//  $CompanyMail->Username = "website.admin@nirvanacountry.co.in";  
//  $CompanyMail->Password = "Innova2030";  
 
 $CompanyMail->Host = 'mail.nirvanacountry.co.in';
 $CompanyMail->Port = 25; 
 $CompanyMail->Username = "info@nirvanacountry.co.in";  
 $CompanyMail->Password = "uZZ1a5IUC(V2";  
 $CompanyMail->isHTML(true);           
 $CompanyMail->SetFrom($from, $from_name);
 $CompanyMail->Subject = $subject;
 $CompanyMail->Body = $body;
 $CompanyMail->AddAddress($to);
 $CompanyMail->addReplyTo('office.nrwa@nirvanacountry.co.in', 'no-reply');
$CompanyMail->addBCC('kushalbhasin@gmail.com');
$CompanyMail->addBCC('techlead@myrwa.online');
 if(!$CompanyMail->Send()) {
 $error = 'Mail error: '.$CompanyMail->ErrorInfo; 
 return false;
 } else {
 //print_r($CompanyMail);
 $error = 'Message sent!';
 return true;
 }
 
}

function smtpmailerwithattachment($to, $from, $from_name, $subject, $body, $filepath) { 
    global $error;
   $CompanyMail = new PHPMailer();  // create a new object
 //$CompanyMail->IsSMTP(); // enable SMTP
 $CompanyMail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
 $CompanyMail->SMTPAuth = true;  // authentication enabled
// $CompanyMail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
 $CompanyMail->Host = 'mail.nirvanacountry.co.in';
 $CompanyMail->Port = 25; 
 $CompanyMail->Username = "info@nirvanacountry.co.in";  
 $CompanyMail->Password = "uZZ1a5IUC(V2";  
 $CompanyMail->isHTML(true);           
 $CompanyMail->SetFrom($from, $from_name);
 $CompanyMail->Subject = $subject;
 $CompanyMail->Body = $body;
 $CompanyMail->AddAddress($to);
    $CompanyMail->AddAttachment($filepath);
     $CompanyMail->addReplyTo('office.nrwa@nirvanacountry.co.in', 'no-reply');
    $CompanyMail->addBCC('kushalbhasin@gmail.com');
    $CompanyMail->addBCC('techlead@myrwa.online');
    if(!$CompanyMail->Send()) {
    $error = 'Mail error: '.$CompanyMail->ErrorInfo; 
    return false;
    } else {
    //print_r($CompanyMail);
    $error = 'Message sent!';
    return true;
    }
   }



function smtpmailer1($toAddresss, $from, $from_name, $subject, $body) { 
global $error;
 $CompanyMail = new PHPMailer();  // create a new object
// $CompanyMail->IsSMTP(); // enable SMTP
 $CompanyMail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
 $CompanyMail->SMTPAuth = true;  // authentication enabled
// $CompanyMail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
 $CompanyMail->Host = 'mail.nirvanacountry.co.in';
 $CompanyMail->Port = 25; 
 $CompanyMail->Username = "info@nirvanacountry.co.in";  
 $CompanyMail->Password = "uZZ1a5IUC(V2";  
 $CompanyMail->isHTML(true);           
 $CompanyMail->SetFrom($from, $from_name);
 $CompanyMail->Subject = $subject;
 $CompanyMail->Body = $body;
 $CompanyMail->AddAddress($val);
while (list ($key, $val) = each ($toAddresss)) {
$CompanyMail->AddAddress($val);
 }
  $CompanyMail->addReplyTo('office.nrwa@nirvanacountry.co.in', 'no-reply');
    $CompanyMail->addBCC('kushalbhasin@gmail.com');
    $CompanyMail->addBCC('techlead@myrwa.online');
 if(!$CompanyMail->Send()) {
 $error = 'Mail error: '.$CompanyMail->ErrorInfo; 
 return false;
 } else {
 //print_r($CompanyMail);
 $error = 'Message sent!';
 return true;
 }
}

function smtpmailer2($to, $from, $from_name, $subject, $body) { 
 global $error;
 $CompanyMail = new PHPMailer();  // create a new object
 $CompanyMail->IsSMTP(); // enable SMTP
 $CompanyMail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
 $CompanyMail->SMTPAuth = true;  // authentication enabled
 $CompanyMail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
 $CompanyMail->Host = 'smtp.gmail.com';
 $CompanyMail->Port = 465; 
 $CompanyMail->Username = "website.admin@nirvanacountry.co.in";  
 $CompanyMail->Password = "Innova2030";  
 $CompanyMail->isHTML(true);           
 $CompanyMail->SetFrom($from, $from_name);
 $CompanyMail->Subject = $subject;
 $CompanyMail->Body = $body;
 $CompanyMail->AddAddress($to);
  $CompanyMail->addReplyTo('office.nrwa@nirvanacountry.co.in', 'no-reply');
    $CompanyMail->addBCC('kushalbhasin@gmail.com');
    $CompanyMail->addBCC('techlead@myrwa.online');
 if(!$CompanyMail->Send()) {
 $error = 'Mail error: '.$CompanyMail->ErrorInfo; 
 return false;
 } else {
 //print_r($CompanyMail);
 $error = 'Message sent!';
 return true;
 }
}

function smtpmailerviagmail($to, $from, $from_name, $subject, $body) { 
 global $error;
 $CompanyMail = new PHPMailer();  // create a new object
 $CompanyMail->IsSMTP(); // enable SMTP
 $CompanyMail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
 $CompanyMail->SMTPAuth = true;  // authentication enabled
 $CompanyMail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
 $CompanyMail->Host = 'smtp.gmail.com';
 $CompanyMail->Port = 465; 
 $CompanyMail->Username = "website.admin@nirvanacountry.co.in";  
 $CompanyMail->Password = "Innova2030";  
 $CompanyMail->isHTML(true);           
 $CompanyMail->SetFrom($from, $from_name);
 $CompanyMail->Subject = $subject;
 $CompanyMail->Body = $body;
 $CompanyMail->AddAddress($to);
 $CompanyMail->addReplyTo('office.nrwa@nirvanacountry.co.in', 'no-reply');
$CompanyMail->addBCC('kushalbhasin@gmail.com');
$CompanyMail->addBCC('techlead@myrwa.online');
 if(!$CompanyMail->Send()) {
 $error = 'Mail error: '.$CompanyMail->ErrorInfo; 
 return false;
 } else {
 //print_r($CompanyMail);
 $error = 'Message sent!';
 return true;
 }
}

?>