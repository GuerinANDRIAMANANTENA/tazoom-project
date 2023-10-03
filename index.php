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
        <link rel="icon" href="logo-tazoom.png">

        <script src="bootstrap.bundle.min.js"></script>
        <title>TAZOOM</title>
    </head>
    <body>
        <div class="container-fluid my-4">
                    <div class="text-center">
                        <img src="logo-tazoom.png" alt="TAZOOM" width="8%"><br><br>
                        <h1 class="display-5" style=""> Bienvenue sur le portail</h1>
                    </div>
                    <form method="POST">
                        <div class="row">
                            <div class="col-4">
                            </div>
                            <div class="col-4">
                                <?php require_once 'drwxr/app/views/inc/login.php'; ?>
                                <div class="form-group my-2">
                                    <label for="">E-mail ou Matricule</label>
                                    <input type="text" name="NUMMAT" class="form-control"  />
                                </div>
                                <div class="form-group my-2">
                                    <label for="">Mot de passe</label>
                                    <input type="password" name="PASSWORD" class="form-control"  />
                                </div>
                                <div class="form-group">
                                    <label hidden>
                                        <input type="checkbox" name="remember" value="1"> Se souvenir de moi
                                    </label>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-tazoom my-2" style="font-weight:500;">Se connecter</button>
                                </div>

                                <br><div class="text-center" style="margin-bottom: 2rem!important;"> <a href="signup" style="text-decoration: none;color: #A52834" class="btn btn-link btnlink" role=""> Créer un compte utilisateur </a></div>
               
                                </div>
                            <div class="col-4"></div>
                        </div>

                    </form>
                    <br class="p-3">
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div class="footer">
                                Copyright &copy; TAZOOM 2023 <a href="#" data-bs-toggle="tooltip" data-bs-placement="right" style="text-decoration: none;color: #C0C0C0"
                                                                title="Guerin ANDRIAMANANTENA, +261(0)346266633"></a>
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                    </div>
               
            <script>
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            </script>
    </body>
</html>
