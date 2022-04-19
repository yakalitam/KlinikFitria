 <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat_Obat extends CI_Controller
{
 
public function __construct()
    {
        parent::__construct();
        $this->load->model("RawatObat_model");
        $this->load->library(array('form_validation','session'));
       
    }

 public function index(){
        $data['rawatobat'] = $this->RawatObat_model->get_rawatobat();
      $this->load->view('rawat_obat',$data);
    }

      public function tambah_rawatobat(){
          $data['rawatobat'] = $this->RawatObat_model->perawatan_obat();
        $this->load->view('tambah_rawatobat',$data);
    }     


 public function tambah_rawatobat_proses(){
    $idrawatobat = $this->input->post('idrawatobat');
    $idrawat = $this->input->post('idrawat');
    $idobat = $this->input->post('idobat');
    $jumlah = $this->input->post('jumlah');
    $harga = $this->input->post('harga');
    $totalobat = $this->input->post('totalobat');
     
$data = [
      'idrawatobat'     => $idrawatobat,
      'idrawat'     => $idrawat,
      'idobat'     => $idobat,
      'jumlah'     => $jumlah,
      'harga'     => $harga,
      'totalobat'     => $totalobat=$jumlah*$harga
    ];

    //check id buku sdh ada atau blm
    $rawatobat_exist = $this->RawatObat_model->get_single_row_rawatobat($idrawatobat);

    //jika bernilai TRUE
    if (!isset($rawatobat_exist)) {
      $insert = $this->db->insert("rawatobat", $data);

      //insert DB
      if ($insert) {
        $this->session->set_flashdata('msg_add_rawatobat', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Berhasil menambahkan Data Obat <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('rawat_obat');
      } else if (!$insert) { //gagal insert
        $this->session->set_flashdata('msg_add_rawatobat', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Gagal menambahkan Data Obat <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('rawat_obat');
      }
    } else { //id buku sudah ada
      $this->session->set_flashdata('msg_add_rawatobat', '<div class="alert alert-warning" role="alert">Data Obat sudah terdaftar</div>');
      redirect('rawat_obat');
            }
          
    }

     public function delete_rawatobat(){
      $id= $_GET['id'];
    $delete = $this->RawatObat_model->delete_rawatobat($id);
    if ($delete) {
      $this->index();
      $this->session->set_flashdata('msg_del_rawatobat', '<div class="alert alert-success" role="alert">Data Rawat Obat Berhasil Dihapus</div>');
      redirect('rawat_obat');
    } else {
      $this->session->set_flashdata('msg_del_rawatobat', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan</div>');
      redirect('rawat_obat');
    }
    }

        public function edit_rawatobat(){
        $id = $_GET['id'];
        $data['rawatobat'] = $this->RawatObat_model->get_single_row_rawatobat($id);
        $this->load->view('edit_rawatobat',$data);
    }


     public function edit_rawatobat_proses(){
    $idrawatobat = $this->input->post('idrawatobat');
    $idrawat = $this->input->post('idrawat');
    $idobat = $this->input->post('idobat');
    $jumlah = $this->input->post('jumlah');
    $harga = $this->input->post('harga');
    $totalobat = $this->input->post('totalobat');

    $data_lama = $this->RawatObat_model->get_single_row_rawatobat($idrawatobat);

    if ($data_lama->idrawatobat != $idrawatobat || $data_lama->idrawat != $idrawat  || $data_lama->idobat != $idobat  
    || $data_lama->jumlah != $jumlah || $data_lama->harga != $harga || $data_lama->totalobat != $totalobat) {
            
      $data = [
         'idrawatobat'     => $idrawatobat,
      'idrawat'     => $idrawat,
      'idobat'     => $idobat,
      'jumlah'     => $jumlah,
      'harga'     => $harga,
      'totalobat'     => $totalobat=$jumlah*$harga
      ];
      $this->RawatObat_model->update_rawatobat($data, $idrawatobat);
      $this->index();
      $this->session->set_flashdata('msg_update_rawatobat', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Rawat Obat berhasil Diupdate<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
      redirect('rawat_obat');

    } else {
      $this->session->set_flashdata('msg_update_rawatobat', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Rawat Obat Gagal Diupdate<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
      redirect('rawat_obat');
    }
   }
}