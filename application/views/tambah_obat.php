<?php $this->load->view('template/header'); ?>

<title>Tambah Obat</title>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 style="color:black">Tambah Obat</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
             <form action="tambah_obat_proses" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="ID_Obat" class="form-label">ID Obat</label>
                                    <input type="text" name="idobat" class="form-control" id="idobat">
                                </div>
                                <div class="mb-3">
                                    <label for="Nama" class="form-label">Nama Obat</label>
                                    <input type="text" name="nama" class="form-control" id="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="Harga" class="form-label">Harga Obat</label>
                                    <input type="number" min="0" name="harga" class="form-control" id="harga">
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
