<?php
require APPROOT . '/views/inc/header.php';
?>

<style>
    .dataTables_length,
    .dataTables_info{
        /*display: none;*/
    }
    .dataTables_filter{
        /*text-align: left;*/
    }
</style>

<div class="main-content container-fluid">
            <div class="maincontent">
                <main>
                    <section>
                        <div class=" card-tazoomcm my-3">
                            <div class="col my-2"><div class="display-5"> <strong class="display-5"> SELECTION CLIENT </strong> : CR&Eacute;ATION DEVIS</div>
                                <br>
                                <table id="" class="table table-striped" width="100%">
                                    <thead>
                                        <tr class="text-dark" style=" ">
                                            <th width="12%">... </th>
                                            <th width="10%">Code client</th>
                                            <th>Raison social</th>
                                            <th width="20%">Ville</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['customers'] as $customer) : ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo URLROOT; ?>/deviss/selectcuslabel/<?php echo $customer->IDCUSTOMER; ?>" class="btn btn-tazoomcm-select text-white" title='' data-toggle='tooltip'><!--i class='bx bxs-check-square'></i--> <img src="<?php echo URLROOT; ?>/img/valide2.png" style="width: 20px;  border-radius: 0.3rem;"> Selectionner </a>
                                                </td>
                                                <td><?php echo $customer->CODECUSTOMER; ?></td>
                                                <td><?php echo $customer->RAISONSOCIAL; ?></td>
                                                <td><?php echo $customer->ADRESSE; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div> 
                            <div class="row">
                                <div class="col-3">
                                    <a href="<?php echo URLROOT; ?>/customers/" class="btn btn-tazoomcmblue" style="font-weight:500; display: flex;  background: #1180BA;justify-content: space-between;width: 156px;
                                       height: 36px; align-items: center;"><img src="<?php echo URLROOT; ?>/img/bondelivraisonexterne.png" style="width: 30px; "> Ajouter un Client</a>
                                </div>
                                <div class="col"></div>
                                <div class="col-2">
                                    <!--a href="<?php // echo URLROOT; ?>/pages/" name="btn-close" class="btn btn-tazoomcmblue text-center" style="font-weight:500; display: flex; background: #DF6F60;"><div class="name text-center"><img src="<?php // echo URLROOT; ?>/img/croix.png" style="width: 25px; padding: 0 3px; ">  Fermer </div></a-->
                                    
                                    <a href="<?php echo URLROOT; ?>/pages/" class="btn btn-tazoomcmblue" style="font-weight:500; display: flex;  background: #DF6F60;justify-content: space-between; width: 156px;
                                       height: 35px; "><img src="<?php echo URLROOT; ?>/img/croix.png" style="width: 24px; "> Fermer</a>
                                </div>
                            </div>
                            </p>

                    </section>
                </main>
            </div>


    <?php
    require APPROOT . '/views/inc/footer.php';
    