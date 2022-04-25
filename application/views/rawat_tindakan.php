<title>Perawatan Tindakan</title>  

<div class="container mt-5">

<div class="container-fluid mt-3">

        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Rawat Tindakan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                     <a href="<?php echo base_url('Rawat_Tindakan/add') ?>" class="btn btn-success"><i class="fa fa-plus"></i>&nbspTambah</a>&nbsp
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 <i class="fa fa-eye"></i> Lihat Chart
</button>
<hr>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                             <?php if ($this->session->flashdata('pesan') != '') { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $this->session->flashdata('pesan'); ?>
                    </div>
                <?php } ?>

   <thead>
                        <tr style="text-align:center;">
                            <th>ID</th>
                            <th>ID Rawat</th>
                            <th>ID Tindakan</th>
                            <th>Nama Dokter</th>
                            <th>Biaya</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($list as $item) { ?>
                            <tr style="text-align:center;">
                                <td><?php echo $item['idrawattindakan'] ?></td>
                                <td><?php echo $item['idrawat'] ?></td>
                                <td><?php echo $item['idtindakan'] ?></td>
                                <td><?php echo $item['namadokter'] ?></td>
                                <td><?php echo $item['harga'] ?></td>

                                <td>
                                    <a href="Rawat_Tindakan/edit/<?php echo $item['idrawattindakan']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="Rawat_Tindakan/delete/<?php echo $item['idrawattindakan']; ?>" onclick="return confirm('Data ini akan dihapus. Anda yakin?')" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Chart Rekap Tindakan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
  
      <div class="container mt-3">
   <form action="" method="">
<div class="form-group row">
    <div class="col-sm-6">
    <input type="date" name="startdate" class="form-control" id="startdate">
                        </div>
                        <div class="col-sm-6">
    <input type="date" name="enddate" class="form-control" id="enddate">
                        </div>
                        </div>
  </form>
  </div>
  
  
      <div class="modal-body">
         <div class="chart-container">
    <div class="pie-chart-container">
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
          text: "Filter Dokter Tindakan by Tanggal",
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


