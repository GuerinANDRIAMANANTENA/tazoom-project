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
                            <?php flash('postmessage'); ?>
                            <?php require 'titleproject.php'; ?>
<!--                            <div class="row my-2">
                                <div class="col"></div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="">-->
                                            <form action="<?php echo URLROOT; ?>/formats/add" method="POST">
                                                <div class="form-group row">
                                                    <label class="col-md-4 col-form-label">Format</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text" name="FORMAT" />
                                                    </div>
                                                    <label class="col-md-4 col-form-label"></label>
                                                    <div class="col-md-8">
                                                        <button type="submit" name="btn-format" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bxs-save'></i> Valider</button>
                                                    </div>
                                                </div>
                                            </form>
<!--                                        </div>
                                    </div></div>
                                <div class="col"></div>
                            </div>-->
                            </div>
                        <div class="card-tazoomcm my-2">

                            <table class="table table-striped border-white" width="100%">
                                <thead>
                                    <tr class="text-dark">
                                        <th width="8%">...</th>
                                        <th>Format</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['formats'] as $format) : ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo URLROOT; ?>/formats/confirmdelete/<?php echo $format->IDFORMAT; ?>" class="btn btn-tazoomcm-delete " title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash'></i></a></td>
                                            <td><?php echo $format->FORMAT; ?></td>
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
    