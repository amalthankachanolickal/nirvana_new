<?php

class Timing_model extends CI_Model
{

    function add_booking()
    {
      $dose_typ =$this->input->post('vaccine_type'); 

        $data = array(
            'user_id' => $_SESSION['login_id'],
            'block' => $this->input->post('block_prime'),
            'house' => $this->input->post('house_number'),
            'floor' => $this->input->post('floor_prime'),
            'age' => $this->input->post('age'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            /*'hospital_name' => $this->input->post('hospital_name'),*/
        );
        $FileAddFlag = $this->db->insert('covid_vaccine_form1', $data);
        if ($FileAddFlag) {
            $PKFileID = $this->db->insert_id();
////// Check availability//////////////////////

            // $ret=$this->get_time_validation($sel_date,$sel_time);
       
        if($dose_typ==YES){
            $data1 = array(
                'FKFormID' => $PKFileID,
                'user_id' => $_SESSION['login_id'],
                'fname' =>$this->input->post('fname'),
                 'mname' =>$this->input->post('mname'),
                  'lname' =>$this->input->post('lname'),
                'vaccine_type' => $dose_typ,
                'vaccine1_date' => date('Y-m-d', strtotime($this->input->post('vaccine1_date'))),
                'vaccine1_time' => $this->input->post('vaccine1_time'),
                'age' => $this->input->post('age'),
                'mobile_no' => $this->input->post('mobile'),
                'updated_by'=> 1
            );
        }else{
            $data1 = array(
                'FKFormID' => $PKFileID,
                'user_id' => $_SESSION['login_id'],
                'fname' =>$this->input->post('fname'),
                'vaccine_type' => $dose_typ,
                'vaccine1_date' => date('Y-m-d', strtotime($this->input->post('vaccine1_date'))),
                'vaccine1_time' => $this->input->post('vaccine1_time'),
                'firstVaccine' => $this->input->post('firstVaccine'),
                'age' => $this->input->post('age'),
                'mobile_no' => $this->input->post('mobile'),
                'updated_by'=> 1
            );
        }
            $FileAddFlag = $this->db->insert('covidvaccine_fam1', $data1);

            
            return $PKFileID;
        } else {
            return false;
        }
    }
    function get_time_validation($dat,$tim){

       $c1=$this->getbooking_byDate1($dat,$tim);
       $c=$this->getbooking_byDate($dat,$tim);
       $count=$c+$c1;
        if($count >= 5)
        {
            $plus_time=  strtotime($tim) + 900;
            //echo $plus_time; exit;
            $this->get_time_validation($dat,$plus_time);
        }else{
            return $tim;

          
        }
    }
    function getbooking_byDate($sel_date,$time=0,$user_id=0)
    {

        $this->db->select('*');
        $this->db->from('covidvaccine_fam1 cf');
        $this->db->join('covid_vaccine_form1 cv', 'cv.user_id = cf.user_id', 'left');
        if ($sel_date != "") {
            $this->db->where('cf.vaccine1_date',date('Y-m-d', strtotime($sel_date)));

        }
        if ($time != "0") {
            $this->db->where('cf.vaccine1_time',$time);
        }
        if($user_id !="0")
        {
            $this->db->where('cv.user_id',$user_id);
        }
        $this->db->where('cf.deleteFlag',0);
        $this->db->group_by('cf.id');
        $this->db->order_by('cf.id', 'ASC');

            $query = $this->db->get();
            return $query->result_array();

    }
    function getbooking_byUser($user_id,$sel_date="",$time=0)
    {
        $this->db->select('*');
        $this->db->from('covid_vaccine_form1 cv');
        $this->db->join('covidvaccine_fam1 cf', 'cv.user_id = cf.user_id', 'inner');
        if ($sel_date != "") {
            $this->db->where('cf.vaccine_date',date('Y-m-d', strtotime($sel_date)));
        }
        if ($time != "0") {
            $this->db->where('cf.vaccine_time',$time);
        }
        if($user_id !="0")
        {
            $this->db->where('cv.user_id',$user_id);
        }
         $this->db->where('cf.deleteFlag',0);
        $this->db->group_by('cv.user_id');
        $this->db->order_by('cf.id', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    function getFamilyUser($user_id,$id=0)
    {
        $this->db->select('*');
        $this->db->from('covidvaccine_fam1 cf');
        if ($id != "") {
            $this->db->where('cf.id',$id);
        }
        if($user_id !="0")
        {
            $this->db->where('cf.user_id',$user_id);
        }
        $this->db->group_by('cf.id');

        $query = $this->db->get();
        return $query->result_array();


    }
    function getbooking_byDate1($sel_date,$time=0,$user_id=0)
    {
        $this->db->select('*');
        $this->db->from('covidvaccine_fam1 cf');
        $this->db->join('covid_vaccine_form1 cv', 'cv.user_id = cf.user_id', 'inner');
        if ($sel_date != "") {
            $this->db->where('cf.vaccine2_date',date('Y-m-d', strtotime($sel_date)));

        }
        if ($time != "0") {
            $this->db->where('cf.vaccine2_time',$time);
        }
        if($user_id !="0")
        {
            $this->db->where('cv.user_id',$user_id);
        }
        $this->db->where('cf.deleteFlag',0);
        $this->db->group_by('cf.id');
        $this->db->order_by('cf.id', 'ASC');

        $query = $this->db->get();
        return $query->result_array();

    }
     function update_member_booking()
    {
        $memberId= $this->input->post('id');
        
        $vaccine_type=$this->input->post('vaccine_type');  
            if($vaccine_type == YES){
            $data1 = array(
                'FKFormID' => $this->input->post('FKFormID'),
                'user_id' => $_SESSION['login_id'],
                'vaccine1_date' => $this->input->post('vaccine1_date'),
                'vaccine1_time' => $this->input->post('vaccine1_time'), 
                'age' => $this->input->post('age'),
                'mobile_no' => $this->input->post('mobile'),
            );
            }else{
                $data1 = array(
                'FKFormID' => $this->input->post('FKFormID'),
                'user_id' => $_SESSION['login_id'],
                'vaccine1_date' => $this->input->post('vaccine1_date'),
                'vaccine1_time' => $this->input->post('vaccine1_time'),
                'vaccine_type'=> $this->input->post('vaccine_type'),
                'firstVaccine'=> $this->input->post('firstVaccine'),
                'age' => $this->input->post('age'),
                'mobile_no' => $this->input->post('mobile'),
            );
            }
            $this->db->where('id', $memberId);
            $bookUpdateFlag = $this->db->update('covidvaccine_fam1', $data1);

        
        return $bookUpdateFlag;
    }

    function registrant_booking()
    {
        $dose_typ=$this->input->post('vaccine_type');
         if($dose_typ==YES){
            $data1 = array(
                'FKFormID' => $this->input->post('FKFormID'),
                'user_id' => $_SESSION['login_id'],
                'fname' =>$this->input->post('fname'),
                'vaccine_type' => $dose_typ,
                'vaccine1_date' => date('Y-m-d', strtotime($this->input->post('vaccine1_date'))),
                'vaccine1_time' => $this->input->post('vaccine1_time'),
                'age' => $this->input->post('age'),
                'mobile_no' => $this->input->post('mobile'),
                'updated_by'=>0
            );
        }else{
            $data1 = array(
                'FKFormID' => $this->input->post('FKFormID'),
                'user_id' => $_SESSION['login_id'],
                'fname' =>$this->input->post('fname'),
                'vaccine_type' => $dose_typ,
                'vaccine1_date' => date('Y-m-d', strtotime($this->input->post('vaccine1_date'))),
                'vaccine1_time' => $this->input->post('vaccine1_time'),
                'firstVaccine' => $this->input->post('firstVaccine'),
                'age' => $this->input->post('age'),
                'mobile_no' => $this->input->post('mobile'),
                'updated_by'=>0
            );
        }  
        $FileAddFlag = $this->db->insert('covidvaccine_fam1', $data1);
        $PKFileID = $this->db->insert_id();
         return $PKFileID;

    }
     function registrant_editing()
    {
        $vaccine_type=$this->input->post('vaccine_type');  
            if($vaccine_type == YES){
            $data1 = array(
                'FKFormID' => $this->input->post('FKFormID'),
                'user_id' => $_SESSION['login_id'],
                'vaccine1_date' => $this->input->post('vaccine1_date'),
                'vaccine1_time' => $this->input->post('vaccine1_time'), 
                'age' => $this->input->post('age'),
                'mobile_no' => $this->input->post('mobile'),
            );
            }else{
                $data1 = array(
                'FKFormID' => $this->input->post('FKFormID'),
                'user_id' => $_SESSION['login_id'],
                'vaccine1_date' => $this->input->post('vaccine1_date'),
                'vaccine1_time' => $this->input->post('vaccine1_time'),
                'vaccine_type'=> $this->input->post('vaccine_type'),
                'firstVaccine'=> $this->input->post('firstVaccine'),
                'age' => $this->input->post('age'),
                'mobile_no' => $this->input->post('mobile'),
            );
            }
            $this->db->where('id', $memberId);
            $bookUpdateFlag = $this->db->update('covidvaccine_fam1', $data1);

        $FileAddFlag = $this->db->insert('covidvaccine_fam1', $data1);
        $PKFileID = $this->db->insert_id();
         return $PKFileID;

    }
    function getMainFamilyUser($user_id,$sel_date="",$time=0)
    {
        $this->db->select('*');
        $this->db->from('covidvaccine_fam1 cf');
        if ($sel_date != "") {
            $this->db->where('cf.vaccine_date',date('Y-m-d', strtotime($sel_date)));
        }
        if ($time != "0") {
            $this->db->where('cf.vaccine_time',$time);
        }
        if($user_id !="0")
        {
            $this->db->where('cf.user_id',$user_id);
        }
        $this->db->where('cf.updated_by',YES);
        $this->db->group_by('cf.id');

        $query = $this->db->get();
        return $query->result_array();


    }
    function member_delete($id)
    {
        $data = array(
            'deleteFlag' => 1
        );
        $this->db->where('id', $id);
        $galleryUpdateFlag = $this->db->update('covidvaccine_fam1', $data);

        if ($galleryUpdateFlag) {
            return true;
        } else {
            return false;
        }
    }
     
     function time_slot($datt,$tim)
     {
          $sel_date = date("Y-m-d", strtotime($datt));
            
           $c1 = count($this->getbooking_byDate($sel_date,$tim));
                $c2 = count($this->getbooking_byDate1($sel_date,$tim));
                $c = $c1 + $c2;
            $d = 5 - $c;
            echo $d;
            exit;
     }
////////////////////////////////////////////////////////////////////////////
    function update_booking()
    {
        $memberId=$this->input->post('memberId');
        $data = array(
            'block' => $this->input->post('block_prime'),
            'house' => $this->input->post('house_number'),
            'floor' => $this->input->post('floor_prime'),
            'age' => $this->input->post('age'),
            'mobile' => $this->input->post('mobile')
        );
       // $FileAddFlag = $this->db->insert('covid_vaccine_form1', $data);

        $this->db->where('user_id',  $_SESSION['login_id']);
        $bookUpdateFlag = $this->db->update('covid_vaccine_form1', $data);

        if ($bookUpdateFlag) {

            ////// Check availability//////////////////////
            
            /////////////////
            $vaccine_type=$this->input->post('vaccine_type');  
            if($vaccine_type == YES){
            $data1 = array(
                'FKFormID' => $this->input->post('FKFormID'),
                'user_id' => $_SESSION['login_id'],
                'vaccine_type'=> $this->input->post('vaccine_type'),
                'vaccine1_date' => $this->input->post('vaccine1_date'),
                'vaccine1_time' => $this->input->post('vaccine1_time'), 
                'age' => $this->input->post('age'),
                'mobile_no' => $this->input->post('mobile'),
            );
            }else{
                $data1 = array(
                'FKFormID' => $this->input->post('FKFormID'),
                'user_id' => $_SESSION['login_id'],
                'vaccine1_date' => $this->input->post('vaccine1_date'),
                'vaccine1_time' => $this->input->post('vaccine1_time'),
                'vaccine_type'=> $this->input->post('vaccine_type'),
                'firstVaccine'=> $this->input->post('firstVaccine'),
                'age' => $this->input->post('age'),
                'mobile_no' => $this->input->post('mobile'),
            );
            }
            $this->db->where('id', $memberId);
            $bookUpdateFlag = $this->db->update('covidvaccine_fam1', $data1);

             return $bookUpdateFlag;
        } else {
            return false;
        }
    }

////////End of modification///////////////////////////////////////////////////////////////////////////////////////////////////
    function update_gallery()
    {
        $PKGalleryID = $this->input->post('PKGalleryID');

        $galleryPic = $this->input->post('galleryPicPrev');
        if ($_FILES["galleryPic"]["error"] == 0) {
            unlink(UPLOAD_DEPT_GALLERY_PATH . $galleryPic);
            $memberPicOrg = $_FILES['galleryPic']['name'];
            $ext = pathinfo($memberPicOrg, PATHINFO_EXTENSION);
            $galleryPic = "GalleryPic" . sprintf("%06d", $PKGalleryID) . "." . $ext;
            move_uploaded_file($_FILES["galleryPic"]["tmp_name"], UPLOAD_DEPT_GALLERY_PATH . $galleryPic);
        }
        $data = array(
            'galleryTitle' => $this->input->post('galleryTitle'),
            'galleryDescription' => $this->input->post('galleryDescription'),
            'galleryPic' => $galleryPic
        );
        $this->db->where('PKGalleryID', $PKGalleryID);
        $GalleryUpdateFlag = $this->db->update('mst_galleries', $data);
        if ($GalleryUpdateFlag) {
            return true;
        } else {
            return false;
        }
    }

    function get_gallery_count()
    {

        $this->db->order_by('mg.PKGalleryID', 'desc');
        $this->db->from('mst_galleries mg');
        return $this->db->count_all_results();
    }

    function get_max_gallery_id()
    {
        $this->db->select_max('mg.PKGalleryID');
        $result = $this->db->get('mst_galleries mg')->row();
        return $result->PKGalleryID;
    }



    /************* File **************************/


    function update_file()
    {
        $PKFileID = $this->input->post('PKFileID');
        $fileName = $this->input->post('fileNamePrev');
        $fileType = $this->input->post('fileType');


            if ($_FILES["fileName"]["error"] == 0) {
                unlink(UPLOAD_DEPT_GALLERY_IMAGE_PATH . $fileName);
                $filePicOrg = $_FILES['fileName']['name'];
                $ext = pathinfo($filePicOrg, PATHINFO_EXTENSION);
                $fileName = "FileImage" . sprintf("%06d", $PKFileID) . "." . $ext;
                move_uploaded_file($_FILES["fileName"]["tmp_name"], UPLOAD_DEPT_GALLERY_IMAGE_PATH . $fileName);
   }

        $data = array(
            'FKGalleryID' => $PKFileID,
            'fileTitle' => $this->input->post('fileTitle'),
            'fileDescription' => $this->input->post('fileDescription'),
            'fileName' => $fileName
        );
        $this->db->where('PKFileID', $PKFileID);
        $FileUpdateFlag = $this->db->update('mst_gallery_files', $data);
        if ($FileUpdateFlag) {
            return true;
        } else {
            return false;
        }
    }

    function get_files($file_id = 0, $limit = 0, $offset = 0, $file_type = UPLOAD_FILE_ALL, $gallery_id = 0)
    {
        $this->db->select('*');
        $this->db->from('mst_gallery_files mgf');
        $this->db->join('mst_galleries mg', 'mg.PKGalleryID = mgf.FKGalleryID', 'inner');
        if ($file_id != 0) {
            $this->db->where('mgf.PKFileID', $file_id);
        }
        if ($limit != 0) {
            $this->db->limit($limit, $offset);
        }

        if ($gallery_id != 0) {
            $this->db->where('mgf.FKGalleryID', $gallery_id);
        }
        $this->db->where('mgf.fileDeleteFlag', 0);
        if ($file_id != 0) {
            $query = $this->db->get()->row();
            return $query;
        } else {
            $this->db->order_by('mgf.fileCreatedTimestamp', 'DESC');
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    function get_file_count($fileType = UPLOAD_FILE_ALL, $member_id = 0)
    {
        if ($fileType != UPLOAD_FILE_ALL) {
            $this->db->where('mgf.fileType', $fileType);
        }
        if ($member_id != 0) {
            $this->db->where('mgf.FKCalendarID', $member_id);
        }
        $this->db->from('mst_gallery_files mgf');
        return $this->db->count_all_results();
    }

    function get_max_file_id()
    {
        $this->db->select_max('mgf.PKFileID');
        $result = $this->db->get('mst_gallery_files mgf')->row();
        return $result->PKFileID;
    }

    function files_delete()
    {
        $data = array(
            'fileDeleteFlag' => 1
        );
        $this->db->where('PKFileID', $this->input->post('PKFileID'));
        $filesUpdateFlag = $this->db->update('mst_gallery_files', $data);

        if ($filesUpdateFlag) {
            return true;
        } else {
            return false;
        }
    }
}

?>