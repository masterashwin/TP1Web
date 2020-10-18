<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PhotosProduit $photosProduit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Photos Produit'), ['action' => 'edit', $photosProduit->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Photos Produit'), ['action' => 'delete', $photosProduit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $photosProduit->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Photos Produits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Photos Produit'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="photosProduits view large-9 medium-8 columns content">
    <h3><?= h($photosProduit->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Produit') ?></th>
            <td><?= $photosProduit->has('produit') ? $this->Html->link($photosProduit->produit->id, ['controller' => 'Produits', 'action' => 'view', $photosProduit->produit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Photo') ?></th>
            <td><?= $photosProduit->has('photo') ? $this->Html->link($photosProduit->photo->name, ['controller' => 'Photos', 'action' => 'view', $photosProduit->photo->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($photosProduit->id) ?></td>
        </tr>
    </table>
</div>
