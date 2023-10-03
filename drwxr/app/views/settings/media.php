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
                <div class="card-tazoomcm my-3">
                    <?php flash('postmessage'); ?>
                    <?php require 'titleproject.php'; ?>
                                    <form action="<?php echo URLROOT; ?>/medias/add" method="POST">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Section</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="MEDIA" />
                                            </div>
                                            <label class="col-md-4 col-form-label"></label>
                                            <div class="col-md-8">
                                                <button type="submit" name="btn-media" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bxs-save'></i> Valider</button>
                                            </div>
                                        </div>
                                    </form>
                </div>
                
                <div class="card-tazoomcm my-3">

                    <table class="table table-striped" width="100%">
                        <thead>
                            <tr class="text-dark">
                                <th width="8%">...</th>1
                                <th>Section</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['medias'] as $media) : ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo URLROOT; ?>/medias/confirmdelete/<?php echo $media->IDMEDIA; ?>" class="btn btn-tazoomcm-delete" title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash-alt'></i> </a></td>
                                    <td><?php echo $media->MEDIA; ?></td>
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
</div>

<?php
require APPROOT . '/views/inc/footer.php';
