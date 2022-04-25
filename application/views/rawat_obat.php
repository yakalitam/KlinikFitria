<?php $this->load->view('template/header');?>
<title>PerawatanObat</title>  

<div class="container mt-5">

<div class="container-fluid mt-3">

        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Rawat Obat</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php echo $this->session->flashdata('msg_add_rawatobat'); ?>
        <?php echo $this->session->flashdata('msg_update_rawatobat'); ?>
        <?php echo $this->session->flashdata('msg_del_rawatobat'); ?>
                    <a href="<?= base_url('Rawat_Obat/tambah_rawatobat');?>" type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp Tambah</a>
                    &nbsp <a href="<?= base_url('Rawat_Obat/pie_chart');?>" type="button" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp Lihat Chart</a>
                  <hr>
                    <thead>
                    <tr style="text-align:center;">
                       <th>ID</th>
                <th>ID Rawat</th>
                <th>ID Obat</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total Obat</th>
                <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
          
          <?php $sum=0; 
          foreach($rawatobat as $row){ 
            $sum += $row->totalobat; ?>
        <tr style="text-align:center;">
<td><?php echo $row->idrawatobat?></td>
<td><?php echo $row->idrawat?></td>
<td><?php echo $row->idobat?></td>
<td><?php echo $row->jumlah?></td>
<td><?php echo $row->harga?></td>
<td><?php echo $row->totalobat?></td>
<td style="text-align:center;">
  <a href="Rawat_Obat/edit_rawatobat?id=<?php echo htmlspecialchars($row->idrawatobat) ?>" type="button" class="btn btn-warning"><i class="fa fa-edit"></i>&nbsp Edit</a>  
  <a href="Rawat_Obat/delete_rawatobat?id=<?php echo htmlspecialchars($row->idrawatobat) ?>" title="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item')"><i class="fa fa-trash"></i>&nbspDelete</a></td>
</tr>
<?php }?>
</tbody>
</table>

</div>
            </div>
          </div>

        </div>

      </div>  
  

  </div>
</div>


            </div>
        </div>
    </div>

                                     
</div>

<?php $this->load->view('template/footer');?>