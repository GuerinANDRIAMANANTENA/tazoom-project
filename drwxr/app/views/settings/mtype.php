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
<!--                    <div class="row my-2">
                        <div class="col"></div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">-->
                                    <form action="<?php echo URLROOT; ?>/mtypes/add" method="POST">
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">Section</label>
                                            <div class="col-md-8">


                                                <select class="form-select" name="IDSECTION" required="">
                                                    <option value=""></option>
                                                    <?php
                                                    $queryperS = "SELECT * FROM tbmedia ORDER BY MEDIA ASC";
                                                    $perS = mysqli_query($connu, $queryperS);
                                                    while ($row = mysqli_fetch_array($perS)) {
                                                        echo '<option value="' . $row['IDMEDIA'] . '">' . $row['MEDIA'] . '</option>';
                                                    }
                                                    ?>
                                                    ?>
                                                </select>
                                            </div>
                                            <label class="col-md-4 col-form-label">M&eacute;dia/Type</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="MTYPE" />
                                            </div>
                                            <label class="col-md-4 col-form-label"></label>
                                            <div class="col-md-8">
                                                <button type="submit" name="btn-mtype" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bxs-save'></i> Valider</button>
                                            </div>
                                        </div>
                                    </form>
<!--                                </div>
                            </div>
                        </div>
                        <div class="col"></div>
                    </div>-->
                </div>
                <div class="card-tazoomcm my-3">

                    <table class="table table-striped border-white" width="100%">
                        <thead>
                            <tr class="text-dark">
                                <th width="8%">...</th>
                                <th>Section</th>
                                <th>M&eacute;dia/type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['mtymes'] as $mtype) : ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo URLROOT; ?>/mtypes/confirmdelete/<?php echo $mtype->IDMTYPE; ?>" class="btn btn-tazoomcm-delete" title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash'></i></a></td>
                                    <td><?php echo $mtype->MEDIA; ?></td>
                                    <td><?php echo $mtype->MTYPE; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
</div>

<?php
require APPROOT . '/views/inc/footer.php';
