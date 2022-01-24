<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_Controller extends CI_Controller
{
    var $emp_search_keyword = '';
    var $emp_type = 0;

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('asia/kolkata');

        /*----Base URL----*/
        define('BASE_URL', base_url());
        /*----Base URL----*/
    }

    /*----Login Functions Starts----*/
    function verifylogin()
    {
        $response = array();
        $loginDetails = $this->check_database();
            if ($loginDetails['Status'] == LOGIN_FAILED) {
                if ($loginDetails['ErrorCode'] == WRONG_CREDENTIALS) {
                    $_SESSION["Message"] = MESSAGE_WRONG_CREDENTIALS;
                    $_SESSION["MessageType"] = FAILURE;
                } elseif ($loginDetails['ErrorCode'] == WRONG_PASSWORD) {
                    $_SESSION["Message"] = MESSAGE_WRONG_PASSWORD;
                    $_SESSION["MessageType"] = FAILURE;
                } elseif ($loginDetails['ErrorCode'] == ACCOUNT_INACTIVE) {
                    $_SESSION["Message"] = MESSAGE_ACCOUNT_INACTIVE;
                    $_SESSION["MessageType"] = FAILURE;
                }


                    redirect(BASE_URL , 'login');

            } else if ($loginDetails['Status'] == LOGIN_SUCCESS) {

                $_SESSION["Message"] = "LOGIN SUCCESSFUL!!";
                $_SESSION["MessageType"] = SUCCESS;

                    redirect(BASE_URL."vaccine" , 'refresh');

            }

    }

    function check_database()
    {
        $logindetails = array();
        $result = $this->login_model->Login();

        if ($result['Status'] == LOGIN_SUCCESS) {
            $loginresult = $result['Data'];
                $logindetails["login_id"] = $_SESSION["login_id"] = $loginresult->user_id;
                $logindetails["login_uid"] = $_SESSION["login_uid"] = $loginresult->user_name;
                $logindetails["login_name"] = $_SESSION["login_name"] = $loginresult->user_name;
                $logindetails["login_pic"] = $_SESSION["login_pic"] = "";

        }
        return $result;
    }

    function login_check($Type)
    {
         
        if (!isset($_SESSION['login_id'])) {
            $this->logout();
        } else {
           // if ($_SESSION['login_type'] != $Type) {
               // $this->logout();
            //}
        }
    }

    function logout()
    {
        session_unset();
        $_SESSION['message'] = "Logged Out Successfully";
        $_SESSION["MessageType"] = 1;
        redirect(BASE_URL."login", 'refresh');
    }
    /*----Login Functions Ends----*/

    /*----Pagination Functions Starts----*/
    function pagination_config($num_rows = 0, $url = '', $per_page = 10, $uri_segment = 3, $prefix = '', $suffix = '')
    {

        if ($uri_segment === '') {
            $uri_segment = uri_string() . 'index';
        }
        $config = array(
            'base_url' => $url,
            'prefix' => $prefix,
            'suffix' => $suffix,
            'total_rows' => $num_rows,
            'per_page' => $per_page,
            'uri_segment' => $uri_segment,
            'next_link' => 'Next',
            'prev_link' => 'Previous',
            'use_page_numbers' => TRUE,
            'num_links' => '15',
            'full_tag_open' => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'next_tag_open' => '<li class="next page">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="prev page">',
            'prev_tag_close' => '</li>',
            'cur_tag_open' => '<li class="active"><a href="">',
            'cur_tag_close' => '</a></li>',
            'num_tag_open' => '<li class="page">',
            'num_tag_close' => '</li>',
        );
        $this->pagination->initialize($config);
        return $config;
    }

    function ajax_pagination_config($num_rows = 0, $url = '', $per_page = 10, $uri_segment = 3, $target = '', $function = '')
    {

        if ($uri_segment === '') {
            $uri_segment = uri_string() . 'index';
        }
        $config = array(
            'target' => '#' . $target,
            'base_url' => $url,
            'total_rows' => $num_rows,
            'per_page' => $per_page,
            'link_func' => $function,
            'uri_segment' => $uri_segment,
            'next_link' => 'Next',
            'prev_link' => 'Previous',
            'use_page_numbers' => TRUE,
            'num_links' => '15',
            'full_tag_open' => '<ul class="pagination">',
            'full_tag_close' => '</ul>',
            'next_tag_open' => '<li class="next page">',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li class="prev page">',
            'prev_tag_close' => '</li>',
            'cur_tag_open' => '<li class="active"><a href="javascript:void(0);">',
            'cur_tag_close' => '</a></li>',
            'num_tag_open' => '<li class="page">',
            'num_tag_close' => '</li>',
        );
        $this->ajax_pagination->initialize($config);
        return $config;
    }
    function checkFileExist($path = '', $fileName = '', $defaultImage = '')
    {
        if ($fileName != '' && file_exists($path . $fileName)) {
            return BASE_URL . $path . $fileName . '?' . time();
        } else {
            if ($defaultImage != '') {
                return BASE_URL . $defaultImage . '?' . time();
            } else {
                return $defaultImage;
            }
        }
    }
    function offset_cal($limit, $offset)
    {
        if ($offset != 0) {
            $offset = ($offset - 1) * $limit;
        }
        return $offset;
    }

    function pagination()
    {
        $staff_count = $this->staff_model->get_staff_count();
        $url = BASE_URL . 'employee/staff/web/view';
        $config = $this->pagination_config($staff_count, $url, PAGINATION_STAFF_LIMIT, PAGINATION_STAFF_SEGMENT);
        $data['link'] = $this->pagination->create_links();
        $segment = $this->uri->segment(PAGINATION_STAFF_SEGMENT) ? $this->uri->segment(PAGINATION_STAFF_SEGMENT) : 0;
        $data['sl'] = $offset = $this->offset_cal(PAGINATION_STAFF_LIMIT, $segment);
    }
    /*----Pagination Functions Ends----*/

    /*----String Functions Starts----*/
    function pluralize($single = '', $plural = '', $number = 0)
    {
        $number = round($number);
        if ($single != '' && $plural != '' && $number > 0) {
            return ngettext($single, $plural, $number);
        } else {
            return null;
        }
    }

    /*----String Functions Ends----*/

    function RandomNumber($digits)
    {
        $min = pow(10, $digits - 1);
        $max = (pow(10, $digits) - 1);
        return rand($min, $max);
    }

    /*----Date Functions Starts----*/
    function date_difference($date1 = '', $date2 = '')
    {
        $to_date = date_create($date1);
        if ($date2 != '') {
            $from_date = date_create($date2);
        } else {
            $from_date = date_create(time());
        }
        $difference_in_days = date_diff($from_date, $to_date);
        return $difference_in_days->format("%R%a");
    }

    function same_month_check($Date = '', $Today = '')
    {
        $fromDate = new DateTime();
        if ($Today != '') {
            $fromDate->setTimestamp(strtotime($Today));
        } else {
            $fromDate->setTimestamp(time());
        }

        $toDate = new DateTime();
        $toDate->setTimestamp(strtotime($Date));

        if ($fromDate->format('Y-m') === $toDate->format('Y-m')) {
            return true;
        } else {
            return false;
        }
    }

    function date_between_check($checkingDate = '', $startDate = '', $endDate = '')
    {
        //$checkDate = date('Y-m-d');
        $checkDate = date('Y-m-d', strtotime($checkingDate));
        $periodStartDate = date('Y-m-d', strtotime($startDate));
        $periodEndDate = date('Y-m-d', strtotime($endDate));

        if (($checkDate >= $periodStartDate) && ($checkDate <= $periodEndDate)) {
            return true;
        } else {
            return false;
        }
    }
    /*----Date Functions Ends----*/

    /*----Banner Links Functions Starts----*/
    function banner_links_creation($count = 0, $labels = array(), $links = array())
    {
        $link_prefix = BASE_URL . $_SESSION['login_type'];
        $banner = "";
        if ($count > 0) {
            for ($i = 0; $i < $count; $i++) {
                if ($i == ($count - 1)) {
                    $banner .= '<span>' . $labels[$i] . '</span>';
                } else {
                    $banner .= '<a href="' . $link_prefix . $links[$i] . '">' . $labels[$i] . '</a><i class="fa fa-angle-right"></i>';
                }
            }
        } else {
            $banner = "";
        }
        return $banner;
    }
    /*----Banner Links Functions Ends----*/

    /*----Image Functions Starts----*/
    function thumbnail($imageName, $sourceDirectory, $destinationDirectory, $maxWidth, $maxHeight)
    {
        $jpg = $sourceDirectory . $imageName;

        if ($jpg) {
            list($width, $height) = getimagesize($jpg); //$type will return the type of the image
            $sourceDirectory = imagecreatefromjpeg($jpg);

            if ($maxWidth >= $width && $maxHeight >= $height) {
                $ratio = 1;
            } elseif ($width > $height) {
                $ratio = $maxWidth / $width;
            } else {
                $ratio = $maxHeight / $height;
            }

            $modified_width = round($width * $ratio); //get the smaller value from cal # floor()
            $modified_height = round($height * $ratio);

            $modifiedImage = imagecreatetruecolor($modified_width, $modified_height);
            imagecopyresampled($modifiedImage, $sourceDirectory, 0, 0, 0, 0, $modified_width, $modified_height, $width, $height);

            $path = $destinationDirectory . $imageName;
            imagejpeg($modifiedImage, $path, 75);
        }
        imagedestroy($modifiedImage);
        imagedestroy($sourceDirectory);
    }
    /*----Image Functions Ends----*/

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
