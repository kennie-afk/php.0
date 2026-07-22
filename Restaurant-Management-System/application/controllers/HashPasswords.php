<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HashPasswords extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        $users = $this->db->get('users')->result_array();
        
        $updated = 0;
        foreach($users as $user) {
            if (strpos($user['password'], '$2y$') !== 0) {
                $hashed = password_hash($user['password'], PASSWORD_DEFAULT);
                
                $this->db->where('id', $user['id']);
                $this->db->update('users', array('password' => $hashed));
                
                echo "Updated user {$user['email']}: {$user['password']} -> {$hashed}<br>";
                $updated++;
            }
        }
        
        echo "<br>Total users updated: " . $updated;
        echo "<br>Now try logging in with your regular password!";
    }
}