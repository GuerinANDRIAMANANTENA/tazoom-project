<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta charset="ISO-8859-1">
        <meta name="Viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap.min.css"/>
        <link rel="stylesheet" href="sefety.css"/>

        <script src="bootstrap.bundle.min.js"></script>
        <title>TAZOOM</title>
    </head>
    <body>
        <div class="container-fluid my-4">

            <div class="text-center">
                <img src="logo-tazoom.png" alt="TAZOOM" width="8%"><br><br>
                <h1 class="display-5" style="font-weight: 500"> BIENVENUE Chez TAZOOM</h1>
                <label class="display-6 my-2">Votre matricule employ&eacute; est</label>
            </div>
            <form method="POST">
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                        <div class="text-center"> 
                            <style>
                                .mat{
                                    border: none;
                                    outline: none;
                                    background: #E0E7F1;
                                    color: #107FB9;
                                    font-weight: 500;
                                    width: 100%;
                                    border-radius: 0.375rem;
                                }
                            </style>

                            <?php
                            $connwc = mysqli_connect(
                                    'localhost',
                                    'mytazoom',
                                    'R00t@dm!n',
                                    'tazoomdb'
                            );
                            $query = "SELECT MAX(NUMMAT) AS MAXNUMMAT FROM tbusers";
                            $res = mysqli_query($connwc, $query);
                            $data = mysqli_fetch_array($res);
                            $MAXNUMMAT = $data['MAXNUMMAT'];
                            ?>
                            <input type="text" name="NUMMAT" class="text-center display-3 mat"  value="<?php echo $MAXNUMMAT; ?>" readonly="">
                        </div>

                        <div   class="form-group my-2">
                            <?php require_once 'drwxr/app/views/inc/login.php'; ?>
                            <label for="">Mot de passe</label>
                            <input type="password" name="PASSWORD" class="form-control"  />
                        </div>
                        <div class="form-group">
                            <label hidden>
                                <input type="checkbox" name="remember" value="1"> Se souvenir de moi
                            </label>
                        </div>

                        <div class="form-group my-2">
                            <ul>
                                <li>Un Email a etez envoyer sur votre adresse.</li>
                                <li>Chaque matricule est unique.</li>
                                <li>Votre matricule ne doit etre utilis&eacute; que par vous seul.</li>
                                <li>L&acute;utilisateur par un tiers de vote matricule vous engage dans tous 
                                    les actions faite dans cette espace de travail par ce dernier.</li>
                                <li>Il vous permetra d&acute;acceder dans votre espace ulisateur.</li>
                                <li>Il permetra a l&acute;entreprise d&acute;examiner vos perfomances ainsi que vos actions.</li>
                            </ul>

                        </div>

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-tazoom my-2" style="font-weight:500;">Se connecter</button>
                        </div>
                    </div>
                    <div class="col-4"></div>
                </div>
            </form>
        </div>
    </body>
</html>
