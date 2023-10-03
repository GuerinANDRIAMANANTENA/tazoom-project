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
                <form method="POST">
                    <p>
                    <div class="card-tazoomcm my-1">
                        <div class="row">
                            <div class="col"></div>
                            <div class="col-8">
                                <?php
                                    require APPROOT . '/views/settings/titleproject.php';
                                    flash('postmessage');
                                ?>
                                <div class="row">
                                    <div class="col-12">
                                        <!--<div class="card-tazoomcm-in">-->
                                        <div class="form-group row ">
                                            <label class="col-md-4 col-form-label">Date</label>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" name="DATETODAY" value="<?php echo $data['DATETODAY']; ?>" required autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label class="col-md-4 col-form-label"></label>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group my-2">
                                                            <label for="">Num&eacute;ro suivie</label>
                                                            <input type="text" name="NUMSUIVIE" class="form-control" value="<?php echo $data['NUMSUIVIE']; ?>"  maxlength="25"/>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group my-2">
                                                            <label for="">Num&eacute;ro BA</label>
                                                            <input type="text" name="NUMBA" class="form-control" value="<?php echo $data['NUMBA']; ?>" maxlength="25"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <label class="col-md-4 col-form-label">Num&eacute;ro BC/PO</label>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <input type="text" name="NUMBCPO" class="form-control" value="<?php echo $data['NUMBCPO']; ?>" maxlength="25"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-4 col-form-label">M&eacute;dia</label>
                                            <div class="col-md-8">
                                                <select class="form-select" name="MEDIA" required="">
                                                    <option><?php echo $data['MEDIA']; ?></option>
                                                    <option disabled="">---</option>
                                                    <?php
                                                    $queryper = "SELECT * FROM tbmedia ORDER BY MEDIA ASC";
                                                    $per = mysqli_query($connu, $queryper);
                                                    while ($row = mysqli_fetch_array($per)) {
                                                        echo '<option value="' . $row['MEDIA'] . '">' . $row['MEDIA'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>


                                            <label class="col-md-4 col-form-label">Client</label>
                                            <div class="col-md-8 ">
                                                <select class="form-select" name="CUSTOMER" required="">
                                                    <!--option><!?php echo $data['CUSTOMER']; ?-->

                                                    <?php
                                                    $customer = $data['CUSTOMER'];
                                                    $queryperm = "SELECT * FROM tbcustomer WHERE IDCUSTOMER='" . $customer . "'";
                                                    $perm = mysqli_query($connu, $queryperm);
                                                    while ($row = mysqli_fetch_array($perm)) {
                                                        echo '<option value="' . $row['IDCUSTOMER'] . '">' . $row['CODECUSTOMER'] . ' : ' . $row['RAISONSOCIAL'] . '</option>';
                                                    }
                                                    ?>
                                                    <!--</option>-->
                                                    <option disabled="">---</option>
                                                    <?php
                                                    $queryperm = "SELECT * FROM tbcustomer ORDER BY RAISONSOCIAL ASC";
                                                    $perm = mysqli_query($connu, $queryperm);
                                                    while ($row = mysqli_fetch_array($perm)) {
                                                        echo '<option value="' . $row['IDCUSTOMER'] . '">' . $row['CODECUSTOMER'] . ' : ' . $row['RAISONSOCIAL'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <label class="col-md-4 col-form-label">D&eacute;signation</label>
                                            <div class="col-md-8">
                                                <textarea class="form-control" type="text" name="DESIGNATION" /><?php echo $data['DESIGNATION']; ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row my-1">
                                            <label class="col-md-4 col-form-label">Dimention en cm</label>
                                            <div class="col-md-8">
                                                <input type="number" name="DIMENTION" class="form-control" value="<?php echo $data['DIMENTION']; ?>"/>
                                            </div>    
                                        </div>

                                        <div class="form-group row ">
                                            <label class="col-md-4 col-form-label">Format</label>
                                            <div class="col-md-8" >
                                                <select class="form-select" name="FORMAT" required="">
                                                    <option><?php echo $data['FORMAT']; ?></option>
                                                    <option disabled="">---</option>
                                                    <?php
                                                    $queryperm = "SELECT * FROM tbformat ORDER BY FORMAT ASC";
                                                    $perm = mysqli_query($connu, $queryperm);
                                                    while ($row = mysqli_fetch_array($perm)) {
                                                        echo '<option value="' . $row['FORMAT'] . '">' . $row['FORMAT'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>    
                                        </div>

                                        <div class="form-group row ">
                                            <label class="col-md-4 col-form-label">Finitions</label>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group row">
                                                            <div class="col-md-10" >
                                                                <input type="text" name="FINITIONS" class="form-control" value="<?php echo $data['FINITIONS']; ?>"/>
                                                            </div>    
                                                        </div>

                                                    </div>
                                                    <div class="col-8">
                                                        <div class="form-group row">
                                                            <label class="col-md-4 col-form-label">Quantit&eacute;</label>
                                                            <div class="col-md-8">
                                                                <input type="text" name="QUANTITE" class="form-control" value="<?php echo $data['QUANTITE']; ?>"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row ">
                                            <label class="col-md-4 col-form-label">Deadline</label>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" value="<?php echo $data['DEADLINE']; ?>" name="DEADLINE" required autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="col-md-4 col-form-label">Designer</label>
                                            <div class="col-md-8">
                                                <select class="form-select" name="DESIGNER" >
                                                    <option><?php echo $data['DESIGNER']; ?></option>
                                                    <option disabled="">---</option>
                                                    <?php
                                                    $queryperm = "SELECT * FROM tbdesigner ORDER BY DESIGNER ASC";
                                                    $perm = mysqli_query($connu, $queryperm);
                                                    while ($row = mysqli_fetch_array($perm)) {
                                                        echo '<option value="' . $row['DESIGNER'] . '">' . $row['DESIGNER'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label class="col-md-4 col-form-label">Livr&eacute;e le</label>
                                            <div class="col-md-8">
                                                <input type="date" class="form-control" value="<?php echo $data['LIVREELE']; ?>" name="LIVREELE" required autofocus>
                                            </div>
                                        </div>
                                        <!--</div>-->

                                        <!--<div class="card-tazoomcm-in">-->
                                        <div class="form-group row">


                                            <label class="col-md-4 col-form-label">Remarque</label>
                                            <div class="col-md-8 my-2">
                                                <textarea class="form-control" type="text" name="REMARQUE" rows="3" ><?php echo $data['REMARQUE']; ?></textarea>
                                            </div>

                                            <label class="col-md-4 col-form-label">Status</label>
                                            <div class="col-md-8 my-2">
                                                <select class="form-select" name="STATUS" required="">
                                                    <option ><?php echo $data['STATUS']; ?></option>
                                                    <option disabled="">---</option>
                                                    <option value="">Aucune</option>
                                                    <option value="En Attente">En Attente</option>
                                                    <option value="En Cours">En Cours</option>
                                                    <option value="Fait">Fait</option>
                                                </select>
                                                <input hidden class="form-control" value="<?php echo $data['USERRECU']; ?>" name="USERRECU">
                                                <input hidden class="form-control" value="<?php echo $data['YEARNOW']; ?>" name="YEARNOW">
                                            </div>

                                            <label class="col-md-4 col-form-label"></label>
                                            <div class="col-md-8">
                                                <button type="submit" name="btn-customer" class="btn btn-tazoomcm" style="font-weight:500;"><!--i class='bx bxs-edit'></i--> Modifier</button>
                                                <a class="btn btn-light" href="<?php echo URLROOT; ?>/works/" > Annuler</a>
                                            </div>
                                        </div>
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col"></div>
                        </div>
                    </div>
                    </p>
                </form>

<!--                <p>
                <div class="card-tazoomcm">
                    <div class="card_print">
                        <ul class="card-print-ul">
                            <div class="activity">
                                <div class="col">
                                    <li class=""><a href="../CONTROLLER/_FONCTIONCONTROL.php?export=excel">
                                            <div class="icon"><i class='bx bx-export' ></i></div> 
                                            <div class="name">Exporter</div></a>
                                    </li>
                                </div>
                                <div class="col">
                                    <li class=""><a href="<!?php echo URLROOT; ?>/lastleaves/apercu">
                                            <div class="icon"><i class="bx bxs-printer "></i></div> 
                                            <div class="name">Aper&ccedil;u la liste</div></a>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>

                    <table id="table-settings" class=" table-striped dt-responsive nowrap" width="100%">
                        <thead>
                            <tr class="text-dark">
                                <th width="8%">...</th>
                                <th>DATETODAY</th>
                                <th>NUMSUIVIE</th>
                                <th>NUMBA</th>
                                <th>CUSTOMER</th>
                                <th>NUMBCPO</th>
                                <th>DESIGNATION</th>
                                <th>MEDIA</th>
                                <th>DIMENTION</th>
                                <th>FORMAT</th>
                                <th>FINITIONS</th>
                                <th>QUANTITE</th>
                                <th>DEADLINE</th>
                                <th>DESIGNER</th>
                                <th>LIVREELE</th>
                                <th>REMARQUE</th>
                                <th>STATUS</th>
                                <th>USERRECU</th>
                            </tr>
                        </thead>
                        <tbody>
<!?php foreach ($data['works'] as $production) : ?>
                                <tr>
                                    <td>
                                        <a href="<!?php echo URLROOT; ?>/works/edit/<!?php echo $production->IDPRODUCTION; ?>" class="btn btn-tazoomcm-edit" title='Modifier' data-toggle='tooltip'><i class='bx bxs-edit'></i></a>
                                        <a href="<!?php echo URLROOT; ?>/works/confirmdelete/<!?php echo $production->IDPRODUCTION; ?>" class="btn btn-tazoomcm-delete " title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash'></i></a></td>
                                    <td><!?php echo $production->DATETODAY; ?></td>
                                    <td><!?php echo $production->NUMSUIVIE; ?></td>
                                    <td><!?php echo $production->NUMBA; ?></td>
                                    <td><!?php echo $production->CUSTOMER; ?></td>
                                    <td><!?php echo $production->NUMBCPO; ?></td>
                                    <td><!?php echo $production->DESIGNATION; ?></td>
                                    <td><!?php echo $production->MEDIA; ?></td>
                                    <td><!?php echo $production->DIMENTION; ?></td>
                                    <td><!?php echo $production->FORMAT; ?></td>
                                    <td><!?php echo $production->FINITIONS; ?></td>
                                    <td><!?php echo $production->QUANTITE; ?></td>
                                    <td><!?php echo $production->DEADLINE; ?></td>
                                    <td><!?php echo $production->DESIGNER; ?></td>
                                    <td><!?php echo $production->LIVREELE; ?></td>
                                    <td><!?php echo $production->REMARQUE; ?></td>
                                    <td><!?php echo $production->STATUS; ?></td>
                                    <td><!?php echo $production->USERRECU; ?></td>
                                </tr>
<!?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                </p>-->
            </section>
        </main>
    </div>

    <!--            <div class="col-2">
                </div>
            </div>  
        </div>-->

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
    