<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h1>Edit Data Tindakan</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?php echo base_url('Tindakan/update/') . $list['idtindakan'] ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3 row">
                                    <label for="idtindakan" class="col-sm-1 col-form-label">ID Penerbit</label>
                                    <div class="col-sm-11">
                                        <input type="text" value="<?php echo $list['idtindakan'] ?>" name="idtindakan" class="form-control" id="idtindakan">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="namatindakan" class="col-sm-1 col-form-label">Nama</label>
                                    <div class="col-sm-11">
                                        <input value="<?php echo $list['namatindakan'] ?>" type="text" name="namatindakan" class="form-control" id="namatindakan">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="biaya" class="col-sm-1 col-form-label">Alamat</label>
                                    <div class="col-sm-11">
                                        <input value="<?php echo $list['biaya'] ?>" type="text" name="biaya" class="form-control" id="biaya">
                                    </div>
                                </div>
                                <button style="width: 100px; height: 40px;" type="submit" class="btn btn-primary">Submit</button>
                                <a style="width: 100px; height: 40px;" class="btn btn-sm btn-danger" href="<?php echo base_url('tindakan') ?>"> Back
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>