 <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat extends CI_Controller
{
 
public function __construct()
    {
        parent::__construct();
        $this->load->model("Rawat_model");
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

    public function cetak_pdf(){
      $pdf = new FPDF('P', 'mm','Letter');

        $pdf->AddPage();

        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,7,'NOTA PERAWATAN KLINIK FITRIA',0,1,'C');
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','I',12);
        $pdf->Cell(0,12,'* Rincian Perawatan',0,1,'L');
        $pdf->Cell(10,1,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(15,15,'ID',1,0,'C');
        $pdf->Cell(20,15,'ID Pasien',1,0,'C');
        $pdf->Cell(60,15,'Nama Pasien',1,0,'C');
        $pdf->Cell(30,15,'Tanggal Rawat',1,0,'C');
        $pdf->Cell(30,15,'Total Tindakan',1,0,'C');
        $pdf->Cell(30,15,'Total Obat',1,1,'C');
      

        $pdf->SetFont('Arial','',10);
        $rawat = $this->Rawat_model->rawat_pasien();
        foreach ($rawat as $row){
            $pdf->Cell(15,15,$row->idrawat,1,0,'C');
            $pdf->Cell(20,15,$row->idpasien,1,0,'C');
            $pdf->Cell(60,15,$row->nama,1,0,'C');
            $pdf->Cell(30,15,$row->tglrawat,1,0,'C');
            $pdf->Cell(30,15,"Rp ".number_format($row->totaltindakan, 0, ".", "."),1,0,'C');
            $pdf->Cell(30,15,"Rp ".number_format($row->totalobat, 0, ".", "."),1,1,'C');
        }



        $pdf->SetFont('Arial','I',12);
        $pdf->Cell(0,12,'* Biaya Pengeluaran',0,1,'L');
        $pdf->Cell(10,1,'',0,1);

        $pdf->SetFont('Arial','B',10);

        $pdf->Cell(50,15,'Nama Pasien',1,0,'C');
        $pdf->Cell(30,15,'Total Harga',1,0,'C');
        $pdf->Cell(30,15,'Uang Muka',1,0,'C');
        $pdf->Cell(30,15,'Kekurangan',1,1,'C');

        $pdf->SetFont('Arial','',10);
        $rawat = $this->Rawat_model->rawat_pasien();
        foreach ($rawat as $row){
            $pdf->Cell(50,15,$row->nama,1,0,'C');
            $pdf->Cell(30,15,"Rp ".number_format($row->totalharga, 0, ".", "."),1,0,'C');
            $pdf->Cell(30,15,"Rp ".number_format($row->uangmuka, 0, ".", "."),1,0,'C');
            $pdf->Cell(30,15,"Rp ".number_format($row->kurang, 0, ".", "."),1,1,'C');

        }
        $pdf->Output();

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
    $rawat_exist = $this->Rawat_model->get_single_row_rawat($idrawat);

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
        $data['rawat'] = $this->Rawat_model->get_single_row_rawat($id);
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

    $data_lama = $this->Rawat_model->get_single_row_rawat($idrawat);

    if ($data_lama->idrawat != $idrawat || $data_lama->tglrawat != $tglrawat  || $data_lama->totaltindakan != $totaltindakan 
    || $data_lama->totalobat != $totalobat || $data_lama->totalharga != $totalharga || $data_lama->uangmuka != $uangmuka
    || $data_lama->kurang != $kurang || $data_lama->idpasien != $idpasien 
    ) {
            
      $data = [
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

}