<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Priority $priority
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Priorities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ticket Fizzmods'), ['controller' => 'TicketFizzmods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket Fizzmod'), ['controller' => 'TicketFizzmods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ticket Vtexs'), ['controller' => 'TicketVtexs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket Vtex'), ['controller' => 'TicketVtexs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="priorities form large-9 medium-8 columns content">
    <?= $this->Form->create($priority) ?>
    <fieldset>
        <legend><?= __('Add Priority') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
