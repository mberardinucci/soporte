<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cause $cause
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Causes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Jumbocl Tickets'), ['controller' => 'JumboclTickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Jumbocl Ticket'), ['controller' => 'JumboclTickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="causes form large-9 medium-8 columns content">
    <?= $this->Form->create($cause) ?>
    <fieldset>
        <legend><?= __('Add Cause') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
