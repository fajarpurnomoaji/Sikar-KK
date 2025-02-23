<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index()
    {
        $data['title'] = 'Sistem Pakar Kerusakan Komputer';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('home');
        $this->load->view('template/footer');
    }

    //=========================Bagian Backward Chaining==============================

    public function konsultasi_bc()
    {
        $this->load->model('Home_model');
        $data['kerusakan'] = $this->Home_model->get_kerusakan();
        $data['title'] = 'Backward Chaining';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('konsultasi_bc', $data);
        $this->load->view('template/footer');
    }

    public function pertanyaan_bc()
    {
        $this->load->model('Home_model');
        $kd_kerusakan = $this->input->post('kd_kerusakan');
        $gejala = $this->Home_model->get_gejala_by_kerusakan($kd_kerusakan);
        $kerusakan = $this->Home_model->get_kerusakan();
        $selected_kerusakan = array_filter($kerusakan, function ($k) use ($kd_kerusakan) {
            return $k->kd_kerusakan == $kd_kerusakan;
        });

        $data['gejala'] = $gejala;
        $data['kerusakan'] = reset($selected_kerusakan);
        $this->load->view('pertanyaan_bc', $data);
    }

    public function hasil_bc()
    {
        $this->load->model('Home_model');
        $kd_kerusakan = $this->input->post('kd_kerusakan');
        $jawaban = $this->input->post('jawaban');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor = $this->input->post('nomor');
        $alamat = $this->input->post('alamat');
        $gejala = $this->Home_model->get_gejala_by_kerusakan($kd_kerusakan);
        $kerusakan = $this->Home_model->get_kerusakan();
        $selected_kerusakan = array_filter($kerusakan, function ($k) use ($kd_kerusakan) {
            return $k->kd_kerusakan == $kd_kerusakan;
        });

        $total_poin = 0;
        $max_poin = 0;
        $gejala_terpilih = [];
        foreach ($gejala as $g) {
            $max_poin += $g->poin;
            if (isset($jawaban[$g->kd_gejala]) && $jawaban[$g->kd_gejala] == 'ya') {
                $total_poin += $g->poin;
                $gejala_terpilih[] = $g->gejala;
            }
        }

        $persentase = ($total_poin / $max_poin) * 100;

        // Simpan hasil diagnosa ke database
        $data_hasil = [
            'nama' => $nama,
            'email' => $email,
            'nomor' => $nomor,
            'alamat' => $alamat,
            'gejala' => implode(',', $gejala_terpilih),
            'kerusakan' => reset($selected_kerusakan)->kerusakan,
            'deskripsi_kerusakan' => reset($selected_kerusakan)->deskripsi,
            'solusi_kerusakan' => reset($selected_kerusakan)->solusi,
            'tgl_input' => date('Y-m-d H:i:s')
        ];
        $this->Home_model->save_hasil_diagnosa($data_hasil);

        $data['persentase'] = $persentase;
        $data['hasil2'] = $data_hasil;
        $data['kerusakan'] = reset($selected_kerusakan);
        $data['title'] = 'Hasil Backward Chaining';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('hasil_bc', $data);
    }

    //====================Bagian Forward Chaining==============================

    public function konsultasi_fc()
    {
        $data['gejala'] = $this->Home_model->get_gejala2();
        $data['title'] = 'Forward Chaining';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('konsultasi_fc', $data);
        $this->load->view('template/footer');
    }

    public function hasil_fc()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nomor = $this->input->post('nomor');
        $alamat = $this->input->post('alamat');
        $gejala_input = $this->input->post('gejala');
        $basiskasus_detail = $this->Home_model->get_basiskasus_detail();
        $kerusakan = $this->Home_model->get_kerusakan();
        $gejala = $this->Home_model->get_gejala();

        $hasil = [];
        foreach ($kerusakan as $k) {
            $match = true;
            foreach ($basiskasus_detail as $bkd) {
                if ($bkd->kd_kerusakan == $k->kd_kerusakan && !in_array($bkd->kd_gejala, $gejala_input)) {
                    $match = false;
                    break;
                }
            }
            if ($match) {
                $hasil[] = $k;
            }
        }

        foreach ($hasil as $h) {
            $data_hasil = [
                'nama' => $nama,
                'email' => $email,
                'nomor' => $nomor,
                'alamat' => $alamat,
                'gejala' => implode(',', $gejala_input),
                'kerusakan' => $h->kerusakan,
                'deskripsi_kerusakan' => $h->deskripsi,
                'solusi_kerusakan' => $h->solusi,
                'tgl_input' => date('Y-m-d H:i:s')
            ];
            $this->Home_model->save_hasil_diagnosa2($data_hasil);
        }

        $data['hasil'] = $hasil;
        $data['hasil1'] = $data_hasil;
        $data['gejala_input'] = $gejala_input;
        $data['gejala2'] = $gejala;
        $data['title'] = 'Forward Chaining';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('hasil_fc', $data);
    }
}
