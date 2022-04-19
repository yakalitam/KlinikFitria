<?php
class modelTindakan extends CI_Model
{
    function getData()
    {
        return $this->db->get('tindakan')->result();
    }

    function search($keyword = null)
    {
        $this->db->select('*');
        $this->db->from('tindakan');
        if (!empty($keyword)) {
            $this->db->like('namatindakan', $keyword);
        }
        return $this->db->get()->result_array();
    }

    function insert($a)
    {
        $data = [
            'idtindakan'      =>  $a['idtindakan'],
            'namatindakan'     =>  $a['namatindakan'],
            'biaya'  =>  $a['biaya']
        ];
        return $this->db->insert('tindakan', $data);
    }

    function get_detail($a)
    {
        $this->db->where('idtindakan', $a);
        return $this->db->get('tindakan')->row_array();
    }

    function update($a, $id)
    {
        $data = [
            'idtindakan'      =>  $a['idtindakan'],
            'namatindakan'     =>  $a['namatindakan'],
            'biaya'  =>  $a['biaya']
        ];
        $this->db->where('idtindakan', $id);
        return $this->db->update('tindakan', $data);
    }

    function delete($a)
    {
        $this->db->where('idtindakan', $a);
        return $this->db->delete('tindakan');
    }
}
