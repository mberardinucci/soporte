<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CauTicket $cauTicket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cauTicket->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cauTicket->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cau Tickets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Type Tickets'), ['controller' => 'TypeTickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type Ticket'), ['controller' => 'TypeTickets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jumbocl Tickets'), ['controller' => 'JumboclTickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Jumbocl Ticket'), ['controller' => 'JumboclTickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cauTickets form large-9 medium-8 columns content">
    <?= $this->Form->create($cauTicket) ?>
    <fieldset>
        <legend><?= __('Edit Cau Ticket') ?></legend>
        <?php
            echo $this->Form->control('cau');
            echo $this->Form->control('open_date');
            echo $this->Form->control('answer_date');
            echo $this->Form->control('resolution_date');
            echo $this->Form->control('type_ticket_id', ['options' => $typeTickets]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
