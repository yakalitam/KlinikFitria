<?php $this->load->view('template/header'); ?>
<title>Perawatan</title>

<style>

</style>

<div class="container mt-5">

  <div class="container-fluid mt-3">

    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel List Perawatan</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="max-width: 100%;
      overflow-x: hidden;">
            <?php echo $this->session->flashdata('msg_add_rawat'); ?>
            <?php echo $this->session->flashdata('msg_update_rawat'); ?>
            <?php echo $this->session->flashdata('msg_del_rawat'); ?>

            <a href="<?= base_url('rawat/tambah_rawat'); ?>" type="button" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp Tambah</a>&nbsp
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 <i class="fa fa-eye"></i> Lihat Chart
</button>
            <hr>
            <thead>
              <tr style="text-align:center;">
                <th>ID</th>
                <th>ID Pasien</th>
                <th>Tanggal Rawat</th>
                <th>Total Tindakan</th>
                <th>Total Obat</th>
                <th style="background-color:blue; color:white;">Total Harga</th>
                <th>Uang Muka</th>
                <th style="background-color:red; color:white;">Kekurangan</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>
              <?php foreach ($rawat as $row) {
              ?>
                <tr style="text-align:center;">
                  <td><?php echo $row->idrawat ?></td>
                  <td><?php echo $row->idpasien ?></td>
                  <td><?php echo $row->tglrawat ?></td>
                  <td><?php echo $row->totaltindakan ?></td>
                  <td><?php echo $row->totalobat?></td>
                  <td style="background-color:blue; color:white;"><?php echo $row->totalharga ?></td>
                  <td><?php echo $row->uangmuka ?></td>
                  <td style="background-color:red; color:white;"><?php echo $row->kurang ?></td>
                  <td>
                    <a href="rawat/edit_rawat?id=<?php echo htmlspecialchars($row->idrawat) ?>" type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>&nbsp Edit</a>
                    <hr> <a href="rawat/delete_rawat?id=<?php echo htmlspecialchars($row->idrawat) ?>" title="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item')"><i class="fa fa-trash"></i>&nbspDelete</a>
                    <hr> <a href="rawat/cetak?id=<?php echo htmlspecialchars($row->idrawat) ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-download"></i>&nbsp Cetak</a>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
          <br>
          <p style="color:blue;">*<i>Total Harga berdasarkan Total Obat + Total Tindakan</i></p>
          <p style="color:red;">*<i>Biaya Kekurangan berdasarkan Total Harga - Uang Muka</i></p>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chart Rekap Laporan</h5>
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
    <div class="bar-chart-container">
      <canvas id="bar-chart"></canvas>
    </div>
  </div>
  <!-- javascript -->


   <script>
  $(function(){
      //get the bar chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#bar-chart");
 
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
          text: "Rekap Laporan Tabel Rawat by Tanggal",
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
        type: "bar",
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



<?php $this->load->view('template/footer'); ?>