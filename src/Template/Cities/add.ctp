<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
        ], ['block' => 'scriptLibraries']
);
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Regions",
    "action" => "getRegions",
    "_ext" => "json"
        ]);
//TOOK OUT
/*$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Counties",
    "action" => "getByRegion",
    "_ext" => "json"
        ]);*/
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Cities/add_edit', ['block' => 'scriptBottom']);?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Regions'), ['controller' => 'Regions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Region'), ['controller' => 'Regions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Counties'), ['controller' => 'Counties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New County'), ['controller' => 'Counties', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Commandes'), ['controller' => 'Commandes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Commande'), ['controller' => 'Commandes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cities form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="regionsController">
    <?= $this->Form->create($city) ?>
    <fieldset>
        <legend><?= __('Add City') ?></legend>
        <div>
            <?= __('Regions') ?> : 
            <select 
                name="region_id"
                id="region-id" 
                ng-model="region" 
                ng-options="region.name for region in regions track by region.id"
                >
                <option value=''>Select</option>
            </select>
        </div>
        <div>
            <?= __('Counties') ?> : 
            <select
                name="county_id"
                id="county-id" 
                ng-disabled="!region" 
                ng-model="county"
                ng-options="county.name for county in region.counties track by county.id"
                >
                <option value=''>Select</option>
            </select>
        </div>
        <?php
            //echo $this->Form->control('region_id', ['options' => $regions]);
            //echo $this->Form->control('county_id', ['options' => $counties]);
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
