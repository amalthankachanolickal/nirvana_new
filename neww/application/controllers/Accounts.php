<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Accounts extends Home_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function login_redirect($Type = ADMIN, $Device = WEB)
	{
		redirect(BASE_URL . 'login/' . $Type . '/' . $Device, 'refresh');
	}

	function login($type=MEMBER)
	{
        $data=array();

			if ($this->input->post('btnLoginWeb')) {
                $this->form_validation->set_rules('user_email', 'Username', 'required');
                $this->form_validation->set_rules('user_pass_login', 'Password', 'required');
                if ($this->form_validation->run() == FALSE)
                {

                    $this->load->view(FRONTEND_COMPANY_VIEWS_FOLDER . '/' . WEB . '/login', $data);
                }
                else
                {
                    $this->verifylogin(WEB,$type);
                }
			}

        $this->load->view(FRONTEND_COMPANY_VIEWS_FOLDER . '/' . WEB . '/login', $data);
	}
	function registration($Device = WEB)
    {
        if ($Device == WEB) {

            if ($this->input->post('btnRegistration')) {
                $_SESSION['MessageType'] = $this->user_model->add_user();
                if ($_SESSION['MessageType']) {
                    $_SESSION['Message'] = MESSAGE_PRODUCT_ADD_SUCCESS;
                } else {
                    $_SESSION['Message'] = MESSAGE_PRODUCT_ADD_FAILURE;
                }
                redirect(BASE_URL , 'refresh');

            }
            $this->load->view(BACKEND_COMPANY_VIEWS_FOLDER . '/' . WEB . '/login');
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */