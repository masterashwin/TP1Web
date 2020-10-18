<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PhotosProduit[]|\Cake\Collection\CollectionInterface $photosProduits
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Photos Produit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="photosProduits index large-9 medium-8 columns content">
    <h3><?= __('Photos Produits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('produit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($photosProduits as $photosProduit): ?>
            <tr>
                <td><?= $this->Number->format($photosProduit->id) ?></td>
                <td><?= $photosProduit->has('produit') ? $this->Html->link($photosProduit->produit->id, ['controller' => 'Produits', 'action' => 'view', $photosProduit->produit->id]) : '' ?></td>
                <td><?= $photosProduit->has('photo') ? $this->Html->link($photosProduit->photo->name, ['controller' => 'Photos', 'action' => 'view', $photosProduit->photo->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $photosProduit->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $photosProduit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $photosProduit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $photosProduit->id)]) ?>
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
