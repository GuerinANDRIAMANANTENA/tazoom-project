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
                        <div class=" card-tazoomcm my-3">
                            <?php require 'titleproject.php'; ?>
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
                                                <label for="">To do list</label>
                                                <h2 class="card-text"><?php echo $data['todolists']->TODOLIST; ?></h2>
                                            </div>
                                            <div class="form-group  my-2"> 
                                                <form class="pull-right" action="<?php echo URLROOT; ?>/todolists/delete/<?php echo $data['todolists']->IDTODOLIST; ?>" method="post">
                                                    <div class="my-2 btn-group">
                                                        <button type="submit" name="btn-todolist" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bx-trash-alt'></i> Oui, Supprimer</button>
                                                        <a class="btn btn-tazoomcm-cansel " href="<?php echo URLROOT; ?>/todolists/" > Annuler</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>
                        </p>

                    </section>
                </main>
            </div>
<!--
            <div class="col-1">
            </div>
        </div>  
    </div>-->

    <?php
    require APPROOT . '/views/inc/footer.php';
    