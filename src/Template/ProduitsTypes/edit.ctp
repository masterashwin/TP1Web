<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProduitsType $produitsType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $produitsType->produit_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $produitsType->produit_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Produits Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="produitsTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($produitsType) ?>
    <fieldset>
        <legend><?= __('Edit Produits Type') ?></legend>
        <?php
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
