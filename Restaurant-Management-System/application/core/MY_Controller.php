<?php 

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}

class Admin_Controller extends MY_Controller 
{
    
    var $permission = array();
    var $data = array();  

    public function __construct() 
    {
        parent::__construct();

        $this->data['user_permission'] = array();
        $this->permission = array();

        $user_id = $this->session->userdata('id');
        if($user_id) {
            $this->load->model('model_groups');
            $group_data = $this->model_groups->getUserGroupByUserId($user_id);
            
            if($group_data) {
                $this->data['user_permission'] = unserialize($group_data['permission']);
                $this->permission = unserialize($group_data['permission']);
            } else {
                $all_permissions = array(
                    'createUser','updateUser','viewUser','deleteUser',
                    'createGroup','updateGroup','viewGroup','deleteGroup',
                    'createStore','updateStore','viewStore','deleteStore',
                    'createTable','updateTable','viewTable','deleteTable',
                    'createCategory','updateCategory','viewCategory','deleteCategory',
                    'createProduct','updateProduct','viewProduct','deleteProduct',
                    'createOrder','updateOrder','viewOrder','deleteOrder',
                    'viewReport','updateCompany','viewProfile','updateSetting'
                );
                $this->data['user_permission'] = $all_permissions;
                $this->permission = $all_permissions;
            }
        }
    }

    public function logged_in()
    {
        if($this->session->userdata('logged_in')) {
            redirect(site_url('dashboard'), 'refresh');
        }
    }

    public function not_logged_in()
    {
        if(!$this->session->userdata('logged_in')) {
            redirect(site_url('auth/login'), 'refresh');
        }
    }

    public function render_template($page = null, $data = array())
    {
        $data = array_merge($this->data, $data);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/header_menu', $data);
        $this->load->view('templates/side_menubar', $data);
        $this->load->view($page, $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function company_currency()
    {
        $this->load->model('model_company');
        $company_currency = $this->model_company->getCompanyData(1);
        $currencies = $this->currency();
            
        $currency = '';
        foreach ($currencies as $key => $value) {
            if($key == $company_currency['currency']) {
                $currency = $value;
            }
        }
        return $currency;
    }
    
    public function currency()
    {
        return array(
            'KSH' => 'KSh',
            'TZS' => 'TSh',
            'UGX' => 'USh',
            'USD' => 'USD',
        );
    }
}