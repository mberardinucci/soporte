<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\TypeTicket[]|\Cake\Collection\CollectionInterface $typeTickets
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Type Ticket'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cau Tickets'), ['controller' => 'CauTickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cau Ticket'), ['controller' => 'CauTickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typeTickets index large-9 medium-8 columns content">
    <h3><?= __('Type Tickets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($typeTickets as $typeTicket): ?>
            <tr>
                <td><?= $this->Number->format($typeTicket->id) ?></td>
                <td><?= h($typeTicket->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $typeTicket->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $typeTicket->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $typeTicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeTicket->id)]) ?>
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
