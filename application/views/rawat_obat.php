<?php $this->load->view('template/header');?>
<title>Perawatan Obat</title>  

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
                    &nbsp <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 <i class="fa fa-eye"></i> Lihat Chart
</button>
                    <!-- <a href="<?= base_url('Rawat_Obat/pie_chart');?>" type="button" class="btn btn-primary"><i class="fa fa-eye"></i>&nbsp Lihat Chart</a> -->
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chart Rawat Obat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="chart-container">
    <div class="bar-chart-container">
      <canvas id="pie-chart"></canvas>
    </div>
  </div>
  <!-- javascript -->


   <script>
  $(function(){
      //get the bar chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#pie-chart");
 
      //bar chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: cData.label,
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1,1, 1, 1, 1,1,1]
          }
        ]
      };
 
      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Presentase Jenis Obat Terjual",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };
 
      //create bar Chart class object
      var chart1 = new Chart(ctx, {
        type: "pie",
        data: data,
        options: options
      });
 
  });
</script>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

            </div>
        </div>
    </div>

                                     
</div>




<?php $this->load->view('template/footer');?>