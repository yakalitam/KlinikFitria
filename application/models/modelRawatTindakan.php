<?php

class modelRawatTindakan extends CI_Model
{
    public function get_totaltindakan()
    {
    $query = $this->db->query("SELECT SUM(rawattindakan.harga) as count, rawattindakan.idrawat as idrawat FROM rawattindakan,rawat WHERE rawattindakan.idrawat=rawat.idrawat GROUP BY rawattindakan.idrawat ");
    return $query->result();
    }

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
          $this->db->select('*');
          $this->db->join('tindakan', 'tindakan.idtindakan=rawattindakan.idtindakan');
          $this->db->where('idrawat', $id);
        return $this->db->get('rawattindakan')->result_array();
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
            'harga' => $tindakan['biaya']
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
            'harga' => $tindakan['biaya']
        ];

        $this->db->where('idrawattindakan', $id);
        return $this->db->update('rawattindakan', $data);
    }

    function update_rawat($a)
    {
        $this->db->where('idtindakan', $a['idtindakan']);
        $tindakan = $this->db->get('tindakan')->row_array();

        $this->db->where('idrawat', $a['idrawat']);
        $before = $this->db->get('rawat')->row_array();
        $after = $before['totaltindakan']+$tindakan['biaya'];
        $data = [
            // 'idrawattindakan' => $a['idrawattindakan'],
            // 'idrawat' => $a['idrawat'],
            // 'idtindakan' => $a['idtindakan's],
            // 'namadokter' => $a['namadokter'],
            'harga' => $tindakan['biaya']
        ];
        //$query = $this->db->get_where('rawat', array('idrawat' => $idrawat));
    //  $this->db->set('totalobat', 'totalobat'+$data['totalobat'], FALSE);
        $this->db->set('totaltindakan', $after, FALSE);
        $this->db->where('idrawat', $a['idrawat']);
        $this->db->update('rawat');


    }
  
}
