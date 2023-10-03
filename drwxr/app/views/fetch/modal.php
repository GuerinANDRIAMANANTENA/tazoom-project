<style>
    .modal-header{
        border-bottom: 1px solid #FFFFFF;
    }
    .moddevis01{
        font-weight:500;
        padding: 0.6rem;
        background: #E1E7F0;
        border: 5px solid #EDF1F6;
        border-radius: 0.6rem;
        text-decoration: none;
        list-style: none;
        color: #244669;
        
        font-size: 1.5rem;
    }
    col-10 ul li a {
        text-decoration: none;
        list-style: none;
    }
    col-10 ul li a {
        background: #D9E0EC;
    }
    .moddevis01 img{
        height: 2rem;
        width: 2rem;
        margin: 0 7px 0;
    }
</style>

<!-- ENTREE CAISSE MODAL -->
<div class="modal fade" id="entreeCaisseModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ENTR&Eacute;E CAISSE</h5>
                <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
            </div>
            <!--<div class="card-tazoomcm">-->
            <div class="row my-4">
                <div class="col"></div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <form action="<?php echo URLROOT; ?>/pages/addincaisse" method="POST">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label">D&eacute;signation</label>
                                    <div class="col-md-8">
                                        <input hidden="" type="date" name="DATETODAY" class="form-control" value="<?php echo date('Y-m-d'); ?>"/>
                                        <textarea class="form-control my-1" type="text" name="DESIGNATION" /></textarea>
                                        <input hidden="" type="text" name="NUMSUIVIE" class="form-control" value="NULL" />
                                    </div>
                                    <label class="col-md-4 col-form-label">Montant</label>
                                    <div class="col-md-8">
                                        <input type="number" name="INMONTANT" class="form-control" required="" />
                                        <input hidden="" type="text" name="OUTMONTANT" class="form-control" value="0">
                                    </div>
                                    <label class="col-md-4 col-form-label">N&deg; Piece</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NUMPIECE" class="form-control" required="" />
                                        <input hidden="" type="text" name="USER" class="form-control" value="<?= $_SESSION['auth']->NUMMAT; ?>" />
                                        <input hidden="" type="text" name="TYPECAISSE" class="form-control" value="INCAISSE" />
                                    </div>
                                    <label class="col-md-4 col-form-label"></label>
                                    <div class="col-md-8">
                                        <button type="submit" name="btn-incaisse" class="btn btn-tazoomcm" style="font-weight:500; background: #9ECC2E"><img src="<?php echo URLROOT; ?>/img/valide2.png" style="width: 18px;"> Valider</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
</div>


<!-- DEVIS -->
<div class="modal fade" id="devisModal">
    <div class="modal-dialog" style="padding-top: 150px;">
        <div class="modal-content" style="padding: 12px; border-radius: 0.5rem; background: #EDF1F6;">
            <div class="container bg-white" style="border-radius: 0.5rem;">
                <div class="modal-header">
                    <h2 class="modal-title" style="color: #25496D;">DEVIS</h2>
                </div>
                <div class="row">
                    <div class="col"></div>
                    <div class="col-10">
                                <ul>
                                    <li><a href="<?php echo URLROOT; ?>/deviss/selectcus" role="botton" type="submit" name="btn-new-devis" class="h4 w-100 text-center moddevis01 display-6" ><img src="<?php echo URLROOT; ?>/img/icons-blue-plus.png"> NOUVEAU DEVIS</a></li>
                                    <li class="my-3"><a role="botton"  type="submit" name="btn-read-devis" class="h4 w-100 text-center moddevis01"><img src="<?php echo URLROOT; ?>/img/icons-blue-listes.png">  LISTES DEVIS</a></li>
                                    <li><a role="botton"  type="submit" name="btn-archive-devis" class=" h4  w-100 text-center moddevis01"><img src="<?php echo URLROOT; ?>/img/icons-blue-archives.png">  ARCHIVES DEVIS</a></li>
                                </ul>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
</div>