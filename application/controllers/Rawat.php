 <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat extends CI_Controller
{
 
public function __construct()
    {
        parent::__construct();
        $this->load->model("Rawat_model");
        $this->load->model("RawatObat_model");
        $this->load->model("modelRawatTindakan");
        $this->load->library(array('cetak_pdf','form_validation','session'));
       
    }

 public function index(){
        $data['rawat'] = $this->Rawat_model->rawat_pasien();
        $this->load->view('rawat',$data);
    }

    public function tambah_rawat(){
        $data['rawat'] = $this->Rawat_model->get_rawatpasien();
        $this->load->view('tambah_rawat',$data);
    }     

    public function cetak(){
      $id= $_GET['id'];
      $data['rawat'] = $this->Rawat_model->get_single_row_rawat($id);
      $data['rawattindakan'] = $this->modelRawatTindakan->get_rawat_detail($id);
      $data['rawatobat'] = $this->RawatObat_model->get_rawat_detail($id);
     $this->load->view('cetak_pdf',$data);
    }

 public function tambah_rawat_proses(){
    $idrawat = $this->input->post('idrawat');
    $tglrawat = $this->input->post('tglrawat');
    $totaltindakan = $this->input->post('totaltindakan');
    $totalobat = $this->input->post('totalobat');
    $totalharga = $this->input->post('totalharga');
    $uangmuka = $this->input->post('uangmuka');
    $kurang = $this->input->post('kurang');
    $idpasien = $this->input->post('idpasien');
    
    
    $data = [
      'idrawat'     => $idrawat,
      'tglrawat'     => $tglrawat,
      'totaltindakan'     => $totaltindakan,
      'totalobat'     => $totalobat,
      'totalharga'     => $totalharga=$totalobat+$totaltindakan,
      'uangmuka'     => $uangmuka,
      'kurang'     => $kurang=$totalharga-$uangmuka,
      'idpasien'     => $idpasien
    ];
    
    
    //check id buku sdh ada atau blm
    $rawat_exist = $this->Rawat_model->get_single_row_perawatan($idrawat);

    //jika bernilai TRUE
    if (!isset($rawat_exist)) {
      $insert = $this->db->insert("rawat", $data);

      //insert DB
      if ($insert) {
        $this->session->set_flashdata('msg_add_rawat', '<div class="alert alert-success alert-dismissible fade show" role="alert"> Berhasil menambahkan Data Perawatan <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('rawat');
      } else if (!$insert) { //gagal insert
        $this->session->set_flashdata('msg_add_rawat', '<div class="alert alert-danger alert-dismissible fade show" role="alert"> Gagal menambahkan Data Perawatan <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('rawat');
      }
    } else { //id buku sudah ada
      $this->session->set_flashdata('msg_add_rawat', '<div class="alert alert-warning" role="alert">Data Perawatan sudah terdaftar</div>');
      redirect('rawat');
            }
          
    }

     public function delete_rawat(){
      $id= $_GET['id'];
    $delete = $this->Rawat_model->delete_rawat($id);
    if ($delete) {
      $this->index();
      $this->session->set_flashdata('msg_del_rawat', '<div class="alert alert-success" role="alert">Data Rawat Berhasil Dihapus</div>');
      redirect('rawat');
    } else {
      $this->session->set_flashdata('msg_del_rawat', '<div class="alert alert-danger" role="alert">Terjadi Kesalahan</div>');
      redirect('rawat');
    }
    }

        public function edit_rawat(){
        $id = $_GET['id'];
        $data['rawat'] = $this->Rawat_model->get_single_row_perawatan($id);
        $this->load->view('edit_rawat',$data);
    }


     public function edit_rawat_proses(){


    $idrawat = $this->input->post('idrawat');
    $tglrawat = $this->input->post('tglrawat');
    $totaltindakan = $this->input->post('totaltindakan');
    $totalobat = $this->input->post('totalobat');
    $totalharga = $this->input->post('totalharga');
    $uangmuka = $this->input->post('uangmuka');
    $kurang = $this->input->post('kurang');
    $idpasien = $this->input->post('idpasien');


    $data_lama = $this->Rawat_model->get_single_row_perawatan($idrawat);

    if ($data_lama->idrawat != $idrawat || $data_lama->tglrawat != $tglrawat  || $data_lama->totaltindakan != $totaltindakan 
    || $data_lama->totalobat != $totalobat || $data_lama->totalharga != $totalharga || $data_lama->uangmuka != $uangmuka
    || $data_lama->kurang != $kurang || $data_lama->idpasien != $idpasien 
    ) {

      
      $data = [
        'idrawat'     => $idrawat,
        'tglrawat'     => $tglrawat,
        'totaltindakan'     => $totaltindakan,
        'totalobat'     => $totalobat,
        'totalharga'     => $totalharga=$totalobat+$totaltindakan,
        'uangmuka'     => $uangmuka,
        'kurang'     => $kurang=$totalharga-$uangmuka
      ];


      $this->Rawat_model->update_rawat($data, $idrawat);
      $this->index();
      $this->session->set_flashdata('msg_update_rawat', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data rawat berhasil Diupdate<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
      redirect('rawat');

    } else {
      $this->session->set_flashdata('msg_update_rawat', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data rawat Gagal Diupdate<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
      redirect('rawat');
    }
   }

    public function rawat_chart(){
      $query =  $this->db->query("SELECT COUNT(idrawat) as count, idpasien FROM rawat GROUP BY tglrawat "); 
      $chart = $query->result();
      $data = [
        
      ];
// print_r($record); 
      foreach($chart as $row){
         $data['label'][] = $row->idpasien;
        $data['data'][] = (int) $row->count;
    }
      $data['chart_data'] = json_encode($data);
      $this->load->view('rawat_chart',$data);
    }
}