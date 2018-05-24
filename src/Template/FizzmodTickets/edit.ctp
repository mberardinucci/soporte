<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FizzmodTicket $fizzmodTicket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fizzmodTicket->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fizzmodTicket->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fizzmod Tickets'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Priorities'), ['controller' => 'Priorities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Priority'), ['controller' => 'Priorities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fizzmodTickets form large-9 medium-8 columns content">
    <?= $this->Form->create($fizzmodTicket) ?>
    <fieldset>
        <legend><?= __('Edit Fizzmod Ticket') ?></legend>
        <?php
            echo $this->Form->control('id_fizz');
            echo $this->Form->control('open_date');
            echo $this->Form->control('resolution_date');
            echo $this->Form->control('priority_id', ['options' => $priorities]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
