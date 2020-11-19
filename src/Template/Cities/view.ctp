<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit City'), ['action' => 'edit', $city->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete City'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Counties'), ['controller' => 'Counties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New County'), ['controller' => 'Counties', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Commandes'), ['controller' => 'Commandes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Commande'), ['controller' => 'Commandes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cities view large-9 medium-8 columns content">
    <h3><?= h($city->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Region') ?></th>
            <td><?= $city->has('region') ? $this->Html->link($city->region->name, ['controller' => 'Regions', 'action' => 'view', $city->region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('County') ?></th>
            <td><?= $city->has('county') ? $this->Html->link($city->county->name, ['controller' => 'Counties', 'action' => 'view', $city->county->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($city->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($city->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Commandes') ?></h4>
        <?php if (!empty($city->commandes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Produit Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Quantite') ?></th>
                <th scope="col"><?= __('Auteur') ?></th>
                <th scope="col"><?= __('Coupon') ?></th>
                <th scope="col"><?= __('Texte') ?></th>
                <th scope="col"><?= __('Prive') ?></th>
                <th scope="col"><?= __('Efface') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->commandes as $commandes): ?>
            <tr>
                <td><?= h($commandes->id) ?></td>
                <td><?= h($commandes->produit_id) ?></td>
                <td><?= h($commandes->city_id) ?></td>
                <td><?= h($commandes->date) ?></td>
                <td><?= h($commandes->quantite) ?></td>
                <td><?= h($commandes->auteur) ?></td>
                <td><?= h($commandes->coupon) ?></td>
                <td><?= h($commandes->texte) ?></td>
                <td><?= h($commandes->prive) ?></td>
                <td><?= h($commandes->efface) ?></td>
                <td><?= h($commandes->created) ?></td>
                <td><?= h($commandes->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Commandes', 'action' => 'view', $commandes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Commandes', 'action' => 'edit', $commandes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Commandes', 'action' => 'delete', $commandes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $commandes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
