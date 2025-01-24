<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serpents</title>
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="javascript.js"></script>
</head>
<body>

<?php

    require_once('class/serpent.php');

    $serpent1 = new Serpent("lalalla", 2.3, 5, '2023-01-13 11:15:12', "sonnette", "m");
    $serpent1->add();
    $serpent1->setNom("ohoho");
    $serpent1->update();
    

    // var_dump(Serpent::read(6)['nom']);
?>
    
</body>
</html>