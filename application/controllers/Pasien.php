<?php
class Pasien extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('modelPasien');
    }

    public function index()
    {
        $this->load->model('modelPasien');
        $keyword = $this->input->get('keyword');
        $data = $this->modelPasien->search($keyword);
        $data = array(
            'keyword'    => $keyword,
            'data'        => $data
        );

        $this->load->view('template/header');
        $this->load->view('pasien', $data);
        $this->load->view('template/footer');
    }

    function addT()
    { // fungsi ini digunakan untuk menampilkan halaman Tambah data pada Penerbit dan Buku
        $this->load->view('template/header');
        $this->load->view('tambah_pasien');
        $this->load->view('template/footer');
    }

    // fungsi ini digunakan untuk memasukkan data yang di input pada halaman tambah data ke database
    function insert()
    {
        if ($this->modelPasien->insert($this->input->post())) {
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah');
            redirect(base_url('pasien')); //jika dalam pengecekan if berhasil maka baris kode ini dijalankan dan halaman akan diarahkan menuju ke halaman tindakan
        }
    }

    function edit($a)
    {
        $data['list'] = $this->modelPasien->get_detail($a);
        $this->load->view('template/header');
        $this->load->view('edit_pasien', $data);
        $this->load->view('template/footer');
    }

    // fungsi ini digunakan untuk mengupdate pada data yang ada di database
    function update($id)
    {
        if ($this->modelPasien->update($this->input->post(), $id)) {
            $this->session->set_flashdata('pesan', 'Data berhasil diubah');
            redirect(base_url('pasien'));
        }
    }
    // fungsi ini digunakan untuk menghapus data yang ada pada database
    function delete($a)
    {
        $this->modelPasien->delete($a);
        $this->session->flashdata('pesan', "<script> Swal.fire({
            icon  : 'success',
            title : 'SUKSES',
            text  : 'lancar gaes',
            confirmButtonText: 'sap lur'
        })</script>");
        redirect(base_url('pasien'));
    }

    public function data(){
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'pasien';
 
// Table's primary key
$primaryKey = 'idpasien';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'idpasien', 'dt' => 0 ),
    array( 'db' => 'nama',  'dt' => 1 ),
    array( 'db' => 'alamat',   'dt' => 2 ),
    array( 'db' => 'tgllahir',     'dt' => 3 ),
    array( 'db' => 'notelp',     'dt' => 4 ),

);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'klinikfitria',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
 $this->load->library('SSP');
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
    }
}
