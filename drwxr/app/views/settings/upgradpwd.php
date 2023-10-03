<?php
require APPROOT . '/views/inc/header.php';
?>

<style>

    .notify_icon .icon img{
        padding: 5px;
        width: 250px;
        /* height: 70px; */
        border-radius: 11.30rem;
        background: #f7f7f7;
        background-position: 0 -60px;
        /* font-size: 17px;*/
    }
    .table>:not(caption)>*>* {
        padding: 0.1rem .2rem;
    }
</style>


<div class="main-content container-fluid">
    <div class="maincontent">

        <?php
        // require 'titleproject.php'; 
        flash('postmessage');
        ?>
        <main>
            <section>
                <div class=" card-tazoomcm my-4">
                    <div class="display-6"><i class='bx bx-user'  style="font-size: 26px;"></i> Profile</div>
                    <div class="row p-3">
                        <div class="imgBx text-center">
                            <div class="notify_icon" style="background: #F3F3F3; border: 1px dashed #ED1C32; border-radius: 1.35rem;">
                                <span class="icon">
                                    <img src="../../signup/img/<?= $_SESSION['auth']->URLFILE; ?>">
                                </span>
                            </div>
                        </div>
                        <div class="col-12">
                            <table class="table">
                                <tr>
                                    <th><div class="display-5 my-2" style=" font-weight: 400;">E-mail</div></th>
                                    <th><div class="display-5 my-2" style=" font-weight: 400;"> <?= $_SESSION['auth']->EMAIL; ?></th>
                                </tr>
                                <tr>
                                    <td><div class="display-6" style="font-size: 2rem;"> Ulisateur</div></td>
                                    <td><div class="display-6" style="font-size: 2rem;"> :  <?= $_SESSION['auth']->USERNAME; ?></div></td>
                                </tr>
                                <tr>
                                    <td><div class="display-6" style="font-size: 2rem;">   Personnel</div></td>
                                    <td><div class="display-6" style="font-size: 2rem;"> :  <?= $_SESSION['auth']->FIRSTNAME; ?> <?= $_SESSION['auth']->LASTNAME; ?></div></td>
                                </tr>
                                <tr>
                                    <td><div class="display-6" style="font-size: 2rem;">  Fonction</div></td>
                                    <td><div class="display-6" style="font-size: 2rem;"> :  <?= $_SESSION['auth']->POSTEOCCUP; ?></div></td>
                                </tr>
                                <tr>
                                    <td><div class="display-6" style="font-size: 2rem;">  Matricule </div></td>
                                    <td><div class="display-6" style="font-size: 2rem;"> :  <?= $_SESSION['auth']->NUMMAT; ?></div></td>
                                </tr>
                                <tr>
                                    <td><div class="display-6" style="font-size: 2rem;">   Type</div></td>
                                    <td><div class="display-6" style="font-size: 2rem;"> :  
                                            <?php $us = $_SESSION['auth']->TYPEUSER; ?>
                                            <?php if ($us == 'Admin'): echo '<span class="badge bg-success" style="font-size: 20px;">Admin</span>' ?>
                                            <?php endif; ?>
                                            <?php if ($us == 'User'): echo '<span class="badge bg-danger" style="font-size: 20px;">User</span>' ?>
                                            <?php endif; ?>
                                        </div></td>
                                </tr>
                                <tr>
                                    <td><div class="display-3" style="font-size: 2rem;">   Date d&acute;inscription</div></td>
                                    <td><div class="display-3" style="font-size: 2rem;"> :  <?= $_SESSION['auth']->CONFIRMEDAT; ?></div></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class=" card-tazoomcm my-4">
                    <div class="display-6 my-2"><?php echo $data['titleTwo']; ?></div>

                    <?php
                    if (!empty($_POST)) {
                        if (empty($_POST['PASSWORD']) || $_POST['PASSWORD'] != $_POST['PASSWORDCONFIRM']) {
                            echo '<div class="alert" style="padding: 10px 15px;color: #FFF;background-color: #F58383;font-weight: 500;border:none;">
                                            <p style="font-weight:500;padding: 0.5rem; margin-bottom: 0rem;">
                                                D&eacute;sol&eacute;, votre mot de passe sont diff&eacute;rents.<br>
                                                Veuillez v&eacute;rifier votre mot de passe.</p>
                                        </div>';
                        } else {
                            $user_id = $_SESSION['auth']->IDUSER;
                            $password = password_hash($_POST['PASSWORD'], PASSWORD_BCRYPT);
                            require_once APPROOT . '/views/inc/db.php';
                            $pdo->prepare('UPDATE tbusers SET PASSWORD=?')->execute([$password]);
                            echo '<div class="alert" style="padding: 10px 15px;color: #FFF;background-color: #25476A;font-weight: 500;border:none;">
                                            <p style="font-weight:500; padding: 0.5rem; margin-bottom: 0rem;">Votre mot de passe a &eacute;t&egrave; chang&eacute; avec succ&egrave;s.<br>
                                            Veuillez r&eacute;connecter votre session.
                                            </p>
                                        </div>';
                        }
                    }
                    ?>
                    <div class="imgBx text-center">
                        <div class="notify_icon">

                            <form method="POST">
                                <div class="row"> 
                                    <div class="col-sm-4">
                                        <label for="">Nouveau mot de passe : </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="PASSWORD" />
                                        </div>
                                    </div>
<!--                                </div>

                                <div class="row my-1"> -->
                                    <div class="col-sm-4">
                                        <label for="">Confirmation mot de passe : </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <input class="form-control" type="password" name="PASSWORDCONFIRM" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-1"> 
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <button type="submit" name="btn-agenda" class="btn btn-tazoomcmblue"><i class='bx bx-pencil' ></i> Changer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <?php
    require APPROOT . '/views/inc/footer.php';
    