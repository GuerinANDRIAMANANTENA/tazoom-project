<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/fetch/fetchcaisse.php';
?>
<style>
    .table>:not(caption)>*>* {
        padding: .2rem .4rem;
    }
    .card_print .card-print-ul li{
        background: #46627F;
        color: white;
    }

    .card_print .card-print-ul li a,
    .card_print .card-print-ul li a .icon{
        display: flex;
        text-decoration: none;
        list-style: none;
        color: white;
        justify-content: center;
        align-items: center;
        padding: 7px 1px 7px 1px;
        border-radius: 0.5rem;
    }
    .card_print .card-print-ul li a:hover,
    .card_print .card-print-ul li a:hover .icon{
        background: #384F65;
        color: white;
    }
    .btn-cont-doc{
        height: 53px;
        border-radius: 1.3rem;
    }
    .activity .col{
        padding: 0 5px;
    }

    .maincontent .card-tazoomcm {
        padding: 10px 20px;
    }
    hr {
        margin: 0;
    }

</style>

<div class="main-content container">

    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-9">
            <div class="maincontent">
                <?php
                flash('postmessage');
                ?>
                <main>
                    <section>
                        <div class=" card-tazoomcm my-2" style="background: #EDF1F6;">
                            <?php require APPROOT . '/views/settings/titleproject.php'; ?>
                            <div class="row my-1">
                                <div class="col"></div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <form action="<?php echo URLROOT; ?>/activitys/add" method="POST">
                                                <div class="form-group row">
                                                    <label class="col-md-4 col-form-label">Activit&eacute;</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text" name="ACTIVITY" />
                                                    </div>
                                                    <label class="col-md-4 col-form-label"></label>
                                                    <div class="col-md-8">
                                                        <button type="submit" name="btn-activity" class="btn btn-tazoomcm" style="font-weight:500;"><i class='bx bxs-save'></i> Valider</button>
                                                        <a class="btn btn-light" href="<?php echo URLROOT; ?>/deviss/" > Retour</a>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col"></div>
                            </div>


                            <table class="table table-striped border-white" width="100%">
                                <thead>
                                    <tr class="text-dark">
                                        <th width="8%">...</th>
                                        <th>ACTIVITE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['activitys'] as $activity) : ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo URLROOT; ?>/activitys/confirmdelete/<?php echo $activity->IDACTIVITY; ?>" class="btn btn-tazoomcm-delete " title='Supprimer' data-toggle='tooltip'><i class='bx bxs-trash'></i></a></td>
                                            <td><?php echo $activity->ACTIVITY; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                </main>
            </div>

        </div>   

        <div class="col-1">
        </div>
    </div>            
</div>

<?php
require APPROOT . '/views/inc/footer.php';
