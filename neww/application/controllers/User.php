<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Home_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $data = array();
        $data['categories'] = $this->service_model->get_service();
        $data['sub_categories'] = $this->service_model->get_subCategories();
        $data['products'] = $this->product_model->get_product();
        $this->load->view(FRONTEND_VIEWS_FOLDER . '/' . WEB . '/index', $data);
    }

    public function views($page = 'index', $Device = WEB, $page_sub = '')
    {

        $data = array();
        $data['categories'] = $this->service_model->get_service();
        $data['sub_categories'] = $this->service_model->get_subCategories();
        $data['products'] = $this->product_model->get_product();

        if ($page == 'login') {
            $this->load->view(FRONTEND_COMMONS_VIEWS_FOLDER . '/' . WEB . '/' . $page, $data);
        } else if ($page == 'register') {
            $this->load->view(FRONTEND_COMMONS_VIEWS_FOLDER . '/' . WEB . '/' . $page, $data);
        } else if ($page == 'check_user') {
            if (isset($_SESSION['login_id'])) {
                echo 1;
            } else {
                echo 2;
            }
        }
    }
}
