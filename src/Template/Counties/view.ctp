<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\County $county
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit County'), ['action' => 'edit', $county->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete County'), ['action' => 'delete', $county->id], ['confirm' => __('Are you sure you want to delete # {0}?', $county->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Counties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New County'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="counties view large-9 medium-8 columns content">
    <h3><?= h($county->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= $county->has('region') ? $this->Html->link($county->region->name, ['controller' => 'Regions', 'action' => 'view', $county->region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($county->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($county->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Cities') ?></h4>
        <?php if (!empty($county->cities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Region Id') ?></th>
                <th scope="col"><?= __('County Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($county->cities as $cities): ?>
            <tr>
                <td><?= h($cities->id) ?></td>
                <td><?= h($cities->region_id) ?></td>
                <td><?= h($cities->county_id) ?></td>
                <td><?= h($cities->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cities', 'action' => 'view', $cities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cities', 'action' => 'edit', $cities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cities', 'action' => 'delete', $cities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
