<?php

class modelRawatTindakan extends CI_Model
{
    function get_rawat_tindakan()
    {
        return $this->db->get('rawattindakan')->result_array();
    }

    function get_rawat_tindakan_detail($id)
    {
        $this->db->where('idrawattindakan', $id);
        return $this->db->get('rawattindakan')->row_array();
    }

    public function get_rawat_detail($id)
     {
          $this->db->where('idrawat', $id);
        return $this->db->get('rawattindakan')->row_array();
     }

    function insert_rawat_tindakan($a)
    {
        $this->db->where('idtindakan', $a['idtindakan']);
        $tindakan = $this->db->get('tindakan')->row_array();

        $data = [
            'idrawattindakan' => $a['idrawattindakan'],
            'idrawat' => $a['idrawat'],
            'idtindakan' => $a['idtindakan'],
            'namadokter' => $a['namadokter'],
            'biaya' => $tindakan['biaya']
        ];

        return $this->db->insert('rawattindakan', $data);
    }

    function update_rawat_tindakan($a, $id)
    {
        $this->db->where('idtindakan', $a['idtindakan']);
        $tindakan = $this->db->get('tindakan')->row_array();

        $data = [
            'idrawattindakan' => $a['idrawattindakan'],
            'idrawat' => $a['idrawat'],
            'idtindakan' => $a['idtindakan'],
            'namadokter' => $a['namadokter'],
            'biaya' => $tindakan['biaya']
        ];

        $this->db->where('idrawattindakan', $id);
        return $this->db->update('rawattindakan', $data);
    }
}
