<div class="user-panel">
    <div class="pull-left image">
        <?php echo $this->Html->image('avatar5.png', array('class' => 'img-circle', 'alt' => 'User Image')); ?>
    </div>
    <div class="pull-left info">
    	<?php 
        $user = $this->request->session()->read('Auth.User');                       
        ?>
        <p><?php echo $user['name'] ?></p>        
    </div>
</div>