<?php
require APPROOT . '/views/inc/header.php';
?>

<div class="main-content container-fluid">
            <div class="maincontent">

                <?php flash('postmessage'); ?>
                <main>
                    <section>
                        
                        <div class="card-tazoomcm my-3">
                            <?php require 'titleproject.php'; ?>
                            <div class="row">
                                <div class="col-12 my-2">
                                    <form method="post" action="">
                                        <div class="form-group row">

                                            <label class="col-md-4 col-form-label">Nomination</label>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group my-1">
                                                            <label for="">Code client</label>
                                                            <input type="number" name="CODECUSTOMER" class="form-control"  value="<?php echo $data['CODECUSTOMER']; ?>" readonly/>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group my-1">
                                                            <label for="">Raison social</label>
                                                            <input class="form-control" type="text" name="RAISONSOCIAL"  value="<?php echo $data['RAISONSOCIAL']; ?>" required="" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <label class="col-md-4 col-form-label">Adresse</label>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="ADRESSE"  value="<?php echo $data['ADRESSE']; ?>"/>
                                            </div>
                                            <label class="col-md-4 col-form-label"></label>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group my-1">
                                                            <label for="">E-mail</label>
                                                            <input type="email" name="EMAIL" class="form-control"  value="<?php echo $data['EMAIL']; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group my-1">
                                                            <label for="">Contact</label>
                                                            <input type="text" name="CONTACT" class="form-control"  maxlength="10"  value="<?php echo $data['CONTACT']; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="col-md-4 col-form-label">NIF</label>
                                            <div class="col-md-8 my-2">
                                                <input type="text" class="form-control" name="NIF"  value="<?php echo $data['NIF']; ?>">
                                            </div>

                                            <label class="col-md-4 col-form-label"></label>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group my-2">
                                                            <label for="">Num&eacute;ro statistique</label>
                                                            <input type="text" name="STAT" class="form-control"  value="<?php echo $data['STAT']; ?>"/>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group my-2">
                                                            <label for="">RCS</label>
                                                            <input type="text" name="RCS" class="form-control"  value="<?php echo $data['RCS']; ?>"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <label class="col-md-4 col-form-label"></label>
                                            <div class="col-md-8">
                                            <div class="btn-group">
                                                <button type="submit" name="btn-customer" class="btn btn-tazoomcm" style="font-weight:500;"><!--i class='bx bxs-edit'></i--> Modifier</button>
                                                <a class="btn btn-tazoomcm" href="<?php echo URLROOT; ?>/customers/"> Annuler</a>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                             </div>
                            </div>
                        <?php
//                        require APPROOT . '/views/inc/footer.php';
                        