<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FizzmodTicket $fizzmodTicket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fizzmod Ticket'), ['action' => 'edit', $fizzmodTicket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fizzmod Ticket'), ['action' => 'delete', $fizzmodTicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fizzmodTicket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fizzmod Tickets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fizzmod Ticket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Priorities'), ['controller' => 'Priorities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Priority'), ['controller' => 'Priorities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fizzmodTickets view large-9 medium-8 columns content">
    <h3><?= h($fizzmodTicket->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Fizz') ?></th>
            <td><?= h($fizzmodTicket->id_fizz) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Priority') ?></th>
            <td><?= $fizzmodTicket->has('priority') ? $this->Html->link($fizzmodTicket->priority->name, ['controller' => 'Priorities', 'action' => 'view', $fizzmodTicket->priority->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($fizzmodTicket->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Open Date') ?></th>
            <td><?= h($fizzmodTicket->open_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resolution Date') ?></th>
            <td><?= h($fizzmodTicket->resolution_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tickets') ?></h4>
        <?php if (!empty($fizzmodTicket->tickets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Final User') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('State Id') ?></th>
                <th scope="col"><?= __('Country Id') ?></th>
                <th scope="col"><?= __('Cau Ticket Id') ?></th>
                <th scope="col"><?= __('Fizzmod Ticket Id') ?></th>
                <th scope="col"><?= __('Vtex Ticket Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($fizzmodTicket->tickets as $tickets): ?>
            <tr>
                <td><?= h($tickets->id) ?></td>
                <td><?= h($tickets->description) ?></td>
                <td><?= h($tickets->final_user) ?></td>
                <td><?= h($tickets->user_id) ?></td>
                <td><?= h($tickets->state_id) ?></td>
                <td><?= h($tickets->country_id) ?></td>
                <td><?= h($tickets->cau_ticket_id) ?></td>
                <td><?= h($tickets->fizzmod_ticket_id) ?></td>
                <td><?= h($tickets->vtex_ticket_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tickets', 'action' => 'view', $tickets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tickets', 'action' => 'edit', $tickets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tickets', 'action' => 'delete', $tickets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tickets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
