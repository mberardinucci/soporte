<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Priority $priority
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Priority'), ['action' => 'edit', $priority->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Priority'), ['action' => 'delete', $priority->id], ['confirm' => __('Are you sure you want to delete # {0}?', $priority->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Priorities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Priority'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ticket Fizzmods'), ['controller' => 'TicketFizzmods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket Fizzmod'), ['controller' => 'TicketFizzmods', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ticket Vtexs'), ['controller' => 'TicketVtexs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ticket Vtex'), ['controller' => 'TicketVtexs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="priorities view large-9 medium-8 columns content">
    <h3><?= h($priority->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($priority->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= h($priority->type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($priority->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ticket Fizzmods') ?></h4>
        <?php if (!empty($priority->ticket_fizzmods)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Id Fizz') ?></th>
                <th scope="col"><?= __('Open Date') ?></th>
                <th scope="col"><?= __('Resolution Date') ?></th>
                <th scope="col"><?= __('Priority Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($priority->ticket_fizzmods as $ticketFizzmods): ?>
            <tr>
                <td><?= h($ticketFizzmods->id) ?></td>
                <td><?= h($ticketFizzmods->id_fizz) ?></td>
                <td><?= h($ticketFizzmods->open_date) ?></td>
                <td><?= h($ticketFizzmods->resolution_date) ?></td>
                <td><?= h($ticketFizzmods->priority_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TicketFizzmods', 'action' => 'view', $ticketFizzmods->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TicketFizzmods', 'action' => 'edit', $ticketFizzmods->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TicketFizzmods', 'action' => 'delete', $ticketFizzmods->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketFizzmods->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Ticket Vtexs') ?></h4>
        <?php if (!empty($priority->ticket_vtexs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Id Vtex') ?></th>
                <th scope="col"><?= __('Open Date') ?></th>
                <th scope="col"><?= __('Resolution Date') ?></th>
                <th scope="col"><?= __('Priority Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($priority->ticket_vtexs as $ticketVtexs): ?>
            <tr>
                <td><?= h($ticketVtexs->id) ?></td>
                <td><?= h($ticketVtexs->id_vtex) ?></td>
                <td><?= h($ticketVtexs->open_date) ?></td>
                <td><?= h($ticketVtexs->resolution_date) ?></td>
                <td><?= h($ticketVtexs->priority_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TicketVtexs', 'action' => 'view', $ticketVtexs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'TicketVtexs', 'action' => 'edit', $ticketVtexs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TicketVtexs', 'action' => 'delete', $ticketVtexs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ticketVtexs->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
