<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>À propros</title>
</head>

<body>
    <div>
        <h1>Ashwin Saravanapavan</h1>
        <h2>Applications Internet (4205B7MO )</h2>
        <h2>Automne 2020, Collège Montmorency</h2>
        <h3>Voici mon nouveau a propos pour le TP3. Il y a maintenant un jeton JWT qui va aider pour démarrage une session et modifier. Malheurement cette Tp est en construction est va etre fini dans l'annee 2050. Merci pour votre comprehension.</h3>
        <h4>Mon diagramme pour le site</h4>
        <?php
            echo $this->Html->image("/webroot/img/apropos/monDiagramme2.PNG", [ "alt" => "monDiagramme", "width" => "800px", "height" => "400px"]);
        ?>        
        <br />
        <h4>Mon diagramme original</h4>
        <?php
            echo $this->Html->image("/webroot/img/apropos/diagrammeBase.png", [ "alt" => "diagrammeBase", "width" => "500px", "height" => "900px"]);
        ?>
        <br />
        <a href="http://www.databaseanswers.org/data_models/inventory_and_sales/index.htm">Le diagramme original</a>
    </div>
</body>

</html>