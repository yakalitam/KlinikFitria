 <?php
  defined('BASEPATH') or exit('No direct script access allowed');

  class Obat extends CI_Controller
  {

    public function __construct()
    {
      parent::__construct();
      $this->load->model("Obat_model");
      $this->load->library(array('form_validation', 'session'));
    }

    public function index()
    {
      $data['obat'] = $this->Obat_model->get_obat();
      $this->load->view('obat', $data);
    }

    public function tambah_obat()
    {
      $this->load->view('tambah_obat');
    }


    public function tambah_obat_proses()
    {
      $idobat = $this->input->post('idobat');
      $nama = $this->input->post('nama');
      $harga = $this->input->post('harga');

      $data = [
        'idobat'     => $idobat,
        'nama'     => $nama,
        'harga'     => $harga
      ];

      //check id buku sdh ada atau blm
      $obat_exist = $this->Obat_model->get_single_row_obat($idobat);

      //jika bernilai TRUE
      if (!isset($obat_exist)) {
        $insert = $this->db->insert("obat", $data);

        //insert DB
        if ($insert) {
          $this->session->set_flashdata('msg_add_obat', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Berhasil menambahkan Data Obat <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
          redirect('obat');
        } else if (!$insert) { //gagal insert
          $this->session->set_flashdata('msg_add_obat', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Gagal menambahkan Data Obat <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
          redirect('obat');
        }
      } else { //id buku sudah ada
        $this->session->set_flashdata('msg_add_obat', '<div class="alert alert-warning" role="alert">Data Obat sudah terdaftar</div>');
        redirect('obat');
      }
    }

    public function delete_obat()
    {
      $id = $_GET['id'];
      $delete = $this->Obat_model->delete_obat($id);
      if ($delete) {
        $this->index();
        $this->session->set_flashdata('msg_del_obat', '<div class="alert alert-success" role="alert">Data Obat Berhasil Dihapus</div>');
        redirect('obat');
      } else {
        $this->session->set_flashdata('msg_del_obat', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan</div>');
        redirect('obat');
      }
    }

    public function edit_obat()
    {
      $id = $_GET['id'];
      $data['obat'] = $this->Obat_model->get_single_row_obat($id);
      $this->load->view('edit_obat', $data);
    }


    public function edit_obat_proses()
    {
      $idobat = $this->input->post('idobat');
      $nama = $this->input->post('nama');
      $harga = $this->input->post('harga');

      $data_lama = $this->Obat_model->get_single_row_obat($idobat);

      if ($data_lama->idobat != $idobat || $data_lama->nama != $nama  || $data_lama->harga != $harga) {

        $data = [
          'idobat'     => $idobat,
          'nama'     => $nama,
          'harga'     => $harga,
        ];
        $this->Obat_model->update_obat($data, $idobat);
        $this->index();
        $this->session->set_flashdata('msg_update_obat', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Obat berhasil Diupdate<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('obat');
      } else {
        $this->session->set_flashdata('msg_update_obat', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Obat Gagal Diupdate<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('obat');
      }
    }
  }
