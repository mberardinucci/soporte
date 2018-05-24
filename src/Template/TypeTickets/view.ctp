<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypeTicket $typeTicket
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Type Ticket'), ['action' => 'edit', $typeTicket->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Type Ticket'), ['action' => 'delete', $typeTicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeTicket->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Type Tickets'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type Ticket'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cau Tickets'), ['controller' => 'CauTickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cau Ticket'), ['controller' => 'CauTickets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="typeTickets view large-9 medium-8 columns content">
    <h3><?= h($typeTicket->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($typeTicket->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($typeTicket->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cau Tickets') ?></h4>
        <?php if (!empty($typeTicket->cau_tickets)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cau') ?></th>
                <th scope="col"><?= __('Open Date') ?></th>
                <th scope="col"><?= __('Answer Date') ?></th>
                <th scope="col"><?= __('Resolution Date') ?></th>
                <th scope="col"><?= __('Type Ticket Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($typeTicket->cau_tickets as $cauTickets): ?>
            <tr>
                <td><?= h($cauTickets->id) ?></td>
                <td><?= h($cauTickets->cau) ?></td>
                <td><?= h($cauTickets->open_date) ?></td>
                <td><?= h($cauTickets->answer_date) ?></td>
                <td><?= h($cauTickets->resolution_date) ?></td>
                <td><?= h($cauTickets->type_ticket_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CauTickets', 'action' => 'view', $cauTickets->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CauTickets', 'action' => 'edit', $cauTickets->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CauTickets', 'action' => 'delete', $cauTickets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cauTickets->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
