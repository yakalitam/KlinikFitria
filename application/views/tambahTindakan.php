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
                            <form action="<?php echo base_url('Tindakan/insert') ?>" method="post" enctype="multipart/form-data">
                                <!-- baris kode untuk input data yang disimpan dalam variabel idT -->
                                <div class="mb-3 row">
                                    <label for="idtindakan" class="col-sm-2 col-form-label">ID Tindakan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="idtindakan" class="form-control" id="idtindakan">
                                    </div>
                                </div>
                                <!-- baris kode untuk input data yang disimpan dalam variabel namaT -->
                                <div class="mb-3 row">
                                    <label for="namatindakan" class="col-sm-2 col-form-label">Nama Tindakan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="namatindakan" class="form-control" id="namatindakan">
                                    </div>
                                </div>
                                <!-- baris kode untuk input data yang disimpan dalam variabel biaya -->
                                <div class="mb-3 row">
                                    <label for="biaya" class="col-sm-2 col-form-label">Biaya</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="biaya" class="form-control" id="biaya">
                                    </div>
                                </div>
                                <!-- button submit untuk memasukkan data ke dalam database -->
                                <button style="width: 100px; height: 40px;" type="submit" class="btn btn-primary">Submit</button>
                                <!-- button kembali yang diarahkan menuju halaman tindakan -->
                                <!-- <a style="width: 100px; height: 40px;" class="btn btn-sm btn-danger" href="<?php echo base_url('tindakan') ?>"> Back
                                </a> -->
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>