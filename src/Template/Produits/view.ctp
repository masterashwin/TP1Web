<!-- File: src/Template/Produits/view.ctp -->

<h1><?= h($produit->nom) ?></h1>
<p><?= h($produit->text) ?></p>
<p><small>Created: <?= $produit->created->format(DATE_RFC850) ?></small></p>
<p><?= $this->Html->link('Edit', ['action' => 'edit', $produit->slug]) ?></p>
