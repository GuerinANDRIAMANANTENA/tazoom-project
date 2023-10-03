<?php
if (!empty($_POST) && !empty($_POST['email'])) {
    //require 'inc/db.php';
    //require 'inc/functions.php';

    $req = $pdo->prepare('SELECT * FROM tbusers WHERE EMAIL = ? AND CONFIRMEDAT IS NOT NULL');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();

    if ($user) {
        session_start();
        $resettoken = str_random(60);
        $pdo->prepare('UPDATE tbusers SET RESETTOKEN = ?, RESETAT = NOW() WHERE IDUSER = ?')->execute([$resettoken, $user->id]);

        $_SESSION['flash']['success'] = 'Les instructions du rappetl de mot de passe vous ont été envoyées par emails';
        mail($_POST['email'], 'Réinitiatilisation de votre mot de passe', "Afin de réinitialiser votre mot de passe merci  cliquer sur ce lien\n\nhttp://localhost:8081/LabComptes/reset.php?id={$user->id}&token=$reset_token");

        header('Location: login.php');
        exit();
    } else {
        $_SESSION['flash']['danger'] = 'Aucun compte ne correspond à cet adresse';
    }
    //debug($user->password());
}
require 'header.php';
?>

            <div class="text-center">
                <img src="../TAZOOM.PNG" alt="MYTAZOOM" width="8%"><br>
                <h1>Mot de passe oublié</h1>
            </div>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                        <div class="form-group my-2">
                            <label for="">E-mail</label>
                            <input type="text" name="EMAIL" class="form-control"  />
                        </div>

                        <button type="submit" name="SING" class="btn btn-tazoom my-2">Envoyer</button>
                    </div>
                    <div class="col-4"></div>
                </div>
            </form>

            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="footer" style="margin-bottom: 10px">
                        Copyright &copy; FEV 2023, <a href="#" data-toggle="tooltip"
                                                      title="Guerin ANDRIAMANANTENA, +261(0)34 62 666 33"> by 910814.</a>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
       
        <?php require 'footer.php';/* ?>*/
