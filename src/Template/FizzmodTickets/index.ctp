<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FizzmodTicket[]|\Cake\Collection\CollectionInterface $fizzmodTickets
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Fizzmod Ticket'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Priorities'), ['controller' => 'Priorities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Priority'), ['controller' => 'Priorities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tickets'), ['controller' => 'Tickets', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ticket'), ['controller' => 'Tickets', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fizzmodTickets index large-9 medium-8 columns content">
    <h3><?= __('Fizzmod Tickets') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id_fizz') ?></th>
                <th scope="col"><?= $this->Paginator->sort('open_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('resolution_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('priority_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fizzmodTickets as $fizzmodTicket): ?>
            <tr>
                <td><?= $this->Number->format($fizzmodTicket->id) ?></td>
                <td><?= h($fizzmodTicket->id_fizz) ?></td>
                <td><?= h($fizzmodTicket->open_date) ?></td>
                <td><?= h($fizzmodTicket->resolution_date) ?></td>
                <td><?= $fizzmodTicket->has('priority') ? $this->Html->link($fizzmodTicket->priority->name, ['controller' => 'Priorities', 'action' => 'view', $fizzmodTicket->priority->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $fizzmodTicket->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fizzmodTicket->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fizzmodTicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fizzmodTicket->id)]) ?>
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
