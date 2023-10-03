<?php
session_start();

//error_reporting(0);
//$link = mysqli_connect("localhost", "mytazoom", "R00t@dm!n", "tazoomdb") or die("Echec de connexion à la base");
//if (isset($_POST['btnuploader'])) {
//    $NAMEFILE = $_POST['NAMEFILE'];
//    $COMMENTAIRE = $_POST['COMMENTAIRE'];
//
//    if (isset($_FILES['FILES']) and $_FILES['FILES']['error'] == 0) {
////        $dossier = '../../files/';
//        $dossier = FILES . 'files/';
//        $temp_name = $_FILES['FILES']["tmp_name"];
//        if (!is_uploaded_file($temp_name)) {
//            exit("le fichier est untrouvable");
//        }
//        if ($_FILES['FILES']['size'] >= 1000000) {
//            exit("Erreur, le fichier est volumineux");
//        }
//        $infosFILES = pathinfo($_FILES['FILES']['name']);
//        $extension_upload = $infosFILES['extension'];
//
//        $extension_upload = strtolower($extension_upload);
//        $extensions_autorisees = array('png', 'jpeg', 'jpg', 'PDF', 'pdf');
//        if (!in_array($extension_upload, $extensions_autorisees)) {
//            exit("Erreur, Veuillez inserer une image svp (extension autorisees: png");
//        }
//        $nomphoto = $NAMEFILE . "." . $extension_upload;
////        if (!move_uploaded_file($temp_name, $dossier . $nomphoto)) {
//      move_uploaded_file($temp_name, $dossier . $nomphoto);
////            exit("Problem dans le telechargement de l'image, Ressayez");
////        }
//        $ph_name = $nomphoto;
//    } else {
//        $ph_name = "inconnu.jpg";
//    }
//    $requette = "INSERT INTO tbfiles VALUES('$NAMEFILE','$COMMENTAIRE','$ph_name')";
//    $resultat = mysqli_query($link, $requette);
//    header('location: product/adduploadfile');
//}


$db = new PDO(
        'mysql:host=localhost;dbname=tazoomdb', 'mytazoom', 'R00t@dm!n'
);

//include(VIEWS . 'inc/header.php');
// CONNECTE DATABASE LOADING IN SELETED OPTION
//$conn = mysqli_connect('localhost',
//        'mytazoom',
//        'R00t@dm!n',
//        'tazoomdb'
//);
//session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta charset="ISO-8859-1">
        <meta name="Viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="bootstrap.min.css"/>

        <title>TAZOOM</title>
    </head>
    <body>
        <div class="container-fluid my-4">
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                        <h1> Nouveau fichier </h1>
                        <?php
                        if (!empty($_FILES)) {
                            $file_name = $_FILES['FILES']['name'];
                            $file_extension = strrchr($file_name, ".");
                            $COMMENTAIRE = $_POST['COMMENTAIRE'];

                            $file_tmp_name = $_FILES['FILES']['tmp_name'];
                            $file_dest = 'app/files/' . $file_name;

                            echo '<div class="alert alert-info">'
                            . 'Nom de fichier: ' . $file_name . '</br>';
                            echo 'Extension : ' . $file_extension . '</div>';

                            $extensions_autorisees = array('.pdf', '.PDF', '.PNG', '.png', '.jpeg');
                            if (in_array($file_extension, $extensions_autorisees)) {
                                if (move_uploaded_file($file_tmp_name, $file_dest)) {
                                    $req = $db->prepare('INSERT INTO tbfiles(NAMEFILE, COMMENTAIRE, FILES) VALUES(?,?,?)');
                                    $req->execute(array($file_name, $COMMENTAIRE, $file_dest));
                                    echo '<div class="alert alert-success">Fichier t&eacute;l&eacute;charger avec succ&egrave;ss</div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger">Seuls les fichiers PDF, PNG et JPEG sont autoris&eacute;s</div>';
                            }
                            
                        }
//                            header('location : public/product/index');
                        ?>

                        <div hidden="" class="form-group my-2">
                            <label for="">Nom de fichier</label>
                            <input class="form-control col-md-2" type="text" name="NAMEFILE" />
                        </div>
                        <div class="form-group my-2">
                            <label for="">Fichier</label>
                            <input class="form-control col-md-2" type="file" name="FILES"/>
                            <input hidden="" class="form-control col-md-2" type="text" name="USERRECU" value="<?= $_SESSION['auth']->USERNAME; ?>" />
                        </div>

                        <div class="form-group my-2">
                            <label for="">Commentaire</label>
                            <textarea class="form-control col-md-2" type="text" name="COMMENTAIRE" rows="2"> </textarea>
                        </div>
                        <div class="form-group">
                            <label hidden>
                                <input type="checkbox" name="remember" value="1"> Se souvenir de moi
                            </label>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="btnuploader" class="btn btn-danger my-3" style="font-weight:500;"><i class='bx bxs-file-archive' ></i> T&eacute;l&eacute;charger</button>
                            <a href="public/product/index"  class="btn btn-danger" role="button" style="font-weight:500;"> Retour </a>
                        </div>

<!--                        <table class="table-striped table-sm" id="">
                            <thead class="">
                                <tr>
                                    <th scope="col" width="10%">Nom de fichier</th>
                                    <th scope="col" width="15%">Commentaire</th>
                                    <th scope="col">Fichier</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!?php
                                    $req = $db->query('SELECT * FROM tbfiles');
                                    while ($data = $req->fetch()) {
                                        echo '<td>' . $data['NAMEFILE'] . ' ' . '<a href="' . $data['FILES'] . '"> ' . $data['NAMEFILE'] . '</a> </td>';
                                        echo '<td>' . $data['COMMENTAIRE'] . '</td>';
                                    }
                                    ?>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table-striped table-sm" id="">
                            <thead class="">
                                <tr>
                                    <th scope="col" width="8%">#</th>
                                    <th scope="col" width="10%">Nom de fichier</th>
                                    <th scope="col" width="15%">Commentaire</th>
                                    <th scope="col">Fichier</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!?php
                                $requette = $db->query('SELECT * FROM tbfiles');
                                while ($data = $requette->fetch()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <a href="<!?php url('product/editproduitin/' . $row['IDPRODUTION']) ?>" class="text-info"><i class='bx bx-message-square-edit'></i></a>
                                        </td>
                                        <td><!?php echo $row['NAMEFILE']; ?></td>
                                        <td><!?php echo $row['COMMENTAIRE']; ?></td>
                                        <td ><!?php echo $data['NAMEFILE'] . ' : ' . '<a href="' . $data['FILES'] . '"> ' . $data['NAMEFILE'] . '</a>' ?></td>
                                    </tr>
                                    <!?php endforeach; ?>
                            </tbody>
                        </table>-->

                    </div>
                    <div class="col-4"></div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>