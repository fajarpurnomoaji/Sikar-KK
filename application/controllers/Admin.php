<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
    }

    public function index()
    {
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Dashboard';
        $data['count'] = $this->admin_model->get_count();
        $data['count_kerusakan'] = $this->admin_model->get_count2();
        $data['count_gejala'] = $this->admin_model->get_count3();
        $data['count_bkasus'] = $this->admin_model->get_count4();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect();
    }

    public function duser()
    {
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();

        $data['title'] = 'Admin';
        $data['admin'] = $this->admin_model->get_data('tbl_admin')->result();


        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/duser', $data);
        $this->load->view('admin/footer');
    }

    public function tambah()
    {
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Admin';

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/tambah_admin');
        $this->load->view('admin/footer');
    }

    public function validasi_file()
    {
        $config['upload_path']          = './assets/foto';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['overwrite']            = FALSE;


        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return TRUE;
        } else {
            $this->form_validation->set_message('validasi_file', $this->upload->display_errors());
            return FALSE;
        }
    }

    public function tambah_aksi()
    {
        $this->_rules();
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $upload = $this->upload->data();
            $file_name = $upload['file_name'];
            $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'nomor_hp' => $this->input->post('nomor_hp'),
                'id_role' => $this->input->post('id_role'),
                'foto' => $file_name,
            );

            $this->admin_model->insert_data($data, 'tbl_admin');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/duser');
        }
    }

    public function edit($id)
    {
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->_rules();

        if ($this->form_validation->run() == TRUE) {
            $this->index();
        } else {
            $upload = $this->upload->data();
            $file_name = $upload['file_name'];
            $data = array(
                'id' => $id,
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email'),
                'nomor_hp' => $this->input->post('nomor_hp'),
                'id_role' => $this->input->post('id_role'),
                'foto' => $file_name,
            );

            $this->admin_model->update_data($data, 'tbl_admin');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diubah!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/duser');
        }
    }

    public function print()
    {
        $data['admin'] = $this->admin_model->get_data('tbl_admin')->result();
        $this->load->view('admin/print_admin', $data);
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama admin', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('email', 'email', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('nomor_hp', 'nomor_hp', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('role', 'role', 'required', array(
            'required' => '%s harus diisi !!'
        ));

        $this->form_validation->set_rules('foto', 'Foto', 'callback_validasi_file');
    }

    public function delete($id)
    {
        $where = array('id' => $id);
        $cek_foto = $this->db->get_where('tbl_admin', ['id' => $id])->row();
        if ($cek_foto->foto != 'default.png') {
            unlink('assets/foto/' . $cek_foto->foto);
        }

        $this->admin_model->delete($where, 'tbl_admin');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');

        redirect('admin/duser');
    }

    public function dkerusakan()
    {
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Kerusakan';
        $data['admin'] = $this->admin_model->get_data('tbl_kerusakan')->result();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/data_kerusakan', $data);
        $this->load->view('admin/footer');
    }

    public function tambah_kerusakan()
    {
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah kerusakan';

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/tambah_kerusakan');
        $this->load->view('admin/footer');
    }

    public function tambah_aksi2()
    {
        $this->_ruleskerusakan();
        if ($this->form_validation->run() == FALSE) {
            $this->dkerusakan();
        } else {
            $data = array(
                'kd_kerusakan' => $this->input->post('kd_kerusakan'),
                'kerusakan' => $this->input->post('kerusakan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'solusi' => $this->input->post('solusi'),
            );

            $this->admin_model->insert_data($data, 'tbl_kerusakan');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/dkerusakan');
        }
    }

    public function _ruleskerusakan()
    {
        $this->form_validation->set_rules('kd_kerusakan', 'Kode kerusakan', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('kerusakan', 'Nama kerusakan', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('solusi', 'Solusi', 'required', array(
            'required' => '%s harus diisi !!'
        ));
    }

    public function edit_kerusakan($kd_kerusakan)
    {
        $this->_ruleskerusakan();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(

                'kd_kerusakan' => $this->input->post('kd_kerusakan'),
                'kerusakan' => $this->input->post('kerusakan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'solusi' => $this->input->post('solusi'),
            );

            $this->admin_model->update_dkerusakan($data, 'tbl_kerusakan');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diubah!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/dkerusakan');
        }
    }

    public function print_dkerusakan()
    {
        $data['admin'] = $this->admin_model->get_data('tbl_kerusakan')->result();
        $this->load->view('admin/print_dkerusakan', $data);
    }

    public function delete_kerusakan($kd_kerusakan)
    {
        $where = array('kd_kerusakan' => $kd_kerusakan);

        $this->admin_model->delete($where, 'tbl_kerusakan');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');

        redirect('admin/dkerusakan');
    }

    public function dgejala()
    {
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Gejala';
        $data['admin'] = $this->admin_model->get_data('tbl_gejala')->result();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/data_gejala', $data);
        $this->load->view('admin/footer');
    }

    public function tambah_gejala()
    {
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Gejala';

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/tambah_gejala');
        $this->load->view('admin/footer');
    }

    public function tambah_aksi3()
    {
        $this->_rulesgejala();
        if ($this->form_validation->run() == FALSE) {
            $this->dgejala();
        } else {
            $data = array(
                'kd_gejala' => $this->input->post('kd_gejala'),
                'gejala' => $this->input->post('gejala'),
            );

            $this->admin_model->insert_data($data, 'tbl_gejala');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/dgejala');
        }
    }

    public function _rulesgejala()
    {
        $this->form_validation->set_rules('kd_gejala', 'Kode gejala', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('gejala', 'Nama gejala', 'required', array(
            'required' => '%s harus diisi !!'
        ));
    }

    public function edit_gejala($kd_gejala)
    {
        $this->_rulesgejala();
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $data = array(

                'kd_gejala' => $this->input->post('kd_gejala'),
                'gejala' => $this->input->post('gejala'),
            );

            $this->admin_model->update_dgejala($data, 'tbl_gejala');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diubah!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/dgejala');
        }
    }

    public function print_dgejala()
    {
        $data['admin'] = $this->admin_model->get_data('tbl_gejala')->result();
        $this->load->view('admin/print_dgejala', $data);
    }

    public function delete_gejala($kd_gejala)
    {
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
        $where = array('kd_gejala' => $kd_gejala);

        $this->admin_model->delete($where, 'tbl_gejala');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');

        redirect('admin/dgejala');
    }

    public function bkasus()
    {
        $data['courses'] = $this->admin_model->get_kasus_details();
        $data['kasus_details'] = $this->admin_model->get_kasus_details();
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Basis Kasus';
        $data['admin'] = $this->admin_model->join('tbl_basiskasus', 'tbl_kerusakan', 'tbl_basiskasus.kd_kerusakan=tbl_kerusakan.kd_kerusakan')->result();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/data_bkasus', $data);
        $this->load->view('admin/footer');
    }

    public function tambah_bkasus()
    {
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Basis Kasus';
        $data['gejala'] = $this->admin_model->get_data('tbl_gejala')->result();
        $data['kerusakan'] = $this->admin_model->get_data('tbl_kerusakan')->result();
        $data['admin'] = $this->admin_model->join('tbl_basiskasus', 'tbl_kerusakan', 'tbl_basiskasus.kd_kerusakan=tbl_kerusakan.kd_kerusakan')->result();
        $data['admin1'] = $this->admin_model->join('tbl_basiskasus', 'tbl_gejala', 'tbl_basiskasus.kd_gejala=tbl_gejala.kd_gejala')->result();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/tambah_bkasus', $data);
        $this->load->view('admin/footer');
    }

    public function _ruleskasus()
    {
        $this->form_validation->set_rules('kd_bkasus', 'Kode basis kasus', 'required', array(
            'required' => '%s harus diisi !!'
        ));
    }

    public function tambah_aksi4()
    {
        $this->_ruleskasus();
        if ($this->form_validation->run() == FALSE) {
            $this->bkasus();
        } else {
            $data = array(
                'kd_bkasus' => $this->input->post('kd_bkasus'),
                'kd_kerusakan' => $this->input->post('kerusakan'),

            );
            $opt = $this->input->get('opt');
            for ($i = 0; $i < count($opt); $i++) {
                echo $opt[$i];
            }

            $this->admin_model->insert_data($data, 'tbl_basiskasus');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil ditambahkan!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');

            redirect('admin/bkasus');
        }
    }

    public function ldiagnosa_fc()
    {
        $data['title'] = 'Laporan Diagnosa Forward Chaining';
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['admin'] = $this->admin_model->get_data('tbl_hasil_diagnosa2')->result();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/ldiagnosa_fc', $data);
        $this->load->view('admin/footer');
    }

    public function print_ldiagnosa_fc()
    {
        $data['admin'] = $this->admin_model->get_data('tbl_hasil_diagnosa2')->result();
        $this->load->view('admin/print_ldiagnosa_fc', $data);
    }

    public function delete_ldiagnosa_fc($id_hasil)
    {
        $where = array('id_hasil' => $id_hasil);

        $this->admin_model->delete($where, 'tbl_hasil_diagnosa2');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');

        redirect('admin/ldiagnosa_fc');
    }

    public function ldiagnosa_bc()
    {
        $data['title'] = 'Laporan Diagnosa Backward Chaining';
        $data['user_data'] = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
        $data['admin'] = $this->admin_model->get_data('tbl_hasil_diagnosa')->result();

        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/ldiagnosa_bc', $data);
        $this->load->view('admin/footer');
    }

    public function print_ldiagnosa_bc()
    {
        $data['admin'] = $this->admin_model->get_data('tbl_hasil_diagnosa')->result();
        $this->load->view('admin/print_ldiagnosa_bc', $data);
    }

    public function delete_ldiagnosa_bc($id_hasil)
    {
        $where = array('id_hasil' => $id_hasil);

        $this->admin_model->delete($where, 'tbl_hasil_diagnosa');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></div>');

        redirect('admin/ldiagnosa_bc');
    }
}
