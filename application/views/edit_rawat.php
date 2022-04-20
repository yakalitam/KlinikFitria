<?php $this->load->view('template/header'); ?>

<title>Edit Rawat</title>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 style="color:black">Edit Rawat</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
            <form action="edit_rawat_proses" method="post" enctype="multipart/form-data">
                <h4 style="color:black;">Detail Perawatan</h4>

                <div class="form-group row">
                    <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="ID_Rawat" class="form-label">ID Perawatan</label>
                                    <input value ="<?php echo htmlspecialchars($rawat->idrawat); ?>" type="text" name="idrawat" class="form-control" id="idrawat" readonly>
                                </div>
                        </div>
                        <div class="col-sm-6">
                                <div class="mb-3">
                                    <label for="ID_Pasien" class="form-label">ID Pasien</label>
                                    <input value ="<?php echo htmlspecialchars($rawat->idpasien); ?>" type="text" name="idpasien" class="form-control" id="idpasien" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                                <label for="Tgl_Rawat" class="form-label">Tanggal Perawatan</label>
                                <input value ="<?php echo htmlspecialchars($rawat->tglrawat); ?>" type="date" name="tglrawat" class="form-control" id="tglrawat">
                            </div>

                            <br>
                            <h4 style="color:black;">Biaya Perawatan</h4>
                                <!-- <div class="form-group row">
                    <div class="col-sm-4">  
                                <div class="mb-3">
                                    <label for="Total_Tindakan" class="form-label">Total Tindakan</label>
                                    <input value ="<?php echo htmlspecialchars($rawat->totaltindakan); ?>"type="number" min="0" name="totaltindakan" class="form-control" id="totaltindakan">
                                </div>
                                </div>

                    <div class="col-sm-4">
                                <div class="mb-3">
                                    <label for="Total_Obat" class="form-label">Total Obat</label>
                                    <input value ="<?php echo htmlspecialchars($rawat->totalobat); ?>"type="number" min="0" name="totalobat" class="form-control" id="totalobat">
                                </div>
                                </div>

                    <div class="col-sm-4">   -->
                                <div class="mb-3">
                                    <label for="Uang_Muka" class="form-label">Uang Muka</label>
                                    <input value ="<?php echo htmlspecialchars($rawat->uangmuka); ?>"type="number" min="0" name="uangmuka" class="form-control" id="uangmuka">
                                </div>
                                <!-- </div>
                                </div> -->
                                
                                <input type="hidden" name="idrawat" id="idrawat" value=<?php echo htmlspecialchars($rawat->idrawat); ?>>
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