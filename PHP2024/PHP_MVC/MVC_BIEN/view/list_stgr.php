<?php
$title = "List Des Stagaires";


ob_start();
?>

<a href="afficher_2.php?action=create" class="btn btn-info">Ajouter</a>
<hr>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>NOM</th>
            <th>PRENOM</th>
            <th>AGE</th>
            <th>LOGIN</th>
            <th>OPERATION</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($list_stgr as $stg): ?>
            <tr>
                <td> <?= $stg->id; ?></td>
                <td> <?= $stg->nom; ?></td>
                <td> <?= $stg->prenom; ?></td>
                <td> <?= $stg->age; ?></td>
                <td> <?= $stg->login; ?></td>
                <td class=" b-flex"> 
                    <a href="afficher_2.php?id=<?= $stg->id ; ?>&action=edit" class="btn-delete  btn-primary  ">Edit</a>
                    <a href="afficher_2.php?id=<?= $stg->id ; ?>&action=delete" class="btn-delete">Sup</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>

</table>


<?php $content = ob_get_clean(); ?>
<?php include_once "./view/layout.php"; ?>