<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login Page';
            $this->load->view('login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tbl_admin', ['username' => $username])->row_array();

        //jika usernya ada
        if ($user) {
            if (sha1($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['id_role'],
                ];
                $this->session->set_userdata($data);
                redirect('admin');
            } else {
                redirect('auth');
            }
        } else {
            redirect('auth');
        }
    }
}
