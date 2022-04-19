<?php $this->load->view('template/header');?>
<title>Obat</title>  

<div class="container mt-5">

<div class="container-fluid mt-3">

        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel List Obat</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php echo $this->session->flashdata('msg_add_obat'); ?>
        <?php echo $this->session->flashdata('msg_update_obat'); ?>
        <?php echo $this->session->flashdata('msg_del_obat'); ?>
                    <a href="<?= base_url('Obat/tambah_obat');?>" type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp Tambah</a>
                  <hr>
                    <thead>
                    <tr style="text-align:center;">
                       <th>ID Obat</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
          
          <?php foreach($obat as $row){ ?>
        <tr style="text-align:center;">
<td><?php echo $row->idobat?></td>
<td><?php echo $row->nama?></td>
<td><?php echo $row->harga?></td>
<td style="text-align:center;">
    <a href="Obat/edit_obat?id=<?php echo htmlspecialchars($row->idobat) ?>" type="button" class="btn btn-warning"><i class="fa fa-edit"></i>&nbsp Edit</a>  
    <a href="Obat/delete_obat?id=<?php echo htmlspecialchars($row->idobat) ?>" title="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item')"><i class="fa fa-trash"></i>&nbspDelete</a></td>
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