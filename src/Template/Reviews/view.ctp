<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Review'), ['action' => 'edit', $review->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Review'), ['action' => 'delete', $review->id], ['confirm' => __('Are you sure you want to delete # {0}?', $review->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Reviews'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Review'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="reviews view large-9 medium-8 columns content">
    <h3><?= h($review->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Produit') ?></th>
            <td><?= $review->has('produit') ? $this->Html->link($review->produit->id, ['controller' => 'Produits', 'action' => 'view', $review->produit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($review->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reviewtxt') ?></th>
            <td><?= h($review->reviewtxt) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($review->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Star') ?></th>
            <td><?= $this->Number->format($review->star) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($review->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($review->modified) ?></td>
        </tr>
    </table>
</div>
