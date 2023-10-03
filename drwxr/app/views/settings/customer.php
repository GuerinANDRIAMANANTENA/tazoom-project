<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/fetch/fetchcaisse.php';
?>

<div class="main-content container-fluid">
    <div class="maincontent">
        <?php flash('postmessage'); ?>

        <main>
            <section>
                <div class="card-tazoomcm my-3">
                    <?php require 'titleproject.php'; ?>
                    <form action="<?php echo URLROOT; ?>/customers/add" method="POST">
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label">Nomination</label>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group my-2">
                                            <label for="">Code client</label>
                                            <input type="number" name="CODECUSTOMER" class="form-control" value="<?php echo $COUNTCODECUSTOMER; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group my-2">
                                            <label for="">Raison social</label>
                                            <input class="form-control" type="text" name="RAISONSOCIAL" required=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <label class="col-md-4 col-form-label">Adresse</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="ADRESSE" />
                            </div>
                            <label class="col-md-4 col-form-label"></label>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group my-1">
                                            <label for="">E-mail</label>
                                            <input type="email" name="EMAIL" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group my-1">
                                            <label for="">Contact</label>
                                            <input type="text" name="CONTACT" class="form-control"  maxlength="10" required=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <label class="col-md-4 col-form-label">NIF</label>
                            <div class="col-md-8 my-2">
                                <input type="text" class="form-control" name="NIF" required="">
                            </div>

                            <label class="col-md-4 col-form-label"></label>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group my-1">
                                            <label for="">Num&eacute;ro statistique</label>
                                            <input type="text" name="STAT" class="form-control" required=""/>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group my-1">
                                            <label for="">RCS</label>
                                            <input type="text" name="RCS" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <label class="col-md-4 col-form-label"></label>
                            <div class="col-md-8">
                                <button type="submit" name="btn-customer" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bx-save'></i> Enregister</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-tazoomcm my-1">
                    <table id="" class="table table-striped border-white" width="100%">
                        <thead>
                            <tr class="text-dark">
                                <th width="8%">...</th>
                                <th>Code</th>
                                <th>Raison social</th>
                                <th>Adresse</th>
                                <th>E-mail</th>
                                <th>Contact</th>
                                <th>NIF</th>
                                <th>Stat</th>
                                <th>RCS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['customers'] as $customer) : ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo URLROOT; ?>/customers/edit/<?php echo $customer->IDCUSTOMER; ?>" class="btn btn-tazoomcm-edit" title='Modifier' data-toggle='tooltip'><i class='bx bxs-edit'></i></a>
                                        <a href="<?php echo URLROOT; ?>/customers/confirmdelete/<?php echo $customer->IDCUSTOMER; ?>" class="btn btn-tazoomcm-delete " title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash'></i></a></td>
                                    <td><?php echo $customer->CODECUSTOMER; ?></td>
                                    <td><?php echo $customer->RAISONSOCIAL; ?></td>
                                    <td><?php echo $customer->ADRESSE; ?></td>
                                    <td><?php echo $customer->EMAIL; ?></td>
                                    <td><?php echo $customer->CONTACT; ?></td>
                                    <td><?php echo $customer->NIF; ?></td>
                                    <td><?php echo $customer->STAT; ?></td>
                                    <td><?php echo $customer->RCS; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <script type="text/javascript">

        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('a');
        const menuLength =
                menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) {
                menuItem[i].className = "active";
            }
        }

    </script>
    <?php
    require APPROOT . '/views/inc/footer.php';
    