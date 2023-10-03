<?php
require APPROOT . '/views/inc/header.php';
?>


<style>
    .table>:not(caption)>*>* {
        padding: 0rem 0.2rem;
    }
</style>
<div class="main-content container-fluid">
    <!--    <div class="row">
            <div class="col-2">
            </div>
            <div class="col-9">-->
    <div class="maincontent">

        <main>
            <section>
                <div class="card-tazoomcm my-2">
                    <?php require 'titleproject.php'; ?>
        <?php flash('postmessage'); ?>
                                    <form action="<?php echo URLROOT; ?>/designers/add" method="POST">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Designer</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="DESIGNER" />
                                            </div>
                                            <label class="col-md-4 col-form-label"></label>
                                            <div class="col-md-8">
                                                <button type="submit" name="btn-desinger" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bxs-save'></i> Valider</button>
                                            </div>
                                        </div>
                                    </form>
                </div>

                <div class="card-tazoomcm my-3">
                    <table class="table table-striped  border-white" width="100%">
                        <thead>
                            <tr class="text-dark">
                                <th width="8%">...</th>
                                <th>Desinger</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['desingers'] as $desinger) : ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo URLROOT; ?>/designers/confirmdelete/<?php echo $desinger->IDDESIGNER; ?>" class="btn btn-tazoomcm-delete " title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash'></i></a></td>
                                    <td><?php echo $desinger->DESIGNER; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
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
    