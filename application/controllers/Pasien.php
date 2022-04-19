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
        redirect(base_url('pasien'));
    }
}
