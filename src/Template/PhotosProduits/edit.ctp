<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PhotosProduit $photosProduit
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $photosProduit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $photosProduit->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Photos Produits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="photosProduits form large-9 medium-8 columns content">
    <?= $this->Form->create($photosProduit) ?>
    <fieldset>
        <legend><?= __('Edit Photos Produit') ?></legend>
        <?php
            echo $this->Form->control('produit_id', ['options' => $produits]);
            echo $this->Form->control('photo_id', ['options' => $photos]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
