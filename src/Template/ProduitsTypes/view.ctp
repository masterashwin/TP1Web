<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProduitsType $produitsType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Produits Type'), ['action' => 'edit', $produitsType->produit_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Produits Type'), ['action' => 'delete', $produitsType->produit_id], ['confirm' => __('Are you sure you want to delete # {0}?', $produitsType->produit_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Produits Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produits Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="produitsTypes view large-9 medium-8 columns content">
    <h3><?= h($produitsType->produit_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Produit') ?></th>
            <td><?= $produitsType->has('produit') ? $this->Html->link($produitsType->produit->id, ['controller' => 'Produits', 'action' => 'view', $produitsType->produit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $produitsType->has('type') ? $this->Html->link($produitsType->type->id, ['controller' => 'Types', 'action' => 'view', $produitsType->type->id]) : '' ?></td>
        </tr>
    </table>
</div>
