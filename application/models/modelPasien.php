<?php
class modelPasien extends CI_Model
{   
    function get_pasien()
    {
        $query = $this->db->get('pasien');
        return $query->result();
    }
    
    function getData()
    {
        return $this->db->get('pasien')->result();
    }

    function search($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('pasien');
        if (!empty($keyword)) {
            $this->db->like('nama', $keyword);
            $this->db->like('idpasien', $keyword);
        }
        return $this->db->get()->result_array();
    }

    function insert($a)
    {
        $data = [
            'idpasien'      =>  $a['idpasien'],
            'nama'     =>  $a['nama'],
            'tgllahir'  =>  $a['tgllahir'],
            'alamat'  =>  $a['alamat'],
            'notelp'  =>  $a['notelp']
        ];
        return $this->db->insert('pasien', $data);
    }

    function get_detail($a)
    {
        $this->db->where('idpasien', $a);
        return $this->db->get('pasien')->row_array();
    }

    function update($a, $id)
    {
        $data = [
            'idpasien'      =>  $a['idpasien'],
            'nama'     =>  $a['nama'],
            'tgllahir'  =>  $a['tgllahir'],
            'alamat'  =>  $a['alamat'],
            'notelp'  =>  $a['notelp']
        ];
        $this->db->where('idpasien', $id);
        return $this->db->update('pasien', $data);
    }

    function delete($a)
    {
        $this->db->where('idpasien', $a);
        return $this->db->delete('pasien');
    }

    public function print_pasien($a)
    {
        $this->db->where('idpasien', $a);
        return $this->db->get('pasien')->row_array();
    }
}
