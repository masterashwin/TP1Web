<!-- File: src/Template/Produits/add.ctp -->

<h1>Add Produit</h1>
<?php
    echo $this->Form->create($produit);
    // Hard code the user for now.
    echo $this->Form->control('utilisateur_id', ['type' => 'hidden', 'value' => 1]);
    echo $this->Form->control('nom');
    echo $this->Form->control('text', ['rows' => '3']);
    echo $this->Form->button(__('Save Produit'));
    echo $this->Form->end();
?>
