<?php

$title="List Des Voitures"; 
ob_start(); 
?>

<a href="index_1.php?action=create" class="btn btn-info">Ajouter</a>
<hr>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>MODEL</th>
            <th>PRIX</th> 
            <th>OPERATION</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($voitures as $vtr): ?>
            <tr>
                <td> <?= $vtr->getId(); ?></td>
                <td> <?= $vtr->getModel(); ?></td>
                <td> <?= $vtr->getPrix(); ?> :MAD</td> 
                <td class=" b-flex"> 
                    <a href="index_1.php?id=<?= $vtr->getId() ; ?>&action=edit" class="btn-delete  btn-primary  ">Edit 1</a>
                    <a onclick="return confirm('Vous Voulez Supprimer La Voiture <?=$vtr->getModel() ?>')" href="index_1.php?id=<?= $vtr->getId() ; ?>&action=delete" class="btn-delete">Sup</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>

</table>
 
<?php 
$content= ob_get_clean();

include "layout.php";

