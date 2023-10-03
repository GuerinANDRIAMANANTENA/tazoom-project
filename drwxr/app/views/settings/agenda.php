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
    <div class="maincontent my-4">
        <?php flash('postmessage'); ?>
        <main>
            <section>
                <div class="card-tazoomcm my-1">
                    <?php require 'titleproject.php'; ?>
<!--                    <div class="row">
                        <div class="col"></div>
                        <div class="col-8">-->
                            <div class="row">
                                <div class="col-12">
                                    <form action="<?php echo URLROOT; ?>/agendas/add" method="POST">
                                        <div class="form-group row">

                                            <label class="col-md-4 col-form-label">Date</label>
                                            <div class="col-md-8">
                                                <input type="date" name="DATEEVENT" class="form-control" value="<?php echo date('Y-m-d'); ?>"/>
                                            </div>
                                            <label class="col-md-4 col-form-label">Evenement</label>
                                            <div class="col-md-8">
                                                <input type="text" name="EVENT" class="form-control" required=""/>
                                            </div>
                                            <label class="col-md-4 col-form-label">Heure</label>
                                            <div class="col-md-8">
                                                <div class="row"> 
                                                    <div class="col">
                                                        <div class="form-group my-2">
                                                            <label for="">D&eacute;but</label>
                                                            <input type="time" name="HORSBEGING" class="form-control" required=""/>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group my-2">
                                                            <label for="">Fin</label>
                                                            <input type="time" name="HORSEND" class="form-control" required=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 col-form-label"></label>
                                            <div class="col-md-8">
                                                <button type="submit" name="btn-agenda" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bxs-calendar-alt'></i> Valider</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                       <!-- </div>
                        <div class="col"></div>
                    </div>-->
                    
                    </div>
                
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
                                <th>Date</th>
                                <th>Evement</th>
                                <th>Heure d&eacute;but</th>
                                <th>Heure fin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['agendas'] as $agenda) : ?>
                                <tr>
                                    <td><a href="<?php echo URLROOT; ?>/agendas/confirmdelete/<?php echo $agenda->IDAGENDA; ?>" class="btn btn-tazoomcm-delete " title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash'></i></a></td>
                                    <td><?php echo $agenda->DATEEVENT; ?></td>
                                    <td><?php echo $agenda->EVENT; ?></td>
                                    <td><?php echo $agenda->HORSBEGING; ?></td>
                                    <td><?php echo $agenda->HORSEND; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                
                
                
                </p>
<!--                <p>
                <div class="card-tazoomcm">
                    
                </div>
                </p>-->

            </section>
        </main>
    </div>
<!--
<div class="col-1">
        </div>
    </div>  
    </div>-->

<?php
require APPROOT . '/views/inc/footer.php';
