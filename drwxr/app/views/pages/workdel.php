<?php
require APPROOT . '/views/inc/header.php';
?>

<div class="main-content container-fluid">
<!--    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-9">-->
            <div class="maincontent">
                <main>
                    <section>
                        <div class="card-tazoomcm my-3">
                            <?php require APPROOT . '/views/settings/titleproject.php'; ?>
                            <p style="color: #FFF;background-color: #F58383;font-weight: 500;border: none;border-radius: 5px;padding: 15px 25px;">
                                <span style="display:flex;">
                                    <i class='bx bxs-error-circle' style='font-size:30px; padding: 0px 5px 0px 0px;'></i>
                                    <?php echo DEL; ?><br>
                                </span>
                                <span style="padding: 0 25px;">
                                    <?php echo MSGCONFIRM; ?>
                                </span>
                            </p>
                            <div class="row">
                                <div class="col"></div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group my-2">
                                                <label for="">Client</label>
                                                <h2 class="card-text h2">
                                                    <?php
                                                    $customer = $data['works']->CUSTOMER;
                                                    $queryperm = "SELECT * FROM tbcustomer WHERE IDCUSTOMER='" . $customer . "'";
                                                    $perm = mysqli_query($connu, $queryperm);
                                                    while ($row = mysqli_fetch_array($perm)) {
                                                        echo '<option value="' . $row['IDCUSTOMER'] . '">' . $row['CODECUSTOMER'] . ' : ' . $row['RAISONSOCIAL'] . '</option>';
                                                    }
                                                    ?>

                                                </h2>
                                                <label for="">Nume&eacute;ro suivie</label>
                                                <h5 class="card-text"><?php echo $data['works']->NUMSUIVIE; ?> </h5>
                                                <label for="">Nume&eacute;ro BA</label>
                                                <h5 class="card-text"><?php echo $data['works']->NUMSUIVIE; ?> </h5>
                                                <label for="">Nume&eacute;ro BC/PO</label>
                                                <h5 class="card-text"><?php echo $data['works']->NUMBCPO; ?> </h5>
                                                <label for="">D&eacute;signation</label>
                                                <h5 class="card-text"><?php echo $data['works']->DESIGNATION; ?> </h5>
                                            </div>
                                            <div class="form-group  my-2"> 
                                                <form class="pull-right" action="<?php echo URLROOT; ?>/works/delete/<?php echo $data['works']->IDPRODUCTION; ?>" method="post">
                                                    <div class="my-2">
                                                        <button type="submit" name="btn-work" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bx-trash-alt'></i> Oui, Supprimer</button>
                                                        <a class="btn btn-light " href="<?php echo URLROOT; ?>/works/" > Annuler</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><div class="col"></div>
                            </div>
                            <!--                    -->
                            </p>

                    </section>
                </main>
            </div>

<!--            <div class="col-1">
            </div>
        </div>  
    </div>-->

    <?php
    require APPROOT . '/views/inc/footer.php';
    