<?php
require_once '../drwxr/app/views/inc/functions.php';
require_once '../drwxr/app/views/inc/db.php';

session_start();
require_once '../drwxr/app/views/inc/signup.php';
require 'header.php';

$query = "SELECT MAX(IDUSER) AS NUMATTZ FROM tbusers";
$res = mysqli_query($connu, $query);
$data = mysqli_fetch_array($res);
$NUMATTZ = $data['NUMATTZ'] + 1;
?>

<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<div class="text-center">
    <img src="../logo-tazoom.png" alt="MYTAZOOM" width="8%"><br> <br>
    <h1 class="display-6" style="">Cr&eacute;er un compte utilisateur</h1>
</div>


<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4">
            <?php if (!empty($errors)): ?>
                <ul class="list-group">
                    <li class="list-group-item " style="padding: 3px 15px;color: #FFF;background-color: #ED1C32;font-weight: 500;border:none;" role="alert">Vous n&acute;avez pas correctement rempli le formulaire.</li>
                    <?php foreach ($errors as $error): ?>
                        <li class="list-group-item" style="padding: 3px 15px;color: #FFF;background-color: #ED1C32;font-weight: 500;border:none;"><?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div hidden class="form-group ">
                <label for="">Matricule</label>
                
                <?php
                $x = $NUMATTZ;
                if ($x <= 9) {
                    ?>
                    <input type="text" name="NUMMAT" class="form-control" value="<?php
                    echo "TZ000"; echo $NUMATTZ
                    ?>" readonly=""/>
                       <?php } else {
                           ?>
                    <input type="text" name="NUMMAT" class="form-control"  value="<?php
                    echo "TZ00"; echo $NUMATTZ
                    ?>" readonly=""/>
                       <?php } ?>

                <input hidden="" type="text" name="TYPEUSER" class="form-control"  value="User" />
            </div>

            <div class="form-group my-2">
                <label for="">Nom</label>
                <input type="text" name="FIRSTNAME" class="form-control" />
            </div>

            <div class="form-group my-2">
                <label for="">Pr&eacute;nom(s)</label> <!-- LASTNAME -->
                <input type="text" name="USERNAME" class="form-control"  />
            </div>

            <div class="form-group my-2">
                <label for="">CIN</label>
                <input type="text" name="CIN" class="form-control" maxlength="12" onkeypress="return isNumberKey(event)" />
            </div>

            <div class="form-group my-2">
                <label>Date de naissance</label>
                <input type="date" name="DATEDENAISSANCE" class="form-control"  value="<?php echo date('Y-m-d'); ?>"   />
            </div>

            <div class="form-group my-2">
                <label for="">D&eacute;partement</label>
                <select type="text" name="DEPARTEMENT" class="form-select">
                    <option></option>
                    <option value="Adminitration">Adminitration</option>
                    <option value="Atelier">Atelier</option>
                </select>
            </div>

            <div class="form-group">
                <label for="">Poste</label>
                <select type="text" name="POSTEOCCUP" class="form-select">
                    <option></option>
                    <option value="Direction">Direction</option>
                    <option value="Commerciale">Commerciale</option>
                    <option value="Designer">Designer</option>
                    <option value="Atelier">Atelier</option>
                    <option value="Receptionniste">R&eacute;ceptionniste</option>
                </select>
            </div>

            <div class="form-group my-2">
                <label for="">Date d'embauche</label>
                <input type="date" name="DATEEMBAUCHE" class="form-control"  value="<?php echo date('Y-m-d'); ?>"   />
            </div>

            <div class="form-group my-2">
                <label for="">E-mail</label>
                <input type="email" name="EMAIL" class="form-control" />
            </div>
            <div class="form-group my-2">
                <label for="">Mot de passe</label>
                <input type="password" name="PASSWORD" class="form-control"   />
            </div>
            <div class="form-group my-2">
                <label for="">Confirmez votre mot de passe</label>
                <input type="password" name="PASSWORDCONFIRM" class="form-control"   />
            </div>

            <div class="form-group my-2">
                <label for="">Photo</label>
                <input type="file" name="URLFILE" class="form-control"  accept=".png, .jpg, .jpeg"/>
            </div>

            <input hidden type="datetime-local" class="form-control CONFIRMEDAT" name="CONFIRMEDAT"
                   value="<?php echo date('Y-m-d H:i:s'); ?>" required autofocus>

            <button type="submit" name="btn-signup" class="btn btn-tazoom"  style="font-weight:500;"><i class='bx bx-user-plus'></i> S'inscrire</button>
            <br><br> <div class="text-center" style="margin-bottom: 2rem!important;"> <a href="logout.php" style="text-decoration: none;color: #a52834" class="btn btn-link btnlink" role=""> J'ai d&eacute;j&agrave; un compte</a></div>
        </div>
        <div class="col-4"></div>
    </div>
</form>

<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <div class="footer">
            Copyright &copy; TAZOOM 2023 <a href="#" data-toggle="tooltip" style="text-decoration: none;color: #C0C0C0"
                                            title="Guerin ANDRIAMANANTENA +261(0)34 62 666 33"></a>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>
<?php
require 'footer.php'; /* ?>*/
