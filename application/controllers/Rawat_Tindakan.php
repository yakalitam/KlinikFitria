<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat_Tindakan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('modelRawatTindakan');
        $this->load->model('Rawat_model');
        $this->load->model('modelTindakan');
        $this->load->model('modelPasien');
        $this->load->helper(array('form'));
    }

    public function index()
    {
         $query =  $this->db->query("SELECT COUNT(rawattindakan.idtindakan) as count, rawattindakan.namadokter as namadokter FROM rawattindakan,rawat WHERE rawattindakan.idrawat=rawat.idrawat GROUP BY rawattindakan.namadokter "); 
      $chart = $query->result();
      $data = [
        
      ];
// print_r($record); 
      foreach($chart as $row){
         $data['label'][] = $row->namadokter;
        $data['data'][] = (int) $row->count;
    }
      $data['chart_data'] = json_encode($data);
        $data['list'] = $this->modelRawatTindakan->get_rawat_tindakan();
        $this->load->view('template/header');
        $this->load->view('rawat_tindakan', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $data['tindakan'] = $this->modelTindakan->getData();
        $data['rawat'] = $this->Rawat_model->get_rawat();
        $this->load->view('template/header');
        $this->load->view('tambah_rawattindakan', $data);
        $this->load->view('template/footer');
    }

    public function insert()
    {
        $this->modelRawatTindakan->insert_rawat_tindakan($this->input->post());
        redirect(base_url('rawat_tindakan'));
    }

    public function edit($id)
    {
        $data['tindakan'] = $this->modelTindakan->getData();
        $data['rawat'] = $this->Rawat_model->get_rawat();
        $data['detail'] = $this->modelRawatTindakan->get_rawat_tindakan_detail($id);
        $this->load->view('template/header');
        $this->load->view('edit_rawattindakan', $data);
        $this->load->view('template/footer');
    }

    public function update($id)
    {
        $this->modelRawatTindakan->update_rawat_tindakan(($this->input->post()), $id);
        $this->session->set_flashdata('pesan', 'Data rawat-tindakan berhasil diedit.');
        redirect(base_url('Rawat_Tindakan'));
    }

    public function delete($a)
    {
        $this->db->where('idrawattindakan', $a);
        if ($this->db->delete('rawattindakan')) {
            $this->session->set_flashdata('pesan', 'Data rawat-tindakan berhasil dihapus.');
            redirect(base_url('Rawat_Tindakan'));
        }
    }

    public function dokter_chart(){
//       $query =  $this->db->query("SELECT COUNT(rawattindakan.idtindakan) as count, rawat.idrawat as idrawat FROM rawattindakan,rawat WHERE rawattindakan.idrawat=rawat.idrawat GROUP BY rawattindakan.idtindakan "); 
//       $chart = $query->result();
//       $data = [
        
//       ];
// // print_r($record); 
//       foreach($chart as $row){
//          $data['label'][] = $row->idrawat;
//         $data['data'][] = (int) $row->count;
//     }
//       $data['chart_data'] = json_encode($data);
//       $this->load->view('dokter_chart',$data);
    }
}
