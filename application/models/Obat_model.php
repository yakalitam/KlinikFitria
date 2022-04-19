<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat_model extends CI_Model
{
 function _construct(){
     $this->load->database();
 }

 public function get_obat()
    {
    $query = $this->db->query("select * from obat");
    return $query->result();
    }

    public function get_single_row_obat($idobat)
     {
          $query = $this->db->get_where('obat', array('idobat' => $idobat));
          return $query->row();
     }
     
      public function delete_obat($idobat)
  {
    return $this->db->delete('obat', array('idobat' => $idobat));
  }

  public function update_obat($data, $idobat)
  {
    $this->db->where('idobat', $idobat);
    $this->db->update('obat', $data);
  }

  
     //check idobat exist
     public function check_obat_exists($idobat)
     {
          $query = $this->db->get_where('obat', array('idobat' => $idobat));
          if (empty($query->row_array())) {
               return true;
          } else {
               return false;
          }
     }


 }