<?php
require APPROOT . '/views/inc/header.php';
require APPROOT . '/views/fetch/fetchcaisse.php';
//require APPROOT . '/config/dbmysql.php';
?>

<style>
    .table>:not(caption)>*>* {
        padding: 0rem 0.2rem; /*RETIRE LA DIMENSION DES DEUX COTE LIGNE ET COLONE SUR LA TABLE*/
    }
    .table>:not(caption)>*>* {
        /*padding: 0rem 0.2rem;*/
    }
    .btn-name{
        text-align: center;
    }
    .btn-name img{
        width: 3rem;
    }
    .btn-name span.h5{
        font-size: 0.91rem;
        color: white;
    }
    /*    .li a:hover{
            background: red;
        }*/

    .form-group .col-md-8 input[type=text],
    .form-group .col-md-8 textarea[type=text],
    .form-group input[type=text],
    input[type=number], input[type=week],
    input[type=month], input[type=checkbox],
    input[type=date], input[type=email],
    input[type=time], input[type=password],
    .form-select.selected {
        /* background: #FDFDFD; */
        /*padding: 0.1rem 1.75rem;*/
    }
    tbody{
        font-size: 14px;
    }
    .cc001{
        background: #9FCD2F;
        margin: 0 5px;
        color: white;
    }
    .c2{
        height: 6rem;
        width: 9rem;
    }
    .c03{
        height: 4rem;
        width: 5rem;
        box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 10px;
    }
    .c3{
        height: 4rem;
        width: 4rem;
        box-shadow: rgba(17, 17, 26, 0.1) 0px 0px 10px;
    }
    .col .li-col a:hover{
        /*background: red;*/
    }
</style>

<!--<div class="bar-bleu"> -->
<div class="main-content container-fluid">
    <div class="maincontent">
        <header>
            <!--div class="header-title-wrapper">
                <div class="header-title my-2 text-white">
                    <div class="display-5 text-white"><!?php echo $data['TitleProject']; ?></div>   
                    <h5 class="lead"> <strong>Bienvenue sur votre tableau de bord </strong></h5>
                    <small>
                        <p>Faites d&eacute;filer vers le bas pour voir les liens rapides et les aper&ccedil;us de votre activit&eacute; 
                            la liste des choses &agrave; faire, l&acute;&eacute;tat de vos commande,...</p>
                    </small>
                </div>
            </div-->
        </header>

        <main>
            <section>

                <div class="row">
                    <div class="col-7">
                        <p>
                        <div class="row">
                            <div class="col-5">
                                <div class="card-tazoomcm">
                                    <div class="h5 text-center" style="color: #25496D;">Produits Vendu</div> 
                                    <div class="h3 text-center" style="color: #25496D;">999 999 </div>

                                    <div class="row">
                                        <div class="col">
                                            <table class=" table-striped " width="100%">
                                                <thead >
                                                    <tr style="text-align: right;">
                                                        <th>Devis en cours : <span class="text-danger" >00<!--?php echo $SUMINCAISSE; ?--></span></th>
                                                        <th>Factures en cours : <span class="text-danger" >00<!--?php echo $SUMAPPROCAISSE; ?--></span></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="text-align: right;">
                                                        <th>Devis &eacute;chus : <span class="text-danger">00<!--?php echo $SUMOUTCAISSE; ?--></span></th>
                                                        <th>Factures &eacute;chus : <span class="text-danger">00<!--?php echo $SUMCAISSE; ?--></span></th>
                                                    </tr>
                                                    <tr style="text-align: right;">
                                                        <th>BLI en attente : <span class="text-danger" >00<!--?php echo $SUMAPPROCAISSE; ?--></span></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card-tazoomcm">
                                    <div class="h6" style="color: #25496D;"><b>Dernier documents utilis&eacute;s :</b></div> 
                                </div>
                            </div>
                        </div>
                        </p>
                        <p>
                        <div class=" card-tazoomcm">
                            <div class="h5">ATELIER</div> 

                            <a class="btn btn-tazoomcmblue my-1" href="<?php echo URLROOT; ?>/"> <i class='bx bx-plus-circle text-white'></i> Listes</a>
                            <table id="" class="table table-striped " width="100%">
                                <thead>
                                    <tr class="text-dark">
                                        <th>N&deg; suivie</th>
                                        <th>N&deg; B.A</th>
                                        <th>Deadline</th>
                                        <th>Client</th>
                                        <th>D&eacute;signation</th>
                                        <th>M&eacute;dia</th>
                                        <th>Format</th>
                                        <th>Quantit&eacute;</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['works'] as $production) : ?>
                                        <tr>
                                            <td><?php echo $production->NUMSUIVIE; ?></td>
                                            <td><?php echo $production->NUMBA; ?></td>
                                            <td><?php echo $production->DEADLINE; ?></td>
                                            <td style="background: #EDF0F5;"><?php echo $production->RAISONSOCIAL; ?></td>
                                            <td><?php echo $production->DESIGNATION; ?></td>
                                            <td><?php echo $production->MEDIA; ?></td>
                                            <td><?php echo $production->FORMAT; ?></td>
                                            <td><?php echo $production->QUANTITE; ?></td>
                                            <td>
                                                <?php $st = $production->STATUS; ?>
                                                <?php if ($st == 'En Attente'): echo '<span class="badge" style="background:#E15548; font-size: 14px;width: 6.4rem;"><span>En Attente</span></span>' ?>
                                                <?php endif; ?>
                                                <?php if ($st == 'En Cours'): echo '<span class="badge" style="background:#FA9F1B; font-size: 14px;width: 6.4rem;"><span>En Cours</span></span>' ?>
                                                <?php endif; ?>
                                                <?php if ($st == 'Fait'): echo '<span class="badge" style="background:#9ECC2E; font-size: 14px; width: 6.4rem;"><span>Fait</span></span>' ?>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        </p>

                        <!-- DESIGNER -->
                        <p>
                        <div class=" card-tazoomcm">
                            <div class="h5">DESIGNER</div> 
                            <a class="btn btn-tazoomcmblue my-1" href="<?php echo URLROOT; ?>/works/"> <i class='bx bx-plus-circle text-white'></i> Ajouter Nouveau</a>

                            <a class="btn btn-tazoomcmblue my-1" href="<?php echo URLROOT; ?>/"> <i class='bx bx-plus-circle text-white'></i> Listes</a>
                            <table id="" class="table table-striped" width="100%">
                                <thead>
                                    <tr class="text-dark">
                                        <th>N&deg; suivie</th>
                                        <th>Deadline</th>
                                        <th>Client</th>
                                        <th>M&eacute;dia</th>
                                        <th>Format</th>
                                        <th>Quantit&eacute;</th>
                                        <th>Finition</th>
                                        <th>Statuts</th>
                                        <th>Designer</th>
                                        <th>N&deg; B.A</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['works'] as $production) : ?>
                                        <tr>
                                            <td><?php echo $production->NUMSUIVIE; ?></td>
                                            <td><?php echo $production->DEADLINE; ?></td>
                                            <td style="background: #EDF0F5;"><?php echo $production->RAISONSOCIAL; ?></td>
                                            <td><?php echo $production->MEDIA; ?></td>
                                            <td><?php echo $production->FORMAT; ?></td>
                                            <td><?php echo $production->QUANTITE; ?></td>
                                            <td><?php echo $production->FINITIONS; ?></td>
                                            <td>
                                                <?php $st = $production->STATUS; ?>
                                                <?php if ($st == 'En Attente'): echo '<span class="badge" style="background:#E15548; font-size: 14px;width: 6.4rem;"><span>En Attente</span></span>' ?>
                                                <?php endif; ?>
                                                <?php if ($st == 'En Cours'): echo '<span class="badge" style="background:#FA9F1B; font-size: 14px;width: 6.4rem;"><span>En Cours</span></span>' ?>
                                                <?php endif; ?>
                                                <?php if ($st == 'Fait'): echo '<span class="badge" style="background:#9ECC2E; font-size: 14px;width: 6.4rem;"><span>Fait</span></span>' ?>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $production->DESIGNER; ?></td>
                                            <td><?php echo $production->NUMBA; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        </p>

                    </div>

                    <div class="col-5">
                        <p>
                        <div class=" card-tazoomcm">
                            <div class="row">
                                <div class="col-2">
                                    <div class="h5" style="color: #25496D;">CAISSE</div>    
                                </div> 
                                <div class="col-10" style=" text-align: right;">
                                    <label class="h4 text-danger" style=""><?php
                                        echo $SUMCAISSE;
                                        echo " Ar";
                                        ?></label>
                                </div> 
                            </div> 
                            <table id="" class="table table-striped"  width="100%">
                                <thead class="text-dark">
                                    <tr>
                                        <th scope="col">N&deg; suivie</th>
                                        <th scope="col">N&deg; Pi&eacute;ce</th>
                                        <th scope="col">D&eacute;signation</th>
                                        <th scope="col">Montant</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['allcaisses'] as $allcaisse) : ?>
                                        <tr>
                                            <td><?php echo $allcaisse->NUMSUIVIE; ?></td>
                                            <td><?php echo $allcaisse->NUMPIECE; ?></td>
                                            <td><?php echo $allcaisse->DESIGNATION; ?></td>
                                            <td><?php echo $allcaisse->INMONTANT; ?></td>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>

                            <div class="card_print">
                                <ul class="card-print-ul" >
                                    <div class="activity">
                                        <!--div class="col">
                                            <li class=""><a href="" style="background: #9ECC2E; margin: 0 5px; font-size: 14px;" class="c  text-white" 
                                                            data-bs-toggle="modal" data-bs-target="#entreeCaisseModal">
                                                    <div class=""><i class='bx bx-plus-circle text-white'></i></div> 
                                                    <div class="name">&nbsp; Entr&eacute;e</div></a>
                                            </li>
                                        </div>
                                        <div class="col">
                                            <li class=""><a href="#outcaisse" style="background: #DF5644; margin: 0 5px; font-size: 14px;" class="c text-white">
                                                    <div class=""><i class="bx bx-minus-circle text-white"></i></div> 
                                                    <div class="name">&nbsp; Sortie</div></a>
                                            </li>
                                        </div>
                                        <div class="col">
                                            <li class=""><a href="#approcaisse" style="background: #AB46BC; margin: 0 5px; font-size: 14px;" class="c text-white">
                                                    <div class=""><i class="bx bx-plus-circle text-white"></i></div> 
                                                    <div class="name">&nbsp; Appro </div></a>
                                            </li>
                                        </div-->

                                        <div class="col-4">
                                        </div>
                                        <div class="col-4">
                                            <li class=" "><a href="" style="background: #117FBA; margin: 0 5px; font-size: 14px;" class="c text-white "
                                                             data-bs-toggle="modal" data-bs-target="#entreeCaisseModal">
                                                    <div class=""></div> 
                                                    <div class="name text-white">OUVERTURE DE CAISSE</div></a>
                                            </li>
                                        </div>

                                        <div class="col-4">
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        </p>

                        <p>



                        <div class="row">
                            <div class="col">
                                <div class="card-tazoomcm">

                                    <div class="row">
                                        <div class="col-4">
                                            <div class="h5 ">AGENDA01<br><br><br> </div> 

                                            <form action="<?php echo URLROOT; ?>/pages/addagenda" method="POST">
                                                <div class="form-group ">
                                                    <input type="date" name="DATEEVENT" class="form-control my-2 border-white" value="<?php echo date('Y-m-d'); ?>" readonly="" />
                                                    <input type="text" name="EVENT" class="form-control my-2" required="" placeholder="Evenement"/>
                                                    <div class="row my-2"> 
                                                        <div class="col-sm-4">
                                                            <label for="">D&eacute;but</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <input type="time" name="HORSBEGING" class="form-control" required=""/>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row my-2"> 
                                                        <div class="col-sm-4">
                                                            <label for="">Fin</label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <input type="time" name="HORSEND" class="form-control" required=""/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="btn-agenda" class="btn btn-primary w-100" style="font-weight:500;"><i class='bx bx-plus-circle'></i> Ajouter Nouveau</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col">

                                            <div class="h5 text-left text-primary">AGENDA</div> 
                                            <table class="table border-white">
                                                <tbody>
                                                    <?php foreach ($data['agendas'] as $agenda) : ?>
                                                        <tr>
                                                            <td><?php echo $agenda->EVENT; ?>  </td>

                                                            <td><?php echo $agenda->HORSBEGING; ?> - <?php echo $agenda->HORSEND; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="">

                                    <div class="card_print table-responsive">
                                        <ul class="card-print-ul" style=" margin-bottom: 0.5rem;padding: 2px;">
                                            <div class="activity">
                                                <div class="col">
                                                    <li class="li text-center"><a href="#incaisse" style="background: #E99419; " class="c c03">
                                                            <div class="name btn-name"><img src="<?php echo URLROOT; ?>/img/bondelivraisonexterne.png"></div></a>
                                                    </li>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                    <div class="card_print table-responsive">
                                        <ul class="card-print-ul" style=" margin-bottom: 0.5rem;padding: 2px;">
                                            <div class="activity">
                                                <div class="col">
                                                    <li class=""><a href="#outcaisse" style="background: #117FBA; margin: 0 5px;" class="c c3">
                                                            <div class="name btn-name"><img src="<?php echo URLROOT; ?>/img/facture.png"></div></a>
                                                    </li>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                    <div class="card_print table-responsive">
                                        <ul class="card-print-ul" style=" margin-bottom: 0.5rem;padding: 2px;">
                                            <div class="activity">
                                                <div class="col">
                                                    <li class=""><a href="#outcaisse" style="background: #117FBA; margin: 0 5px;" class="c c3">
                                                            <div class="name btn-name"><img src="<?php echo URLROOT; ?>/img/facture.png"></div></a>
                                                    </li>
                                                </div>
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </p>


                        <p>
                        <div class="card_print">
                            <ul class="card-print-ul" style=" margin-bottom: 0.5rem;padding: 2px;">

                                <div class="activity">
                                    <div class="col">
                                        <li class="li-col" style="margin: 0 3px;"><a href="#incaisse" style="background: #DF5644; margin: 0 5px; width: 100%;" class="c c2">
                                                <div class="name btn-name"><img src="<?php echo URLROOT; ?>/img/bondelivraisonexterne.png"><br> <span class=" h5"> BON DE LIVRAISON</span></div></a>
                                        </li>
                                    </div>
                                    <div class="col">
                                        <li class="" style="margin: 0 3px;"><a href="#outcaisse" style="background: #DF5644; margin: 0 5px; width: 100%;" class="c c2">
                                                <div class="name btn-name"><img src="<?php echo URLROOT; ?>/img/facture.png"><br> <span class=" h5">FACTURE</span></div></a>
                                        </li>
                                    </div>
                                    <div class="col">
                                        <li class="" style="margin: 0 3px;"><a href="#" style="background: #DF5644; margin: 0 5px; width: 100%;" class="c c2" data-bs-toggle="modal" data-bs-target="#devisModal">
                                                <div class="name btn-name"><img src="<?php echo URLROOT; ?>/img/devis.png"><br> <span class="text-white h5">DEVIS</span></div></a>
                                        </li>
                                    </div>
                                    <div class="col">
                                        <li class="" style="margin: 0 3px;"><a href="#approcaisse" style="background: #DF5644; margin: 0 5px; width: 100%;" class="c c2">
                                                <div class="name btn-name"><img src="<?php echo URLROOT; ?>/img/BC.png"><br> <span class=" h5">BON DE COMMANDE</span></div></a>
                                        </li>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        <div class="card_print">
                            <ul class="card-print-ul"style=" margin-bottom: 0.5rem;padding: 2px;">
                                <div class="activity">
                                    <div class="col">
                                        <li class="" style="margin: 0 3px;"><a href="#incaisse" style="background: #25476A; margin: 0 5px; width: 100%;" class="c c2">
                                                <div class="name btn-name"><img src="<?php echo URLROOT; ?>/img/bondelivraisoninterne.png"><br> <span class="h5">B L I</span></div></a>
                                        </li>
                                    </div>
                                    <div class="col">
                                        <li class="" style="margin: 0 3px;"><a href="#outcaisse" style="background: #25476A; margin: 0 5px; width: 100%;" class="c c2">
                                                <div class="name btn-name"><img src="<?php echo URLROOT; ?>/img/stock.png"><br> <span class="h5">PRODUITS & STOCK</span></div></a>
                                        </li>
                                    </div>
                                    <div class="col">
                                        <li class="" style="margin: 0 3px;"><a href="<?php echo URLROOT; ?>/customers/" style="background: #25476A; margin: 0 5px; width: 100%;" class="c c2">
                                                <div class="name btn-name"><img src="<?php echo URLROOT; ?>/img/customer.png"><br> <span class="h5">CLIENTS</span></div></a>
                                        </li>
                                    </div>
                                    <div class="col">
                                        <li class="" style="margin: 0 3px;"><a href="#approcaisse" style="background: #25476A; margin: 0 5px; width: 100%;" class="c c2">
                                                <div class="name btn-name"><img src="<?php echo URLROOT; ?>/img/fournisseur.png"><br> <span class=" h5">FOURNISSEURS</span></div></a>
                                        </li>
                                    </div>
                                </div>
                            </ul>
                        </div>
                        </p>
                    </div>
                </div>

                <p>
                <div class="row">
                    <div class="col-8">
                        <!--div class=" card-tazoomcm">
                            <div class="h5">ATELIER</div> 
                            <table id="" class=" table-striped dt-responsive nowrap" width="100%">
                                <thead>
                                    <tr class="text-dark">
                                        <th>N&deg; SUIVIE</th>
                                        <th>N&deg; B.A</th>
                                        <th>DEADLINE</th>
                                        <th>CLIENT</th>
                                        <th>DESIGNATION</th>
                                        <th>MEDIA</th>
                                        <th>FORMAT</th>
                                        <th>QUANTITE</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!?php foreach ($data['works'] as $production) : ?>
                                        <tr>
                                            <td><!?php echo $production->NUMSUIVIE; ?></td>
                                            <td><!?php echo $production->NUMBA; ?></td>
                                            <td><!?php echo $production->DEADLINE; ?></td>
                                            <td style="background: #EDF0F5;"><!?php echo $production->CUSTOMER; ?></td>
                                            <td><!?php echo $production->DESIGNATION; ?></td>
                                            <td><!?php echo $production->MEDIA; ?></td>
                                            <td><!?php echo $production->FORMAT; ?></td>
                                            <td><!?php echo $production->QUANTITE; ?></td>
                                            <td>
                                                <!?php $st = $production->STATUS; ?>
                                                <!?php if ($st == 'En Attente'): echo '<span class="badge" style="background:#E15548; font-size: 14px;width: 6.4rem;"><span>En Attente</span></span>' ?>
                                                <!?php endif; ?>
                                                <!?php if ($st == 'En Cours'): echo '<span class="badge" style="background:#FA9F1B; font-size: 14px;width: 6.4rem;"><span>En Cours</span></span>' ?>
                                                <!?php endif; ?>
                                                <!?php if ($st == 'Fait'): echo '<span class="badge" style="background:#9ECC2E; font-size: 14px; width: 6.4rem;"><span>Fait</span></span>' ?>
                                                <!?php endif; ?>
                                            </td>
                                        </tr>
                                    <!?php endforeach; ?>
                                </tbody>
                            </table>
                        </div-->
                    </div>
                    <div class="col-4">
                        <!--div class=" card-tazoomcm">

                            <div class="row">
                                <div class="col-2">
                                    <div class="h5">CAISSE</div>    
                                </div> 
                                <div class="col-10" style=" text-align: right;">
                                    <label class="h5 text-danger" style=""><!?php
                                        echo "MGA ";
                                        echo $SUMCAISSE;
                                        ?></label>
                                </div> 
                            </div> 
                            <table id="" class="table table-striped dt-responsive nowrap my-2"  width="100%">
                                <thead class="text-dark">
                                    <tr>
                                        <th scope="col">N&deg; SUIVIE</th>
                                        <th scope="col">N&deg; PIECE</th>
                                        <th scope="col">DESIGNATION</th>
                                        <th scope="col">MONTANT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!?php foreach ($data['allcaisses'] as $allcaisse) : ?>
                                        <tr>
                                            <td><!?php echo $allcaisse->NUMSUIVIE; ?></td>
                                            <td><!?php echo $allcaisse->NUMPIECE; ?></td>
                                            <td><!?php echo $allcaisse->DESIGNATION; ?></td>
                                            <td><!?php echo $allcaisse->INMONTANT; ?></td>
                                        <!?php endforeach; ?>
                                </tbody>
                            </table>

                            <div class="card_print">
                                <ul class="card-print-ul" style=" margin-bottom: 0.5rem;padding: 1px;">
                                    <div class="activity">
                                        <div class="col">
                                            <li class=""><a href="" style="background: #9ECC2E; margin: 0 5px; font-size: 14px;" class="c  text-white" 
                                                            data-bs-toggle="modal" data-bs-target="#entreeCaisseModal">
                                                    <div class=""><i class='bx bx-plus-circle text-white'></i></div> 
                                                    <div class="name">&nbsp; Entr&eacute;e</div></a>
                                            </li>
                                        </div>
                                        <div class="col">
                                            <li class=""><a href="#outcaisse" style="background: #DF5644; margin: 0 5px; font-size: 14px;" class="c text-white">
                                                    <div class=""><i class="bx bx-minus-circle text-white"></i></div> 
                                                    <div class="name">&nbsp; Sortie</div></a>
                                            </li>
                                        </div>
                                        <div class="col">
                                            <li class=""><a href="#approcaisse" style="background: #AB46BC; margin: 0 5px; font-size: 14px;" class="c text-white">
                                                    <div class=""><i class="bx bx-plus-circle text-white"></i></div> 
                                                    <div class="name">&nbsp; Appro </div></a>
                                            </li>
                                        </div>
                                        <div class="col">
                                            <li class=""><a href="#approcaisse" style="background: #25476A; margin: 0 5px; font-size: 14px;" class="c text-white">
                                                    <div class=""></div> 
                                                    <div class="name">&nbsp; Cloture</div></a>
                                            </li>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div-->
                    </div>
                </div>
                </p>

                <p>
                <div class="row">
                    <div class="col-8">
                        <!--                        <div class=" card-tazoomcm">
                                                    <div class="h5">DESIGNER</div> 
                                                    <a class="btn btn-tazoomcmblue my-1" href="<!?php echo URLROOT; ?>/works/"> <i class='bx bx-plus-circle text-white'></i> Ajouter Nouveau</a>
                                                    <table id="" class=" table-striped dt-responsive nowrap" width="100%">
                                                        <thead>
                                                            <tr class="text-dark">
                                                                <th>N&deg; SUIVIE</th>
                                                                <th>DEADLINE</th>
                                                                <th>CLIENT</th>
                                                                <th>MEDIA</th>
                                                                <th>FORMAT</th>
                                                                <th>QUANTITE</th>
                                                                <th>FINITION</th>
                                                                <th>STATUS</th>
                                                                <th>DESIGNER</th>
                                                                <th>N&deg; B.A</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!?php foreach ($data['works'] as $production) : ?>
                                                                <tr>
                                                                    <td><!?php echo $production->NUMSUIVIE; ?></td>
                                                                    <td><!?php echo $production->DEADLINE; ?></td>
                                                                    <td style="background: #EDF0F5;"><!?php echo $production->CUSTOMER; ?></td>
                                                                    <td><!?php echo $production->MEDIA; ?></td>
                                                                    <td><!?php echo $production->FORMAT; ?></td>
                                                                    <td><!?php echo $production->QUANTITE; ?></td>
                                                                    <td><!?php echo $production->FINITIONS; ?></td>
                                                                    <td>
                                                                        <!?php $st = $production->STATUS; ?>
                                                                        <!?php if ($st == 'En Attente'): echo '<span class="badge" style="background:#E15548; font-size: 14px;width: 6.4rem;"><span>En Attente</span></span>' ?>
                                                                        <!?php endif; ?>
                                                                        <!?php if ($st == 'En Cours'): echo '<span class="badge" style="background:#FA9F1B; font-size: 14px;width: 6.4rem;"><span>En Cours</span></span>' ?>
                                                                        <!?php endif; ?>
                                                                        <!?php if ($st == 'Fait'): echo '<span class="badge" style="background:#9ECC2E; font-size: 14px;width: 6.4rem;"><span>Fait</span></span>' ?>
                                                                        <!?php endif; ?>
                                                                    </td>
                                                                    <td><!?php echo $production->DESIGNER; ?></td>
                                                                    <td><!?php echo $production->NUMBA; ?></td>
                                                                </tr>
                                                            <!?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>-->
                    </div>
                    <div class="col-4">
                        <div class=" ">

                            <!--                            <div class="card_print">
                                                            <ul class="card-print-ul" style=" margin-bottom: 0.5rem;padding: 2px;">
                                                                <div class="activity">
                                                                    <div class="col">
                                                                        <li class="li"><a href="#incaisse" style="background: #DF5644; margin: 0 5px;" class="c c2">
                                                                                                                                    <div class="icon"></div> 
                                                                                <div class="name btn-name"><img src="<!?php echo URLROOT; ?>/img/bondelivraisonexterne.png"><br> <span class=" h5"> BON DE LIVRAISON</span></div></a>
                                                                        </li>
                                                                    </div>
                                                                    <div class="col">
                                                                        <li class=""><a href="#outcaisse" style="background: #DF5644; margin: 0 5px;" class="c c2">
                                                                                <div class="name btn-name"><img src="<!?php echo URLROOT; ?>/img/facture.png"><br> <span class=" h5">FACTURE</span></div></a>
                                                                        </li>
                                                                    </div>
                                                                    <div class="col">
                                                                        <li class=""><a href="#approcaisse" style="background: #DF5644; margin: 0 5px;" class="c c2">
                                                                                <div class="name btn-name"><img src="<!?php echo URLROOT; ?>/img/devis.png"><br> <span class=" h5">DEVIS</span></div></a>
                                                                        </li>
                                                                    </div>
                                                                    <div class="col">
                                                                        <li class=""><a href="#approcaisse" style="background: #DF5644; margin: 0 5px;" class="c c2">
                                                                                <div class="name btn-name"><img src="<!?php echo URLROOT; ?>/img/BC.png"><br> <span class=" h5">BON DE COMMANDE</span></div></a>
                                                                        </li>
                                                                    </div>
                                                                </div>
                                                            </ul>
                                                        </div>
                                                        <div class="card_print">
                                                            <ul class="card-print-ul"style=" margin-bottom: 0.5rem;padding: 2px;">
                                                                <div class="activity">
                                                                    <div class="col">
                                                                        <li class=""><a href="#incaisse" style="background: #25476A; margin: 0 5px;" class="c c2">
                                                                                <div class="name btn-name"><img src="<!?php echo URLROOT; ?>/img/bondelivraisoninterne.png"><br> <span class="h5">B L I</span></div></a>
                                                                        </li>
                                                                    </div>
                                                                    <div class="col">
                                                                        <li class=""><a href="#outcaisse" style="background: #25476A; margin: 0 5px;" class="c c2">
                                                                                <div class="name btn-name"><img src="<!?php echo URLROOT; ?>/img/stock.png"><br> <span class="h5">PRODUITS & STOCK</span></div></a>
                                                                        </li>
                                                                    </div>
                                                                    <div class="col">
                                                                        <li class=""><a href="#approcaisse" style="background: #25476A; margin: 0 5px;" class="c c2">
                                                                                <div class="name btn-name"><img src="<!?php echo URLROOT; ?>/img/customer.png"><br> <span class="h5">CLIENTS</span></div></a>
                                                                        </li>
                                                                    </div>
                                                                    <div class="col">
                                                                        <li class=""><a href="#approcaisse" style="background: #25476A; margin: 0 5px;" class="c c2">
                                                                                <div class="name btn-name"><img src="<!?php echo URLROOT; ?>/img/fournisseur.png"><br> <span class=" h5">FOURNISSEURS</span></div></a>
                                                                        </li>
                                                                    </div>
                                                                </div>
                                                            </ul>
                                                        </div>-->
                        </div>
                    </div>
                </div>
                </p>

<!--                <p>

                <div class="row">
                    <div class="col">
                        <div class=" card-tazoomcm" style="background: #117FBA;">
                            <div class="h5 text-white" >DISCUSSION</div> 

                        </div>
                    </div>
                    <div class="col">
                        <div class="card-tazoomcm">
                            <div class="h5 text-center text-primary">AGENDA</div> 

                            <div class="row">
                                <div class="col">
                                    <div class="h5 ">AGENDA01<br><br><br> </div> 

                                    <form action="<!?php echo URLROOT; ?>/pages/addagenda" method="POST">
                                        <div class="form-group ">
                                            <input type="date" name="DATEEVENT" class="form-control my-2" value="<?php echo date('Y-m-d'); ?>"/>
                                            <input type="text" name="EVENT" class="form-control my-2" required="" placeholder="Evenement"/>
                                            <div class="row my-2"> 
                                                <div class="col-sm-4">
                                                    <label for="">D&eacute;but</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="time" name="HORSBEGING" class="form-control" required=""/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row my-2"> 
                                                <div class="col-sm-4">
                                                    <label for="">Fin</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <input type="time" name="HORSEND" class="form-control" required=""/>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" name="btn-agenda" class="btn btn-primary w-100" style="font-weight:500;"><i class='bx bx-plus-circle'></i> Ajouter Nouveau</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col">
                                    <table class="table">
                                        <tbody>
                                            <!?php foreach ($data['agendas'] as $agenda) : ?>
                                                <tr>
                                                    <td><!?php echo $agenda->EVENT; ?>  </td>

                                                    <td><!?php echo $agenda->HORSBEGING; ?> - <!?php echo $agenda->HORSEND; ?></td>
                                                </tr>
                                            <!?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card-tazoomcm">
                            <div class="h5 text-danger">TO DO LIST</div> 

                            <!?php foreach ($data['todolists'] as $todolist) : ?>
                                <ul style="margin-bottom: 0rem; font-size: 14px;">
                                    <li><!?php echo $todolist->TODOLIST; ?></li>
                                </ul>
                            <!?php endforeach; ?>

                            <form action="<!?php echo URLROOT; ?>/pages/addtodolist" method="POST">
                                <div class="input-group my-2">
                                    <input type="text" name="TODOLIST" class="form-control border-danger"/>
                                    <span class="input-group-text bg-danger" style="padding: 0rem;"><button type="submit" name="btn-todolist" class="btn btn-danger"  style=""><i class='bx bx-plus-circle'></i></button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </p>-->
            </section>
        </main>
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
require APPROOT . '/views/fetch/modal.php';
require APPROOT . '/views/inc/footer.php';
