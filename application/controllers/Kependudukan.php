<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kependudukan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Halaman Utama';
        $data['titlepage'] = 'DASHBOARD';
        $this->load->view('templates/head', $data);
        $this->load->view('templates/menu');
        $this->load->view('kependudukan/index');
    }

    public function edit_profil()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Edit Profil';
        $data['titlepage'] = 'EDIT PROFIL';
        $this->load->view('templates/head', $data);
        $this->load->view('templates/menu');
        $this->load->view('kependudukan/edit-profil', $data);
    }

    public function data_penduduk()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Penduduk';
        $data['titlepage'] = 'DATA PENDUDUK';
        $data1['penduduk'] = $this->db->get('penduduk')->result_array();
        $this->load->view('templates/head-tabel', $data);
        $this->load->view('templates/menu');
        $this->load->view('kependudukan/data-penduduk', $data1);
    }

    public function tambah_penduduk()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Tambah Penduduk";
        $data['titlepage'] = "TAMBAH PENDUDUK";
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('no_kk', 'No KK', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('telp', 'Telepon', 'required');

        if ($this->form_validation->run() == false) {

            //$this->load->view('templates/head', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('kependudukan/tambah-penduduk', $data);
        } else {
            $data1 = [
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
                'no_kk' => htmlspecialchars($this->input->post('no_kk', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'alamat' => $this->input->post('alamat', true),
                'telp' => $this->input->post('telp', true),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'status' => $this->input->post('status', true),
                'date_created' => time()
            ];

            $this->db->insert('penduduk', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Ditambahkan!.
            </div>');
            redirect('kependudukan/data_penduduk');
        }
    }

    public function edit_penduduk($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Edit Penduduk";
        $data['titlepage'] = "EDIT PENDUDUK";
        $data['penduduk'] = $this->db->get_where('penduduk', ['id_penduduk' => $id])->result_array();
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('no_kk', 'No KK', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('telp', 'Telepon', 'required');

        if ($this->form_validation->run() == false) {

            //$this->load->view('templates/head', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('kependudukan/edit-penduduk', $data);
        } else {

            $id = $this->input->post('id_penduduk');
            $no_ktp = $this->input->post('no_ktp');
            $no_kk = $this->input->post('no_kk');
            $no_kk = $this->input->post('no_kk');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $telp = $this->input->post('telp');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $status = $this->input->post('status');

            $data1 = [

                'no_ktp' => $no_ktp,
                'no_kk' => $no_kk,
                'nama' => $nama,
                'alamat' => $alamat,
                'telp' => $telp,
                'jenis_kelamin' => $jenis_kelamin,
                'tgl_lahir' => $tgl_lahir,
                'status' => $status,
            ];
            $this->db->where('id_penduduk', $id);
            $this->db->update('penduduk', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Diedit!.
            </div>');
            redirect('kependudukan/data_penduduk');
        }
    }

    public function hapus_penduduk($id)
    {
        $where = array('id_penduduk' => $id);
        $this->load->model('Kependudukan_model', 'kp');
        $this->kp->Hapus_penduduk($where, 'penduduk');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Dihapus!.
            </div>');
        redirect('kependudukan/data_penduduk');
    }

    public function data_kelahiran()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Kelahiran';
        $data['titlepage'] = 'DATA KELAHIRAN';
        $data1['kelahiran'] = $this->db->get('kelahiran')->result_array();
        $this->load->view('templates/head-tabel', $data);
        $this->load->view('templates/menu');
        $this->load->view('kependudukan/data-kelahiran', $data1);
    }

    public function tambah_kelahiran()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Tambah Kelahiran";
        $data['titlepage'] = "TAMBAH KELAHIRAN";
        $this->form_validation->set_rules('no_ktp_ayah', 'No KTP Ayah', 'required|trim');
        $this->form_validation->set_rules('no_ktp_ibu', 'No KTP Ibu', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');

        if ($this->form_validation->run() == false) {

            //$this->load->view('templates/head', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('kependudukan/tambah-kelahiran', $data);
        } else {
            $data1 = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tmpt_lahir' => $this->input->post('tmpt_lahir', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'no_ktp_ayah' => htmlspecialchars($this->input->post('no_ktp_ayah', true)),
                'no_ktp_ibu' => htmlspecialchars($this->input->post('no_ktp_ibu', true)),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'date_created' => time()
            ];

            $this->db->insert('kelahiran', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Ditambahkan!.
            </div>');
            redirect('kependudukan/data_kelahiran');
        }
    }

    public function edit_kelahiran($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Edit Kelahiran";
        $data['titlepage'] = "EDIT KELAHIRAN";
        $data['kelahiran'] = $this->db->get_where('kelahiran', ['id_kelahiran' => $id])->result_array();
        $this->form_validation->set_rules('no_ktp_ayah', 'No KTP Ayah', 'required|trim');
        $this->form_validation->set_rules('no_ktp_ibu', 'No KTP Ibu', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');

        if ($this->form_validation->run() == false) {

            //$this->load->view('templates/head', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('kependudukan/edit-kelahiran', $data);
        } else {

            $id = $this->input->post('id_kelahiran');
            $nama = $this->input->post('nama');
            $tmpt_lahir = $this->input->post('tmpt_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $no_ktp_ayah = $this->input->post('no_ktp_ayah');
            $no_ktp_ibu = $this->input->post('no_ktp_ibu');
            $jenis_kelamin = $this->input->post('jenis_kelamin');

            $data1 = [
                'no_ktp_ayah' => $no_ktp_ayah,
                'no_ktp_ibu' => $no_ktp_ibu,
                'nama' => $nama,
                'tmpt_lahir' => $tmpt_lahir,
                'jenis_kelamin' => $jenis_kelamin,
                'tgl_lahir' => $tgl_lahir,
            ];
            $this->db->where('id_kelahiran', $id);
            $this->db->update('kelahiran', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Diedit!.
            </div>');
            redirect('kependudukan/data_kelahiran');
        }
    }

    public function hapus_kelahiran($id)
    {
        $where = array('id_kelahiran' => $id);
        $this->load->model('Kependudukan_model', 'kp');
        $this->kp->Hapus_kelahiran($where, 'kelahiran');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Dihapus!.
            </div>');
        redirect('kependudukan/data_kelahiran');
    }

    public function data_kematian()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Kematian';
        $data['titlepage'] = 'DATA KEMATIAN';
        $data1['kematian'] = $this->db->get('kematian')->result_array();
        $this->load->view('templates/head-tabel', $data);
        $this->load->view('templates/menu');
        $this->load->view('kependudukan/data-kematian', $data1);
    }

    public function tambah_kematian()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Tambah Kematian";
        $data['titlepage'] = "TAMBAH KEMATIAN";
        $this->form_validation->set_rules('tgl_kematian', 'Tanggal Kematian', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('no_kk', 'No KK', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {

            //$this->load->view('templates/head', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('kependudukan/tambah-kematian', $data);
        } else {
            $data1 = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tgl_kematian' => $this->input->post('tgl_kematian', true),
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
                'no_kk' => htmlspecialchars($this->input->post('no_kk', true)),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'status' => $this->input->post('status', true),
                'date_created' => time()
            ];

            $this->db->insert('kematian', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Ditambahkan!.
            </div>');
            redirect('kependudukan/data_kematian');
        }
    }

    public function edit_kematian($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Edit Kematian";
        $data['titlepage'] = "EDIT KEMATIAN";
        $data['kematian'] = $this->db->get_where('kematian', ['id_kematian' => $id])->result_array();
        $this->form_validation->set_rules('tgl_kematian', 'Tanggal Kematian', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('no_kk', 'No KK', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {

            //$this->load->view('templates/head', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('kependudukan/edit-kematian', $data);
        } else {

            $id = $this->input->post('id_kematian');
            $nama = $this->input->post('nama');
            $tgl_kematian = $this->input->post('tgl_kematian');
            $no_ktp = $this->input->post('no_ktp');
            $no_kk = $this->input->post('no_kk');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $status = $this->input->post('status');

            $data1 = [
                'no_ktp' => $no_ktp,
                'no_kk' => $no_kk,
                'nama' => $nama,
                'jenis_kelamin' => $jenis_kelamin,
                'tgl_kematian' => $tgl_kematian,
                'status' => $status
            ];
            $this->db->where('id_kematian', $id);
            $this->db->update('kematian', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Diedit!.
            </div>');
            redirect('kependudukan/data_kematian');
        }
    }

    public function hapus_kematian($id)
    {
        $where = array('id_kematian' => $id);
        $this->load->model('Kependudukan_model', 'kp');
        $this->kp->Hapus_kematian($where, 'kematian');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Dihapus!.
            </div>');
        redirect('kependudukan/data_kematian');
    }

    public function data_pendatang()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Pendatang';
        $data['titlepage'] = 'DATA PENDATANG';
        $data1['pendatang'] = $this->db->get('pendatang')->result_array();
        $this->load->view('templates/head-tabel', $data);
        $this->load->view('templates/menu');
        $this->load->view('kependudukan/data-pendatang', $data1);
    }

    public function tambah_pendatang()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Tambah Pendatang";
        $data['titlepage'] = "TAMBAH PENDATANG";
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('asal', 'Asal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('tgl_datang', 'Tanggal Datang', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {

            //$this->load->view('templates/head', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('kependudukan/tambah-pendatang', $data);
        } else {
            $data1 = [
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'asal' => htmlspecialchars($this->input->post('asal', true)),
                'tujuan' => $this->input->post('tujuan', true),
                'tgl_datang' => $this->input->post('tgl_datang', true),
                'status' => $this->input->post('status', true),
                'date_created' => time()
            ];

            $this->db->insert('pendatang', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Ditambahkan!.
            </div>');
            redirect('kependudukan/data_pendatang');
        }
    }

    public function edit_pendatang($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Edit Pendatang";
        $data['titlepage'] = "EDIT PENDATANG";
        $data['pendatang'] = $this->db->get_where('pendatang', ['id_pendatang' => $id])->result_array();
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('asal', 'Asal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('tgl_datang', 'Tanggal Datang', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {

            //$this->load->view('templates/head', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('kependudukan/edit-pendatang', $data);
        } else {

            $id = $this->input->post('id_pendatang');
            $no_ktp = $this->input->post('no_ktp');
            $nama = $this->input->post('nama');
            $asal = $this->input->post('asal');
            $tujuan = $this->input->post('tujuan');
            $tgl_datang = $this->input->post('tgl_datang');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $status = $this->input->post('status');

            $data1 = [
                'no_ktp' => $no_ktp,
                'nama' => $nama,
                'asal' => $asal,
                'tujuan' => $tujuan,
                'tgl_datang' => $tgl_datang,
                'jenis_kelamin' => $jenis_kelamin,
                'status' => $status
            ];
            $this->db->where('id_pendatang', $id);
            $this->db->update('pendatang', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Diedit!.
            </div>');
            redirect('kependudukan/data_pendatang');
        }
    }

    public function hapus_pendatang($id)
    {
        $where = array('id_pendatang' => $id);
        $this->load->model('Kependudukan_model', 'kp');
        $this->kp->Hapus_pendatang($where, 'pendatang');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Dihapus!.
            </div>');
        redirect('kependudukan/data_pendatang');
    }


    public function data_pindahan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Pindahan';
        $data['titlepage'] = 'DATA PINDAHAN';
        $data1['pindahan'] = $this->db->get('pindahan')->result_array();
        $this->load->view('templates/head-tabel', $data);
        $this->load->view('templates/menu');
        $this->load->view('kependudukan/data-pindahan', $data1);
    }

    public function tambah_pindahan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Tambah Pindahan";
        $data['titlepage'] = "TAMBAH PINDAHAN";
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {

            //$this->load->view('templates/head', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('kependudukan/tambah-pindahan', $data);
        } else {
            $data1 = [
                'no_ktp' => htmlspecialchars($this->input->post('no_ktp', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
                'tujuan' => $this->input->post('tujuan', true),
                'status' => $this->input->post('status', true),
                'date_created' => time()
            ];

            $this->db->insert('pindahan', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Ditambahkan!.
            </div>');
            redirect('kependudukan/data_pindahan');
        }
    }

    public function edit_pindahan($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Edit Pindahan";
        $data['titlepage'] = "EDIT PINDAHAN";
        $data['pindahan'] = $this->db->get_where('pindahan', ['id_pindahan' => $id])->result_array();
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == false) {

            //$this->load->view('templates/head', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('kependudukan/edit-pindahan', $data);
        } else {

            $id = $this->input->post('id_pindahan');
            $no_ktp = $this->input->post('no_ktp');
            $nama = $this->input->post('nama');
            $tujuan = $this->input->post('tujuan');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $status = $this->input->post('status');

            $data1 = [
                'no_ktp' => $no_ktp,
                'nama' => $nama,
                'tujuan' => $tujuan,
                'jenis_kelamin' => $jenis_kelamin,
                'status' => $status
            ];
            $this->db->where('id_pindahan', $id);
            $this->db->update('pindahan', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Diedit!.
            </div>');
            redirect('kependudukan/data_pindahan');
        }
    }

    public function hapus_pindahan($id)
    {
        $where = array('id_pindahan' => $id);
        $this->load->model('Kependudukan_model', 'kp');
        $this->kp->Hapus_pindahan($where, 'pindahan');

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Dihapus!.
            </div>');
        redirect('kependudukan/data_pindahan');
    }

    public function data_user()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data User';
        $data['titlepage'] = 'DATA USER';
        $data1['datauser'] = $this->db->get('user')->result_array();
        $this->load->view('templates/head-tabel', $data);
        $this->load->view('templates/menu');
        $this->load->view('kependudukan/data-user', $data1);
    }

    public function tambah_user()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Tambah User";
        $data['titlepage'] = "TAMBAH USER";
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username Sudah Terdaftar!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/head', $data);
            $this->load->view('templates/menu', $data);
            $this->load->view('kependudukan/tambah-user', $data);
        } else {
            $data1 = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'gambar' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 1,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data1);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Sukses!</h4>
            Data Berhasil Ditambahkan!.
            </div>');
            redirect('kependudukan/data_user');
        }
    }
}
