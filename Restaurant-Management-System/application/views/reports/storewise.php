 <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Reports
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reports</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">

        <div class="col-md-12 col-xs-12">
          <form class="form-inline" action="<?php echo site_url('reports/storewise') ?>" method="POST">
            <div class="form-group">
              <label for="date">Year</label>
              <select class="form-control" name="select_year" id="select_year">
                <?php foreach ($report_years as $key => $value): ?>
                  <option value="<?php echo $value ?>" <?php if($value == $selected_year) { echo "selected"; } ?>><?php echo $value; ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="form-group">
              <label for="date">Store</label>
              <select class="form-control" name="select_store" id="select_store">
                <option value="">Select store</option>
                <?php foreach ($store_data as $key => $value): ?>
                  <option value="<?php echo $value['id'] ?>" <?php if($selected_store == $value['id']) { echo 'selected="selected"'; } ?>><?php echo $value['name']; ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
        </div>

        <br /> <br />

        <div class="col-md-12 col-xs-12">

          <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          <?php elseif($this->session->flashdata('error')): ?>
            <div class="alert alert-error alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
          <?php endif; ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total Paid Orders - Report</h3>
            </div>
            
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart" style="height:250px"></canvas>
              </div>
            </div>
            
          </div>
          
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Total Paid Orders - Report Data</h3>
            </div>
            
            <div class="box-body">
              <table id="datatables" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Month - Year</th>
                  <th>Amount</th>
                </tr>
                </thead>
                <tbody>

                  <?php foreach ($results as $k => $v): ?>
                    <tr>
                      <td><?php echo $k; ?></td>
                      <td><?php 
                      
                        echo $company_currency .' ' . $v;
                        
                      
                      ?></td>
                    </tr>
                  <?php endforeach ?>
                  
                </tbody>
                <tbody>
                  <tr>
                    <th>Total Amount</th>
                    <th>
                      <?php echo $company_currency . ' ' . array_sum($results); ?>
                    </th>
                  </tr>
                </tbody>
              </table>
            </div>
            
          </div>
          
        </div>
       
      </div>
      
      

    </section>
    
  </div>
  

  <script type="text/javascript">

    $(document).ready(function() {
      $("#ReportMainNav").addClass('active');
      $("#storeReportSubMenu").addClass('active');
    }); 

    var report_data = <?php echo '[' . implode(',', $results) . ']'; ?>;
    

    $(function () {
         var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      datasets: [
        {
          label               : 'Electronics',
          fillColor           : 'rgba(210, 214, 222, 1)',
          strokeColor         : 'rgba(210, 214, 222, 1)',
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : report_data
        }
      ]
    }

    
    
    
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[0].fillColor   = '#00a65a';
    barChartData.datasets[0].strokeColor = '#00a65a';
    barChartData.datasets[0].pointColor  = '#00a65a';
    var barChartOptions                  = {
      
      scaleBeginAtZero        : true,
      
      scaleShowGridLines      : true,
      
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      
      scaleGridLineWidth      : 1,
      
      scaleShowHorizontalLines: true,
      
      scaleShowVerticalLines  : true,
      
      barShowStroke           : true,
      
      barStrokeWidth          : 2,
      
      barValueSpacing         : 5,
      
      barDatasetSpacing       : 1,
      
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })
  </script>
