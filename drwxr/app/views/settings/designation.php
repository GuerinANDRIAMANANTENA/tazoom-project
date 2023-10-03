<?php
require APPROOT . '/views/inc/header.php';
?>

<script src="<?php echo URLROOT; ?>/js4/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#IDSECTION').on('change', function () {
            var IDMTYPE_ = $(this).val();
            if (IDMTYPE_) {
                $.get("ajaxselectedsetting.php",
                        {IDSECTION: IDMTYPE_},
                        function (data) {
                            $('#IDMTYPE').html(data);
                        }
                );
            } else {
                $('#IDMTYPE').html('<option></option>');
                $('#IDMTYPE').html('<input>');
            }
        });
    });
</script>

<style>
    .table>:not(caption)>*>* {
        padding: 0rem 0.2rem;
    }
</style>
<div class="main-content container-fluid">
    <?php flash('postmessage'); ?>
    <main>
        <section>
            <div class="maincontent my-4">
                <div class="card-tazoomcm my-3">
                    <?php require 'titleproject.php'; ?>
                    <div class="row">
                        <div class="col-12">
                            <form action="<?php echo URLROOT; ?>/designations/add" method="POST">
                                <div class="form-group row">

                                    <label class="col-md-4 col-form-label">Section</label>
                                    <div class="col-md-8">

                                        <select class="form-select" name="IDSECTION" 
                                                id="IDSECTION" style="width: 100%;"> 
                                            <option></option> 
                                            <?php
//                                            include ('../CONFIG/_DBMYSQL.php');
                                            $query = "SELECT * FROM tbmedia ORDER BY MEDIA ASC";
                                            $do = mysqli_query($connu, $query);
                                            while ($row = mysqli_fetch_array($do)) {
                                                echo '<option value="' . $row['IDMEDIA'] . '">' . $row['MEDIA'] . '</option>';
                                            }
                                            ?>
                                        </select>  
                                        <select class="form-select" name="IDMTYPE" id="IDMTYPE" 
                                                style="display: block" required autofocus>
                                            <option></option> 
                                        </select> 
                                    </div>

                                    <label class="col-md-4 col-form-label">Section2</label>
                                    <div class="col-md-8">

<!--                                                        <select class="form-select" name="IDSECTION" required="">
                                                            <option value=""></option>
                                                            <!?php
                                                            $queryperS = "SELECT * FROM tbmedia ORDER BY MEDIA ASC";
                                                            $perS = mysqli_query($connu, $queryperS);
                                                            while ($row = mysqli_fetch_array($perS)) {
                                                                echo '<option value="' . $row['IDMEDIA'] . '">' . $row['MEDIA'] . '</option>';
                                                            }
                                                            ?>
                                                            ?>
                                                        </select>-->
                                    </div>
                                    <label class="col-md-4 col-form-label">Type</label>
                                    <div class="col-md-8">

<!--                                                        <select class="form-select" name="IDMTYPE" required="">
                                                            <option value=""></option>
                                                            <!?php
                                                            $queryperss = "SELECT * FROM tbmtype ORDER BY MTYPE ASC";
                                                            $perss = mysqli_query($connu, $queryperss);
                                                            while ($row = mysqli_fetch_array($perss)) {
                                                                echo '<option value="' . $row['IDMTYPE'] . '">' . $row['MTYPE'] . '</option>';
                                                            }
                                                            ?>
                                                            ?>
                                                        </select>-->
                                    </div>
                                    <label class="col-md-4 col-form-label">D&eacute;signation</label>
                                    <div class="col-md-8">
                                        <input type="text" name="DESIGNATION" class="form-control" required=""/>
                                    </div>
                                    <label class="col-md-4 col-form-label"></label>
                                    <div class="col-md-8">
                                            <div class="btn-group">
                                        <button type="submit" name="btn-designation" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bxs-calendar-alt'></i> Valider</button>
                                        <a class="btn btn-tazoomcm-cansel" href="<?php echo URLROOT; ?>/deviss/" > Retour</a>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <div class="maincontent my-3">
                <div class="card-tazoomcm my-3">
                    <div class="card_print my-2">
                        <ul class="card-print-ul">
                            <div class="activity">
                                <div class="col">
                                    <li class=""><a href="../CONTROLLER/_FONCTIONCONTROL.php?export=excel">
                                            <div class="icon"><i class='bx bx-export' ></i></div> 
                                            <div class="name">Exporter</div></a>
                                    </li>
                                </div>
                                <div class="col">
                                    <li class=""><a href="<?php echo URLROOT; ?>/lastleaves/apercu">
                                            <div class="icon"><i class="bx bxs-printer "></i></div> 
                                            <div class="name">Aper&ccedil;u la liste</div></a>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>


                    <table id="" class="table table-striped border-white" width="100%">
                        <thead>
                            <tr class="text-dark">
                                <th width="8%">...</th>
                                <th width="15%">Section</th>
                                <th width="15%">M&eaucte;dia/type</th>
                                <th>D&eacute;signation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['designations'] as $designation) : ?>
                                <tr>
                                    <td><a href="<?php echo URLROOT; ?>/designations/confirmdelete/<?php echo $designation->IDDESIGNATION; ?>" class="btn btn-tazoomcm-delete " title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash'></i></a></td>
                                    <td><?php echo $designation->MEDIA; ?></td>
                                    <td><?php echo $designation->MTYPE; ?></td>
                                    <td><?php echo $designation->DESIGNATION; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div></div>
        </section>
    </main>
</div>
<!--            <div class="col-1">
            </div>
        </div>  

        <div class="col-1">
        </div>
    </div>-->

<?php
require APPROOT . '/views/inc/footer.php';
