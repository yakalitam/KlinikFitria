<?php $this->load->view('template/header'); ?>

<title>Tambah Rawat Obat</title>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 style="color:black;">Tambah Rawat Obat</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
             <form action="tambah_rawatobat_proses" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="ID_RawatObat" class="form-label">ID Rawat Obat</label>
                                    <input type="text" name="idrawatobat" class="form-control" id="idrawatobat">
                                </div>

                                <div class="mb-3">
                                    <label for="ID_Rawat" class="form-label">ID Rawat</label>
                                    <input type="text" name="idrawat" class="form-control" id="idrawat" list="suggestions">
                                   <datalist id="suggestions">
                                          <select class="form-control" id="category_name" name="category_name">
                            <option selected="0"></option>
                            <?php foreach($rawatobat as $row) : ?>
                              <option value="<?php echo $row->idrawat;?>"> </option>
                            <?php endforeach; ?>
                            </select>
                                  </datalist>  
                                </div>

                                <div class="mb-3">
                                    <label for="ID_Obat" class="form-label">ID Obat</label>
                                  <input type="text" name="idobat" class="form-control" id="idobat" list="suggestions1" >
                               <datalist id="suggestions1">
                                          <select class="form-control" id="category_name" name="category_name">
                            <option selected="0"></option>
                            <?php foreach($rawatobat as $row) : ?>
                              <option value="<?php echo $row->idobat;?>"> <?php echo $row->nama;?></option>
                            <?php endforeach; ?>
                            </select>
                                  </datalist>  
                                </div>

                                <div class="mb-3">
                                    <label for="Jumlah" class="form-label">Jumlah</label>
                                    <input type="number" min="0" name="jumlah" class="form-control" id="jumlah">
                                </div>
                                <div class="mb-3">
                                    <label for="Harga" class="form-label">Harga</label>
                                   <input type="text" name="harga" class="form-control" id="harga" list="suggestions2" >
                               <datalist id="suggestions2">
                                          <select class="form-control" id="category_name" name="category_name">
                            <option selected="0"></option>
                            <?php foreach($rawatobat as $row) : ?>
                              <option value="<?php echo $row->harga;?>"> <?php echo $row->nama;?></option>
                            <?php endforeach; ?>
                            </select>
                                  </datalist>  
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
