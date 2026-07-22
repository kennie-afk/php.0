<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestSession extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        echo "=== SESSION TEST ===<br><br>";
        
        echo "Session data:<br>";
        echo "<pre>";
        print_r($this->session->userdata());
        echo "</pre><br>";
        
        if($this->session->userdata('logged_in') == TRUE) {
            echo "You ARE logged in!<br>";
            echo "Username: " . $this->session->userdata('username') . "<br>";
            echo "Email: " . $this->session->userdata('email') . "<br>";
            echo "<a href='" . base_url('auth/logout') . "'>Logout</a><br>";
            echo "<a href='" . base_url('dashboard') . "'>Go to Dashboard</a>";
        } else {
            echo "You are NOT logged in!<br>";
            echo "<a href='" . base_url('auth/login') . "'>Go to Login</a>";
        }
    }
}