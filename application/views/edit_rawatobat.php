<?php $this->load->view('template/header'); ?>

<title>Edit Rawat Obat</title>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 style="color:black">Edit Rawat Obat</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
            <form action="edit_rawatobat_proses" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="ID_RawatObat" class="form-label">ID Rawat Obat</label>
                                    <input value ="<?php echo htmlspecialchars($rawatobat->idrawatobat); ?>" type="text" name="idrawatobat" class="form-control" id="idrawatobat" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="ID_Rawat" class="form-label">ID Perawatan</label>
                                    <input value ="<?php echo htmlspecialchars($rawatobat->idrawat); ?>" type="text" name="idrawat" class="form-control" id="idrawat" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="ID_Obat" class="form-label">ID Obat</label>
                                    <input value ="<?php echo htmlspecialchars($rawatobat->idobat); ?>"type="text"  name="idobat" class="form-control" id="idobat" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="Jumlah" class="form-label">Jumlah Obat</label>
                                    <input value ="<?php echo htmlspecialchars($rawatobat->jumlah); ?>"type="number" min="0" name="jumlah" class="form-control" id="jumlah">
                                </div>
                                <div class="mb-3">
                                    <label for="Harga" class="form-label">Harga Obat</label>
                                    <input value ="<?php echo htmlspecialchars($rawatobat->harga); ?>"type="number" min="0" name="harga" class="form-control" id="harga" readonly>
                                </div>
                                
                                <input type="hidden" name="idrawatobat" id="idrawatobat" value=<?php echo htmlspecialchars($rawatobat->idrawatobat); ?>>
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