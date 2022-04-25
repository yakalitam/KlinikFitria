
<title>Tindakan</title>  

<div class="container mt-5">

<div class="container-fluid mt-3">

        
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel List Tindakan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                      <a class="btn btn-success" href="<?php echo base_url('Tindakan/addT') ?>">
                    <i class="fa fa-plus"></i>&nbspTambah Data Tindakan
                </a>
                <hr>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr style="text-align:center;">
                            <th scope="col" style="width: 20px;">No</th>
                            <th scope="col" style="width: 100px;">ID Tindakan</th>
                            <th scope="col" style="width: 600px;">Nama Tindakan</th>
                            <th scope="col" style="width: 200px;">Biaya</th>
                            <th scope="col" style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data as $d) { ?>
                            <tr style="text-align:center;">
                                <td><?= $no++; ?></td>
                                <td><?= $d['idtindakan'] ?></td>
                                <td><?= $d['namatindakan'] ?></td>
                                <td>Rp. <?php echo number_format($d['biaya'], 0, ',', '.') ?></td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="Tindakan/edit/<?php echo $d['idtindakan'] ?>"><i class="fa fa-edit"></i>&nbspEdit</a>
                                    <a class="btn btn-sm btn-danger" href="Tindakan/delete/<?php echo $d['idtindakan']; ?>" onclick="return konfirmasi('Data ini akan dihapus, apakah anda yakin?')"><i class="fa fa-trash"></i>&nbspDelete</a>
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


