<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Tambah Data Tindakan</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <!-- baris kode untuk form input data yang disimpan dalam database, pada metode form menggunakan method post yang di arahkan ke controller user fungsi insert -->
                            <form action="<?php echo base_url('Pasien/insert') ?>" method="post" enctype="multipart/form-data">
                                <!-- baris kode untuk input data yang disimpan dalam variabel idT -->
                                <div class="mb-3 row">
                                    <label for="idpasien" class="col-sm-2 col-form-label">ID Pasien</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="idpasien" class="form-control" id="idpasien">
                                    </div>
                                </div>
                                <!-- baris kode untuk input data yang disimpan dalam variabel namaT -->
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama" class="form-control" id="nama">
                                    </div>
                                </div>
                                <!-- baris kode untuk input data yang disimpan dalam variabel biaya -->
                                <div class="mb-3 row">
                                    <label for="tgllahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="tgllahir" class="form-control" id="tgllahir">
                                    </div>
                                </div>
                                <!-- baris kode untuk input data yang disimpan dalam variabel biaya -->
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" class="form-control" id="alamat">
                                    </div>
                                </div>
                                <!-- baris kode untuk input data yang disimpan dalam variabel biaya -->
                                <div class="mb-3 row">
                                    <label for="notelp" class="col-sm-2 col-form-label">No. Telp</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="notelp" class="form-control" id="notelp">
                                    </div>
                                </div>
                                <!-- button submit untuk memasukkan data ke dalam database -->
                                <button style="width: 100px; height: 40px;" type="submit" class="btn btn-primary">Submit</button>
                                <!-- button kembali yang diarahkan menuju halaman tindakan -->
                                <!-- <a style="width: 100px; height: 40px;" class="btn btn-sm btn-danger" href="<?php echo base_url('pasien') ?>"> Back
                                </a> -->
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>