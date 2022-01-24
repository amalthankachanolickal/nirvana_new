<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Home_Controller
{
    protected static $admin_banner_segments_count = 0;
    protected static $admin_banner_label = array();
    protected static $admin_banner_link = array();

    function __construct()
    {
        parent::__construct();
        $this->login_check(ADMIN);
        self::$admin_banner_label[0] = 'Dashboard';
        self::$admin_banner_link[0] = '/dashboard/web';
    }

    function index($Device = WEB)
    {
        $data = array();
        if ($Device == WEB) {
            self::$admin_banner_segments_count = 1;
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);

            $data['total_products'] = $this->product_model->get_product_count();
            $data['products'] = $this->product_model->get_product(0, 4);
            $this->load->view(BACKEND_COMPANY_VIEWS_FOLDER . '/' . WEB . '/dashboard', $data);
        }
    }

    function views($page = 'dashboard', $Device = WEB, $page_sub = '')
    {
        $data = array();

        if ($page == 'dashboard') {


            $this->load->view(BACKEND_COMPANY_VIEWS_FOLDER . '/' . WEB . '/dashboard', $data);
        } elseif ($page == 'parish') {
            $data['products'] = $this->parish_model->get_products();
            $this->load->view(BACKEND_COMPANY_VIEWS_FOLDER . '/' . $Device . '/' . $page . "_" . $page_sub, $data);
        } elseif ($page == 'profile') {
            $data['profile'] = $this->admin_model->get_admins($_SESSION['login_id']);
            $this->load->view(BACKEND_COMPANY_VIEWS_FOLDER . '/' . $Device . '/' . $page, $data);
        } else {
            $this->load->view(BACKEND_COMPANY_VIEWS_FOLDER . '/' . $Device . '/' . $page, $data);
        }
    }

    function product_views($Device = WEB, $link = 'view', $product_id = 0)
    {
        self::$admin_banner_label[1] = 'Product';
        self::$admin_banner_link[1] = '/product/web/view';
        $data = array();
        $prefix = 'product_';
        $page = $prefix . $link;
        if ($link == 'new') {
            /********* banner *********/
            self::$admin_banner_segments_count = 3;
            self::$admin_banner_label[2] = 'New';
            self::$admin_banner_link[2] = '';
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/

            /*if ($this->input->post('btn_product_add')) {
                $_SESSION['MessageType'] = $this->product_model->add_product();
                if ($_SESSION['MessageType']) {
                    $_SESSION['Message'] = MESSAGE_PRODUCT_ADD_SUCCESS;
                } else {
                    $_SESSION['Message'] = MESSAGE_PRODUCT_ADD_FAILURE;
                }
                redirect(BASE_URL . $_SESSION['login_type'] . "/product/web/view", 'refresh');
            }*/
            if ($this->input->post('btn_product_add')) {
                $this->load->library('form_validation');

                if ($this->form_validation->run() == FALSE) {
                   // $this->load->view('myform');
                     echo "failure"; exit;
                } else {
                    $_SESSION['MessageType'] = $this->product_model->add_product();
                    if ($_SESSION['MessageType']) {
                        $_SESSION['Message'] = MESSAGE_PRODUCT_ADD_SUCCESS;
                    } else {
                        $_SESSION['Message'] = MESSAGE_PRODUCT_ADD_FAILURE;
                    }
                    redirect(BASE_URL . $_SESSION['login_type'] . "/product/web/view", 'refresh');
                }
            }


        } elseif ($link == 'edit') {
            if ($this->input->post('btn_product_update')) {
                $this->product_model->update_product($product_id);
            }
            $data['product'] = $this->product_model->get_product($product_id);
        } else if ($link == 'view') {
            /********* banner *********/
            self::$admin_banner_segments_count = 2;
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/

            /********* pagination *********/
            $product_count = $this->product_model->get_product_count();
            $url = BASE_URL . $_SESSION['login_type'] . '/product/web/view';
            $config = $this->pagination_config($product_count, $url, PAGINATION_PRODUCT_LIMIT, PAGINATION_PRODUCT_SEGMENT);
            $data['links'] = $this->pagination->create_links();
            $segment = $this->uri->segment(PAGINATION_PRODUCT_SEGMENT) ? $this->uri->segment(PAGINATION_PRODUCT_SEGMENT) : 0;
            $data['sl'] = $offset = $this->offset_cal(PAGINATION_PRODUCT_LIMIT, $segment);
            /********* pagination *********/
            $data['products'] = $this->product_model->get_product(0, PAGINATION_PRODUCT_LIMIT, $offset);
        } else if ($link == 'detail') {
            /********* banner *********/
            self::$admin_banner_segments_count = 3;
            self::$admin_banner_label[2] = 'Details';
            self::$admin_banner_link[2] = '';
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/
            $data['products'] = $this->product_model->get_product($product_id);
            // $data['product_images'] = $this->product_model->get_product_images(0, $product_id);

        }
        $this->load->view(BACKEND_PRODUCT_VIEWS_FOLDER . '/' . $Device . '/' . $page, $data);

    }

    function service_views($Device = WEB, $link = 'view', $service_id = 0)
    {
        self::$admin_banner_label[1] = 'Service';
        self::$admin_banner_link[1] = '/service/web/view';
        $data = array();
        $prefix = 'service_';
        $page = $prefix . $link;
        if ($link == 'new') {

            /********* banner *********/
            self::$admin_banner_segments_count = 3;
            self::$admin_banner_label[2] = 'New';
            self::$admin_banner_link[2] = '';
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/

            if ($this->input->post('btn_service_add')) {
                $_SESSION['MessageType'] = $this->service_model->add_service(DB_INSERT);
                if ($_SESSION['MessageType']) {
                    $_SESSION['Message'] = MESSAGE_SERVICE_ADD_SUCCESS;
                } else {
                    $_SESSION['Message'] = MESSAGE_SERVICE_ADD_FAILURE;
                }
                redirect(BASE_URL . $_SESSION['login_type'] . "/service/web/view", 'refresh');
            }
            $data['product'] = $this->product_model->get_product();
            $data['staffs'] = $this->staff_model->get_staffs();
        } elseif ($link == 'edit') {
            /********* banner *********/
            self::$admin_banner_segments_count = 3;
            self::$admin_banner_label[2] = 'Edit';
            self::$admin_banner_link[2] = '';
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/
            if ($this->input->post('btn_service_update')) {
                $_SESSION['MessageType'] = $this->service_model->update_service($service_id);
                if ($_SESSION['MessageType']) {
                    $_SESSION['Message'] = MESSAGE_SERVICE_UPD_SUCCESS;
                } else {
                    $_SESSION['Message'] = MESSAGE_SERVICE_UPD_FAILURE;
                }
                redirect(BASE_URL . $_SESSION['login_type'] . "/service/web/view", 'refresh');
            }

            $data['service_id'] = $service_id;
            $data['service'] = $this->service_model->get_service($service_id);
            $data['product'] = $this->product_model->get_product();
            $data['staffs'] = $this->staff_model->get_staffs();
        } elseif ($link == 'view') {
            /********* banner *********/
            self::$admin_banner_segments_count = 2;
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/

            /********* pagination *********/
            $service_count = $this->service_model->get_service_count();
            $url = BASE_URL . $_SESSION['login_type'] . '/service/web/view';
            $config = $this->pagination_config($service_count, $url, PAGINATION_SERVICE_LIMIT, PAGINATION_SERVICE_SEGMENT);
            $data['links'] = $this->pagination->create_links();
            $segment = $this->uri->segment(PAGINATION_SERVICE_SEGMENT) ? $this->uri->segment(PAGINATION_SERVICE_SEGMENT) : 0;
            $data['sl'] = $offset = $this->offset_cal(PAGINATION_SERVICE_LIMIT, $segment);
            /********* pagination *********/
            $data['services'] = $this->service_model->get_service(0, PAGINATION_SERVICE_LIMIT, $offset);
        } elseif ($link == 'detail') {
            /********* banner *********/
            self::$admin_banner_segments_count = 3;
            self::$admin_banner_label[2] = 'Details';
            self::$admin_banner_link[2] = '';
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/
            $data['service'] = $this->service_model->get_service($service_id);
        } elseif ($link == 'download') {
            /********* banner *********/
            self::$admin_banner_segments_count = 3;
            self::$admin_banner_label[2] = 'Details';
            self::$admin_banner_link[2] = '';
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/
            $data['service'] = $this->service_model->get_service($service_id);
        } elseif ($link == 'report') {

            /********* banner *********/
            self::$admin_banner_segments_count = 2;
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/

            /********* pagination *********/
            $service_count = $this->service_model->get_service_count();
            $url = BASE_URL . $_SESSION['login_type'] . '/service/web/view';
            $config = $this->pagination_config($service_count, $url, PAGINATION_SERVICE_LIMIT, PAGINATION_SERVICE_SEGMENT);
            $data['links'] = $this->pagination->create_links();
            $segment = $this->uri->segment(PAGINATION_SERVICE_SEGMENT) ? $this->uri->segment(PAGINATION_SERVICE_SEGMENT) : 0;
            $data['sl'] = $offset = $this->offset_cal(PAGINATION_SERVICE_LIMIT, $segment);
            /********* pagination *********/
            $data['services'] = $this->service_model->get_service(0, PAGINATION_SERVICE_LIMIT, $offset);
            $data['staffs'] = $this->staff_model->get_staffs();
        } elseif ($link == 'update') {
            /********* banner *********/
            self::$admin_banner_segments_count = 3;
            self::$admin_banner_label[2] = 'Edit';
            self::$admin_banner_link[2] = '';
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/

            if ($this->input->post('btn_subService_update')) {
                $_SESSION['MessageType'] = $this->service_model->update_subService($service_id);
                if ($_SESSION['MessageType']) {
                    $_SESSION['Message'] = MESSAGE_SUB_SERVICE_UPD_SUCCESS;
                } else {
                    $_SESSION['Message'] = MESSAGE_SUB_SERVICE_UPD_FAILURE;
                }

                //redirect(BASE_URL . $_SESSION['login_type'] . "/service/web/detail/" . $service_id, 'refresh');
            }
            $data['sub_service'] = $this->service_model->get_subCategories($service_id);


        }
        $this->load->view(BACKEND_SERVICE_VIEWS_FOLDER . '/' . $Device . '/' . $page, $data);
    }

    function staff_views($Device = WEB, $link = 'new', $staff_id = 0)
    {
        self::$admin_banner_label[1] = 'Staff';
        self::$admin_banner_link[1] = '/staff/web/view';
        $data = array();
        $prefix = 'staff_';
        $page = $prefix . $link;
        if ($link == 'new') {
            /********* banner *********/
            self::$admin_banner_segments_count = 3;
            self::$admin_banner_label[2] = 'New';
            self::$admin_banner_link[2] = '';
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/

            if ($this->input->post('btn_staff_add')) {
                $_SESSION['MessageType'] = $this->staff_model->add_staff();
                if ($_SESSION['MessageType']) {
                    $_SESSION['Message'] = MESSAGE_STAFF_ADD_SUCCESS;
                } else {
                    $_SESSION['Message'] = MESSAGE_STAFF_ADD_FAILURE;
                }
                redirect(BASE_URL . $_SESSION['login_type'] . "/staff/web/view", 'refresh');
            }
            $this->load->view(BACKEND_STAFF_VIEWS_FOLDER . '/' . $Device . '/' . $page, $data);
        } else if ($link == 'edit') {
            /********* banner *********/
            self::$admin_banner_segments_count = 2;
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/
            if ($this->input->post('btn_staff_update')) {
                $this->staff_model->update_staff($staff_id);
            }
            $data['staff'] = $this->staff_model->get_staffs($staff_id);
            $this->load->view(BACKEND_STAFF_VIEWS_FOLDER . '/' . $Device . '/' . $page, $data);
        } else if ($link == 'view') {
            /********* banner *********/
            self::$admin_banner_segments_count = 2;
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/

            /********* pagination *********/
            $Staffs_count = $this->staff_model->get_staff_count();
            $url = BASE_URL . $_SESSION['login_type'] . '/staff/web/view';
            $config = $this->pagination_config($Staffs_count, $url, PAGINATION_STAFF_LIMIT, PAGINATION_STAFF_SEGMENT);
            $data['links'] = $this->pagination->create_links();
            $segment = $this->uri->segment(PAGINATION_STAFF_SEGMENT) ? $this->uri->segment(PAGINATION_STAFF_SEGMENT) : 0;
            $data['sl'] = $offset = $this->offset_cal(PAGINATION_STAFF_LIMIT, $segment);
            /********* pagination *********/
            $data['staffs'] = $this->staff_model->get_staffs(0, PAGINATION_STAFF_LIMIT, $offset);
            // print_r($data['staffs']); exit;
            $this->load->view(BACKEND_STAFF_VIEWS_FOLDER . '/' . $Device . '/' . $page, $data);
        } else if ($link == 'detail') {
            /********* banner *********/
            self::$admin_banner_segments_count = 3;
            self::$admin_banner_label[2] = 'Details';
            self::$admin_banner_link[2] = '';
            $data['BannerLinks'] = $this->banner_links_creation(self::$admin_banner_segments_count, self::$admin_banner_label, self::$admin_banner_link);
            /********* banner *********/

            $data['staff'] = $this->staff_model->get_staffs($staff_id);

            $this->load->view(BACKEND_STAFF_VIEWS_FOLDER . '/' . $Device . '/' . $page, $data);
        }
    }


}
