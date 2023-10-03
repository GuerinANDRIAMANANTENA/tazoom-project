<?php
require APPROOT . '/views/inc/header.php';
?>

<style>

    input,
    textarea,
    select{
        margin-top: .25rem!important;
        margin-bottom: .25rem!important;
    }
</style>

<div class="main-content container-fluid">
    <!--    <div class="row">
            <div class="col-2">
            </div>
            <div class="col-8">-->
    <div class="maincontent">
        <main>
            <section>
                <form action="<?php echo URLROOT; ?>/works/add" method="POST">
                    <div class="card-tazoomcm my-3">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-8">
                                <?php
                                require APPROOT . '/views/settings/titleproject.php';
                                flash('postmessage');
                                ?>
                                <div class="">
                                    <div class=" p-4">
                                        <div class="form-group row ">
                                            <table class="table">
                                                <thead >
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <tr >
                                                        <th><label class="col-form-label">Date</label></th>
                                                        <th>
                                                            <input type="date" class="form-control" name="DATETODAY" value="<?php echo date('Y-m-d'); ?>" required autofocus>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th><label class="col-form-label">Num&eacute;ro suivie</label></th>
                                                        <th>
                                                            <div class="" style="display: flex; justify-content: center; align-items: center;">
                                                                <input type="text" name="NUMSUIVIE" class="form-control"   maxlength="25" style="border-top-right-radius: 0;border-bottom-right-radius: 0;"/>
                                                                <span class="input-group-text" style="margin-left: -1px;margin-right: -1px;border-top-left-radius: 0;border-bottom-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 0;background: #F0F2F4; font-weight: 500;">Num&eacute;ro BA</span>
                                                                <input type="text" name="NUMBA" class="form-control" maxlength="25" style="border-top-left-radius: 0;border-bottom-left-radius: 0;"/>
                                                            </div>
                                                        </th>
                                                    </tr>

                                                    <tr >
                                                        <th><label class="col-form-label">M&eacute;dia</label></th>
                                                        <th>

                                                            <div class="">
                                                                <select class="form-select" name="MEDIA" required="">
                                                                    <option value=""></option>
                                                                    <?php
                                                                    $queryper = "SELECT * FROM tbmedia ORDER BY MEDIA ASC";
                                                                    $per = mysqli_query($connu, $queryper);
                                                                    while ($row = mysqli_fetch_array($per)) {
                                                                        echo '<option value="' . $row['MEDIA'] . '">' . $row['MEDIA'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </th>
                                                    </tr>

                                                    <tr>
                                                        <th><label class="col-form-label">Client</label></th>
                                                        <th>
                                                            <div class="">
                                                                <select class="form-select" name="CUSTOMER" required="">
                                                                    <option value=""></option>
                                                                    <?php
                                                                    $queryperm = "SELECT * FROM tbcustomer ORDER BY RAISONSOCIAL ASC";
                                                                    $perm = mysqli_query($connu, $queryperm);
                                                                    while ($row = mysqli_fetch_array($perm)) {
                                                                        echo '<option value="' . $row['IDCUSTOMER'] . '">' . $row['CODECUSTOMER'] . ' : ' . $row['RAISONSOCIAL'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </th>
                                                    </tr>

                                                    <tr >
                                                        <th><label class=" col-form-label">D&eacute;signation</label></th>
                                                        <th>
                                                            <div class="">
                                                                <textarea class="form-control" type="text" name="DESIGNATION" /></textarea>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class=" mr-2 p-4  bg-light">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th><label class=" col-form-label">Dimention en cm</label></th>
                                                    <th>

                                                        <div class="">
                                                            <input type="number" name="DIMENTION" class="form-control"/>
                                                        </div> 
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th><label class="col-form-label">Format</label></th>
                                                    <td>

                                                        <select class="form-select" name="FORMAT" required="">
                                                            <option value=""></option>
                                                            <?php
                                                            $queryperm = "SELECT * FROM tbformat ORDER BY FORMAT ASC";
                                                            $perm = mysqli_query($connu, $queryperm);
                                                            while ($row = mysqli_fetch_array($perm)) {
                                                                echo '<option value="' . $row['FORMAT'] . '">' . $row['FORMAT'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><label class="col-form-label">Finitions</label></th>
                                                    <td>
                                                        <div class="">
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="form-group row">
                                                                        <div class="col-md-10" >
                                                                            <input type="text" name="FINITIONS" class="form-control"/>
                                                                        </div>    
                                                                    </div>

                                                                </div>
                                                                <div class="col-8">
                                                                    <div class="form-group row">
                                                                        <label class="col-md-4 col-form-label">Quantit&eacute;</label>
                                                                        <div class="col-md-8">
                                                                            <input type="text" name="QUANTITE" class="form-control"/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><label class="col-md-4 col-form-label">Deadline</label></th>
                                                    <td>
                                                        <input type="date" class="form-control" name="DEADLINE" value="<?php echo date('Y-m-d'); ?>" required autofocus>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><label class=" col-form-label">Designer</label></th>
                                                    <td>
                                                        <select class="form-select" name="DESIGNER">
                                                            <option value=""></option>
                                                            <?php
                                                            $queryperm = "SELECT * FROM tbdesigner ORDER BY DESIGNER ASC";
                                                            $perm = mysqli_query($connu, $queryperm);
                                                            while ($row = mysqli_fetch_array($perm)) {
                                                                echo '<option value="' . $row['DESIGNER'] . '">' . $row['DESIGNER'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><label class="col-md-4 col-form-label">Livr&eacute;e le</label></th>
                                                    <td>
                                                        <input type="date" class="form-control" name="LIVREELE" value="<?php echo date('Y-m-d'); ?>" required autofocus>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><label class="col-md-4 col-form-label">Livr&eacute;e le</label></th>
                                                    <td>
                                                        <input type="date" class="form-control" name="LIVREELE" value="<?php echo date('Y-m-d'); ?>" required autofocus>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><label class="col-md-4 col-form-label">Remarque</label></th>
                                                    <td>
                                                        <textarea class="form-control" type="text" name="REMARQUE" rows="3" ></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th><label hidden class="col-md-4 col-form-label">Status</label></th>
                                                    <td>
                                                        <div hidden class="col-md-8 my-2">
                                                            <select class="form-select" name="STATUS" required="">
                                                                <option value="En Attente">En Attente</option>
                                                                <option value="En Cours">En Cours</option>
                                                                <option value="Fait">Fait</option>
                                                            </select>
                                                            <input hidden class="form-control" name="USERRECU" value="<?= $_SESSION['auth']->NUMMAT; ?>">
                                                            <input hidden class="form-control" name="YEARNOW" value="<?php
                                                            setlocale(LC_TIME, 'fra_fra');
                                                            echo strftime('%Y')
                                                            ?>">
                                                        </div>
                                                    </td>
                                                </tr>

<!--                                                <tr>
                                                    <th></th>
                                                    <td>

                                                    </td>
                                                </tr>-->
                                            </tbody>
                                        </table>

                                    </div>
                                        <div class="form-group row my-3 ">
                                            <label class="col-md-4 col-form-label"></label>
                                            <div class="col-md-8">
                                                <div class=" btn-group">
                                                    <button type="submit" name="btn-work" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bxs-check-circle'></i> Valider</button>
                                                    <a class="btn btn-tazoomcm" href="<?php echo URLROOT; ?>/pages/" > Retour</a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>

                            <div class="col"></div>

                        </div>
                    </div>

                    <div class="card-tazoomcm my-3  table-responsive">

                        <table id="table-settings" class="table table-striped" width="100%">
                            <thead>
                                <tr class="text-dark">
                                    <th width="8%">...</th>
                                    <th>Date</th>
                                    <th>N&deg; suivie</th>
                                    <th>N&deg; BA</th>
                                    <th>Client</th>
                                    <th>N&deg; BC/PO</th>
                                    <th>D&eacute;signation</th>
                                    <th>M&eacute;dia</th>
                                    <th>Dimention</th>
                                    <th>Format</th>
                                    <th>Finitions</th>
                                    <th>Quantit&eacute;</th>
                                    <th>Deadline</th>
                                    <th>Designer</th>
                                    <th>Livr&eacute;e le</th>
                                    <th>Remarque</th>
                                    <th>Status</th>
                                    <th>Uitilisateur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['works'] as $production) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo URLROOT; ?>/works/edit/<?php echo $production->IDPRODUCTION; ?>" class="btn btn-tazoomcm-edit" title='Modifier' data-toggle='tooltip'><i class='bx bxs-edit'></i></a>
                                            <a href="<?php echo URLROOT; ?>/works/confirmdelete/<?php echo $production->IDPRODUCTION; ?>" class="btn btn-tazoomcm-delete " title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash'></i></a></td>
                                        <td><?php echo $production->DATETODAY; ?></td>
                                        <td><?php echo $production->NUMSUIVIE; ?></td>
                                        <td><?php echo $production->NUMBA; ?></td>
                                        <td style="background: #EDF0F5;"><?php echo $production->RAISONSOCIAL; ?></td>
                                        <td><?php echo $production->NUMBCPO; ?></td>
                                        <td><?php echo $production->DESIGNATION; ?></td>
                                        <td><?php echo $production->MEDIA; ?></td>
                                        <td><?php echo $production->DIMENTION; ?></td>
                                        <td><?php echo $production->FORMAT; ?></td>
                                        <td><?php echo $production->FINITIONS; ?></td>
                                        <td><?php echo $production->QUANTITE; ?></td>
                                        <td><?php echo $production->DEADLINE; ?></td>
                                        <td><?php echo $production->DESIGNER; ?></td>
                                        <td><?php echo $production->LIVREELE; ?></td>
                                        <td><?php echo $production->REMARQUE; ?></td>
                                        <td>
                                            <?php $st = $production->STATUS; ?>
                                            <?php if ($st == 'En Attente'): echo '<span class="badge" style="background:#E15548; font-size: 16px;"><span>En Attente</span></span>' ?>
                                            <?php endif; ?>
                                            <?php if ($st == 'En Cours'): echo '<span class="badge" style="background:#FA9F1B; font-size: 16px;"><span>En Cours</span></span>' ?>
                                            <?php endif; ?>
                                            <?php if ($st == 'Fait'): echo '<span class="badge" style="background:#9ECC2E; font-size: 16px;"><span>Fait</span></span>' ?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $production->USERRECU; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                    </p>
                </form>
            </section>
        </main>
    </div>

    <script type="text/javascript">

        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('a');
        const menuLength =
                menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) {
                menuItem[i].className = "active";
            }
        }

    </script>
    <?php
    require APPROOT . '/views/inc/footer.php';
    