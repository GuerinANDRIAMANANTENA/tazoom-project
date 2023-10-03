<?php
require APPROOT . '/views/inc/header.php';
?>



<style>
    .table>:not(caption)>*>* {
        padding: 0rem 0.2rem;
    }
</style>
<div class="main-content container-fluid">
    <div class="maincontent">

        <main>
            <section>
                <div class=" card-tazoomcm my-3">
                    <?php require 'titleproject.php'; ?>
        <?php flash('postmessage'); ?>
                                    <form action="<?php echo URLROOT; ?>/todolists/add" method="POST">
                                        <div class="form-group row">

                                            <label class="col-md-4 col-form-label">To do list</label>
                                            <div class="col-md-8">
                                                <input type="text" name="TODOLIST" class="form-control" />
                                            </div>

                                            <label class="col-md-4 col-form-label"></label>
                                            <div class="col-md-8">
                                                <button type="submit" name="btn-todolist" class="btn btn-tazoomcm"  style="font-weight:500;"><i class='bx bxs-save'></i>  Valider</button>
                                            </div>
                                        </div>
                                    </form>
                </div>
                <div class=" card-tazoomcm my-3">

                    <table id="" class="table table-striped border-white"  width="100%">
                        <thead>
                            <tr class="text-dark">
                                <th width="8%">...</th>
                                <th>To do list</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['todolists'] as $todolist) : ?>
                                <tr>
                                    <td><a href="<?php echo URLROOT; ?>/todolists/confirmdelete/<?php echo $todolist->IDTODOLIST; ?>" class="btn btn-tazoomcm-delete " title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash' ></i></a></td>
                                    <td><?php echo $todolist->TODOLIST; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
                </p>
            </section>
        </main>
    </div>


    <?php
    require APPROOT . '/views/inc/footer.php';
    