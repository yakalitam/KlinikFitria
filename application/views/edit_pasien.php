<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Edit Data Pasien</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?php echo base_url('Pasien/update/') . $list['idpasien'] ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3 row">
                                    <label for="idpasien" class="col-sm-2 col-form-label">ID Pasien</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $list['idpasien'] ?>" name="idpasien" class="form-control" id="idpasien">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Pasien</label>
                                    <div class="col-sm-10">
                                        <input value="<?php echo $list['nama'] ?>" type="text" name="nama" class="form-control" id="nama">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tgllahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input value="<?php echo $list['tgllahir'] ?>" type="date" name="tgllahir" class="form-control" id="tgllahir">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input value="<?php echo $list['alamat'] ?>" type="text" name="alamat" class="form-control" id="alamat">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="notelp" class="col-sm-2 col-form-label">No. Telp</label>
                                    <div class="col-sm-10">
                                        <input value="<?php echo $list['notelp'] ?>" type="text" name="notelp" class="form-control" id="notelp">
                                    </div>
                                </div>
                                <button style="width: 100px; height: 40px;" type="submit" class="btn btn-primary">Submit</button>
                                <a style="width: 100px; height: 40px;" class="btn btn-sm btn-danger" href="<?php echo base_url('pasien') ?>"> Back
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>