<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends Home_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function timing_ajax($dataLink = '')
    {
        $options = '';
        if ($dataLink == 'get_time_slotsByDate') {
            $sel_date = date("Y-m-d", strtotime($_POST['sel_date']));

            $bookingByDate = $this->timing_model->getbooking_byDate($sel_date);


        } elseif ($dataLink == 'get_time_slots_available') {

            $sel_date = date("Y-m-d", strtotime($_POST['sel_date']));

            $msg = "";

            $range = range(strtotime("10:00"), strtotime("16:00"), 15 * 60);
            foreach ($range as $time) {

                $c1 = count($this->timing_model->getbooking_byDate($sel_date, date("g:i: A", $time)));
                $c2 = count($this->timing_model->getbooking_byDate1($sel_date, date("g:i: A", $time)));
                $c = $c1 + $c2;
                if ($c > 5 || $c == 5) {
                    $msg .= '<option class="greyclass" value="' . date("g:i: A", $time) . '" disabled>' . date("g:i: A", $time) . ' - ( Full Booked ) </option>';
                } else {
                    $d = 5 - $c;

                    if ($c != 0) {
                        $msg .= '<option class="" value="' . date("g:i: A", $time) . '">' . date("g:i: A", $time) . '- (  ' . $d . ' Avail )  </option>';
                    } else {
                        $msg .= '<option class="" value="' . date("g:i: A", $time) . '">' . date("g:i: A", $time) . '- (  ' . $d . ' Avail )  </option>';

                    }
                }
                //echo $msg;
//$msg .=' <option value="'.date("g:i: A", $time).'">'.date("g:i: A", $time).'</option> ';
            }
            echo $msg;

        } elseif ($dataLink == 'get_count_time_slots_available') {
            $sel_date = date("Y-m-d", strtotime($_POST['sel_date']));
            $sel_time = $_POST['tim'];
           $c1 = count($this->timing_model->getbooking_byDate($sel_date, date("g:i: A", $time)));
                $c2 = count($this->timing_model->getbooking_byDate1($sel_date, date("g:i: A", $time)));
                $c = $c1 + $c2;
            $d = 5 - $c;
            echo $d;
            exit;
        } elseif ($dataLink == 'get_time_slots_available1') {

            $sel_date = date("Y-m-d", strtotime($_POST['sel_date']));
            $msg = "";

            $range = range(strtotime("10:00"), strtotime("16:00"), 15 * 60);
            foreach ($range as $time) {

                $c1 = count($this->timing_model->getbooking_byDate($sel_date, date("g:i: A", $time)));
                $c2 = count($this->timing_model->getbooking_byDate1($sel_date, date("g:i: A", $time)));
                $c = $c1 + $c2;

                if ($c > 5 || $c == 5) {
                    $msg .= '<option class="greyclass" value="' . date("g:i: A", $time) . '" disabled>' . date("g:i: A", $time) . ' - ( Full Booked ) </option>';
                } else {
                    $d = 5 - $c;

                    if ($c != 0) {
                        $msg .= '<option class="" value="' . date("g:i: A", $time) . '">' . date("g:i: A", $time) . '- (  ' . $d . ' Avail )  </option>';
                    } else {
                        $msg .= '<option class="" value="' . date("g:i: A", $time) . '">' . date("g:i: A", $time) . '- (  ' . $d . ' Avail )  </option>';

                    }
                }
                //echo $msg;
//$msg .=' <option value="'.date("g:i: A", $time).'">'.date("g:i: A", $time).'</option> ';
            }
            echo $msg;

        } elseif ($dataLink == 'get_time_slots_available2') {

            $sel_date = date("Y-m-d", strtotime($_POST['sel_date']));
            $msg = "";

            $range = range(strtotime("10:00"), strtotime("16:00"), 15 * 60);
            foreach ($range as $time) {

                $c1 = count($this->timing_model->getbooking_byDate($sel_date, date("g:i: A", $time)));
                $c2 = count($this->timing_model->getbooking_byDate1($sel_date, date("g:i: A", $time)));
                $c = $c1 + $c2;
                if ($c > 5 || $c == 5) {
                    $msg .= '<option class="greyclass" value="' . date("g:i: A", $time) . '" disabled>' . date("g:i: A", $time) . ' - ( Full Booked ) </option>';
                } else {
                    $d = 5 - $c;

                    if ($c != 0) {
                        $msg .= '<option class="" value="' . date("g:i: A", $time) . '">' . date("g:i: A", $time) . '- (  ' . $d . ' Avail )  </option>';
                    } else {
                        $msg .= '<option class="" value="' . date("g:i: A", $time) . '">' . date("g:i: A", $time) . '- (  ' . $d . ' Avail )  </option>';

                    }
                }
                //echo $msg;
//$msg .=' <option value="'.date("g:i: A", $time).'">'.date("g:i: A", $time).'</option> ';
            }
            echo $msg;

        } elseif ($dataLink == "edit_user") {
            $idd = $this->input->post('id');
            $usr = $this->timing_model->getFamilyUser(0, $idd);
            
            foreach ($usr as $u) {
                
                $msg = "";
                $msg .= ' <div class="row">
                            <div class="col-md-3 min-des no-pdd">
                                <div class="sn-field">
                                    <label>Full Name</label>
                                    <input type="text" name="fname" id="fname"
                                           value="'.$u['fname'].'"
                                           placeholder="Full Name" required >
                                </div>
                            </div>
                            <div class="col-md-2 min-des no-pdd">
                                <div class="sn-field">
                                    <label>Age</label>
                                    <input type="text" name="age" id="age"
                                           onkeypress="return isNumberKey(event);" maxlength="3"
                                           value="'.$u['age'].'"
                                           placeholder="Age" required>
                                </div>

                            </div>
                            <div class="col-md-4 min-des no-pdd">
                                <div class="sn-field">
                                    <label>Mobile</label>
                                    <input type="text" min="10" required
                                           name="mobile" id="mobile"
                                           value="'.$u['mobile_no'].'"
                                           oninvalid="this.setCustomValidity(\'\')"
                                           oninput="this.setCustomValidity(\'\')"
                                           onkeypress="return isNumberKey(event);"
                                           maxlength="10"
                                           
                                           onblur="mobnumber(this.value);">
                                </div>
                            </div>

                        </div>  <div class="row"><div class="row">';
                                                    
 
                                                  
                                                         $sel_date = date("Y-m-d", strtotime($u['vaccine1_date']));
                                                            $sel_time = $u['vaccine1_time'];
                                                            $msg1 = "";

                                                            $range = range(strtotime("10:00"), strtotime("16:00"), 15 * 60);
                                                            foreach ($range as $time) {
                                                                $c1 = count($this->timing_model->getbooking_byDate($sel_date, date("g:i: A", $time)));
                                                                $c2 = count($this->timing_model->getbooking_byDate1($sel_date, date("g:i: A", $time)));
                                                               
                                                                
                                                                $c = $c1 + $c2;
                                                                 $m="5";
                                                                 $d = $m - $c; 
                                                                if ($c > 5|| $c == 5) {
                                                                      
                                                                    if($sel_time == date("g:i: A", $time)) {
                                                                        $d1= $d - 1;
                                                                        $msg1.= '<option class="" value="' . date("g:i: A", $time) . '" selected >' . date("g:i: A", $time) . '- (  ' . $d1 . ' Avail --Currently booked ) </option>';
                                                                    }else{
                                                                        $msg1.= '<option class="greyclass" value="' . date("g:i: A", $time) . '"  disabled>' . date("g:i: A", $time) . ' - ( Full Booked ) </option>';
                                                                    }
                                                                }else{ 
                                                               
                                                                    
                                                                 
                                                                     if ($c != 0) {
                                                                        
                                                                        if($sel_time == date("g:i: A", $time)) {
                                                                            
                                                                            $d1 = $d - 1;
                                                                            $msg1.= '<option class="" value="' . date("g:i: A", $time) . '" selected>' . date("g:i: A", $time) . '- (  ' . $d1 . ' Avail --Currently booked )  </option>';
                                                                        }else{
                                                                             
                                                                            $msg1.= '<option class="" value="' . date("g:i: A", $time) . '" >' . date("g:i: A", $time) . '- (  ' . $d . ' Avail )  </option>';

                                                                        }
                                                                        
                                                                    } else {
                                                                        if($sel_time == date("g:i: A", $time)) {
                                                                            $d1 = $d - 1;
                                                                            $msg1.= '<option class="" value="' . date("g:i: A", $time) . '" selected>' . date("g:i: A", $time) . '- (  ' . $d1 . ' Avail ----Currently booked )  </option>';
                                                                        }else{
                                                                            $msg1.= '<option class="" value="' . date("g:i: A", $time) . '" >' . date("g:i: A", $time) . '- (  ' . $d . ' Avail )  </option>';

                                                                        }
                                                                    } 
                                                                }
                                                                
                                                            }  
                                                   $msg.='<input type="hidden" name="doseType" id="doseType" value="'.$u['vaccine_type'].'">
                                                    <input type="hidden" name="FKFormID" id="FKFormID" value="'.$u['FKFormID'].'">';
                                                    
                                                    $msg.='<div id="firstDiv"  class="col-md-12">
                                                      
                                                        <div class="col-md-4">
                                                            <div class="sn-field">
                                                                <label>Dose type</label>
                                                                 <select name="vaccine_type" id="vaccine_type"
                                                                        class="vaccine_time"
                                                                        onchange="addVaccine(this.value)" required>';
                                                                        if($u['vaccine_type']==1){
                                                                          $msg.='  <option value="1" selected >Dose 1</option>
                                                                     <option value="2">Dose 2</option>';
                                                                        }else{
                                                                              $msg.='  <option value="1"  >Dose 1</option>
                                                                     <option value="2" selected>Dose 2</option>';
                                                                        }
                                                                   
                                                                      
                                                                       $msg.=' </select>
                                                            </div>
                                                        </div>
                                                         <div class="col-md-12 min-des no-pdd" id="firstV_div">

                                                                    <div class="sn-field col-md-4 ">
                                                                         <label>Dose Date</label>
                                                                        <input type="date" class="datepicker" name="vaccine1_date" id="vaccine1_date" value="'.$u['vaccine1_date'].'"  min="2021-05-02" max="2021-05-03"
                                                                               onchange="get_all_booking(this.value,1);">
                                                                    </div>
                                                                    
                                                                    <div class="sn-field col-md-4 ">
                                                                         <label>Dose Time</label>
                                                                        <select name="vaccine1_time" id="vaccine1_time"
                                                                                class="vaccine_time"
                                                                                onchange="time_validation(this.value);" required>
                                                                            
                                                                             '.$msg1.'
                                                                             
                                                                        </select>
                                                                        
                                                                    </div>';
                                                                  if($u['vaccine_type']==2){ 
                                                                      if($u['firstVaccine']==""){
                                                                    $msg.=' <div class="sn-field col-md-4" id="vaccDiv" >
                                                                          <label>Dose Took</label>
                                                                         <select name="firstVaccine" id="firstVaccine"
                                                                                class="vaccine_time"   >
                                                                            <option value="">--Select Vaccine--</option>
                                                                            <option value="COVAXIN">COVAXIN</option>
                                                                            <option value="COVISHIELD">COVISHIELD</option>
                                                                        </select> 
                                                                    </div>';
                                                                  }else{
                                                                      
                                                                       $msg.=' <div class="sn-field col-md-4" id="vaccDiv" >
                                                                          <label>Dose Took</label>
                                                                         <select name="firstVaccine" id="firstVaccine"
                                                                                class="vaccine_time"   >';
                                                                           if($u['firstVaccine']=="COVAXIN"){
                                                                            $msg.=' <option value="COVAXIN" seleted>COVAXIN</option> <option value="COVISHIELD">COVISHIELD</option>';
                                                                           }
                                                                           if($u['firstVaccine']=="COVISHIELD"){
                                                                            $msg.='<option value="COVAXIN">COVAXIN</option> <option value="COVISHIELD" selected>COVISHIELD</option>';
                                                                           }
                                                                       $msg.=' </select> 
                                                                    </div>';
                                                                      
                                                                  }}else{
                                                                       $msg.='<div class="sn-field col-md-4" id="vaccDiv" style="display:none;">
                                                                          <label>Dose Took</label>
                                                                         <select name="firstVaccine" id="firstVaccine"
                                                                                class="vaccine_time"   >
                                                                            <option value="">--Select Vaccine--</option>
                                                                            <option value="COVAXIN" >COVAXIN</option>
                                                                            <option value="COVISHIELD" >COVISHIELD</option>
                                                                        </select> 
                                                                    </div>';
                                                                  }
                                                                  
                                                                 $msg.='</div>
                                                    </div>';
                                                    
                                                      
                                                           
 
                                                         
                                               $msg.=' </div> 
                        
 
                        ';
            }
            echo $msg; exit;
        }elseif ($dataLink == "timevalidation") {
            $sel_date= $this->input->post('sel_date');
            $sel_time= $this->input->post('vaccine1_time');
            $c = count($this->timing_model->getbooking_byDate1($sel_date,$sel_time));
            $c1 = count($this->timing_model->getbooking_byDate($sel_date,$sel_time));
            $t=$c+$c1;
             echo $t; exit;
             /*if($t >=5)
             {
                 echo "0";exit;
             }else{
                 echo "1"; exit;
             }*/
        }elseif ($dataLink == "timevalidation1") {
            echo "12"; exit;
        } elseif ($dataLink == "deleteMember") {
            $id= $this->input->post('id');

            $ress = $this->timing_model->member_delete($id);
            echo $ress; exit;
        } elseif ($dataLink == "get_product_prices_New") {

            $page_no = $this->input->post('page_no');
            if (!$page_no) {
                $data['sl'] = $offset = 0;
            } else {
                $data['sl'] = $offset = $page_no;
            }
            $FKServiceID = $this->input->post('FKServiceID');
            $FKSubServiceID = $this->input->post('FKSubServiceID');
            /********* ajax pagination *********/
            $product_counts = $this->product_model->get_product_prices_New(0, 0, 0, $FKServiceID, $FKSubServiceID);
            $product_count = count($product_counts);
            $url = BASE_URL . 'ajax/product/get_offer_products/';
            $config = $this->ajax_pagination_config($product_count, $url, PAGINATION_AJAX_PRODUCT_LIMIT, PAGINATION_AJAX_PRODUCT_SEGMENT, 'res', 'get_results');
            $data['links'] = $this->ajax_pagination->create_links();
            $data['page_no'] = $segment = $page_no;
            /********* ajax pagination *********/

            $data['products'] = $this->product_model->get_product_prices_New(0, PAGINATION_AJAX_PRODUCT_LIMIT, $offset, $FKServiceID, $FKSubServiceID);
            echo $this->load->view(BACKEND_REPEATS_VIEWS_FOLDER . '/' . WEB . '/' . BACKEND_TABLES_VIEWS_FOLDER . '/table_product_prices', $data, true);

        }

    }

    function delete_ajax($dataLink = '')
    {
        if ($dataLink == 'product') {
            echo $this->product_model->product_delete();
        } elseif ($dataLink == 'service') {
            echo $this->service_model->service_delete();
        } elseif ($dataLink == 'sub_service') {
            echo $this->service_model->subservice_delete();
        } elseif ($dataLink == 'product_image') {
            echo $this->product_model->product_image_delete();
        } elseif ($dataLink == 'service_image') {
            echo $this->service_model->service_image_delete();
        }

    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */