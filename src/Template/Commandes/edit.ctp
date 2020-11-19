<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Commande $commande
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $commande->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $commande->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Commandes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Produits'), ['controller' => 'Produits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Produit'), ['controller' => 'Produits', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="commandes form large-9 medium-8 columns content">
    <?= $this->Form->create($commande) ?>
    <fieldset>
        <legend><?= __('Edit Commande') ?></legend>
        <?php
            echo $this->Form->control('produit_id', ['options' => $produits]);
            echo $this->Form->control('city_id', ['options' => $cities]);
            echo $this->Form->control('date');
            echo $this->Form->control('quantite');
            echo $this->Form->control('auteur');
            echo $this->Form->control('coupon');
            echo $this->Form->control('texte');
            echo $this->Form->control('prive');
            echo $this->Form->control('efface');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
