<?php
require APPROOT . '/views/inc/header.php';
?>

<div class="main-content">
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-9">
            <div class="maincontent">

                <?php require 'titleproject.php'; ?>
                <!--        <div class="row">
                            <div class="col"></div>
                            <div class="col-8">-->
                <?php flash('postmessage'); ?>
                <!--            </div>
                            <div class="col"></div>
                        </div>-->
                <main>
                    <section>
                        <p>
                            <!--                <div class="row">
                                                <div class="col"></div>-->
                        <div class="card-tazoomcm">

                        <!--<small><i>Modification...</i></small>-->
                            <div class="row">
                                <div class="col-12">
                                    <form method="post" action="">
                                        <div class="form-group my-2">
                                            <label for="">Client</label>
                                            <input type="text" name="CUSTOMER" class="form-control"  value="<?php echo $data['CUSTOMER']; ?>" required=""/>
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="">Societe</label>Customers
                                            <input type="text" name="SOCIETE" class="form-control"  value="<?php echo $data['SOCIETE']; ?>" >
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group my-2">
                                                    <label for="">E-mail</label>
                                                    <input type="email" name="EMAIL" class="form-control"  value="<?php echo $data['EMAIL']; ?>" required=""/>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group my-2">
                                                    <label for="">Contact</label>
                                                    <input type="text" name="CONTACT" class="form-control" value="<?php echo $data['CONTACT']; ?>" required=""/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group my-2">
                                            <label for="">Description</label>
                                            <textarea  class="form-control" name="DESCRIPTION" rows="3"><?php echo $data['DESCRIPTION']; ?></textarea>

                                        </div>
                                        <div class="form-group my-2"> 
                                            <div class="btn-group"> 
                                                <button type="submit" name="btn-customer" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bxs-edit'></i> Valider</button>
                                                <a class="btn btn-tazoomcm-cansel" href="<?php echo URLROOT; ?>/customers/" > Annuler</a>
                                            </div> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--                    <div class="col"></div>
                                        </div>-->
                        </p>


                        <?php // require 'readcustomer.php'; ?>

<!--                <p>
                <div class="row">
                    <div class="col"></div>
                    <div class="card-tazoomcm">
                        <div class="card_print">
                            <ul class="card-print-ul">
                                <div class="activity">
                                    <div class="col">
                                        <li class=""><a href="../CONTROLLER/_FONCTIONCONTROL.php?export=excel">
                                                <div class="icon"><i class='bx bx-export' ></i></div> 
                                                <div class="name">Exporter</div></a>
                                        </li>
                                    </div>
                                    <div class="col">
                                        <li class=""><a href="<!?php echo URLROOT; ?>/lastleaves/apercu">
                                                <div class="icon"><i class="bx bxs-printer "></i></div> 
                                                <div class="name">Aper&ccedil;u la liste</div></a>
                                        </li>
                                    </div>
                                </div>
                            </ul>
                        </div>

                        <table id="table-settings" class=" table-striped dt-responsive nowrap" width="100%">
                            <thead>
                                <tr class="text-dark">
                                    <th>CLIENT</th>
                                    <th>SOCIETE</th>
                                    <th>EMAIL</th>
                                    <th>CONTACT</th>
                                    <th>DESCRIPTION</th>
                                    <th width="10%">...</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!?php foreach ($data['customerss'] as $customer) : ?>
                                    <tr>
                                        <td><!?php echo $customer->CUSTOMER; ?></td>
                                        <td><!?php echo $customer->SOCIETE; ?></td>
                                        <td><!?php echo $customer->EMAIL; ?></td>
                                        <td><!?php echo $customer->CONTACT; ?></td>
                                        <td><!?php echo $customer->DESCRIPTION; ?></td>
                                        <td>
                                            <a href="<!?php echo URLROOT; ?>/customers/edit/<!?php echo $customer->IDCUSTOMER; ?>" class="btn btn-tazoomcm-edit" title='Modifier' data-toggle='tooltip'><i class='bx bxs-edit'></i></a>
                                            <a href="<!?php echo URLROOT; ?>/customers/confirmdelete/<!?php echo $customer->IDCUSTOMER; ?>" class="btn btn-tazoomcm-delete " title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash'></i></a></td>
                                    </tr>
                                <!?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col"></div>
                </div>
                </p>-->

                        <!--            </section>
                                </main>
                            </div>
                        </div>-->

                        <?php
                        require APPROOT . '/views/inc/footer.php';
                        