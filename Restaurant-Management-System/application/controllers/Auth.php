<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends Admin_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_auth');
    }

    public function login()
    {
        if($this->session->userdata('logged_in')) {
            redirect(site_url('dashboard'), 'refresh');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $email_exists = $this->model_auth->check_email($email);

            if($email_exists == TRUE) {
                $login = $this->model_auth->login($email, $password);
                
                if($login) {
                    $logged_in_sess = array(
                        'id' => $login['id'],
                        'username' => $login['username'],
                        'email' => $login['email'],
                        'logged_in' => TRUE
                    );

                    $this->session->set_userdata($logged_in_sess);
                    redirect(site_url('dashboard'), 'refresh');
                }
                else {
                    $this->data['errors'] = 'Incorrect username/password combination';
                    $this->load->view('login', $this->data);
                }
            }
            else {
                $this->data['errors'] = 'Email does not exists';
                $this->load->view('login', $this->data);
            }   
        }
        else {
            $this->load->view('login');
        }   
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('auth/login'), 'refresh');
    }
}