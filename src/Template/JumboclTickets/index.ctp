<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JumboclTicket[]|\Cake\Collection\CollectionInterface $jumboclTickets
 */
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tickets 
    <small>JumboCL</small>
  </h1>  
</section>

<!-- Main content -->
<section class="content">
<?php
echo $this->Html->link('Ingresar Ticket', array('action' => 'add'), array('class'=>'btn btn-sm btn-info btn-flat pull-left'));
?>
  <div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Registro de tickets</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>                
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('cau', 'N° CAU') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('open_date', 'Fecha apertura CAU') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('resolution_date', 'Fecha resolución CAU') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('op', 'N° OP') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('cause_id', 'Motivo') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('user_id', 'Analista') ?></th>                            
                        <th scope="col" class="actions"><?= __('Acciones') ?></th>
                    </tr>                
                </thead>
                <tbody>
                    <?php foreach ($jumboclTickets as $jumboclTicket):                         
                    ?>
                        <tr>
                            <td><?= h($jumboclTicket->cau) ?></td>                                 
                            <td><?php echo $jumboclTicket['cau_ticket']['open_date']->i18nFormat('dd-MM-yyyy HH:mm') ?></td>
                            <td><?php echo $jumboclTicket['cau_ticket']['resolution_date']->i18nFormat('dd-MM-yyyy HH:mm') ?></td>
                            <td><?= h($jumboclTicket->op) ?></td>
                            <td><?= $jumboclTicket['cause']['name']?></td>
                            <td><?= $jumboclTicket->has('user') ? $this->Html->link($jumboclTicket->user->name, ['controller' => 'Users', 'action' => 'view', $jumboclTicket->user->id]) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), array('action' => 'view', $jumboclTicket->id), array('class' => 'btn btn-info')); ?>
                                <?= $this->Html->link(__('Editar'), array('action' => 'edit', $jumboclTicket->id), array('class' => 'btn btn-warning')); ?>
                                <?= $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $jumboclTicket->id), array('confirm' => __('Seguro que deseas eliminar el ticket?', $jumboclTicket->id), 'class' => 'btn btn-danger')); ?>
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
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<?php
$this->Html->css([
    'AdminLTE./plugins/datatables/dataTables.bootstrap',
  ],
  ['block' => 'css']);

$this->Html->script([
  'AdminLTE./plugins/datatables/jquery.dataTables.min',
  'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
],
['block' => 'script']);
?>

<?php $this->start('scriptBottom'); ?>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
       
    });
  });
</script>
<?php $this->end(); ?>

