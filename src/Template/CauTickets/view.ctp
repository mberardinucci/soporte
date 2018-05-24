<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CauTicket $cauTicket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cau Ticket'), ['action' => 'edit', $cauTicket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cau Ticket'), ['action' => 'delete', $cauTicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cauTicket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cau Tickets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cau Ticket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Type Tickets'), ['controller' => 'TypeTickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type Ticket'), ['controller' => 'TypeTickets', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jumbocl Tickets'), ['controller' => 'JumboclTickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Jumbocl Ticket'), ['controller' => 'JumboclTickets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cauTickets view large-9 medium-8 columns content">
    <h3><?= h($cauTicket->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Type Ticket') ?></th>
            <td><?= $cauTicket->has('type_ticket') ? $this->Html->link($cauTicket->type_ticket->name, ['controller' => 'TypeTickets', 'action' => 'view', $cauTicket->type_ticket->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cauTicket->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cau') ?></th>
            <td><?= $this->Number->format($cauTicket->cau) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Open Date') ?></th>
            <td><?= h($cauTicket->open_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Answer Date') ?></th>
            <td><?= h($cauTicket->answer_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Resolution Date') ?></th>
            <td><?= h($cauTicket->resolution_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Jumbocl Tickets') ?></h4>
        <?php if (!empty($cauTicket->jumbocl_tickets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Op') ?></th>
                <th scope="col"><?= __('Cause Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Cau Ticket Id') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cauTicket->jumbocl_tickets as $jumboclTickets): ?>
            <tr>
                <td><?= h($jumboclTickets->id) ?></td>
                <td><?= h($jumboclTickets->op) ?></td>
                <td><?= h($jumboclTickets->cause_id) ?></td>
                <td><?= h($jumboclTickets->user_id) ?></td>
                <td><?= h($jumboclTickets->cau_ticket_id) ?></td>
                <td><?= h($jumboclTickets->comments) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'JumboclTickets', 'action' => 'view', $jumboclTickets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'JumboclTickets', 'action' => 'edit', $jumboclTickets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'JumboclTickets', 'action' => 'delete', $jumboclTickets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jumboclTickets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
