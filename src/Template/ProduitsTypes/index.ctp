<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProduitsType[]|\Cake\Collection\CollectionInterface $produitsTypes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produits Type'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produitsTypes index large-9 medium-8 columns content">
    <h3><?= __('Produits Types') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('produit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produitsTypes as $produitsType): ?>
            <tr>
                <td><?= $produitsType->has('produit') ? $this->Html->link($produitsType->produit->id, ['controller' => 'Produits', 'action' => 'view', $produitsType->produit->id]) : '' ?></td>
                <td><?= $produitsType->has('type') ? $this->Html->link($produitsType->type->id, ['controller' => 'Types', 'action' => 'view', $produitsType->type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produitsType->produit_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produitsType->produit_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produitsType->produit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $produitsType->produit_id)]) ?>
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
