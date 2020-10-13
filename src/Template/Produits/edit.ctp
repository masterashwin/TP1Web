<!-- File: src/Template/Produits/edit.ctp -->

<h1>Edit Produit</h1>
<?php
    echo $this->Form->create($produit);
    echo $this->Form->control('user_id', ['type' => 'hidden']);
    echo $this->Form->control('nom');
    echo $this->Form->control('text', ['rows' => '3']);
    echo $this->Form->button(__('Save Produit'));
    echo $this->Form->end();
?>
