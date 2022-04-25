<?php $this->load->view('template/header'); ?>

<div class="container mt-5">
    
        <div class="form-group row">
                        <div class="col-sm-2">  
                                    <div class="mb-3">
                                        <label for="" class="form-label"></label>
                                        <input type="date"  name="start_date" class="form-control" id="start_date">
                                    </div>
                                    </div>
    
                        <div class="col-sm-2">
                                    <div class="mb-3">
                                        <label for="" class="form-label"></label>
                                        <input type="date" name="end_date" class="form-control" id="end_date">
                                    </div>
                                    </div>
                                    </div>
                                    
    <div class="chart-container">
    <div class="pie-chart-container">
      <canvas id="pie-chart"></canvas>
    </div>
  </div>
  <!-- javascript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 

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
          text: "Dokter Filter by Tanggal",
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
<?php $this->load->view('template/footer'); ?>