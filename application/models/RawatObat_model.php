<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class RawatObat_model extends CI_Model
{
 function _construct(){
     $this->load->database();
 }

  public function update_perawatan($idrawat,$data)
  {
     $query = $this->db->get_where('rawat', array('idrawat' => $idrawat));
     $this->db->set('totalobat', 'totalobat'+$data['totalobat'], FALSE);
     // $this->db->set('totaltindakan', 'totaltindakan'+$data['totatindakan'], FALSE);
    $this->db->where('idrawat', $idrawat);
    $this->db->update('rawat');
  }

 public function get_totalobat()
    {
    $query = $this->db->query("SELECT SUM(rawatobat.totalobat) as count, rawatobat.idrawat as idrawat FROM rawatobat,rawat WHERE rawatobat.idrawat=rawat.idrawat GROUP BY rawatobat.idrawat ");
    return $query->result();
    }

 public function get_rawatobat()
    {
    $query = $this->db->query("select * from rawatobat");
    return $query->result();
    }

 public function get_rawat()
    {
    $query = $this->db->query("select * from rawat");
    return $query->result();
    }

 public function get_obat()
    {
    $query = $this->db->query("select * from obat");
    return $query->result();
    }
   
//     public function perawatan_obat() { 
//      $this->db->select('*');
//       $this->db->order_by('idrawatobat');
//       return $this->db->from('rawatobat')
//       ->join('rawat', 'rawatobat.idrawat=rawat.idrawat', 'RIGHT')
//       ->join('obat', 'obat.idobat=rawatobat.idobat', 'RIGHT')
//           ->get()
//           ->result();
//     }  

public function perawatan_obat(){
$this->db->select('*');
 $this->db->from('rawatobat');
 $this->db->join('rawat','rawatobat.idrawat=rawat.idrawat', 'RIGHT');
 $this->db->join('obat', 'rawatobat.idobat=obat.idobat', 'RIGHT');
 $query = $this->db->get();
 return $query->result();
}

  public function get_rawat_detail($id)
     {
          $this->db->where('idrawat', $id);
        return $this->db->get('rawatobat')->result_array();
     }


    public function get_single_row_rawatobat($idrawatobat)
     {
          $query = $this->db->get_where('rawatobat', array('idrawatobat' => $idrawatobat));
          return $query->row();
     }
     
      public function delete_rawatobat($idrawatobat)
  {
    return $this->db->delete('rawatobat', array('idrawatobat' => $idrawatobat));
  }

  public function update_rawatobat($data, $idrawatobat)
  {
    $this->db->where('idrawatobat', $idrawatobat);
    $this->db->update('rawatobat', $data);
  }

  
     //check idobat exist
     public function check_rawatobat_exists($idrawatobat)
     {
          $query = $this->db->get_where('rawatobat', array('idrawatobat' => $idrawatobat));
          if (empty($query->row_array())) {
               return true;
          } else {
               return false;
          }
     }


 }