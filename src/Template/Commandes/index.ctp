<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Commande[]|\Cake\Collection\CollectionInterface $commandes
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Commande'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commandes index large-9 medium-8 columns content">
    <h3><?= __('Commandes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('produit_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantite') ?></th>
                <th scope="col"><?= $this->Paginator->sort('auteur') ?></th>
                <th scope="col"><?= $this->Paginator->sort('coupon') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prive') ?></th>
                <th scope="col"><?= $this->Paginator->sort('efface') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commandes as $commande): ?>
            <tr>
                <td><?= $this->Number->format($commande->id) ?></td>
                <td><?= $commande->has('produit') ? $this->Html->link($commande->produit->id, ['controller' => 'Produits', 'action' => 'view', $commande->produit->id]) : '' ?></td>
                <td><?= h($commande->date) ?></td>
                <td><?= $this->Number->format($commande->quantite) ?></td>
                <td><?= h($commande->auteur) ?></td>
                <td><?= h($commande->coupon) ?></td>
                <td><?= h($commande->prive) ?></td>
                <td><?= $this->Number->format($commande->efface) ?></td>
                <td><?= h($commande->created) ?></td>
                <td><?= h($commande->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $commande->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $commande->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $commande->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commande->id)]) ?>
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
