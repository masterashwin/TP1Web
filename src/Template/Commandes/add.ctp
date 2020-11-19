<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Commande $commande
 */
?>
<?php
$urlToCitiesAutocompletedemoJson = $this->Url->build([
    "controller" => "Cities",
    "action" => "findCities",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToCitiesAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Commandes/add_edit/cityAutocomplete', ['block' => 'scriptBottom']);
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
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
        <legend><?= __('Add Commande') ?></legend>
        <?php
            echo $this->Form->control('produit_id', ['options' => $produits]);
            echo $this->Form->control('city_id', ['label' => '(city_id)', 'type' => 'hidden']);
            ?>
        <div class="input text">
        <label for="autocomplete"><?= __("City"). ' (' . __('Autocomplete') . ')' ?></label>
        <input id="autocomplete" type="text">    
        </div>
        <?php
            //echo $this->Form->control('city_id', ['label' => __('City') . ' (' . __('Autocomplete demo') . ')', 'type' => 'text', 'id' => 'autocomplete']);
           // echo $this->Form->control('city_id', ['options' => $cities]);
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
