<!-- File: src/Template/Produits/index.ctp  (edit links added) -->

<h1>Produits</h1>
<p><?= $this->Html->link("Add Produit", ['action' => 'add']) ?></p>
<table>
    <tr>
        <th>Nom</th>
        <th>Created</th>
        <th>By</th>
        <th>Action</th>
    </tr>

<!-- Here's where we iterate through our $produits query object, printing out produit info -->

<?php foreach ($produits as $produit): ?>
    <tr>
        <td>
            <?= $this->Html->link($produit->nom, ['action' => 'view', $produit->slug]) ?>
        </td>
        <td>
            <?= $produit->created->format(DATE_RFC850) ?>
        </td>
        <td>
            <?= $this->Html->link($produit->user->email,['controller' => 'users', 'action' => 'view', $produit->user_id]) ?>
        </td>
        <td>
           <?= $this->Html->link('Edit', ['action' => 'edit', $produit->slug]) ?>
            <?= $this->Form->postLink(
                'Delete',
                ['action' => 'delete', $produit->slug],
                ['confirm' => 'Are you sure?'])
            ?>
        </td>
    </tr>
<?php endforeach; ?>

</table>