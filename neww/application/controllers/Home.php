<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->login_check(MEMBER); 
    }

    public function index()
    {
        $data=array();
        if(isset($_SESSION['login_id'])){
        $data['getUser'] = $this->user_model->get_user($_SESSION['login_id']);
        }

        if ($this->input->post('btnLoginWeb')) {
            $this->form_validation->set_rules('user_email', 'Username', 'required');
            $this->form_validation->set_rules('user_pass_login', 'Password', 'required');
            if ($this->form_validation->run() == FALSE) {

                $this->load->view(FRONTEND_COMPANY_VIEWS_FOLDER . '/' . WEB . '/login', $data);
            } else {
                redirect(BASE_URL."login");

            }

        }
        $this->load->view(FRONTEND_COMPANY_VIEWS_FOLDER . '/' . WEB . '/login', $data);

    }

    public function views($page = 'index', $page_sub = '', $page_id = 0)
    {
        $data = array();


        if ($page == 'vaccine') {

            $data['getUserData'] = $this->timing_model->getMainFamilyUser($_SESSION['login_id']);

            if(count(  $data['getbooking_byUser']=$this->timing_model->getbooking_byUser($_SESSION['login_id'])) > 0 )
            {
                redirect(BASE_URL . "myBooking", 'refresh');
            }

         //  print_r($data['getUserData']); exit;
            $data['getUser'] = $this->user_model->get_user($_SESSION['login_id']);
 $e=$data['getUser']->email;
 
            if ($this->input->post('submit')) {
                $this->form_validation->set_rules('fname', 'Fname', 'required');
                $dose_type=$this->input->post('vaccine_type'); 
                if($dose_type ==YES){
                $this->form_validation->set_rules('vaccine1_time','Time','required|callback_time_check');
                }
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view(FRONTEND_COMPANY_VIEWS_FOLDER . '/' . WEB . '/' . $page, $data);
                } else {
                    $ress=$this->timing_model->add_booking();
                    if($ress)
                    {  
                        
                            $sel_date= $this->input->post("vaccine1_date");
                            $sel_time= $this->input->post("vaccine1_time");
                         
                         $to = $e;

        $subject = 'COVID Vaccine Registration';

        $from = "Nirvana";

        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: ' . $from . "\r\n" .
           // $headers .= 'Bcc: kushalbhasin@gmail.com' . "\r\n";
        'Reply-To: ' . $from . "\r\n" .
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
            <td>Name</td><td>: " . $_POST["title"] . " " . $_POST["fname"] . " " . $_POST["mname"] . " " . $_POST["lname"] . "</td>
            
             <td>Time</td> <td>: " . date("d-m-Y", strtotime($sel_date)) . " - " . $sel_time . " </td>
             <tr>
            
            </table>
            
           
            <p>Warm Regards,</p> 
            Nirvana Office <br>
            " . BASE_URL . " <br></span>
                    </span></p></td></tr></tbody></table>";

                 /*$mm= mail($to, $subject, $message, $headers);*/
         
                        redirect(BASE_URL . "myBooking", 'refresh');
                    
                    }
                }
                 
            }
        }elseif($page == 'myBooking')
        {
            $data['getUser'] = $this->user_model->get_user($_SESSION['login_id']);
             $data['get_booking']=$this->timing_model->getbooking_byDate("",0,$_SESSION['login_id']);
           // $data['get_booking']=$this->timing_model->getbooking_byUser($_SESSION['login_id']);
            // print_r( $data['get_booking']); exit;

        }elseif($page == 'editBooking')
        { 
             
             $data['getUserData'] = $this->timing_model->getMainFamilyUser($_SESSION['login_id']);
            $data['getUser'] = $this->user_model->get_user($_SESSION['login_id']);
            $data['getbooking_byUser']=$this->timing_model->getbooking_byUser($_SESSION['login_id']);
            // print_r( $data['getbooking_byUser']); exit;
            $data['get_booking_family']=$this->timing_model->getbooking_byDate("",0,$_SESSION['login_id']);
           
                    
                        if ($this->input->post('submit')) {
                             
                                $ress=$this->timing_model->update_booking(); 
                                if($ress)
                                {
                                     redirect(BASE_URL . 'myBooking', 'refresh');
                                }
                        }
             
        
        }elseif ($page=="add_registrant")
        { 
          /*   $dose_typ =$this->input->post('vaccine_type');

        if($dose_typ == YES)
         
                $this->form_validation->set_rules('fname', 'Fname', 'required');
if($dose_typ == YES){
                 $this->form_validation->set_rules('vaccine1_time','Time','required|callback_time_check');
}
if($dose_typ == 2){
                 $this->form_validation->set_rules('vaccine2_time','Time','required|callback_time_check2');
}
                if ($this->form_validation->run() == FALSE) {
                    $this->load->view(FRONTEND_COMPANY_VIEWS_FOLDER . '/' . WEB . '/' . $page, $data);
                } else {
                  
                    
                }*/
                
                  $ress=$this->timing_model->registrant_booking();
                        if($ress)
                        {
                            redirect(BASE_URL . 'myBooking', 'refresh');
                        }
            
        }elseif ($page=="add_registrant1")
        { 
            
            
                            $sel_date = $this->input->post("vaccine1_date");
                            $sel_time = $this->input->post("vaccine1_time");
                      
          /* $sel_date= $this->input->post('vaccine1_date'); 
            $sel_time= $this->input->post('vaccine1_time');*/
            $c = count($this->timing_model->getbooking_byDate1($sel_date,$sel_time));
            $c1 = count($this->timing_model->getbooking_byDate($sel_date,$sel_time));
            $t=$c+$c1;
                
               if($t>=5){
                   echo "1"; exit;
               }else{
                   $ress=$this->timing_model->registrant_booking();
                        if($ress)
                        {
                            echo "2"; exit;
                        }
                       //  echo $ress; exit;
               }
            
        }elseif($page == 'registrant_edit')
        {

            $data['getUserData'] = $this->timing_model->getMainFamilyUser($_SESSION['login_id']);
            $data['getUser'] = $this->user_model->get_user($_SESSION['login_id']);
            $data['getbooking_byUser']=$this->timing_model->getbooking_byUser($_SESSION['login_id']);
            //  print_r( $data['getbooking_byUser']); exit;
            $data['get_booking_family']=$this->timing_model->getbooking_byDate("",0,$_SESSION['login_id']);
            if ($this->input->post('submit')) {

                $ress=$this->timing_model->update_booking();
                if($ress)
                {
                    redirect(BASE_URL . 'editBooking', 'refresh');
                }

            }
            // $data['get_booking']=$this->timing_model->getbooking_byUser($_SESSION['login_id']);
            //print_r( $data['get_booking_family']); exit;

        }elseif($page == 'edit_registrant1')
        { 
            
            
                            $sel_date = $this->input->post("vaccine1_date");
                            $sel_time = $this->input->post("vaccine1_time");
                      
          
            $c = count($this->timing_model->getbooking_byDate1($sel_date,$sel_time));
            $c1 = count($this->timing_model->getbooking_byDate($sel_date,$sel_time));
            $t=$c+$c1;
                
               if($t>=5){
                   echo "1"; exit;
               }else{
                   $ress=$this->timing_model->update_member_booking();
                        if($ress)
                        {
                            echo "2"; exit;
                        }
                       //  echo $ress; exit;
               }
        } 
$this->load->view(FRONTEND_COMPANY_VIEWS_FOLDER . '/' . WEB . '/' . $page, $data);

}

 public function time_check()
{
    $sel_time=$this->input->post('vaccine1_time'); 
 $sel_date=$this->input->post('vaccine1_date'); 
 
            $c = count($this->timing_model->getbooking_byDate1($sel_date,$sel_time));
            $c1 = count($this->timing_model->getbooking_byDate($sel_date,$sel_time));
            $t=$c+$c1;
              
             
    if($t>=5)
    {
        $this->form_validation->set_message('time_check', " $sel_date -  $sel_time this time is not available now.");   
        return FALSE;
    }else{ return true; //Add here
    }
}
  public function time_check2()
    {
        $sel_time = $this->input->post('vaccine2_time');
        $sel_date = $this->input->post('vaccine2_date');

        $c = count($this->timing_model->getbooking_byDate1($sel_date, $sel_time));
        $c1 = count($this->timing_model->getbooking_byDate($sel_date, $sel_time));
        $t = $c + $c1;

        if ($sel_date != "" || $sel_time != "") {
            if ($t >= 5) {
                $this->form_validation->set_message('time_check2', " $sel_date -  $sel_time this time is not available now.");
                return FALSE;
            } else {
                return true; //Add here
            }
        } else {
            return true;

        }

    }
function mailsend($userName, $userEmail, $userMessage)
{
    $date = $this->input->post('ShippedDate');
    $to = "geethuag2015@gmail.com";
    $subject = 'User Enquiry';

    $msg = '<html>
				<head>
					<title>www.tshoppe.in/</title>
				</head> 
				<body>
				<table align="center" cellpadding="10px">  
							<tr>
								
								<td>From :</td> <td>' . $userName . '</td>
								
							</tr> 
							<tr>
								<td >Message :</td><td>' . $userMessage . '</td>
							</tr> 
							<tr> 
								<td colspan="2">This is a system generated mail. Please do not reply back</td>
							 </tr> 
				</table> 
				</body>
				</html>';

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: <tshoppe.in>' . "\r\n";
    //	$headers .= 'Cc: myboss@example.com' . "\r\n";

    mail($to, $subject, $msg, $headers);
    return true;

}

function product_views($page = '', $page_id = '')
{
    $data = array();
    $data['categories'] = $this->service_model->get_service();
    $data['sub_categories'] = $this->service_model->get_subCategories();
    if ($page == 'view') {
        $page = 'products';
        $data['products'] = $this->product_model->get_product($page_id);
        $data['product_images'] = $this->product_model->get_product_images(0, $page_id);
        $data['latest_products'] = $this->product_model->get_product(0, 10, 0, 0, $data['products']->FKSubServiceID);

    } elseif ($page == 'detail') {
        $data['product'] = $this->product_model->get_product($page_id);
        $data['product_images'] = $this->product_model->get_product_images(0, $page_id);
        $data['price'] = 0;
        if (isset($_SESSION['staff_id'])) {
            $staffID = $_SESSION['staff_id'];
            $FKProductID = $page_id;
            $data['products'] = $this->product_model->get_product_prices(0, 0, 0, 0, 0, $staffID, $FKProductID);
            foreach ($data['products'] as $p) {
                $data['price'] = $p['productPrices'];
            }

        }
    }


    $this->load->view(FRONTEND_COMPANY_VIEWS_FOLDER . '/' . WEB . '/' . $page, $data);

}

}
