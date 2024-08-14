
<?php
 $title="List Des Stagaires";
 

    ob_start();
?> 

<a href="create.php" class="btn btn-primary">Ajouter</a>
 <hr>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>AGE</th>
                <th>LOGIN</th>
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
                </tr>
            <?php endforeach; ?>

        </tbody>

    </table>
 
 
    <?php $content= ob_get_clean(); ?>
    <?php  include_once "./view/layout.php"; ?>