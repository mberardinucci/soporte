<section class="content-header">
  <h1>
    Monitor 
    <small></small>
  </h1>  
</section>

<section class="content">	
  <div class="row">
    <div class="box">
      <div class="box-body">
        <?php echo $this->Form->create(null, ['url' => ['action' => 'index']]); ?>
            <table border="0" cellspacing="5" cellpadding="5">
              <tbody>
                <tr>
              <td>Pais:&nbsp</td>
              <td><?php echo $this->Form->control('country_id', array('class'=>'form-control', 'label' => false, 'options' => $countries, 'default' => $country_id));?></td>
              <td>&nbsp&nbsp</td>
              <td>Estado:&nbsp</td>
              <td><?php echo $this->Form->control('state_id', array('class'=>'form-control', 'label' => false, 'options' => $states, 'default' => $state_id));?></td>
              <td>&nbsp&nbsp</td>
              <td>Usuario:&nbsp</td>
              <td><?php echo $this->Form->control('user_id', array('class'=>'form-control', 'label' => false, 'options' => $users, 'default' => $user_id));?></td>
              <td>&nbsp&nbsp</td>
              <td>Desde:<?php echo $this->Form->control('from_date', array('class' => 'form_datetime form-control pull-right', 'label' => false));  ?> </td>
              <td>Hasta:<?php echo $this->Form->control('until_date', array('class' => 'form_datetime form-control pull-right', 'label' => false));  ?> </td>
              <td><?= $this->Form->button(__('Filtrar')) ?>
              
              <?= $this->Form->end() ?></td>
            </tr>
          </tbody>
        </table>
    
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
    <div class="row">
      <div class="col-xs-6">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tickets abiertos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>                
                    <tr>
                        <th scope="col">CAU</th>
                        <th scope="col">Vtex </th>
                        <th scope="col">Fizzmod </th>
                        <th scope="col">Pais</th>
                        <th scope="col">Usuario</th>                        
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>                
                </thead>
                <tbody>
                    <?php foreach ($tickets_abiertos as $abierto):                         
                    ?>
                    <!--<?php debug($abierto); ?>-->
                        <tr>
                            <td><?= h($abierto->cau) ?></td>                            
                            <td><?= h($abierto->vtex) ?></td>
                            <td><?= h($abierto->fizz) ?></td>
                            <td><?= h($abierto['country']['name']) ?></td>
                            <td><?= h($abierto['user']['name']) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), array('controller' => 'Tickets', 'action' => 'view', $abierto->id), array('class' => 'btn btn-info')); ?>
                                <?= $this->Html->link(__('Editar'), array('controller' => 'Tickets', 'action' => 'edit', $abierto->id), array('class' => 'btn btn-warning')); ?>                                
                            </td>
                        </tr>
                        <?php endforeach; ?>
                </tbody>                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Reportes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo $this->Form->create(null, ['url' => ['action' => 'report']]); ?>
              País:
              <?php echo $this->Form->control('country_id', array('class'=>'form-control', 'label' => false, 'options' => $countries, 'default' => $country_id));?>
              Desde:<?php echo $this->Form->control('from_date', array('class' => 'form_datetime form-control pull-right', 'label' => false));  ?> 
              Hasta:<?php echo $this->Form->control('until_date', array('class' => 'form_datetime form-control pull-right', 'label' => false));  ?> 

              <!--<?php echo $this->Html->link('Generar reporte', array('action' => 'report'), array('class'=>'btn btn-sm btn-info btn-flat pull-left'));?>-->

              <?= $this->Form->button(__('Generar reporte')) ?>              
              <?= $this->Form->end() ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
       </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-xs-6">
          <!-- DONUT CHART -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Total de tickets</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <canvas id="pieChartTotalTicket" style="height:250px"></canvas>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
      </div>

    <div class="row">
    	<div class="col-xs-6">
	        <div class="box">
	            <div class="box-header">
	              <h3 class="box-title">Clasificación de tickets</h3>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body">
	              <table id="example2" class="table table-bordered table-striped">
	                
	                <tbody>
                  <?php for ($i=0; $i < count($clasificationListCount) ; $i++): ?> 
                      <tr>
                          <th><?= $clasificationListCount[$i]['label']?></th>
                          <td><?= $clasificationListCount[$i]['value']?></td>             
                    </tr>
                   <?php endfor; ?> 
	                </tbody>                
	              </table>
	            </div>
	            <!-- /.box-body -->
	        </div>
          	<!-- /.box -->
        </div>
        <!-- /.col -->	
        <div class="col-xs-6">
        	<!-- DONUT CHART -->
          	<div class="box box-danger">
	            <div class="box-header with-border">
	              <h3 class="box-title">Gráfico de clasificación de tickets</h3>

	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	              </div>
	            </div>
	            <div class="box-body">
	              <canvas id="pieChartClassification" style="height:250px"></canvas>
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /.box -->
	     </div>
    </div>
    <!-- /.row -->
    
</section>
    <!-- /.content -->

<?php
$this->Html->css([

    'AdminLTE./plugins/datepicker/datepicker3',    

  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/chartjs/Chart.min',
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',  
  'AdminLTE./plugins/datepicker/locales/bootstrap-datepicker.es', 
],
['block' => 'script']);
?>




<?php $this->start('scriptBottom'); ?>
<!-- page script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //-------------
    //- PIE CHART CLASSIFICATION-
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartClassificationCanvas = $("#pieChartClassification").get(0).getContext("2d");
    var pieChartClassification = new Chart(pieChartClassificationCanvas);
    var ClassificationData = <?php echo json_encode($clasificationListCount); ?>;
    var ClassificationOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,

      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChartClassification.Pie(ClassificationData, ClassificationOptions);

    //-------------
    //- PIE CHART TOTALTICKETS-
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartTotalTicketCanvas = $("#pieChartTotalTicket").get(0).getContext("2d");
    var pieChartTotalTicket = new Chart(pieChartTotalTicketCanvas);
    var TotalTicketData = <?php echo json_encode($ticketsTotal); ?>;
    var TotalTicketOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChartTotalTicket.Pie(TotalTicketData, TotalTicketOptions);

    $('.form_datetime').datepicker({
      //autoclose: true,
      language:  'es',
      format: 'dd-mm-yyyy',
      //weekStart: 1,
      todayBtn:  1,
      autoclose: 1,
      //todayHighlight: 1,
      //startView: 2,
      //forceParse: 0,
      //showMeridian: 1
    });
  });
</script>
<?php  $this->end(); ?>

