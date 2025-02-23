<?php
class Fungsi
{
    protected $CI;


    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function user_login()
    {
        $this->CI->load->model('admin_model');
        $user_id = $this->CI->session->userdata('id');
        $user_data = $this->admin_model->get($user_id)->row();
        return $user_data;
    }
}
