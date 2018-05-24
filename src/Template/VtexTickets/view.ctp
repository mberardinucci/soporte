<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VtexTicket $vtexTicket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vtex Ticket'), ['action' => 'edit', $vtexTicket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vtex Ticket'), ['action' => 'delete', $vtexTicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vtexTicket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vtex Tickets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vtex Ticket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Priorities'), ['controller' => 'Priorities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Priority'), ['controller' => 'Priorities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vtexTickets view large-9 medium-8 columns content">
    <h3><?= h($vtexTicket->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id Vtex') ?></th>
            <td><?= h($vtexTicket->id_vtex) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Priority') ?></th>
            <td><?= $vtexTicket->has('priority') ? $this->Html->link($vtexTicket->priority->name, ['controller' => 'Priorities', 'action' => 'view', $vtexTicket->priority->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vtexTicket->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Open Date') ?></th>
            <td><?= h($vtexTicket->open_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resolution Date') ?></th>
            <td><?= h($vtexTicket->resolution_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Tickets') ?></h4>
        <?php if (!empty($vtexTicket->tickets)): ?>
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
            <?php foreach ($vtexTicket->tickets as $tickets): ?>
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
