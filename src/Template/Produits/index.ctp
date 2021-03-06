<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Produit[]|\Cake\Collection\CollectionInterface $produits
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Commandes'), ['controller' => 'Commandes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Commande'), ['controller' => 'Commandes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reviews'), ['controller' => 'Reviews', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Review'), ['controller' => 'Reviews', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produits index large-9 medium-8 columns content">
    <h3><?= __('Produits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('slug') ?></th>
                <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('stock') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                 <th scope="col"><?= $this->Paginator->sort('Photo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit): ?>

            <tr>
                <td><?= $this->Number->format($produit->id) ?></td>
                <td><?= h($produit->nom) ?></td>
                <td><?= $produit->has('user') ? $this->Html->link($produit->user->id, ['controller' => 'Users', 'action' => 'view', $produit->user->id]) : '' ?></td>
                <td><?= h($produit->slug) ?></td>
                <td><?= h($produit->type) ?></td>
                <td><?= $this->Number->format($produit->price) ?></td>
                <td><?= h($produit->stock) ?></td>
                <td><?= h($produit->created) ?></td>
                <td><?= h($produit->modified) ?></td>
                <td><?php

                        //echo $produit->photos[]->path . $produit->photos[1]->name;
                        if (isset($produit->photos[0])) {
                            echo $this->Html->image($produit->photos[0]->path . $produit->photos[0]->name, [
                                "alt" => $produit->photos[0]->name,
                                "width" => "220px",
                                "height" => "150px",
                                'url' => ['controller' => 'Photos', 'action' => 'view', $produit->photos[0]->id]
                            ]);
                        }
                        ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $produit->id]) ?>
                    <?= $this->Html->link('(pdf)', ['action' => 'view', $produit->id . '.pdf']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $produit->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $produit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $produit->id)]) ?>
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
