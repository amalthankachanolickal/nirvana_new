<?php include('model/class.expert.php'); 

$Url=$_SERVER['REQUEST_URI'];
if($_SESSION['UR_LOGINID']==''){
  header("location:".SITE_URL."login_signup.php?actionResult=logindocrequired&back_tracker=".$Url);
}else{
    $Id = $_SESSION['UR_LOGINID'];
 $user_data = $ModelCall->rawQuery("SELECT * FROM Wo_Users u LEFT JOIN covid_vaccine_form c ON c.user_id = u.user_id WHERE u.user_id = '$Id'");
 
}

if(isset($_POST["submit"])){
    
    
    if($_POST["title"] == 'Mr.'){
     $_POST["gender"] = 'male';   
    }else if($_POST["title"] == 'Mrs.'){
     $_POST["gender"] = 'female';   
    }else if($_POST["title"] == 'Miss.'){
     $_POST["gender"] = 'female';   
    }
    
    $data = array(
    'user_id' => $_SESSION['UR_LOGINID'],
	'title' => $_POST["title"],
	'fname' => $_POST["fname"],
	'mname' => $_POST["mname"],
	'lname' => $_POST["lname"],
	'dob' => $_POST["dob"],
	"age" => $_POST["age"],
	"gender" => $_POST["gender"],
	"document_type" => $_POST["document_type"],
	"document_path" =>$filename,
	"document_number" => $_POST["document_no"],
	"isd" => $_POST["isd_1"],
	"mobile" => $_POST["mobile"],
	"email" => $_POST["email"],
	"house" => $_POST["house_number"],
	"block" => $_POST["block_prime"],
	"floor" => $_POST["floor_prime"],
	"city" => $_POST["city"],
	"pincode" => $_POST["pincode"],
	"address" => $_POST["address"],
	"status" => 1,
	"special_category" => $_POST["spcl_category"],
	"created_by" => $_SESSION['UR_LOGINID'],
	"updated_by" => $_SESSION['UR_LOGINID']);
	
	
     function sendMailtoUser($to) {
	$to = $to;
  /*$to = 'kushalbhasin@gmail.com,techlead@myrwa.onli
  ne,customers@myrwa.online';*/
  $subject = 'COVID Vaccine Registration';
 
   $from = 'website.admin@nirvanacountry.co.in';
  
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
  $headers .= 'Bcc: kushalbhasin@gmail.com' . "\r\n";
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= "
  <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
            <p>Dear Sir/Madam,</p> 
            <p>Thank you for successfully registering the interest in getting the COVID Vaccine for the following persons.  
            These details will be shared with the UPHC, Tigra. Further, as per their program and plan, they will contact the persons directly.</p>
            
            <table>
            <tr>
            <td>Name</td><td>: ".$_POST["title"]." ".$_POST["fname"]." ".$_POST["mname"]." ".$_POST["lname"]."</td>
            </tr>
            <p>Family Members<p>";
            if(!empty($_POST["fname_1"])){
                $message .= "<tr><td>Name</td><td>: ".$_POST["title_1"]." ".$_POST["fname_1"]." ".$_POST["mname_1"]." ".$_POST["lname_1"]."</td></tr>";
            }
            if(!empty($_POST["fname_2"])){
                $message .= "<tr><td>Name</td><td>: ".$_POST["title_2"]." ".$_POST["fname_2"]." ".$_POST["mname_2"]." ".$_POST["lname_2"]."</td></tr>";
            }
            if(!empty($_POST["fname_3"])){
                $message .= "<tr><td>Name</td><td>: ".$_POST["title_3"]." ".$_POST["fname_3"]." ".$_POST["mname_3"]." ".$_POST["lname_3"]."</td></tr>";
            }
            if(!empty($_POST["fname_4"])){
                $message .= "<tr><td>Name</td><td>: ".$_POST["title_4"]." ".$_POST["fname_4"]." ".$_POST["mname_4"]." ".$_POST["lname_4"]."</td></tr>";
            }
            if(!empty($_POST["fname_5"])){
                $message .= "<tr><td>Name</td><td>: ".$_POST["title_5"]." ".$_POST["fname_5"]." ".$_POST["mname_5"]." ".$_POST["lname_5"]."</td></tr>";
            }
            
            if(empty($_POST["fname_1"]) && empty($_POST["fname_2"]) && empty($_POST["fname_3"]) && empty($_POST["fname_4"]) && empty($_POST["fname_5"])){
                $message .= "<tr><td>Na Family details Available</td></tr>";
            }
            
            $message .="<tr>
            </table>
            <p>Please <a href='".SITE_URL.'CovidVaccineForm.php'."'>Click Here</a> to Edit</p>
           
            <p>Warm Regards,</p> 
            NRWA Office <br>
            www.nirvanacountry.co.in <br></span>
                    </span></p></td></tr></tbody></table>";

  mail($to, $subject, $message, $headers);
}

function sendMailtoAdmin($frm) {
    
    
    if($_POST["floor_prime"] == 'NA'){
	    $_POST["floor_prime"] = '';
	}elseif($_POST["floor_prime"] == 'GF'){
	    $_POST["floor_prime"] = 'Ground Floor';
	}elseif($_POST["floor_prime"] == 'FF'){
	    $_POST["floor_prime"] = '1st Floor';
	}
	elseif($_POST["floor_prime"] == 'SF'){
	    $_POST["floor_prime"] = '2nd Floor';
	}elseif($_POST["floor_prime"] == 'TF'){
	    $_POST["floor_prime"] = '3rd Floor';
	}
    
    
    if($_POST["block_prime"] == '1'){
        
        $_POST["block_prime"] = 'Aspen Greens';
    }elseif($_POST["block_prime"] == '2'){
        $_POST["block_prime"] = 'Birch Court';
    }elseif($_POST["block_prime"] == '3'){
        $_POST["block_prime"] = 'Cedar Crest';
    }
    elseif($_POST["block_prime"] == '4'){
        $_POST["block_prime"] = 'Deerwood Estate';
    }
    elseif($_POST["block_prime"] == '5'){
        $_POST["block_prime"] = 'E Space';
    }
    
    
	$to = 'website.admin@nirvanacountry.co.in';
	
  $subject = 'COVID Vaccine Registration';
 
   $from = $frm;
  
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: '.$from."\r\n".
  $headers .= 'Bcc: kushalbhasin@gmail.com' . "\r\n";
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();

  $message = '<html><body>';

  $message .= "
  <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' 
            style='border-collapse:collapse;'>
            <tbody><tr><td valign='top' style='word-break:break-word;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left;padding:0px 18px 9px'>
            <p style='margin:10px 0px;padding:0px;color:rgb(32,32,32);font-family:Helvetica;font-size:16px;line-height:24px;text-align:left'>
            <span>
            <p>Dear Sir,</p> 
            <p>Below are the details of New Registration for Covid Vaccine. </p>
            
            <table>
            <tr>
            <td>Name</td><td>: ".$_POST["title"]." ".$_POST["fname"]." ".$_POST["mname"]." ".$_POST["lname"]."</td>
            <tr>
            
            </table>
            
           
            <p>Warm Regards,</p> 
            NRWA Office <br>
            www.nirvanacountry.co.in <br></span>
                    </span></p></td></tr></tbody></table>";

  mail($to, $subject, $message, $headers);
}
    
    /*$checkifexists = $ModelCall->rawQuery("SELECT user_id FROM covid_vaccine_form WHERE user_id = '$Id' ");
    $Count = count($checkifexists);
   
   if($Count == 0){
       $result = $ModelCall->insert('covid_vaccine_form',$data);
   }else if($Count == 1){
       $ModelCall->where("user_id", $ModelCall->utf8_decode_all($_SESSION['UR_LOGINID']));
       $result =  $ModelCall->update ('covid_vaccine_form', $data);
   }*/
   
   $result = $ModelCall->insert('covid_vaccine_form',$data);
       
       if(!empty($_POST['name_'])){
           
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','0','','".$_POST['name_']."','','',
                                             '".$_POST['dob_']."','".$_POST['age_']."','','".$_POST['document_type_']."','".$_POST['document_num_']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
        if(!empty($_POST['name_1'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','1','','".$_POST['name_1']."','','',
                                             '".$_POST['dob_1']."','".$_POST['age_1']."','','".$_POST['document_type_1']."','".$_POST['document_num_1']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_2'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','2','','".$_POST['name_2']."','','',
                                             '".$_POST['dob_2']."','".$_POST['age_2']."','','".$_POST['document_type_2']."','".$_POST['document_num_2']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_3'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','3','','".$_POST['name_3']."','','',
                                             '".$_POST['dob_3']."','".$_POST['age_3']."','','".$_POST['document_type_3']."','".$_POST['document_num_3']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_4'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','4','','".$_POST['name_4']."','','',
                                             '".$_POST['dob_4']."','".$_POST['age_4']."','','".$_POST['document_type_4']."','".$_POST['document_num_4']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_5'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','5','','".$_POST['name_5']."','','',
                                             '".$_POST['dob_5']."','".$_POST['age_5']."','','".$_POST['document_type_5']."','".$_POST['document_num_5']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_6'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','6','','".$_POST['name_6']."','','',
                                             '".$_POST['dob_6']."','".$_POST['age_6']."','','".$_POST['document_type_6']."','".$_POST['document_num_6']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_7'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','7','','".$_POST['name_7']."','','',
                                             '".$_POST['dob_7']."','".$_POST['age_7']."','','".$_POST['document_type_7']."','".$_POST['document_num_7']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_8'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','8','','".$_POST['name_8']."','','',
                                             '".$_POST['dob_8']."','".$_POST['age_8']."','','".$_POST['document_type_8']."','".$_POST['document_num_8']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_9'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','9','','".$_POST['name_9']."','','',
                                             '".$_POST['dob_9']."','".$_POST['age_9']."','','".$_POST['document_type_9']."','".$_POST['document_num_9']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_10'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','10','','".$_POST['name_10']."','','',
                                             '".$_POST['dob_10']."','".$_POST['age_10']."','','".$_POST['document_type_10']."','".$_POST['document_num_10']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_11'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','11','','".$_POST['name_1']."','','',
                                             '".$_POST['dob_11']."','".$_POST['age_11']."','','".$_POST['document_type_11']."','".$_POST['document_num_11']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_12'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','12','','".$_POST['name_12']."','','',
                                             '".$_POST['dob_12']."','".$_POST['age_12']."','','".$_POST['document_type_12']."','".$_POST['document_num_12']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_13'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','13','','".$_POST['name_13']."','','',
                                             '".$_POST['dob_13']."','".$_POST['age_13']."','','".$_POST['document_type_13']."','".$_POST['document_num_13']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_14'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','14','','".$_POST['name_14']."','','',
                                             '".$_POST['dob_14']."','".$_POST['age_14']."','','".$_POST['document_type_14']."','".$_POST['document_num_14']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_15'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','15','','".$_POST['name_15']."','','',
                                             '".$_POST['dob_15']."','".$_POST['age_15']."','','".$_POST['document_type_15']."','".$_POST['document_num_15']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_16'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','16','','".$_POST['name_16']."','','',
                                             '".$_POST['dob_16']."','".$_POST['age_16']."','','".$_POST['document_type_16']."','".$_POST['document_num_16']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_17'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','17','','".$_POST['name_17']."','','',
                                             '".$_POST['dob_17']."','".$_POST['age_17']."','','".$_POST['document_type_17']."','".$_POST['document_num_17']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_18'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','18','','".$_POST['name_18']."','','',
                                             '".$_POST['dob_18']."','".$_POST['age_18']."','','".$_POST['document_type_18']."','".$_POST['document_num_18']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       if(!empty($_POST['name_19'])){   
           $result11 = $ModelCall->rawQuery("INSERT INTO covidvaccine_fam (user_id,mem_no,title,fname,mname,lname,dob,age,gender,document_type,document_no,document_path,created_by)
                                             values('".$_SESSION['UR_LOGINID']."','19','','".$_POST['name_19']."','','',
                                             '".$_POST['dob_19']."','".$_POST['age_19']."','','".$_POST['document_type_19']."','".$_POST['document_num_19']."','',
                                             '".$_SESSION['UR_LOGINID']."')");
       }
       
       
  
   
   	$resultu = $ModelCall->rawQuery("UPDATE Wo_Users SET `covid_vaccine` = 1 WHERE user_id = '$Id' ");
      
	
	sendMailtoUser($_POST["email"]);
	sendMailtoAdmin($_POST["email"]);
	header("Location:CovidVaccineForm.php?actionResult=Success");
	header("Location:index.php?actionResult=Success");
	
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title><?php echo SITENAME?> - Car Sticker Application Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/line-awesome-font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= SITE_URL ?>css/responsive.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap css -->
    <link href="<?= SITE_URL ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!--Font Awesome css -->
    <link href="<?= SITE_URL ?>css/font-awesome.min.css" rel="stylesheet">
    <!-- Owl Carousel css -->
    <link href="<?= SITE_URL ?>assets/css/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= SITE_URL ?>assets/css/owl.transitions.css" rel="stylesheet">
    <!-- Site css -->
    <link href="<?= SITE_URL ?>assets/css/home-style.css" rel="stylesheet">
    <!-- Responsive css -->
    <link href="<?= SITE_URL ?>assets/css/responsive.css" rel="stylesheet">
    <!-- Print  css -->
    <link rel="stylesheet" href="<?= SITE_URL ?>css/print.css" type="text/css" media="print"/>
    
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <!--  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>-->
    
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <!--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-55877669-17"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-55877669-17');
    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6246358526663438",
    enable_page_level_ads: true
    });
    </script>
    <!-------------get user data via javascript-------------->
    <script>
    function showUser(blk,hno,flr,type) {
    if (blk == "" || hno == "" || flr == "" || type == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
    } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("txtHint").innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET","getuser_carsticker.php?block="+blk+"&house="+hno+"&floor="+flr+"&type="+type,true);
    xmlhttp.send();
    }
    }
    </script>
    <!---------------------end of javascript----------------------->
    <?php /*?>•Global Site Tag User ID Tag gtag('set', {'user_id': 'USER_ID'}); // Set the user ID using signed-in user_id.
    •Universal Analytics Tracking Code
    •ga('set', 'userId', 'USER_ID'); // Set the user ID using signed-in user_id.
    •Google Analytics Code<?php */?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-55877669-17"></script>
    <script>
    function validateEmail(emailField){
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if (reg.test(emailField.value) == false)
    {
    alert('Invalid Email Address');
    emailField.value ='';
    return false;
    }
    return true;
    }
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-55877669-17');
    </script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-6246358526663438",
    enable_page_level_ads: true
    });
    </script>
    <script type="text/javascript">
    function isNumberKey(evt)
    {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    {
    return false;
    }
    return true;
    }
    function alpha(e) {
    var k;
    document.all ? k = e.keyCode : k = e.which;
    return ((k > 64 && k < 91) || (k > 96 && k < 123) || (k == 8) || (k == 32));
    }
    </script>
    <script type="text/javascript">
    function confirmPass() {
    var pass = document.getElementById("user_pass").value
    var confPass = document.getElementById("cuser_pass").value
    if(pass != confPass) {
    alert('Wrong confirm password !');
    document.getElementById("cuser_pass").value="";
    }
    }
    function validateform()
    {
    var captcha_response = grecaptcha.getResponse();
    if(captcha_response.length == 0)
    {
    alert('Please select captcha');
    return false;
    }
    else
    {
    return true;
    }
    }
    </script>
    <SCRIPT language="javascript">
    function addRow(tableID) {
        
        var table = document.getElementById(tableID);
        var rowCount = table.rows.length;
        var cuurow =  rowCount-1;
        if(document.getElementById("name_").value == '' || document.getElementById("age_").value == '' || document.getElementById("document_type_").value == '' || document.getElementById("document_num_").value == ''){
            alert('Please Fill 1st Family Member  Details');
        }
        else{
              if((rowCount == 3) &&  (document.getElementById("name_1").value == '' || document.getElementById("age_1").value == '' || document.getElementById("document_type_1").value == '' || document.getElementById("document_num_1").value == '')){
                   alert('Please Fill 2nd Family Member Details');
                   return;
              }
         else if((rowCount == 4) &&  (document.getElementById("name_2").value == '' || document.getElementById("age_2").value == '' || document.getElementById("document_type_2").value == '' || document.getElementById("document_num_2").value == '')){
                   alert('Please Fill 3rd Family Member Details');
                   return;
              }
        else if((rowCount == 5) &&  (document.getElementById("name_3").value == '' || document.getElementById("age_3").value == '' || document.getElementById("document_type_3").value == '' || document.getElementById("document_num_3").value == '')){
                   alert('Please Fill 4th Family Member Details');
                   return;
              }
        else if((rowCount == 6) &&  (document.getElementById("name_4").value == '' || document.getElementById("age_4").value == '' || document.getElementById("document_type_4").value == '' || document.getElementById("document_num_4").value == '')){
                   alert('Please Fill 5th Family Member Details');
                   return;
              }
              else if((rowCount == 7) &&  (document.getElementById("name_5").value == '' || document.getElementById("age_5").value == '' || document.getElementById("document_type_5").value == '' || document.getElementById("document_num_5").value == '')){
                   alert('Please Fill 6th Family Member Details');
                   return;
              }
              else if((rowCount == 8) &&  (document.getElementById("name_6").value == '' || document.getElementById("age_6").value == '' || document.getElementById("document_type_6").value == '' || document.getElementById("document_num_6").value == '')){
                   alert('Please Fill 7th Family Member Details');
                   return;
              }
              else if((rowCount == 9) &&  (document.getElementById("name_7").value == '' || document.getElementById("age_7").value == '' || document.getElementById("document_type_7").value == '' || document.getElementById("document_num_7").value == '')){
                   alert('Please Fill 8th Family Member Details');
                   return;
              }
              else if((rowCount == 10) &&  (document.getElementById("name_8").value == '' || document.getElementById("age_8").value == '' || document.getElementById("document_type_8").value == '' || document.getElementById("document_num_8").value == '')){
                   alert('Please Fill 9th Family Member Details');
                   return;
              }
              else if((rowCount == 11) &&  (document.getElementById("name_9").value == '' || document.getElementById("age_9").value == '' || document.getElementById("document_type_9").value == '' || document.getElementById("document_num_9").value == '')){
                   alert('Please Fill 10th Family Member Details');
                   return;
              }
              else if((rowCount == 12) &&  (document.getElementById("name_10").value == '' || document.getElementById("age_10").value == '' || document.getElementById("document_type_10").value == '' || document.getElementById("document_num_10").value == '')){
                   alert('Please Fill 11th Family Member Details');
                   return;
              }
              else if((rowCount == 13) &&  (document.getElementById("name_11").value == '' || document.getElementById("age_11").value == '' || document.getElementById("document_type_11").value == '' || document.getElementById("document_num_11").value == '')){
                   alert('Please Fill 12th Family Member Details');
                   return;
              }
              else if((rowCount == 14) &&  (document.getElementById("name_12").value == '' || document.getElementById("age_12").value == '' || document.getElementById("document_type_12").value == '' || document.getElementById("document_num_12").value == '')){
                   alert('Please Fill 13th Family Member Details');
                   return;
              }
              else if((rowCount == 15) &&  (document.getElementById("name_13").value == '' || document.getElementById("age_13").value == '' || document.getElementById("document_type_13").value == '' || document.getElementById("document_num_13").value == '')){
                   alert('Please Fill 14th Family Member Details');
                   return;
              }
              else if((rowCount == 16) &&  (document.getElementById("name_14").value == '' || document.getElementById("age_14").value == '' || document.getElementById("document_type_14").value == '' || document.getElementById("document_num_14").value == '')){
                   alert('Please Fill 15th Family Member Details');
                   return;
              }
              else if((rowCount == 17) &&  (document.getElementById("name_15").value == '' || document.getElementById("age_15").value == '' || document.getElementById("document_type_15").value == '' || document.getElementById("document_num_15").value == '')){
                   alert('Please Fill 16th Family Member Details');
                   return;
              }
              else if((rowCount == 18) &&  (document.getElementById("name_16").value == '' || document.getElementById("age_16").value == '' || document.getElementById("document_type_16").value == '' || document.getElementById("document_num_16").value == '')){
                   alert('Please Fill 17th Family Member Details');
                   return;
              }
              else if((rowCount == 19) &&  (document.getElementById("name_17").value == '' || document.getElementById("age_17").value == '' || document.getElementById("document_type_17").value == '' || document.getElementById("document_num_17").value == '')){
                   alert('Please Fill 18th Family Member Details');
                   return;
              }
              
        else  if(rowCount>20){
    alert("Maximum of Twenty Family Members allowed. ");
    return;
    }
          
    
    var row = table.insertRow(rowCount);
    var cell1 = row.insertCell(0);
    var element1 = document.createElement("input");
    element1.type = "text";
    element1.required = "required";
    element1.name="name_"+cuurow;
    element1.id="name_"+cuurow;
    element1.placeholder = 'Full Name';
    cell1.appendChild(element1);
    var cell2 = row.insertCell(1);
    var element2 = document.createElement("input");
    element2.type = "text";
    element2.required = "required";
    element2.name = "age_"+ cuurow;
    element2.id = "age_"+ cuurow;
    element2.placeholder = 'Age';
    cell2.appendChild(element2);
    var cell3 = row.insertCell(2);
    var element3 = document.createElement("input");
    element3.type = "text";
    element3.required = "required";
    element3.name = "document_type_"+cuurow;
    element3.id = "document_type_"+cuurow;
    element3.placeholder = 'Document Type';
    cell3.appendChild(element3);
    
    var cell4 = row.insertCell(3);
    var element4 = document.createElement("input");
    element4.type = "text";
    element4.name = "document_num_"+cuurow;
    element4.id = "document_num_"+cuurow;
    element4.placeholder = 'Document #';
    element4.readonly ="readonly";
    cell4.appendChild(element4);
    
    var cell5 = row.insertCell(4);
    
    var element5 = document.createElement('span');
    element5.innerHTML = '<i id="delete_' + cuurow +'" name="delete_' + cuurow +'" value="Delete" onclick="Deleterow(' + cuurow +')" style="text-align: center;cursor:pointer;color:red;font-size:24px;" class="fa fa-trash" /></i>';
    cell5.appendChild(element5);
        }
    
    }
    function phonenumber(inputtxt)
    {
    var phoneno = /^\(?([0-9]{5})\)?[-. ]?([0-9]{5})$/;
    if((inputtxt.match(phoneno))){
    return true; }
    else {
    alert("The Mobile no entered is invalid");
    return false;
    }
    }
    function validateLandlineNumber(inputtxt)
    {
    var phoneno = /^([0-9]{3,4}?[-. ]?[0-9]{6,7})$/;
    if((inputtxt.value.match(phoneno))){
    return true; }
    else {
    alert("The landline no entered is invalid, Valid format - (XXXX)-(XXXXXXX)");
    inputtxt.value='';
    return false;
    }
    }
    </script>
    <style>
    input, select {
    border-radius: 5px;
    }
    h5 {
    font-size: 14px;
    font-weight: 500;
    padding-left: 0px;
    padding-right: 0px;
    }
    .input-group-btn {
    position: relative;
    font-size: 0;
    white-space: nowrap;
    }
    .checkbox-container-main {
    display: block;
    position: relative;
    padding-left: 26px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }
    .checkbox-container-main input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
    }
    .checkmark {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    height: 18px !important;
    width: 18px !important;
    background-color: #eee;
    }
    .checkbox-container-main:hover input ~ .checkmark {
    background-color: #ccc;
    }
    .checkbox-container-main input:checked ~ .checkmark {
    background-color: #37a000;
    }
    .checkbox-container-main:after {
    content: "";
    position: absolute;
    display: none;
    }
    .checkbox-container-main input:checked ~ .checkmark:after {
    display: block;
    }
    .checkbox-container-main .checkmark:after {
    left: 6px;
    top: 3px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    }
    .btn-file {
    position: relative;
    overflow: hidden;
    }
    .input-group-addon,
    .input-group-btn {
    width: 1%;
    white-space: nowrap;
    vertical-align: middle;
    }
    .input-group-addon,
    .input-group-btn,
    .input-group .form-control {
    display: table-cell;
    }
    .btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
    }
    #img-upload {
    max-width: 190px;
    max-height: 140px;
    }
    div {
    position: relative;
    overflow: hidden;
    }
    uploadinput {
    position: absolute;
    font-size: 50px;
    opacity: 0;
    right: 0;
    top: 0;
    }
    </style>
    <style>
    button {
    color: #ffffff;
    font-size: 16px;
    background-color: #37a000;
    padding: 8px 27px;
    font-weight: 500;
    cursor: pointer;
    box-shadow: 0px 2px 7px #ddd;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    }
    button.up_button {
    background-color: transparent !important;
    color: #337ab7 !important;
    padding: 0px !important;
    box-shadow: none !important;
    outline: none !important;
    }
    .w3-btn,
    .w3-button {
    border: none;
    display: inline-block;
    padding: 8px 16px;
    vertical-align: right;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    background-color: inherit;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
    position: right;
    }
    .w3-white,
    .w3-hover-white:hover {
    color: #37a000 !important;
    background-color: #fff !important;
    margin-top: 2px;
    }
    div.sn-field-header {
    text-align: center;
    }
    div.logo-header {
    margin-top: 2px;
    height: auto;
    }
    .icon {
    position: absolute;
    width: 10px;
    height: 100%;
    top: 0;
    right: 0;
    }
    .sign_in_sec form input,
    .sign_in_sec form select {
    padding: 6px 15px 10px 10px;
    }
    .sign_in_sec form input {
    height: auto;
    }
    .select1 {
    color: #b3a7da !important;
    -webkit-appearance: menulist;
    -moz-appearance: menulist;
    }
    input:required:focus {
    border: 1px solid red;
    outline: none;
    }
    row {
    margin-right: -15px;
    margin-left: -15px;
    border-radius: 4px;
    flex-wrap: wrap;
    }
    .no-padd-side {
    padding-left: 0px;
    padding-right: 0px;
    }
    img {
    max-width: 60%;
    height: auto;
    margin-top: -10px;
    padding-top: 7px;
    }
    /* CSS for styling the form */
    .w3-teal,
    .w3-hover-teal:hover {
    color: #fff !important;
    background-color: #37a000 !important;
    }
    .w3-panel {
    margin-top: 16px;
    margin-bottom: 16px;
    }
    .w3-container,
    .w3-panel {
    padding: 0.01rem 16px;
    }
    .w3-round-large {
    border-radius: 15px;
    }
    .sn-field-1 {
    float: left;
    width: 100%;
    margin-top: 36px;
    margin-bottom: 20px;
    position: relative;
    }
    .m-flex {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    width: 100% !important;
    }
    @media (max-width: 640px) {
    .d-flex.m-flex {
    display: flex !important;
    width: 100%;
    }
    .d-flex {
    display: flex !important;
    width: auto !important;
    }
    }
    @media (max-width: 768px) {
    .sn-field-1 {
    margin-top: 0px;
    }
    }
    .border-1 {
    border: 1px solid black;
    }
    .passport-col {
    display: flex;
    flex-direction: column;
    height: 100%;
    }
    input::placeholder, select::placeholder {
    font-size: 14px !important;
    font-weight: 500 !important;
    }
    .passport-in {
    flex: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .passport-in h5 {
    font-size: 15px;
    text-align: center;
    }
    .passport-in input {
    display: none;
    flex: 0;
    }
    .passport-in.show h5 {
    display: none;
    }
    label {
    display: inline-block;
    max-width: 100%;
    color:black;
    position:left;
    margin-bottom: 5px;
    font-weight: 700;
    }
    .myContainer  {
    border: 1px solid #111;
    margin: 0px auto;
    width: 75%;
    }
    .logo img {
    max-height: 80px;
    width: auto;
    }
    .myWidth, .sn-field .myWidth {
    width: 100px;
    position: relative;
    float: left;
    margin-left: 15px;
    margin-right: 15px;
    }
    @media screen and (min-width: 768px) {
    .myimg {
    position: absolute;
    top: 45px;
    left: 0px;
    }
    .myimg a img {
    width: 130px;
    height: auto;
    }
    .imageContainer {
    display: flex;
    align-items: flex-end;
    justify-content : center;
    height: 180px;
    margin-left: auto;
    margin-top: 30px;
    width: 150px;
    border: 1px solid #ccc;
    color: #ccc;
    vertical-align: middle;
    cursor: pointer;
    }
    .imageContainer img {
    width: 100% !important;
    max-width: 100% !important;
    max-height: 100% !important;
    background-size: cover;
    }
    }
    .myFlexCont {
    display: flex;
    align-items: center;
    margin-top: 0px;
    }
    @media screen and (max-width: 767px) {
    .myimg {
    position: relative;
    margin-top: 20px;
    width: 100%;
    }
    
    .imageContainer {
    display: flex;
    align-items: flex-end;
    justify-content : center;
    height: 180px;
    margin: auto !important;
    margin-top: 10px;
    margin-bottom: 20px !important;
    width: 150px;
    border: 1px solid #ccc;
    color: #ccc;
    vertical-align: middle;
    cursor: pointer;
    }
    .imageContainer img {
    width: 100% !important;
    max-width: 100% !important;
    max-height: 100% !important;
    background-size: cover;
    }
    .myimg img {
    max-height: 70px;
    }
    .myContainer {
    width: 100%;
    }
    .myWidth {
    width: 90% !important;
    }
    .myWidth.differ {
    width: 160px !important;
    }
    }
    p{
    color:black;
    }
    
    .inner-img {
    transition: 0.3s;
    }
    .inner-img:hover {
    transform: scale(1.3);
    }
    </style>
    
  <script type="text/javascript">
  function isNumberKey(evt)
  {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
  {
  return false;
  }
  return true;
  }
  function alpha(e) {
  var k;
  document.all ? k = e.keyCode : k = e.which;
  return ((k > 64 && k < 91) || (k > 96 && k < 123) || (k == 8) || (k == 32));
  }
  </script>
  <style>
  input:required:focus {
  border: 1px solid red;
  outline: none;
  }
  
  /* Centered text */
  .centered {
  width: 100%;
  position: absolute;
  bottom: -1px;
  /* left: 10px; */
  color: #fff;
  background-color: #b3b3b3;
  </style>
  </head>
  <body onload="PrefillDecision();">
    <div class="main" id="divToPrint">
      <div class="container" style="padding: 0px;">
        <div class="sign-in-page" style="padding: 40px 20px;">
          <div class="container" style="padding: 0px;">
            
            <div class="myContainer">
              <div class="col-lg-12">
                <div class="login-sec">
                    <div class="myimg col-12 col-sm-12 order-md-2 order-sm-1 order-1 text-center text-md-left logo">
									<a href="index.php"><img src="./images/logo_google_form.png" /></a>
								</div>       

								<div class="col-lg-12 order-md-1 order-sm-2 order-2 text-center mt-3 mb-0 mb-md-3 no-pdd">

									<div class="sn-field-header">
										<h4><u>Register for COVID Vaccine</u></h4>

									</div>

								</div>
						<br><br>		
								 <?php 
                $SuccessAlert = $_GET["actionResult"];
                if($SuccessAlert == "Success"){ ?>
                    <center><p style="color:green;">Successfully Request Sent</p></center>
                <?php
                }
                ?>
                  
                  
                  <div class="sign_in_sec col-md-12 p-0" style="display:block;" >
                    <form method="post" enctype="multipart/form-data" >
                            <li style="color:white;">
                            <div class="">
                                <div class="row">
                                    <div class="col-md-3 min-des no-pdd">
                                    	<div class="sn-field">
                                           <select name="title" id="title" onchange="getGender(document.getElementById('title').value)">
                                               <option value="">Title</option>
                                               <option value="Mr." <?Php if($user_data[0]["user_title"] == 'Mr.'){ ?> selected <?php } ?>>Mr.</option>
                                              <!-- <option value="Miss." <?Php if($user_data[0]["user_title"] == 'Miss.'){ ?> selected <?php } ?>>Miss.</option>-->
                                               <option value="Mrs." <?Php if($user_data[0]["user_title"] == 'Mrs.'){ ?> selected <?php } ?>>Mrs.</option>
                                           </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3 min-des no-pdd">
                                    	<div class="sn-field">
                                            <input type="text"  name="fname" id="fname" value="<?php echo $user_data[0]["first_name"];?>" placeholder="First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3 min-des no-pdd">
                                    	<div class="sn-field">
                                            <input type="text"  name="mname" id="mname"  placeholder="Middle Name" >
                                        </div>
                                    </div>
                                    <div class="col-md-3 min-des no-pdd">
                                    	<div class="sn-field">
                                            <input type="text"  name="lname" id="lname" value="<?php echo $user_data[0]["last_name"];?>" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                  				<div class="col-md-4 min-des no-pdd" >
                  					<div class="sn-field">
                  						<select name="block_prime" id="block_prime" onblur="PrefillDecision();" required>
                  						    <?php 
                  						     if(count($user_data) > 0) {
                  						     	?>
                  							<option value="" disabled>Block</option>
                  							<option value="1" <?php if ($user_data[0]['block_id'] == "1") { ?> selected <?php } ?>>AG</option>
                  							<option value="2" <?php if ($user_data[0]['block_id'] == "2") { ?> selected <?php } ?>>BC</option>
                  							<option value="3" <?php if ($user_data[0]['block_id'] == "3") { ?> selected <?php } ?>>CC</option>
                  							<option value="4" <?php if ($user_data[0]['block_id'] == "4") { ?> selected <?php } ?>>DW</option>
                  							<option value="5" <?php if ($user_data[0]['block_id'] == "5") { ?> selected <?php } ?>>ES</option>
                  						     	<?php
                  						     } else { ?>
                  							<option  value="" disabled selected>Block</option>
                  							<option value="1">AG</option>
                  							<option value="2">BC</option>
                  							<option value="3">CC</option>
                  							<option value="4">DW</option>
                  							<option value="5">ES</option>
                  						     <?php } ?>
                  						</select>
                  					</div>
                  				</div>
                  				<div class="col-md-4 min-des no-pdd">
                  					<div class="sn-field">
                  						<input type="text"  onblur="PrefillDecision();" required maxlength="4" name="house_number" id="house_number"  onkeypress="return isNumberKey(event);"  value="<?= (count($user_data) > 0) ? $user_data[0]['house_number_id'] : '' ?>"  placeholder="House #">
                  					</div>
                  				</div>
                  				<div class="col-md-4 min-des no-pdd">
                  					<div class="sn-field">
                  						<select name="floor_prime" id="floor_prime" required onblur="PrefillDecision();">
                  							<?php 
                  							   if (count($user_data) > 0) { ?>
                  							<!--<option value="Villa" <?php if ($user_data[0]['floor_number'] == 'Villa') { ?> selected <?php } ?>>Villa</option>-->
                  							<option value=" ">Villa</option>
                  							<option value="GF" <?php if ($user_data[0]['floor_number'] == '1') { ?> selected <?php } ?>>GF</option>
                  							<option value="FF" <?php if ($user_data[0]['floor_number'] == '2') { ?> selected <?php } ?>>FF</option>
                  							<option value="SF" <?php if ($user_data[0]['floor_number'] == '3') { ?> selected <?php } ?>>SF</option>
                  							<option value="TF" <?php if ($user_data[0]['floor_number'] == '4') { ?> selected <?php } ?>>TF</option>
                  							<?php
                  							   } else {
                  							?>
                  							<option name="floor_prime" id="floor_prime"  value="" disabled selected>Floor</option>
                  							<!--<option value="Villa" >Villa</option>-->
                  							<option value="NA">Villa</option>
                  							<option value="GF">GF</option>
                  							<option value="FF">FF</option>
                  							<option value="SF">SF</option>
                  							<option value="TF">TF</option>
                  						<?php } ?>
                  						</select>
                  					</div>
                  				</div>
                  			</div>
                  		
                                <div class="row">
                                    <!--<div class="col-md-4 min-des no-pdd">
                                        <div class="sn-field">
                                            <input type="text" name="dob" id="dob" value="<?php echo $user_data[0]['dob']; ?>" onchange="calculateAge(document.getElementById('dob').value)" onfocus="this.type='date'" max="<?php echo date('Y-m-d') ?>" min="<?php echo date('1900-01-01') ?>" step="1" placeholder="DOB (dd/mm/yyyy)" required>
                                        </div>
                                    </div>-->
                                    
                                    <!--<div class="col-md-6 min-des no-pdd">
                                        <div class="sn-field">
                                            <input type="text"  name="gender" id="gender" value="Female" placeholder="Gender" readonly required>
                                            
                                        </div>
                                    </div>-->
                                </div>
                                
                            <div class="row">
                                <div class="col-md-2 min-des no-pdd">
                                        <div class="sn-field">
                                            <input type="text"  name="age" id="age" onkeypress="return isNumberKey(event);" maxlength="3" value="<?php echo $user_data[0]['age']; ?>" placeholder="Age" required>
                                        </div>
                                    </div>
                                
                                <div class="col-md-4 min-des no-pdd">
                                	<div class="sn-field">
                                	    <table>
                                            <tbody>
                                                <tr>
                  								    <td width="30%"><input type="text" name="isd_1" id="isd_1"  placeholder="+91"
                                                        maxlength="3" value="+91" required></td>
                                                    <td width="70%"> <input type="text"  required name="mobile" id="mobile" value="<?php echo $user_data[0]['phone_number']; ?>"
                                                    oninvalid="this.setCustomValidity('')" oninput="this.setCustomValidity('')"  onkeypress="return isNumberKey(event);" 
                  											maxlength="10" placeholder="Mobile" value="" onblur="mobnumber(this.value);" ></td>

                  										</tr>

                  									</tbody>

                  								</table>
                                         </div>
                                </div>
                                
                                <div class="col-md-5 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="email"  name="email" id="email" value="<?php echo $user_data[0]['user_email']; ?>" placeholder="Email" required readonly>
                                    </div>
                                </div>
                               
                                <!-- <div class="col-md-12 min-des no-pdd">
                                	<div class="sn-field">
                                        <input type="text"  name="spcl_category" id="spcl_category"
                                        value="<?php if($user_data[0]['special_category'] <> NULL && $user_data[0]['special_category'] <> ''){ echo $user_data[0]['special_category']; } ?>"
                                        placeholder="Please state any special reason due to which the vaccination should be prioritised." >
                                    </div>
                                </div>-->
                               
    
                               
                               </div>   
                              <div class="row">
                                    <div class="col-md-4 min-des no-pdd">
                                        <div class="sn-field">
                                            <select name="document_type" id="document_type" required>
                                                <option value="">Document Type</option>
                                                <option value="Aadhar" <?php if($user_data[0]['document_type'] == 'Aadhar'){ ?> selected  <?php } ?> >Aadhar</option>
                                                <option value="PAN" <?php if($user_data[0]['document_type'] == 'PAN'){ ?> selected  <?php } ?>>PAN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 min-des no-pdd">
                                        <div class="sn-field">
                                            <input type="text"  name="document_no" id="document_no" value="<?php echo $user_data[0]['document_number']; ?>" placeholder="Document Number" required>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        </li>
                        <b>Family Details</b>
                         <div class="col-lg-12 no-pdd">
                                                          
                                                          <table class="table table-striped custom-table table-hover" id="tblfammember" >
                                                            <thead>
                                                                <tr>
                                                                    <th  scope="col" class="text-center" >Name</th>
                                                                    <th  scope="col" class="text-center" >Age</th>
                                                                    <th  scope="col" class="text-center">Document type</th>
                                                                    <th  scope="col" class="text-center">Document # </th>
                                                                    <th  scope="col" class="text-center">&nbsp; </th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                          
                                                         <tbody>
                                                             
                                                         
                                                          <tr align="left">
                                                              <td> <input type="text" name="name_" id="name_" required  placeholder="Full Name"></td>
                                                              <td> <input type="text" name="age_" id="age_" required maxlength="3"  onkeypress="return isNumberKey(event);" placeholder="Age"> </td>
                                                              <td> <div class="sn-field">
                                                                    <select name="document_type_" id="document_type_" required>
                                                                        <option value="">Document Type</option>
                                                                        <option value="Aadhar" <?php if($user_data[0]['document_type'] == 'Aadhar'){ ?> selected  <?php } ?> >Aadhar</option>
                                                                        <option value="PAN" <?php if($user_data[0]['document_type'] == 'PAN'){ ?> selected  <?php } ?>>PAN</option>
                                                                    </select>
                                                                </div> 
                                                                </td>
                                                              <td> <input type="text" name="document_num_" id="document_num_" placeholder="Document #" > </td>
                                                              <td><i onclick="addRow('tblfammember')"  style="text-align: center;cursor:pointer;color:#37a000;font-size:24px;" class="fa fa-plus"></i>
                                                              </td>
                                                          </tr>
                                                          </tbody>
                                                        </table>
                                                        
                                                      </div>
                                                      <p>Dear Residents, </p>
                   
                    <p>The Urban Public Health Centre (UPHC), Tigra has sought the list and details of residents above 60 years who are interested for vaccination for COVID-19, as a part of GOvernment's plan to vaccinate the public who are above 60 years, it will be started from 1st March, 2021. The details required by UPHC are as here below. Those who are interested may fill the details, which will be shared with the UPHC, Tigra. Further, as per their program and plan, they will contact the persons directly. 
                    </p>
                    
                    <p>However, please note that the NRWA may neither be able to expedite nor take any responsibility for the vaccination, its process or it’s results.</p>
                    
                    <div class="col-lg-12 no-pdd">
                          <div class="checky-sec st2">
                            <div class="fgt-sec">
                              <label class="check-new-box">
                              <input type="checkbox" id="policy_accept" name="policy_accept" value="1" checked required>
                              <span class="checkmark"></span> </label>
                              <small style="font-size: 14px;width: 100%;line-height: 20px;font-weight: 500;">Yes, I understand and agree to the Nirvana Country <a  href="<?php echo SITE_URL;?>terms_conditions.php" target="_blank" style="color: #37a000;">Terms of Use</a>.</small> </div>
                            <!--fgt-sec end-->
                          </div>
                        </div>
                   <p>&nbsp;</p>
                   <div class="row">
                       <div class="col-lg-12 no-pdd" style="text-align:center;">
                                                          <button type="submit" value="submit" name="submit"
                                                          style="color: #ffffff; background-color: #37a000;">Save</button>
                                                          
                                       

                    <div class="col-md-12 order-md-1 order-sm-2 mt-5 text-center order-2">
                        <p class="heading-2">NIRVANA Residents Welfare Association</p>
                        <p class="sub-head">Opp-Courtyard Mkt, Nirvana Country, Sector 50, Gurgaon - 122018</p>
                    </div>
                        </form>
                                                  </div>
                                                </div>
                                                <!--login-sec end-->
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!--signin-pop end-->
                                      </div>
                                      <!--signin-popup end-->
                                    </div>
                                    
                                  </body>
                                  
                                  
                                </html>
                                <script type="text/javascript">
                                $("#owner_tenant").change(function() {
                                if ($(this).val() == "1") {
                                $('#onlyaplfortenant').show();
                                $('#owner_name').attr('required', '');
                                $('#owner_name').attr('data-error', 'This field is required.');
                                $('#onlyaplfortenant2').show();
                                $('#owner_email').attr('required', '');
                                $('#owner_email').attr('data-error', 'This field is required.');
                                $('#onlyaplfortenant3').show();
                                $('#owner_mobile').attr('required', '');
                                $('#owner_mobile').attr('data-error', 'This field is required.');
                                $('#onlyaplfortenant4').show();
                                $('#user_resident_type').removeAttr('required');
                                $('#user_resident_type').removeAttr('data-error');
                                $('#onlyaplfortenant5').show();
                                $('#user_resident_type').removeAttr('required', '');
                                $('#user_resident_type').removeAttr('data-error', 'This field is required.');
                                $('#onlyaplfortenant6').show();
                                $('#user_resident_type').removeAttr('required', '');
                                $('#user_resident_type').removeAttr('data-error', 'This field is required.');
                                $('#onlyaplfortenant7').show();
                                $('#user_resident_type').removeAttr('required', '');
                                $('#user_resident_type').removeAttr('data-error', 'This field is required.');
                                }
                                else if($(this).val() == "0") {
                                $('#onlyaplfortenant').hide();
                                $('#owner_name').removeAttr('required');
                                $('#owner_name').removeAttr('data-error');
                                $('#onlyaplfortenant2').hide();
                                $('#owner_email').removeAttr('required');
                                $('#owner_email').removeAttr('data-error');
                                $('#onlyaplfortenant3').hide();
                                $('#owner_mobile').removeAttr('required');
                                $('#owner_mobile').removeAttr('data-error');
                                $('#onlyaplfortenant4').hide();
                                $('#user_resident_type').removeAttr('required', '');
                                $('#user_resident_type').removeAttr('data-error', 'This field is required.');
                                $('#onlyaplfortenant5').hide();
                                $('#user_resident_type').removeAttr('required', '');
                                $('#user_resident_type').removeAttr('data-error', 'This field is required.');
                                $('#onlyaplfortenant6').show();
                                $('#user_resident_type').removeAttr('required', '');
                                $('#user_resident_type').removeAttr('data-error', 'This field is required.');
                                $('#onlyaplfortenant7').show();
                                $('#user_resident_type').removeAttr('required', '');
                                $('#user_resident_type').removeAttr('data-error', 'This field is required.');
                                }
                                else if($(this).val() == "") {
                                $('#onlyaplfortenant').hide();
                                $('#owner_name').removeAttr('required');
                                $('#owner_name').removeAttr('data-error');
                                $('#onlyaplfortenant2').hide();
                                $('#owner_email').removeAttr('required');
                                $('#owner_email').removeAttr('data-error');
                                $('#onlyaplfortenant3').hide();
                                $('#owner_mobile').removeAttr('required');
                                $('#owner_mobile').removeAttr('data-error');
                                $('#onlyaplfortenant4').hide();
                                $('#user_resident_type').removeAttr('required', '');
                                $('#user_resident_type').removeAttr('data-error', 'This field is required.');
                                $('#onlyaplfortenant5').hide();
                                $('#user_resident_type').removeAttr('required', '');
                                $('#user_resident_type').removeAttr('data-error', 'This field is required.');
                                $('#onlyaplfortenant6').show();
                                $('#user_resident_type').removeAttr('required', '');
                                $('#user_resident_type').removeAttr('data-error', 'This field is required.');
                                $('#onlyaplfortenant7').show();
                                $('#user_resident_type').removeAttr('required', '');
                                $('#user_resident_type').removeAttr('data-error', 'This field is required.');
                                }
                                
                                else if($(this).val() == "2") {
                                $('#onlyaplfortenant').hide();
                                $('#owner_name').removeAttr('required');
                                $('#owner_name').removeAttr('data-error');
                                $('#onlyaplfortenant2').hide();
                                $('#owner_email').removeAttr('required');
                                $('#owner_email').removeAttr('data-error');
                                $('#onlyaplfortenant3').hide();
                                $('#owner_mobile').removeAttr('required');
                                $('#owner_mobile').removeAttr('data-error');
                                $('#onlyaplfortenant5').hide();
                                $('#block_id').removeAttr('required');
                                $('#block_id').removeAttr('data-error');
                                $('#onlyaplfortenant6').hide();
                                $('#house_number_id').removeAttr('required');
                                $('#house_number_id').removeAttr('data-error');
                                $('#onlyaplfortenant7').hide();
                                $('#floor_number').removeAttr('required');
                                $('#floor_number').removeAttr('data-error');
                                $('#onlyaplfortenant4').hide();
                                $('#user_resident_type').removeAttr('required');
                                $('#user_resident_type').removeAttr('data-error');
                                }
                                });
                                $("#owner_tenant").trigger("change");
                                
                                
                                </script>
                                <script>  
            function Deleterow(cuurow) { 
                document.getElementById('car_number_' + cuurow).remove(); 
                document.getElementById('make_model_' + cuurow).remove(); 
                document.getElementById('color_' + cuurow).remove(); 
                document.getElementById('delete_' + cuurow).remove(); 
            } 
            
           
            
        </script>