<?php
require APPROOT . '/views/inc/header.php';
?>

<div class="main-content container">
    <div class="maincontent">
        <main>
            <section>
                <p>
                <div class="card-tazoomcm my-1">
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
                                        <label for="">Activit&eacute;</label>
                                        <h2 class="card-text"><?php echo $data['activitys']->ACTIVITY; ?> </h2>
                                    </div>
                                    <div class="form-group  my-2"> 
                                        <form class="pull-right" action="<?php echo URLROOT; ?>/activitys/delete/<?php echo $data['activitys']->IDACTIVITY; ?>" method="post">
                                            <div class="my-2">
                                                <button type="submit" name="btn-activity" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bx-trash-alt'></i> Oui, Supprimer</button>
                                                <a class="btn btn-light " href="<?php echo URLROOT; ?>/activitys/" > Annuler</a>
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
</div>

<?php
require APPROOT . '/views/inc/footer.php';
