<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('member_model');
    }

    public function index()
    {
        if (!$this->session->userdata('role') == 3) {
            redirect('auth');
        } else {
            //apaya?
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(auth);
    }
}
