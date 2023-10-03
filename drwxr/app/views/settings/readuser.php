<?php
require APPROOT . '/views/inc/header.php';
?>


<div class="main-content container-fluid">
            <div class="maincontent">
                <?php flash('postmessage'); ?>
                <main>
                    <section>
                        <div class=" card-tazoomcm my-3">
                            <?php require 'titleproject.php'; ?>

                            <table id="" class="table-striped table"  width="100%">
                                <thead class="text-dark">
                                    <tr>
                                        <th scope="col" width="10%">Type</th>
                                        <th scope="col">Photo</th>
                                        <th scope="col">N&deg; matricule</th>
                                        <th scope="col">Personnel</th>
                                        <th scope="col">Poste</th>
                                        <th scope="col">D&eacute;pertement</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Date D&acute;ouverture compte</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['readusers'] as $readuser) : ?>
                                        <tr>
                                            <td>
                                                <?php $rur = $readuser->TYPEUSER; ?>
                                                <?php if ($rur == 'Admin'): echo '<i class="bx bx-user-check text-success" style="font-size: 26px;"></i>' ?>
                                                <?php endif; ?>
                                                <?php if ($rur == 'User'): echo '<i class="bx bx-user-x text-danger" style="font-size: 26px;"></i>' ?>
                                                <?php endif; ?></td>

                                            <td>
                                                <img src="<?php echo URLROOT; ?>../../signup/img/<?= $_SESSION['auth']->URLFILE; ?>"
                                                     style="padding: 1px;
                                                     width: 50px;
                                                     height: 50px;
                                                     border-radius: 11.30rem;font-size: 17px;" >
                                            </td>
                                            <td><?php echo $readuser->NUMMAT; ?></td>
                                            <td><?php echo $readuser->FIRSTNAME;
                                            echo ' ';
                                            echo $readuser->LASTNAME;
                                            ?></td>
                                            <td><?php echo $readuser->POSTEOCCUP; ?></td>
                                            <td><?php echo $readuser->DEPARTEMENT; ?></td>
                                            <td><?php echo $readuser->EMAIL; ?></td>
                                            <td><?php echo $readuser->CONFIRMEDAT; ?></td>
<?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </section>
                </main>
            </div>

    <?php
    require APPROOT . '/views/inc/footer.php';
    