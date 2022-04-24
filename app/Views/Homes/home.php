<?= $this->extend('layout/master') ?>

<?= $this->section('content') ?>
<!-- Statistic table -->
<div class="card mt-2">
    <div class="card-body">
      <center><h4 style="color:#333">Equipment Statistic Table</h4></center>
        <table id="statistic" class="table table-bordered w-100 dt-responsive nowrap" >
            <thead class="text-white table-dark font-weight-bold">
            <tr >
                <th rowspan="2">Name</th>
                <th colspan="3"><center>In Use</center></th>
                <th rowspan="2" ><center>SD/KSD</center></th>
                <th colspan="<?php echo(count($year))?>"><center>Year</center></th>
                <th rowspan="2">Total</th>
            </tr>
            <tr>
                <th>% Old</th>
                <th>New</th>
                <th>Old</th>
                <?php foreach($year as $item){?>                            
                  <th><?=$item['label']?></th>                         
                <?php }?>
            </tr>
            </thead>
            <tbody>
            <?php for($i=0;$i<count($name);$i++){?>                            
              <tr>                                         
                  <th><?=$name[$i]['name']?></th>
                  <th><?=round($new[$i]['total']/$total[$i]['total']*100,1)?>%</th>
                  <th><?=$old[$i]['total']?></th>                        
                  <th><?=$new[$i]['total']?></th>
                  <th><?=$use[$i]['total']?>/<?=$total[$i]['total']-$use[$i]['total']?></th>
                  <?php foreach($year as $item){?>                            
                    <?php foreach($dataYear as $datacell){?>
                      <?php if($datacell['year']==$item['label']&&$datacell['name']==$name[$i]['name']){?>                            
                      <?php $cell=$datacell['total'];?>
                      <th><?=$cell[0]['total']?></th>                         
                    <?php }}?>                         
                <?php }?>
                <th><?=$total[$i]['total']?></th>
            </tr>                         
                <?php }?>
            </tbody>
            
        </table>
    </div>
</div>
<div class="card mt-5">
  <div class="col-md-12 d-flex justify-content-end mt-5">                           
    <button id="export" type="submit" formaction="<?php echo base_url('config/export') ?>" class="btn btn-success" type="submit"
    style="margin-right:10px;">
    <i class="fa fa-chevron-circle-left"></i> Export</a></button>  
  </div>
  <div class="container">
    <h4 style="text-align: center;">Number of new equipment per year</h4>
    <canvas id="myChart"></canvas>
  </div>
</div>
<div class="card mt-5">
  <div class="form-group">
    <p ><br>Pick a Year to show data into Pie Chart</p>
    <!-- <label for="inputEmail2" class="form-label"><?php echo lang('component.Year'); ?></label> -->

    <select class="form-control" id="year" name="year" onchange="yearchanged(this)">
      
    </select>
  </div>

<div class="row g-2">

  <div class="col-lg-4">
      <h4 style="text-align: center;">Laptop statistics</h4>
                               
      <canvas id="laptopChart"></canvas>
  </div>
  <div class="col-lg-4">
      <h4 style="text-align: center;">PC statistics</h4>
      <canvas id="pcChart"></canvas>
  </div>

  <div class="col-lg-4">
      <h4 style="text-align: center;">Monitor statistics</h4>
      <canvas id="monitorChart"></canvas>
  </div>
</div>
<div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src="<?=base_url("public/asset/js/FileSaver.min.js")?>"></script>
<script src="<?=base_url("public/asset/js/canvas-toBlob.js")?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>

 <script type="text/javascript" language="javascript">
    $(document).ready(function () {
      $.ajax({
          url: "<?php echo base_url('homepage/getlistconfig')?>",
          type: "GET",
          success: function (data) {
              var listdata=JSON.parse(data);
              var label = [];
              var value = [];
              var valuetotal=[];
              var value_line=[];
              
              let temp=0;
              console.log(listdata);//show data len console
              //console.log(listdata['barchart']);
              for (var i in listdata['barchart']) {
                  label.push("" + listdata['barchart'][i].label);
                  value.push(listdata['barchart'][i].value);
                  value_line.push(listdata['linechart'][i].value);
                  //console.log(listdata[i].label);
                  //console.log(listdata[i].value);
                  temp=parseInt(listdata['barchart'][i].value)+temp;
                  valuetotal.push(temp);
                  //console.log(temp);
              }
              console.log(label);
              var dynamicColors = function() {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                return "rgb(" + r + "," + g + "," + b + ")";
            };

              var laptop=[];
              var valuelaptop=[];
              var colorlaptop=[];
              for(var i in listdata['pieLaptop'])
              {
                laptop.push("" + listdata['pieLaptop'][i].label);
                valuelaptop.push(listdata['pieLaptop'][i].value);
                colorlaptop.push(dynamicColors());
              }

              var pc=[];
              var valuepc=[];
              var colorpc=[];
              for(var i in listdata['piePC'])
              {
                pc.push("" + listdata['piePC'][i].label);
                valuepc.push(listdata['piePC'][i].value);
                colorpc.push(dynamicColors());
              }

              var monitor=[];
              var valuemonitor=[];
              var colormonitor=[];
              for(var i in listdata['pieMonitor'])
              {
                monitor.push("" + listdata['pieMonitor'][i].label);
                valuemonitor.push(listdata['pieMonitor'][i].value);
                colormonitor.push(dynamicColors());
              }

              console.log(label);
              console.log(value);
              var chartdata = {
                          labels: label,
                          datasets: [
                              {
                                  type: 'line',
                                  data:value_line,
                                  label:'Number of using equipment',
                                  borderColor: '#46d5f1',
                                  backgroundColor: '',
                                  hoverBackgroundColor: 'red',
                                  hoverBorderColor: '#666666',
                              },
                              {
                                  type: 'bar',
                                  label: 'Number of new equipment',
                                  backgroundColor: 'green',
                                  borderColor: '#46d5f1',
                                  hoverBackgroundColor: 'blue',
                                  hoverBorderColor: '#666666',
                                  data: value
                              },
                              {
                                  type: 'bar',
                                  label: 'Number of total equipment',
                                  backgroundColor: 'pink',
                                  borderColor: '#46d5f1',
                                  hoverBackgroundColor: 'blue',
                                  hoverBorderColor: '#666666',
                                  data: valuetotal
                              },
                              
                          ]
                      };
              var graphTarget = $("#myChart");
              var barGraph = new Chart(graphTarget, {
                          type: 'bar',
                          data: chartdata,
                          options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }]
                            }
                          }
                      });
              
                      //laptop chart
              var laptopchart=$('#laptopChart');
              const datalaptop = {
                labels: laptop,
                datasets: [
                  {
                    label: 'Dataset 1',
                    data: valuelaptop,
                    //backgroundColor: Object.values(Utils.CHART_COLORS),
                    backgroundColor: colorlaptop,
                    borderColor: 'rgba(200, 200, 200, 0.75)',
                    //hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',                    
                  }
                ]
              };
              const config = {
                type: 'pie',
                data: datalaptop,
                options: {
                  responsive: true,
                  plugins: {
                    legend: {
                      position: 'top',
                    },
                    title: {
                      display: true,
                      text: 'Laptop'
                    }
                  }
                },
              };
              var pieLaptop= new Chart(laptopchart,config);
              //pc chart
              var pcchart=$('#pcChart');
              const datapc = {
                labels: pc,
                datasets: [
                  {
                    label: 'Dataset 1',
                    data: valuepc,
                    //backgroundColor: Object.values(Utils.CHART_COLORS),
                    backgroundColor: colorpc,
                    borderColor: 'rgba(200, 200, 200, 0.75)',
                    //hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',                    
                  }
                ]
              };
              const configpc = {
                type: 'pie',
                data: datapc,
                options: {
                  responsive: true,
                  plugins: {
                    legend: {
                      position: 'top',
                    },
                    title: {
                      display: true,
                      text: 'PC'
                    }
                  }
                },
              };
              var piePC= new Chart(pcchart,configpc);
              //monitor chart
              var monitorchart=$('#monitorChart');
              const datamonitor = {
                labels: monitor,
                datasets: [
                  {
                    label: 'Dataset 1',
                    data: valuemonitor,
                    //backgroundColor: Object.values(Utils.CHART_COLORS),
                    backgroundColor: colorpc,
                    borderColor: 'rgba(200, 200, 200, 0.75)',
                    //hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',                    
                  }
                ]
              };
              const configmonitor = {
                type: 'pie',
                data: datamonitor,
                options: {
                  responsive: true,
                  plugins: {
                    legend: {
                      position: 'top',
                    },
                    title: {
                      display: true,
                      text: 'Monitor',
                      position: 'top'
                    }
                  }
                },
              };
              var pieMonitor= new Chart(monitorchart,configmonitor);

              var select = document.querySelector("#year");
              console.log(label);
              var datayear=label;
              datayear.push('All');
              select.innerHTML=datayear.map((value,index)=>{
                return (`<option value="${value}" selected>${value}</option>`)
              }).join('');
              function yearchanged(obj){
                console.log(select.value);
              }

          },

          error: function (data) {
          }
         
        });
      $('#export').click(function(){
        $('#myChart').get(0).toBlob(function(blob){
        saveAs(blob,"type_chart.png")
      });
    })
});

//event selected change combobox
function yearchanged(obj){
      console.log(obj.value);
      $.ajax({
          url: "<?php echo base_url('homepage/updatechart')?>/"+obj.value,         
          
          type: "GET",
          
          success: function (data) {
              var listdata=JSON.parse(data);
              var label = [];
              var value = [];
              var valuetotal=[];
              var value_line=[];
              
              let temp=0;
              console.log(listdata);
              //console.log(listdata['barchart']);
              for (var i in listdata['barchart']) {
                  label.push("" + listdata['barchart'][i].label);
                  value.push(listdata['barchart'][i].value);
                  value_line.push(listdata['linechart'][i].value);
                  //console.log(listdata[i].label);
                  //console.log(listdata[i].value);
                  temp=parseInt(listdata['barchart'][i].value)+temp;
                  valuetotal.push(temp);
                  //console.log(temp);
              }
              console.log(label);
              var dynamicColors = function() {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                return "rgb(" + r + "," + g + "," + b + ")";
            };

              var laptop=[];
              var valuelaptop=[];
              var colorlaptop=[];
              for(var i in listdata['pieLaptop'])
              {
                laptop.push("" + listdata['pieLaptop'][i].label);
                valuelaptop.push(listdata['pieLaptop'][i].value);
                colorlaptop.push(dynamicColors());
              }

              var pc=[];
              var valuepc=[];
              var colorpc=[];
              for(var i in listdata['piePC'])
              {
                pc.push("" + listdata['piePC'][i].label);
                valuepc.push(listdata['piePC'][i].value);
                colorpc.push(dynamicColors());
              }

              var monitor=[];
              var valuemonitor=[];
              var colormonitor=[];
              for(var i in listdata['pieMonitor'])
              {
                monitor.push("" + listdata['pieMonitor'][i].label);
                valuemonitor.push(listdata['pieMonitor'][i].value);
                colormonitor.push(dynamicColors());
              }

              console.log(label);
              console.log(value); 
                      //laptop chart
              var laptopchart=$('#laptopChart');
              let canvasLaptop = document.getElementById('laptopChart');
              const contextLaptop = canvasLaptop.getContext('2d');
              contextLaptop.clearRect(0, 0, canvasLaptop.width, canvasLaptop.height);
              const datalaptop = {
                labels: laptop,
                datasets: [
                  {
                    label: 'Dataset 1',
                    data: valuelaptop,
                    //backgroundColor: Object.values(Utils.CHART_COLORS),
                    backgroundColor: colorlaptop,
                    borderColor: 'rgba(200, 200, 200, 0.75)',
                    //hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',                    
                  }
                ]
              };
              const config = {
                type: 'pie',
                data: datalaptop,
                options: {
                  responsive: true,
                  plugins: {
                    legend: {
                      position: 'top',
                    },
                    title: {
                      display: true,
                      text: 'Laptop'
                    }
                  }
                },
              };
              var pieLaptop= new Chart(laptopchart,config);
              //pc chart
              var pcchart=$('#pcChart');
              let canvasPC = document.getElementById('pcChart');
              const contextPC = canvasPC.getContext('2d');
              contextPC.clearRect(0, 0, canvasPC.width, canvasPC.height);
              const datapc = {
                labels: pc,
                datasets: [
                  {
                    label: 'Dataset 1',
                    data: valuepc,
                    //backgroundColor: Object.values(Utils.CHART_COLORS),
                    backgroundColor: colorpc,
                    borderColor: 'rgba(200, 200, 200, 0.75)',
                    //hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',                    
                  }
                ]
              };
              const configpc = {
                type: 'pie',
                data: datapc,
                options: {
                  responsive: true,
                  plugins: {
                    legend: {
                      position: 'top',
                    },
                    title: {
                      display: true,
                      text: 'PC'
                    }
                  }
                },
              };
              var piePC= new Chart(pcchart,configpc);
              //monitor chart
              var monitorchart=$('#monitorChart');
              let canvasMonitor = document.getElementById('monitorChart');
              const contextMonitor = canvasMonitor.getContext('2d');
              contextMonitor.clearRect(0, 0, canvasMonitor.width, canvasMonitor.height);
              const datamonitor = {
                labels: monitor,
                datasets: [
                  {
                    label: 'Dataset 1',
                    data: valuemonitor,
                    //backgroundColor: Object.values(Utils.CHART_COLORS),
                    backgroundColor: colorpc,
                    borderColor: 'rgba(200, 200, 200, 0.75)',
                    //hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',                    
                  }
                ]
              };
              const configmonitor = {
                type: 'pie',
                data: datamonitor,
                options: {
                  responsive: true,
                  plugins: {
                    legend: {
                      position: 'top',
                    },
                    title: {
                      display: true,
                      text: 'Monitor',
                      position: 'top'
                    }
                  }
                },
              };
              var pieMonitor= new Chart(monitorchart,configmonitor);                     
          },

          error: function (data) {
          }
          
      });               
}
 </script>

<?= $this->endSection() ?>