<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JumboclTicket $jumboclTicket
 */
?>
<section class="content-header">
  <h1>
    Registrar ticket
    <small>JumboCL</small>
  </h1>  
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
    <!-- left column -->
        <?= $this->Form->create($jumboclTicket) ?>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ticket</h3>
                </div>
                <div class="box-body">
                    
                    <?php
                        $user = $this->request->session()->read('Auth.User');   

                        echo $this->Form->control('op', array('class'=>'form-control', 'label' => 'Número de OP'));
                        echo $this->Form->control('cause_id', array('class'=>'form-control', 'label' => 'Motivo', 'options' => $causes));
                        echo $this->Form->hidden('user_id', ['value' => $user['id']]);
                        //echo $this->Form->control('cau_ticket_id', ['options' => $cauTickets]);
                        echo $this->Form->control('comments', array('class'=>'form-control', 'label' => 'Comentarios'));
                    ?>     
                    
                </div>
            <!-- /.box-body -->
            </div>
        <!-- /.box -->
        </div>
    <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ticket CAU</h3>
                </div>
                <div class="box-body">
                      <?php
                            echo $this->Form->control('cau', array('class'=>'form-control', 'label' => 'Número CAU')); ?>

                    <div class="form-group">
                         <label>Fecha apertura:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <?php echo $this->Form->control('open_date', array('class' => 'form_datetime form-control pull-right', 'label' => false));  ?>                          
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group">
                         <label>Fecha resolución:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <?php echo $this->Form->control('resolution_date', array('class' => 'form_datetime form-control pull-right', 'label' => false));  ?>                          
                        </div>
                        <!-- /.input group -->
                    </div>                                                                                   
                            
                        <?php    echo $this->Form->control('type_ticket_id', array('class'=>'form-control', 'label' => 'Tipo ticket', 'options' => ['Solicitud','Incidente']));
                        ?>
                    
                </div>
            <!-- /.box-body -->
            </div>
        </div>
    <!--/.col (right) -->    
    </div>
    <?= $this->Form->button(__('Registrar')) ?>
    <?= $this->Form->end() ?>
  <!-- /.row -->
</section>
<!-- /.content -->

<?php
$this->Html->css([
    'AdminLTE./plugins/daterangepicker/daterangepicker',
    'AdminLTE./plugins/datepicker/datepicker3',
    'AdminLTE./plugins/iCheck/all',
    'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
    'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
    'AdminLTE./plugins/datetimepicker/bootstrap-datetimepicker',
    'AdminLTE./plugins/select2/select2.min',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/select2/select2.full.min',
  'AdminLTE./plugins/input-mask/jquery.inputmask',
  'AdminLTE./plugins/input-mask/jquery.inputmask.date.extensions',
  'AdminLTE./plugins/input-mask/jquery.inputmask.extensions',
  'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js',
  'AdminLTE./plugins/daterangepicker/daterangepicker',
  'AdminLTE./plugins/datepicker/bootstrap-datepicker',
  'AdminLTE./plugins/colorpicker/bootstrap-colorpicker.min',
  'AdminLTE./plugins/timepicker/bootstrap-timepicker.min',
  'AdminLTE./plugins/datetimepicker/bootstrap-datetimepicker',
  'AdminLTE./plugins/datetimepicker/bootstrap-datetimepicker.es',
  'AdminLTE./plugins/iCheck/icheck.min',
],
['block' => 'script']);
?>
<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    $('.form_datetime').datetimepicker({
            language:  'es',
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
            showMeridian: 1
        }); 

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
<?php $this->end(); ?>