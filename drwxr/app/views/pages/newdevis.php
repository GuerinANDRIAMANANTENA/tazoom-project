<?php
error_reporting(0);
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

<div class="main-content container-fluid">

    <!--    <div class="row">
            <div class="col-1">
            </div>
            <div class="col-10">-->
    <div class="maincontent">
        <main>
            <section>
                <div class=" card-tazoomcm my-3">
                    <div class="row bg-white p-0" style="border-radius: 0.5rem; ">
                        <div class="col-4" style="background: #fdfdfd;
                             /*border-radius: 0.5rem;*/
                             border-top-left-radius: 0.5rem;
                             border-bottom-left-radius: 0.5rem;
                             border-top-right-radius: 0;
                             border-bottom-right-radius: 0; ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><div class="my-2"> <u style="text-decoration: #384F65 underline;"> INFORMATION DEVIS </u></div></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group ">
                                                <div class="row"> 
                                                    <div class="col-sm-4">
                                                        <label for="">Num&eacute;ro : </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <input type="text" name="HORSEND" class="form-control" value="D-<?php
                                                            echo date('Y');
                                                            echo '-00';
                                                            echo '/0000';
                                                            ?>"  readonly="" style=" background: #EDF1F6; "/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row my-1"> 
                                                    <div class="col-sm-4">
                                                        <label for="">Date cr&eacute;ation: </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <input type="date" name="DATEEVENT" class="form-control" value="<?php echo date('Y-m-d'); ?>" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row my-1"> 
                                                    <div class="col-sm-4">
                                                        <label for="">Date fermeture: </label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <input type="date" name="DATEEVENT" class="form-control " value="<?php echo date('Y-m-d'); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row my-2"> 
                                                    <div class="col-sm-4">
                                                        <label for="">Etat</label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <select class="form-select" name="ETAT" required="">
                                                                <option value="En attente de reponse">En attente de reponse</option>
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th><div class="my-2"> <u style=" text-decoration: #384F65 underline;"> INFORMATION CLIENT </u></div></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <ul style="margin-bottom: 0rem; font-size: 14px;">
                                                <table class="table border-white">
                                                    <thead>
                                                        <tr>
                                                            <td>Code client</td>
                                                            <th> : <?php echo $data['customers']->CODECUSTOMER; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Raison social</td>
                                                            <th> : <?php echo $data['customers']->RAISONSOCIAL; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>Adresse</td>
                                                            <th> : <?php echo $data['customers']->ADRESSE; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>NIF</td>
                                                            <th> : <?php echo $data['customers']->NIF; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>STAT</td>
                                                            <th>  : <?php echo $data['customers']->STAT; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <td>RCS</td>
                                                            <th>  : <?php echo $data['customers']->RCS; ?> </th>
                                                        </tr>
                                                        <tr>
                                                            <td>Demandeur</td>
                                                            <th> <select class="form-select" name="ETAT" required="">
                                                                    <option value="En attente de reponse">xXXXXXXx</option>
                                                                    <option value=""></option>
                                                                </select>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <th> 
                                                                <a href="<?php echo URLROOT; ?>/deviss/selectcus/" name="btn-tazoomcmblue" class="btn btn-tazoomcmblue" style="font-weight:500; display: flex; width: 150px;"><i class='bx bx-user-plus'></i> Choisir un client</a>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                </table>

                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th><div class="my-2"> <u style="text-decoration: #384F65 underline;"> INFORMATION TARIFICATION </u></div></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group ">
                                                <div class="row"> 
                                                    <div class="col-sm-6">
                                                        <label for="">Tarification : </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <select class="form-select" name="ETAT" required="">
                                                                <option value="En attente de reponse">Projet</option>
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row "> 
                                                    <div class="col-sm-6">
                                                        <label for="">Type de Taxe: </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <select class="form-select" name="ETAT" required="">
                                                                <option value="En attente de reponse">TMP non visible</option>
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row"> 
                                                    <div class="col-sm-6">
                                                        <label for="">Condit&deg; de paiement: </label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <select class="form-select" name="ETAT" required="">
                                                                <option value="En attente de reponse">30 jours</option>
                                                                <option value=""></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row"> 
                                                    <div class="col-sm-6">
                                                        <label for="">Montant :</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="text" name="MONTANT" class="form-control " readonly=""/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row"> 
                                                    <div class="col-sm-6">
                                                        <label for="">Remise :</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">10%</span>
                                                            <input hidden type="text" name="PORCENT"  class="form-control" value="10%">
                                                            <input type="text" name="REMISE" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row"> 
                                                    <div class="col-sm-6">
                                                        <label for="">TOTAL TTC :</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="text" name="TOTAL" value="" class="form-control" style="background: #EDF1F6; border:1px solid #EDF1F6;"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row"> 
                                                    <div class="col-sm-6">
                                                        <label for="">Accompte :</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">%</span>
                                                            <input hidden type="text" name="PORCENT"  class="form-control" value="%">
                                                            <input type="text" name="TOTAL" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row"> 
                                                    <div class="col-sm-6">
                                                        <label for="">Reste &agrave; payer :</label>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="text" name="TOTAL" value="" class="form-control" readonly=""/>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-group my-4" style="text-align: right">
                                                <button type="submit" name="btn-agenda" class="btn btn-tazoomcmblue" style="font-weight:500; ">Cr&eacute;e Facture acompte</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="col ">
                            <div class="card_print">
                                <div class="col "><div class="h4 "> <u style="font-size: 16px; text-decoration: #384F65 underline;"> CONTENU DU DOCUMENT </u></div>
                                    <!--                                        <div class="_name text-dark display-6" style="font-size: 2rem; line-height: 0.5;">
                                                                                <u style="font-size: 1.5rem; text-decoration: #384F65 underline; font-weight: 400;"> CONTENU DU DOCUMENT </u>
                                                                            </div>-->
                                    <!--<br>-->
                                    <ul class="card-print-ul">
                                        <div class="activity">
                                            <div class="col">
                                                <li><a href="#incaisse" class="btn-cont-doc">
                                                        <div class="icon"><img src="<?php echo URLROOT; ?>/img/bondelivraisonexterne.png" style="width: 30px; margin-left: 13px;"></div> 
                                                        <div class="name text-center">Visualiser</div></a>
                                                </li>
                                            </div>
                                            <div class="col">
                                                <li><a href="#outcaisse" class="btn-cont-doc">
                                                        <div class="icon"><img src="<?php echo URLROOT; ?>/img/bondelivraisonexterne.png" style="width: 30px; margin-left: 13px;"></div> 
                                                        <div class="name text-center">Transfomer en PDF</div></a>
                                                </li>
                                            </div>
                                            <div class="col">
                                                <li><a href="#approcaisse" class="btn-cont-doc">
                                                        <div class="icon"><img src="<?php echo URLROOT; ?>/img/bondelivraisonexterne.png" style="width: 30px; margin-left: 13px;"></div> 
                                                        <div class="name text-center">Transfomer & editer D.P</div></a>
                                                </li>
                                            </div>
                                            <div class="col">
                                                <li><a href="#approcaisse" class="btn-cont-doc">
                                                        <div class="icon"><img src="<?php echo URLROOT; ?>/img/bondelivraisonexterne.png" style="width: 30px; margin-left: 13px;"></div> 
                                                        <div class="name text-center">Dupliquer nouveau Devis</div></a>
                                                </li>
                                            </div>
                                        </div>
                                    </ul>
                                </div>

                                <?php
                                flash('postmessage');
                                ?>
                                <form action="<?php echo URLROOT; ?>/deviss/add" method="POST">
                                    <div class=" " style="background: #fdfdfd; border-radius: 0.5rem; ">
                                        <div class="form-group">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th> Section </th>
                                                        <td>
                                                            <select class="form-select" name="FAMILLE" required="">
                                                                <?php
                                                                $queryper = "SELECT * FROM tbmedia ORDER BY MEDIA ASC";
                                                                $per = mysqli_query($connu, $queryper);
                                                                while ($row = mysqli_fetch_array($per)) {
                                                                    echo '<option value="' . $row['MEDIA'] . '">' . $row['MEDIA'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th> M&eacute;dia/type </th>
                                                        <td>
                                                            <div class="form-group">
<!--                                                                        <select class="form-select" name="SOUSFAMILLE" required="">
                                                                    <option value="Autocollant">Autocollant</option>
                                                                    <option value=""></option>
                                                                </select>-->
                                                                <select class="form-select" name="MTYPE" required="">
                                                                    <?php
                                                                    $queryperS = "SELECT * FROM tbmtype ORDER BY MTYPE ASC";
                                                                    $perS = mysqli_query($connu, $queryperS);
                                                                    while ($row = mysqli_fetch_array($perS)) {
                                                                        echo '<option value="' . $row['IDMTYPE'] . '">' . $row['MTYPE'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </thead>
<!--                                            </table>
                                            
                                            <table class="">-->
                                                <tbody>
                                                    <tr>
                                                        <th>D&eacute;signation  <a href="<?php echo URLROOT; ?>/designations" name="btn-add"  title='Nouvelle d&eacute;signation' data-toggle='tooltip' > + </a></th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <select class="form-select" name="DESIGNATION" required="">
                                                                <?php
                                                                $queryperS = "SELECT * FROM tbdesignation ORDER BY DESIGNATION ASC";
                                                                $perS = mysqli_query($connu, $queryperS);
                                                                while ($row = mysqli_fetch_array($perS)) {
                                                                    echo '<option value="' . $row['DESIGNATION'] . '">' . $row['DESIGNATION'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                            <div class="row "> 
                                                <div class="col-sm-12">
                                                    <!--div class="row"> 
                                                        <div class="col-sm-4">
                                                            <label for="">Section : </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <select class="form-select" name="FAMILLE" required="">
                                                    <?php
//                                                                    $queryper = "SELECT * FROM tbmedia ORDER BY MEDIA ASC";
//                                                                    $per = mysqli_query($connu, $queryper);
//                                                                    while ($row = mysqli_fetch_array($per)) {
//                                                                        echo '<option value="' . $row['MEDIA'] . '">' . $row['MEDIA'] . '</option>';
//                                                                    }
                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div-->

                                                    <!--div class="row"> 
                                                        <div class="col-sm-4">
                                                            <label for="">M&eacute;dia/type : </label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <select class="form-select" name="MTYPE" required="">
                                                    <?php
//                                                                    $queryperS = "SELECT * FROM tbmtype ORDER BY MTYPE ASC";
//                                                                    $perS = mysqli_query($connu, $queryperS);
//                                                                    while ($row = mysqli_fetch_array($perS)) {
//                                                                        echo '<option value="' . $row['IDMTYPE'] . '">' . $row['MTYPE'] . '</option>';
//                                                                    }
                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div-->
                                                </div>
                                                <div class="col-sm-2">
                                                </div>
                                                <div class="col-sm-4">
                                                    <!--                                                        <div class="form-group">
                                                                                                                <button type="submit" name="btn-agenda" class="btn btn-tazoomcmblue"  style="font-weight:500; display: flex;  background: #25476A;justify-content: space-between;
                                                                                                                        align-items: center;"><img src="<!?php echo URLROOT; ?>/img/serche.png" style="width: 30px; "> Chercher un produit</button>
                                                                                                            </div>-->
                                                </div>
                                            </div>

                                            <div class="row"> 
                                                <div class="col-sm-6">

                                                    <!--<label for="">D&eacute;signation  <a href="<?php // echo URLROOT;  ?>/designations" name="btn-add"  title='Nouvelle d&eacute;signation' data-toggle='tooltip' > + </a></label>-->
                                                    <!--<input type="text" name="DESIGNATION" class="form-control" />-->

                                                    <select class="form-select" name="DESIGNATION" required="">
                                                        <?php
//                                                        $queryperS = "SELECT * FROM tbdesignation ORDER BY DESIGNATION ASC";
//                                                        $perS = mysqli_query($connu, $queryperS);
//                                                        while ($row = mysqli_fetch_array($perS)) {
//                                                            echo '<option value="' . $row['DESIGNATION'] . '">' . $row['DESIGNATION'] . '</option>';
//                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                                <div class="col-2">
                                                    <div class="form-group">
                                                        <label for="">Qte </label>
                                                        <input type="number" name="QTE" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label for="">P.U (MGA) </label>
                                                        <!--<div class="input-group mb-3">-->
                                                        <input type="number" name="PU" class="form-control" />
                                                        <!--<span class="input-group-text"></span>-->
                                                        <!--</div>-->
                                                    </div>
                                                </div>
                                                <div hidden class="col">
                                                    <div class="form-group">
                                                        <label for="">Total </label>
                                                        <!--<input type="number" name="TOTAL" class="form-control" />-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row my-1"> 
                                                <div class="col-sm-6">
                                                    <label for="">Description  </label>
                                                    <textarea type="text" name="DESCRIPTION" class="form-control" rows="6"/> </textarea>
                                                </div>
                                                <div class="col-sm-4">
                                                    <!--<label for="">Activit&eacute;  </label>-->
<!--                                                    <select class="form-select" name="ETAT" required="">
                                                        <option value="En attente de reponse">Marchadise</option>
                                                        <option value=""></option>
                                                    </select>-->

                                                    <div class="input-group mb-3">
<!--                                                                <select class="form-select" name="ACTIVITE" required="">
                                                        <?php
                                                        $queryperS = "SELECT * FROM tbactivity ORDER BY ACTIVITY ASC";
                                                        $perS = mysqli_query($connu, $queryperS);
                                                        while ($row = mysqli_fetch_array($perS)) {
                                                            echo '<option value="' . $row['ACTIVITY'] . '">' . $row['ACTIVITY'] . '</option>';
                                                        }
                                                        ?>
                                                        </select>
                                                        <a href="<!?php echo URLROOT; ?>/activitys/" name="btn-addactivite" class="btn btn-tazoomcm" style="font-weight:500;padding: .25rem .9rem;"><i class="bx bx-plus"></i></a>-->
                                                    </div>
                                                    <input hidden class="form-control" name="SESSION" value="<?= $_SESSION['auth']->NUMMAT; ?>">

                                                    <div class="form-group">
                                                        <button type="submit" name="btn-agenda" class="btn btn-tazoomcmblue" style="font-weight:500; display: flex;  background: #1180BA;justify-content: space-between;
                                                                align-items: center;"><img src="<?php echo URLROOT; ?>/img/bondelivraisonexterne.png" style="width: 30px; "> Ajouter &agrave; la liste</button>
                                                    </div>

                                                </div>
                                                <!--    <div class="col-sm-2">
                                                                                                    </div>-->
                                                <!--                                                        <div class="col-sm-4">
                                                                                                            <div class="form-group">
                                                                                                                <button type="submit" name="btn-agenda" class="btn btn-tazoomcmblue" style="font-weight:500; display: flex;  background: #1180BA;justify-content: space-between;
                                                                                                                        align-items: center;"><img src="<!?php echo URLROOT; ?>/img/bondelivraisonexterne.png" style="width: 30px; "> Ajouter &agrave; la liste</button>
                                                                                                            </div>
                                                                                                        </div>-->
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="  p-3" style="
                                     border-radius: 0.5rem; ">
                                    <div class="form-group ">
                                        <table id="sumdevistable" class="table" width="100%">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th class="p-1">Designations</th>
                                                    <th>Qt&eacute;</th>
                                                    <th class="text-center">Prix unitaires</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($data['deviss'] as $devis) : ?>
                                                    <tr>
                                                        <td><?php echo $devis->DESIGNATION; ?></td>
                                                        <td><?php echo $devis->QTE; ?></td>
                                                        <td style="text-align: right;"><?php
                                                            echo $devis->PU;
                                                            echo ' MGA';
                                                            ?></td>
                                                        <td style="text-align: right;"><?php
                                                            echo $devis->TOTAL;
                                                            echo ' MGA';
                                                            ?></td>
                                                    <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <?php
                                                $connect = mysqli_connect("localhost", "mytazoom", "R00t@dm!n", "tazoomdb");

                                                $user_qry = "SELECT SUM(QTE*PU) AS SUMDEVIS 
                                                                        FROM tbdevis";
                                                $user_res = mysqli_query($connect, $user_qry);
                                                while ($datadbr = mysqli_fetch_assoc($user_res)) {
                                                    ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <th style="text-align: right">Total</th>
                                                        <th style="text-align:right;"><?php echo $datadbr['SUMDEVIS'] ?> MGA</th>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="  p-3" style="border-radius: 0.5rem; ">
                                    <div class="row my-2"> 
                                        <div class="col-sm-6">
                                            <div class="row"> 
                                            </div>

                                            <div class="row my-1"> 
                                                <div class="col-sm-4">
                                                    <!--<label for="">Sous-famille : </label>-->
                                                </div>
                                                <div class="col-sm-8">
                                                    <h2 class="text-danger text-center">DEMANDE<br> EN<br> ATTENTE</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="btn-group">
                                                    <button type="submit" name="btn-agenda" class="btn btn-tazoomcmblue" style="font-weight:500; display: flex; background: #DF5645; justify-content: space-between;
                                                            align-items: center;"><img src="<?php echo URLROOT; ?>/img/serche.png" style="width: 25px; padding: 0 3px;">  Demande de validation </button>
                                                    <a href="<?php echo URLROOT; ?>/pages/" name="btn-close" class="btn btn-tazoomcmblue text-center" style="font-weight:500; display: flex; background: #DF6F60; justify-content: space-between;
                                                       align-items: center;">
                                                        <img src="<?php echo URLROOT; ?>/img/croix.png" style="height: 20px; padding: 0 3px; "> Fermer
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div> 
                            </div> 
                        </div>
                        <!--</p>-->
                    </div>
            </section>
        </main>
    </div>

    <!--        </div>   
    
            <div class="col-1">
            </div>
        </div>            -->
</div>


<script src="<?php echo URLROOT; ?>/js4/jquery.min.js"></script>

<script type="text/javascript">
    var table = document.getElementById("sumdevistable"), sumValue = 0;
    getSum();

    function getSum() {
        for (var i = 1; i < table.rows.length; i++) {
            sumValue = sumValue + parseInt(table.rows[i].cells[3].innerHTML);
        }
        document.getElementById("sumDev").innerHTML = "Total = " + sumValue;
//        console.log("Sum => " + sumValue);
    }

//    const currentLocation = location.href;
//    const menuItem = document.querySelectorAll('a');
//    const menuLength =
//            menuItem.length;
//    for (let i = 0; i < menuLength; i++) {
//        if (menuItem[i].href === currentLocation) {
//            menuItem[i].className = "active";
//        }
//    }

</script>
<?php
require APPROOT . '/views/inc/footer.php';
