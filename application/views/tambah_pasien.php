<title>Tambah Pasien</title>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1>Tambah Pasien</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="tambah_pasien_proses" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="ID_Pasien" class="form-label">ID Pasien</label>
                                    <input type="text" name="idpasien" class="form-control" id="idpasien">
                                </div>
                                <div class="mb-3">
                                    <label for="Nama" class="form-label">Nama Pasien</label>
                                    <input type="text" name="nama" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="Tgl_Lahir" class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tgllahir" class="form-control" id="tgllahir">
                                </div>
                                <div class="mb-3">
                                    <label for="Alamat" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" id="alamat">
                                </div>
                                <div class="mb-3">
                                    <label for="No_Telp" class="form-label">No Telepon</label>
                                    <input type="number" min="0" name="notelp" class="form-control" id="notelp">
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('template/footer'); ?>