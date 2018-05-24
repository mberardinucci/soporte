<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cause $cause
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cause'), ['action' => 'edit', $cause->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cause'), ['action' => 'delete', $cause->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cause->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Causes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cause'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jumbocl Tickets'), ['controller' => 'JumboclTickets', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Jumbocl Ticket'), ['controller' => 'JumboclTickets', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="causes view large-9 medium-8 columns content">
    <h3><?= h($cause->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($cause->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cause->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Jumbocl Tickets') ?></h4>
        <?php if (!empty($cause->jumbocl_tickets)): ?>
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
            <?php foreach ($cause->jumbocl_tickets as $jumboclTickets): ?>
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
