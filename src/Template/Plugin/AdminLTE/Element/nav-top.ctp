<?php 
        $user = $this->request->session()->read('Auth.User');                       
        ?>
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">      
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <?php echo $this->Html->image('avatar5.png', array('class' => 'user-image', 'alt' => 'User Image')); ?>
          <span class="hidden-xs"><?php echo $user['name'] ?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <?php echo $this->Html->image('avatar5.png', array('class' => 'img-circle', 'alt' => 'User Image')); ?>

            <p>
              <?php echo $user['name'] ?>              
            </p>
          </li>          
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <?php echo $this->Html->link('Perfil', array('controller' => 'users', 'action' => 'view', $user['id']), array('class'=>'btn btn-default btn-flat')); ?>
            </div>
            <div class="pull-right">
              <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'), array('class'=>'btn btn-default btn-flat')); ?>
              
            </div>
          </li>
        </ul>
      </li>
      
    </ul>
  </div>
</nav>