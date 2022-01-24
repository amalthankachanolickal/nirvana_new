<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends Home_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function product_ajax($dataLink = '')
    {
        $options = '';
        if ($dataLink == 'get_subcategories') {
            $FKServiceID = $this->input->post('FKServiceID');
            $subCategories = $this->service_model->get_subCategories(0, 0, 0, $FKServiceID);
            if (count($subCategories) > 0) {
                foreach ($subCategories as $subService) {
                    $options .= '<option value="' . $subService['PKSubServiceID'] . '">' . $subService['subServiceTitle'] . '</option>';
                }
                echo $options;
                exit;
            } else {
                echo 0;
            }
        } elseif ($dataLink == 'change_offer') {
            echo $this->product_model->product_change_offer_status();
        } elseif ($dataLink == 'get_offer_products') {
            $page_no = $this->input->post('page_no');
            if (!$page_no) {
                $data['sl'] = $offset = 0;
            } else {
                $data['sl'] = $offset = $page_no;
            }
            /********* ajax pagination *********/
            // $data['sl'] = $data['page_no'] = $segment = $offset = 0;
            $product_count = $this->product_model->get_product_count(1);
            $url = BASE_URL . 'ajax/product/get_offer_products/';
            $config = $this->ajax_pagination_config($product_count, $url, PAGINATION_AJAX_PRODUCT_LIMIT, PAGINATION_AJAX_PRODUCT_SEGMENT, 'product_list', 'get_offer_products');

            //  $config = $this->ajax_pagination_config($product_count, $url, PAGINATION_AJAX_PRODUCT_LIMIT, NO, 'product_list', 'get_offer_products');
            $data['links'] = $this->ajax_pagination->create_links();
            $data['page_no'] = $segment = $page_no;
            /********* ajax pagination *********/

            $data['products'] = $this->product_model->get_offer_product(0, PAGINATION_AJAX_PRODUCT_LIMIT, $offset);
            echo $this->load->view(BACKEND_REPEATS_VIEWS_FOLDER . '/' . WEB . '/' . BACKEND_TABLES_VIEWS_FOLDER . '/table_products', $data, true);

        } elseif ($dataLink == "get_product_prices") {

            $page_no = $this->input->post('page_no');
            if (!$page_no) {
                $data['sl'] = $offset = 0;
            } else {
                $data['sl'] = $offset = $page_no;
            }
            $FKServiceID = $this->input->post('FKServiceID');
            $FKSubServiceID = $this->input->post('FKSubServiceID');
            /********* ajax pagination *********/
            $product_counts = $this->product_model->get_product_prices(0, 0, 0, $FKServiceID, $FKSubServiceID);
            $product_count = count($product_counts);
            $url = BASE_URL . 'ajax/product/get_offer_products/';
            $config = $this->ajax_pagination_config($product_count, $url, PAGINATION_AJAX_PRODUCT_LIMIT, PAGINATION_AJAX_PRODUCT_SEGMENT, 'res', 'get_results');
            $data['links'] = $this->ajax_pagination->create_links();
            $data['page_no'] = $segment = $page_no;
            /********* ajax pagination *********/

            $data['products'] = $this->product_model->get_product_prices(0, PAGINATION_AJAX_PRODUCT_LIMIT, $offset, $FKServiceID, $FKSubServiceID);
            echo $this->load->view(BACKEND_REPEATS_VIEWS_FOLDER . '/' . WEB . '/' . BACKEND_TABLES_VIEWS_FOLDER . '/table_product_prices', $data, true);

        }elseif ($dataLink=="save_product_prices")
        {
            //check whether this pdt is already in ppp table if ys update it or insert a new row for this pdt with this staff
            // check with pdtid and staffID
            $PKProductID= $this->input->post('PKProductID');
            $FKStaffID= $this->input->post('FKStaffID');
            $FKServiceID= $this->input->post('FKServiceID');
            $FKSubServiceID= $this->input->post('FKSubServiceID');
            $pdt_count_in_ppp = $this->product_model->get_products_in_ppp($PKProductID,$FKStaffID);
            //$pdt_count_in_ppp =1. Update or insert

            $PKPriceID = $this->input->post('priceID');
            $price = $this->input->post('price');
            if($pdt_count_in_ppp!=0) {
                echo $this->product_model->update_product_prices($PKPriceID, $price);
            }else{
               // echo "shjsk";exit;
                echo $this->product_model->insert_product_prices($price,$PKProductID,$FKStaffID,$FKSubServiceID,$FKServiceID);
            }
        }elseif ($dataLink=="get_pdt_price")
        {
            $staffID = $this->input->post('staffID');
            $FKProductID = $this->input->post('FKProductID');
            $data['products'] = $this->product_model->get_product_prices(0, 0, 0, 0, 0,$staffID,$FKProductID);
            foreach ($data['products'] as $p){
                $price=$p['productPrices'];
            }
            echo $price; exit;
        }elseif ($dataLink == "get_product_prices_New") {

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
        }elseif ($dataLink == 'service_image') {
            echo $this->service_model->service_image_delete();
        }

    }

    function frondend_product_ajax($dataLink = '')
    {
        if ($dataLink == 'getproducts') {
            $page_no = $this->input->post('page_no');
            if (!$page_no) {
                $data['sl'] = $offset = 0;
            } else {
                $data['sl'] = $offset = $page_no;
            }
            $keyword = $this->input->post('keyword');
            $target = $this->input->post('target');

            /********* pagination *********/
            $product_count = $this->product_model->get_product_count(ALL_PRODUCT, $keyword);
            $url = BASE_URL . 'ajax/ajax_product/' . $dataLink . '/';
            $config = $this->ajax_pagination_config($product_count, $url, PAGINATION_PRODUCT_LIMIT, NO, $target, 'get_products');
            $data['links'] = $this->ajax_pagination->create_links();
            $data['page_no'] = $segment = $page_no;

            /********* pagination *********/
            $data['products'] = $this->product_model->get_product(0, PAGINATION_PRODUCT_LIMIT, $offset, 0, 0, '', '', $keyword);
            //print_r($data['products']); exit;
            echo $this->load->view(FRONTEND_COMPANY_VIEWS_FOLDER . '/' . WEB . '/row_products', $data, true);
        }
    }

    function staff_ajax($dataLink = '')
    {
        $data = array();
        if ($dataLink == 'getStaffCount') {
            $EditorType = $this->input->post('editorType');
            $editorCount = $this->staff_model->get_staff_count($EditorType);
            echo $editorCount;
        } elseif ($dataLink == 'delete') {
            echo $this->staff_model->staff_delete();
        } elseif ($dataLink == 'getstafff') {
            echo "Sdfsdkjhfksjhdf";
            exit;
        }
    }

    function service_ajax($dataLink = '')
    {
        $data = array();
        if ($dataLink == 'search') {
           // echo "sdf"; exit;
           // $data['services'] = $this->service_model->get_service(0, 0, 0,'', '',$keyword);
          /*  $page_no = $this->input->post('page_no');
            if (!$page_no) {
                $data['sl'] = $offset = 0;
            } else {
                $data['sl'] = $offset = $page_no;
            }*/
            $search_keyword = $this->input->post('search_keyword');
           // $target = $this->input->post('target');
            /********* pagination *********/
          /*  $serive_count = $this->service_model->get_service_count(0,$search_keyword);
            $url = BASE_URL . 'ajax/group/' . $dataLink . '/';
            $config = $this->ajax_pagination_config($serive_count, $url, PAGINATION_SERVICE_LIMIT, 4, $target, 'searchmobile');
            $data['links'] = $this->ajax_pagination->create_links();
            $data['page_no'] = $segment = $page_no;
          */  /********* pagination *********/

            $data['services'] = $this->service_model->get_service_key($search_keyword);
            $data['links']="";
            //print_r($data['services']); exit;
            echo $this->load->view(BACKEND_REPEATS_VIEWS_FOLDER . '/' . WEB . '/' . BACKEND_TABLES_VIEWS_FOLDER . '/table_service', $data, true);

        }elseif($dataLink == 'searchbyMobile'){
            $user="";
            $search_keyword = $this->input->post('search_keyword');
            $data['services'] = $this->service_model->get_service_key($search_keyword);
            foreach ($data['services']  as $s){
               $user= $s['serviceUser'];
            }
             echo $user;
        }
        elseif ($dataLink=='searchByStaff'){
            $page_no = $this->input->post('page_no');
            if (!$page_no) {
                $data['sl'] = $offset = 0;
            } else {
                $data['sl'] = $offset = $page_no;
            }
            $staffid = $this->input->post('staffid');
            $serviceStatus = $this->input->post('serviceStatus');
            $target = $this->input->post('target');

            /********* pagination *********/
            $service_count = $this->service_model->get_service_count($serviceStatus, '',$staffid);
            $url = BASE_URL . 'ajax/service/' . $dataLink . '/';
            $config = $this->ajax_pagination_config($service_count, $url, PAGINATION_SERVICE_LIMIT, PAGINATION_AJAX_SERVICE_SEGMENT, $target, 'staffselect');
            $data['links'] = $this->ajax_pagination->create_links();
            $data['page_no'] = $segment = $page_no;
            /********* pagination *********/

            $data['services'] = $this->service_model->get_service(0, PAGINATION_SERVICE_LIMIT, $offset, $serviceStatus, $staffid);
            //print_r($data['editors']); exit;
            echo $this->load->view(BACKEND_REPEATS_VIEWS_FOLDER . '/' . WEB . '/' . BACKEND_TABLES_VIEWS_FOLDER . '/table_service', $data, true);

        }elseif ($dataLink=='searchByStatus'){
            $page_no = $this->input->post('page_no');
            if (!$page_no) {
                $data['sl'] = $offset = 0;
            } else {
                $data['sl'] = $offset = $page_no;
            }
            $serviceStatus= $this->input->post('serviceStatus');
            $target = $this->input->post('target');
            $staffid = $this->input->post('staffid');

            /********* pagination *********/
            $service_count = $this->service_model->get_service_count($serviceStatus, '',$staffid);
            $url = BASE_URL . 'ajax/service/' . $dataLink . '/';
            $config = $this->ajax_pagination_config($service_count, $url, PAGINATION_SERVICE_LIMIT, PAGINATION_AJAX_SERVICE_SEGMENT, $target, 'staffselect');
            $data['links'] = $this->ajax_pagination->create_links();
            $data['page_no'] = $segment = $page_no;
            /********* pagination *********/

            $data['services'] = $this->service_model->get_service(0, PAGINATION_SERVICE_LIMIT, $offset,$serviceStatus, $staffid);
            // print_r($data['services']); exit;
            echo $this->load->view(BACKEND_REPEATS_VIEWS_FOLDER . '/' . WEB . '/' . BACKEND_TABLES_VIEWS_FOLDER . '/table_service', $data, true);

        }elseif ($dataLink=='searchByDate'){
            $page_no = $this->input->post('page_no');
            if (!$page_no) {
                $data['sl'] = $offset = 0;
            } else {
                $data['sl'] = $offset = $page_no;
            }
            $fromdate= $this->input->post('fromdate');
            $target = $this->input->post('target');

            /********* pagination *********/
            $service_count = $this->service_model->get_service_count('','',0,$fromdate);
            $url = BASE_URL . 'ajax/service/' . $dataLink . '/';
            $config = $this->ajax_pagination_config($service_count, $url, PAGINATION_SERVICE_LIMIT, PAGINATION_AJAX_SERVICE_SEGMENT, $target, 'staffselect');
            $data['links'] = $this->ajax_pagination->create_links();
            $data['page_no'] = $segment = $page_no;
            /********* pagination *********/

            $data['services'] = $this->service_model->get_service(0, PAGINATION_SERVICE_LIMIT, $offset,'','','',$fromdate);
             print_r($data['services']); exit;
            echo $this->load->view(BACKEND_REPEATS_VIEWS_FOLDER . '/' . WEB . '/' . BACKEND_TABLES_VIEWS_FOLDER . '/table_service', $data, true);

        }

    }
    function files_ajax($dataLink = '')
    {
        if ($dataLink == 'delete') {
            echo $this->gallery_model->files_delete();
        } elseif ($dataLink == 'delete_gallery') {
            echo $this->gallery_model->gallery_delete();
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */