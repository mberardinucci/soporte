<ul class="sidebar-menu">
    <li class="header">PANEL NAVEGACION</li>
    <li>
        <a href="<?php echo $this->Url->build('/dashboards'); ?>">
            <i class="fa fa-th"></i> <span>Monitor</span>            
        </a>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Ticket Vtex</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li> <?= $this->Html->link(__(' Colombia'), array('controller' => 'tickets', 'action' => 'index', 1), array('class' => 'fa fa-circle-o')); ?></li>
            <li> <?= $this->Html->link(__(' Chile'), array('controller' => 'tickets', 'action' => 'index', 2), array('class' => 'fa fa-circle-o')); ?></li>  
            <li> <?= $this->Html->link(__(' Perú'), array('controller' => 'tickets', 'action' => 'index', 3), array('class' => 'fa fa-circle-o')); ?></li>                    
        </ul>
    </li>    
    <li>
        <a href="<?php echo $this->Url->build('/jumboclTickets'); ?>">
            <i class="fa fa-th"></i> <span>Ticket JumboCL</span>            
        </a>
    </li>
    
</ul>