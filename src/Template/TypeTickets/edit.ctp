<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypeTicket $typeTicket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $typeTicket->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $typeTicket->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Type Tickets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cau Tickets'), ['controller' => 'CauTickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cau Ticket'), ['controller' => 'CauTickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typeTickets form large-9 medium-8 columns content">
    <?= $this->Form->create($typeTicket) ?>
    <fieldset>
        <legend><?= __('Edit Type Ticket') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
