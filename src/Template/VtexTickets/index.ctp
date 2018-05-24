<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\VtexTicket[]|\Cake\Collection\CollectionInterface $vtexTickets
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vtex Ticket'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Priorities'), ['controller' => 'Priorities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Priority'), ['controller' => 'Priorities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vtexTickets index large-9 medium-8 columns content">
    <h3><?= __('Vtex Tickets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_vtex') ?></th>
                <th scope="col"><?= $this->Paginator->sort('open_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resolution_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vtexTickets as $vtexTicket): ?>
            <tr>
                <td><?= $this->Number->format($vtexTicket->id) ?></td>
                <td><?= h($vtexTicket->id_vtex) ?></td>
                <td><?= h($vtexTicket->open_date) ?></td>
                <td><?= h($vtexTicket->resolution_date) ?></td>
                <td><?= $vtexTicket->has('priority') ? $this->Html->link($vtexTicket->priority->name, ['controller' => 'Priorities', 'action' => 'view', $vtexTicket->priority->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $vtexTicket->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $vtexTicket->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $vtexTicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vtexTicket->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
