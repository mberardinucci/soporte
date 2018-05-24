<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CauTicket[]|\Cake\Collection\CollectionInterface $cauTickets
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cau Ticket'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Type Tickets'), ['controller' => 'TypeTickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type Ticket'), ['controller' => 'TypeTickets', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jumbocl Tickets'), ['controller' => 'JumboclTickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Jumbocl Ticket'), ['controller' => 'JumboclTickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cauTickets index large-9 medium-8 columns content">
    <h3><?= __('Cau Tickets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cau') ?></th>
                <th scope="col"><?= $this->Paginator->sort('open_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('answer_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resolution_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_ticket_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cauTickets as $cauTicket): ?>
            <tr>
                <td><?= $this->Number->format($cauTicket->id) ?></td>
                <td><?= $this->Number->format($cauTicket->cau) ?></td>
                <td><?= h($cauTicket->open_date) ?></td>
                <td><?= h($cauTicket->answer_date) ?></td>
                <td><?= h($cauTicket->resolution_date) ?></td>
                <td><?= $cauTicket->has('type_ticket') ? $this->Html->link($cauTicket->type_ticket->name, ['controller' => 'TypeTickets', 'action' => 'view', $cauTicket->type_ticket->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cauTicket->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cauTicket->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cauTicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cauTicket->id)]) ?>
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
