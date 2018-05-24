<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\JumboclTicket $jumboclTicket
 */
?>
<section class="content-header">
  <h1>
    Ticket
    <small>JumboCL</small>
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
                
                <dt>Número de OP</dt>
                <dd><?= h($jumboclTicket->op) ?></dd>
                <dt>Motivo</dt>
                <dd><?= $jumboclTicket['cause']['name'] ?></dd>
                <dt>Usuario</dt>
                <dd><?= $jumboclTicket['user']['name'] ?></dd>            
                <dt>Comentarios</dt>
                <dd><?= $this->Text->autoParagraph(h($jumboclTicket->comments)); ?></dd>
              </dl>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->

        <div class="col-md-6">
          <div class="box box-solid">
            <div class="box-header with-border">              
              <h3 class="box-title">Ticket CAU</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <dl class="dl-horizontal">                
                <dt>Número de CAU</dt>
                <dd><?= $jumboclTicket['cau_ticket']['cau'] ?></dd>
                <dt>Fecha apertura</dt>
                <dd><?= $jumboclTicket['cau_ticket']['open_date'] ?></dd>
                <dt>Fecha resolución</dt>
                <dd><?= $jumboclTicket['cau_ticket']['resolution_date'] ?></dd>            
                <dt>Tipo ticket</dt>
                <dd><?php 
                    if ($jumboclTicket['cau_ticket']['type_ticket_id'] == 0){
                        echo 'Solicitud';
                    }
                    else if ($jumboclTicket['cau_ticket']['type_ticket_id'] == 1){
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

    </div>
      <!-- /.row -->
</section>