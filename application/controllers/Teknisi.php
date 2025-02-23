<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('teknisi_model');
    }

    public function liat_userdata()
    {
        $data1 = ['username' => $this->session->userdata('username')];
        $this->master('teknisi/dashboard', $data1);
    }

    public function index()
    {
        if (!$this->session->userdata('role') == 2) {
            redirect('auth');
        } else {
            //apaya?
        }

        $data['title'] = 'Dashboard';
        $data['count'] = $this->teknisi_model->get_count();
        $data['count_kerusakan'] = $this->teknisi_model->get_count2();
        $data['count_gejala'] = $this->teknisi_model->get_count3();
        $data['count_bkasus'] = $this->teknisi_model->get_count4();

        $this->load->view('teknisi/header', $data);
        $this->load->view('teknisi/sidebar', $data);
        $this->load->view('teknisi/dashboard', $data);
        $this->load->view('teknisi/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect();
    }
}
