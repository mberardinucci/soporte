<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Ticket $ticket
 */
?>
<section class="content-header">
  <h1>
    Ticket
    <small>JumboCL</small>
    <?php
echo $this->Html->link('Editar Ticket', array('action' => 'edit',$ticket->id), array('class'=>'btn btn-sm btn-warning btn-flat pull-right'));
?>
  </h1> 
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">              
              <h3 class="box-title">Ticket</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">
                
                <dt>Usuario Solicitante</dt>
                <dd><?= h($ticket->final_user) ?></dd>
                <dt>Usuario Creador</dt>
                <dd><?= $ticket['user']['name'] ?></dd>
                <dt>Estado</dt>
                <dd><?= $ticket['state']['name'] ?></dd>  
                <dt>País</dt>
                <dd><?= $ticket['country']['name'] ?></dd>           
                <dt>Descripción</dt>
                <dd><?= $this->Text->autoParagraph(h($ticket->description)); ?></dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
        <?php if ($cau != null): ?>

            <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">              
                  <h3 class="box-title">Ticket CAU</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <dl class="dl-horizontal">                
                    <dt>Número de CAU</dt>
                    <dd><?= $cau['cau'] ?></dd>
                    <dt>Fecha apertura</dt>
                    <dd><?php
                            if($cau['open_date'] != null)
                              echo $cau['open_date']->i18nFormat('dd-MM-yyyy HH:mm');
                      ?></dd>
                    <dt>Fecha resolución</dt>
                    <dd><?php 
                            if($cau['resolution_date'] != null)
                              echo $cau['resolution_date']->i18nFormat('dd-MM-yyyy HH:mm');
                      ?></dd>            
                    <dt>Tipo ticket</dt>
                    <dd><?php 
                        if ($cau['type_ticket_id'] == 0){
                            echo 'Solicitud';
                        }
                        else if ($cau['type_ticket_id'] == 1){
                            echo 'Incidente';
                        }

                    ?></dd>
                  </dl>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- ./col -->
        <?php endif; ?>

    </div>
      <!-- /.row -->
    <div class="row">
    <?php if ($vtex != null): ?>
            <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">              
                  <h3 class="box-title">Ticket Vtex</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <dl class="dl-horizontal">
                    
                    <dt>Número Vtex</dt>
                    <dd><?= $vtex['id_vtex'] ?></dd>
                    <dt>Fecha apertura</dt>
                    <dd><?php
                          if($vtex['open_date'] != null)
                              echo $vtex['open_date']->i18nFormat('dd-MM-yyyy HH:mm');
                      ?></dd>
                    <dt>Fecha resolución</dt>
                    <dd><?php
                          if($vtex['resolution_date'] != null)
                              echo $vtex['resolution_date']->i18nFormat('dd-MM-yyyy HH:mm');
                      ?></dd>            
                    <dt>Prioridad</dt>
                    <dd><?= $vtex['priority']['name'] ?></dd>
                  </dl>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- ./col -->
        <?php endif; ?>
        <?php if ($fizz != null): ?>
            <div class="col-md-6">
              <div class="box box-solid">
                <div class="box-header with-border">              
                  <h3 class="box-title">Ticket Fizzmod</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <dl class="dl-horizontal">                
                    <dt>Número de CAU</dt>
                    <dd><?= $fizz['id_fizz'] ?></dd>
                    <dt>Fecha apertura</dt>
                    <dd><?php
                          if($fizz['open_date'] != null)
                              echo $fizz['open_date']->i18nFormat('dd-MM-yyyy HH:mm');
                      ?></dd>
                    <dt>Fecha resolución</dt>
                    <dd><?php 
                          if($fizz['resolution_date'] != null)
                              echo $fizz['resolution_date']->i18nFormat('dd-MM-yyyy HH:mm');
                     ?></dd>            
                    <dt>Prioridad</dt>
                    <dd><?= $fizz['priority']['name'] ?></dd>
                  </dl>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- ./col -->
        <?php endif; ?>
    </div>
   <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
            <!-- timeline time label -->
            <?php foreach ($records as $record): ?>

              <li class="time-label">
                    <span class="bg-green">                    
                      <?= $record['date']->i18nFormat('dd-MM-yyyy HH:mm'); ?>
                    </span>
              </li>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <li>
                <i class="fa fa-comments bg-yellow"></i>

                <div class="timeline-item">
                  <span class="time"><i class="fa fa-clock-o"></i> 
                  <?php

                    //$now = new Cake\I18n\Time();
                    //$now->setTimezone(new \DateTimeZone('America/Santiago'));
                    $date = $record['date'];
                    $date->setTimezone(new \DateTimeZone('America/Santiago'));
                    echo $date->timeAgoInWords(['format' => 'MMM d, YYY', 'end' => '+1 year']);                    

                  ?>


                  </span>

                  <h3 class="timeline-header"><?= $record['user']['name'] ?></h3>

                  <div class="timeline-body">
                  <br>
                    &emsp;<?= $record['description'] ?>
                  </div>

                  <div class="timeline-footer">                    
                    <a class="btn btn-danger btn-xs">Delete</a>
                  </div>
                </div>

              </li>
            <?php endforeach; ?>
            <!-- END timeline item -->
            <!-- timeline item -->
          </ul>
        </div>
    </div>
</section>