<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/fetch/fetchcaisse.php';
?>
<style>
    .table>:not(caption)>*>* {
    padding: .2rem .4rem;
}
</style>

<div class="main-content container">
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-9">
    <div class="maincontent">

        <?php
        require APPROOT . '/views/settings/titleproject.php';
        flash('postmessage');
        ?>
        <main>
            <section>

                <div class=" card-tazoomcm my-1">
                    <div class="display-6 my-2">Caisse journalier </div>
                    <table class="table table-striped " width="100%">
                        <thead >
                            <tr style="width: 50%;">
                                <td>Entr&eacute;e caisse : <span class="badge bg-success" style="font-size: 16px;"><?php echo $SUMINCAISSE; ?></span></td>
                                <td>Appro-caisse : <span class="badge bg-info" style="font-size: 16px;"><?php echo $SUMAPPROCAISSE; ?></span></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sortie caisse : <span class="badge bg-danger" style="font-size: 16px;"><?php echo $SUMOUTCAISSE; ?></span></td>
                                <td>Totaux caisse: <span class="badge bg-primary" style="font-size: 16px;"><?php echo $SUMCAISSE; ?></span></td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="card_print">
                        <ul class="card-print-ul">
                            <div class="activity">
                                <div class="col">
                                    <li class=""><a href="#incaisse">
                                            <div class="icon"><i class='bx bx-plus-medical' ></i></div> 
                                            <div class="name">Entr&eacute;e caisse</div></a>
                                    </li>
                                </div>
                                <div class="col">
                                    <li class=""><a href="#outcaisse">
                                            <div class="icon"><i class="bx bxs-minus-circle "></i></div> 
                                            <div class="name">Sortie caisse</div></a>
                                    </li>
                                </div>
                                <div class="col">
                                    <li class=""><a href="#approcaisse">
                                            <div class="icon"><i class="bx bx-list-plus "></i></div> 
                                            <div class="name">Appro caisse</div></a>
                                    </li>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>

                <div class=" card-tazoomcm">
                    <div class="approcaisse-area my-3" id="approcaisse">
                        <div class="text-part">
                            <div class="display-6 my-2">Appro caisse</div>
                            <table id="" class="table-striped dt-responsive nowrap"  width="100%">
                                <thead class="text-dark">
                                    <tr>
                                        <th scope="col">DATE</th>
                                        <th scope="col">N&deg; SUIVIE</th>
                                        <th scope="col">N&deg; PIECE</th>
                                        <th scope="col">DESIGNATION</th>
                                        <th scope="col">MONTANT</th>
                                        <th scope="col">UTILISATEUR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['approcaisses'] as $caisse) : ?>
                                        <tr>
                                            <td><?php echo $caisse->DATETODAY; ?></td>
                                            <td><?php echo $caisse->NUMSUIVIE; ?></td>
                                            <td><?php echo $caisse->NUMPIECE; ?></td>
                                            <td><?php echo $caisse->DESIGNATION; ?></td>
                                            <td><?php echo $caisse->APPROCAISSE; ?></td>
                                            <td><?php echo $caisse->USER; ?></td>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-6">
                            <div class="incaisse-area" id="incaisse">
                                <div class="text-part">
                                    <div class="display-6 my-3">Entr&eacute;e caisse</div>
                                    <table id="table-settingss" class="table-striped dt-responsive nowrap"  width="100%">
                                        <thead class="text-dark">
                                            <tr>
                                                <th scope="col">DATE</th>
                                                <th scope="col">N&deg; SUIVIE</th>
                                                <th scope="col">N&deg; PIECE</th>
                                                <th scope="col">DESIGNATION</th>
                                                <th scope="col">MONTANT</th>
                                                <th scope="col">UTILISATEUR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['incaisses'] as $caisse) : ?>
                                                <tr>
                                                    <td><?php echo $caisse->DATETODAY; ?></td>
                                                    <td><?php echo $caisse->NUMSUIVIE; ?></td>
                                                    <td><?php echo $caisse->NUMPIECE; ?></td>
                                                    <td><?php echo $caisse->DESIGNATION; ?></td>
                                                    <td><?php echo $caisse->INMONTANT; ?></td>
                                                    <td><?php echo $caisse->USER; ?></td>
                                                <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="outcaisse-area" id="outcaisse">
                                <div class="text-part">
                                    <div class="display-6 my-3">Sortie caisse</div>
                                    <table id="table-settings" class="table-striped dt-responsive nowrap"  width="100%">
                                        <thead class="text-dark">
                                            <tr>
                                                <th scope="col">DATE</th>
                                                <th scope="col">N&deg; SUIVIE</th>
                                                <th scope="col">N&deg; PIECE</th>
                                                <th scope="col">DESIGNATION</th>
                                                <th scope="col">MONTANT</th>
                                                <th scope="col">UTILISATEUR</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data['outcaisses'] as $caisse) : ?>
                                                <tr>
                                                    <td><?php echo $caisse->DATETODAY; ?></td>
                                                    <td><?php echo $caisse->NUMSUIVIE; ?></td>
                                                    <td><?php echo $caisse->NUMPIECE; ?></td>
                                                    <td><?php echo $caisse->DESIGNATION; ?></td>
                                                    <td><?php echo $caisse->OUTMONTANT; ?></td>
                                                    <td><?php echo $caisse->USER; ?></td>
                                                <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </section>
        </main>
    </div>

<div class="col-1">
        </div>
    </div>  
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
