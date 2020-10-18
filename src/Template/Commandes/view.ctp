<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Commande $commande
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Commande'), ['action' => 'edit', $commande->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Commande'), ['action' => 'delete', $commande->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commande->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Commandes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commande'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="commandes view large-9 medium-8 columns content">
    <h3><?= h($commande->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Produit') ?></th>
            <td><?= $commande->has('produit') ? $this->Html->link($commande->produit->id, ['controller' => 'Produits', 'action' => 'view', $commande->produit->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Auteur') ?></th>
            <td><?= h($commande->auteur) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Coupon') ?></th>
            <td><?= h($commande->coupon) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($commande->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantite') ?></th>
            <td><?= $this->Number->format($commande->quantite) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Efface') ?></th>
            <td><?= $this->Number->format($commande->efface) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($commande->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($commande->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($commande->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Prive') ?></th>
            <td><?= $commande->prive ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Texte') ?></h4>
        <?= $this->Text->autoParagraph(h($commande->texte)); ?>
    </div>
</div>
