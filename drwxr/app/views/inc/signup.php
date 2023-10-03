<?php

error_reporting(0);

if (isset($_POST['btn-signup'])) {
    if (!empty($_POST)) {

        $errors = array();
        require_once '../drwxr/app/views/inc/db.php';
//        if (empty($_POST['USERNAME']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['USERNAME'])) {
        if (empty($_POST['USERNAME'])) {

            $errors['USERNAME'] = "Votre prénoms est invalide.";
        } else {
            $req = $pdo->prepare('SELECT IDUSER FROM tbusers WHERE USERNAME = ?');
            $req->execute([$_POST['USERNAME']]);
            $user = $req->fetch();
            if ($user) {
                $errors['USERNAME'] = 'Ce nom d&acute;utilisateur est d&eacute;j&agrave; pris.';
            }
        }

        if (empty($_POST['EMAIL'])) {
            $errors['EMAIL'] = "Votre email est invalide.";
        } else {
            $req = $pdo->prepare('SELECT IDUSER FROM tbusers WHERE EMAIL = ?');
            $req->execute([$_POST['EMAIL']]);
            $user = $req->fetch();
            if ($user) {
                $errors['EMAIL'] = 'Ce email d&acute;utilisateur est d&eacute;j&agrave; pris.';
            }
        }

        if (empty($_POST['PASSWORD']) || $_POST['PASSWORD'] != $_POST['PASSWORDCONFIRM']) {
            $errors['PASSWORD'] = "Vous devez entrer un mot de passe valide.";
        }

        $username = $_POST['USERNAME'];
        if ($req->rowCount() > 0) {
            $em = "The username ($username) is taken";
            header("Location: ../../signup.php?error=$em&$data");
            exit;
        } else {
            if (isset($_FILES['URLFILE'])) {
                $img_name = $_FILES['URLFILE']['name'];
                $tmp_name = $_FILES['URLFILE']['tmp_name'];
                $error = $_FILES['URLFILE']['error'];

                if ($error === 0) {

                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = $username . '.' . $img_ex_lc;

                        $img_upload_path = 'img/' . $new_img_name;

                        move_uploaded_file($tmp_name, $img_upload_path);
                    } else {
                        $em = "Vous ne pouvez pas télécharger de fichiers de ce type.";
                        header("Location: ../../signup.php?error=$em&$data");
                        exit;
                    }
                }
            }

            if (empty($errors)) {
                if (isset($new_img_name)) {
                    $req = $pdo->prepare("INSERT INTO tbusers SET "
                            . "NUMMAT=?, "
                            . "TYPEUSER =?, "
                            . "POSTEOCCUP =?, "
                            . "USERNAME =?, "
                            . "FIRSTNAME=?,"
                            . "LASTNAME=?,"
                            . "CIN=?,"
                            . "DATEDENAISSANCE=?,"
                            . "DEPARTEMENT=?,"
                            . "DATEEMBAUCHE=?,"
                            . "EMAIL = ?, "
                            . "PASSWORD = ?, "
                            . "CONFIRMATIONTOKEN = ?, "
                            . "CONFIRMEDAT = ?,"
                            . "URLFILE=?"
                    );

                    $typeuser = $_POST['TYPEUSER'];
                    $posteoccup = $_POST['POSTEOCCUP'];
                    $password = password_hash($_POST['PASSWORD'], PASSWORD_BCRYPT);
                    $token = strrandom(60);
                    $req->execute([
                        $_POST['NUMMAT'],
                        $typeuser,
                        $posteoccup,
                        $_POST['USERNAME'],
                        $_POST['FIRSTNAME'],
                        $_POST['USERNAME'],
                        $_POST['CIN'],
                        $_POST['DATEDENAISSANCE'],
                        $_POST['DEPARTEMENT'],
                        $_POST['DATEEMBAUCHE'],
                        $_POST['EMAIL'],
                        $password,
                        $token,
                        $_POST['CONFIRMEDAT'],
                        $new_img_name
                    ]);
                    $userid = $pdo->lastInsertId();
                    mail($_POST['EMAIL'], 'Confirmation de votre compte', "Afin de valider votre compte merci di cliquer sur ce lien\n\n http://localhost:8081/Tazoom/signin/confirm.php?IDUSER=$userid&token=$token");
                    echo '<div class="alert alert-success">
                    <p style="font-weight:500;">Un email de confirmation vous a été envoyé pour valider votre compte.</p>
                </div>';
                    header('Location: ../welcometotazoom.php');
                    exit();
                } else {
                    # inserting data into database
                    $req = $pdo->prepare("INSERT INTO tbusers SET "
                            . "NUMMAT=?, "
                            . "TYPEUSER =?, "
                            . "POSTEOCCUP =?, "
                            . "USERNAME =?, "
                            . "FIRSTNAME=?,"
                            . "LASTNAME=?,"
                            . "CIN=?,"
                            . "DATEDENAISSANCE=?,"
                            . "DEPARTEMENT=?,"
                            . "DATEEMBAUCHE=?,"
                            . "EMAIL = ?, "
                            . "PASSWORD = ?, "
                            . "CONFIRMATIONTOKEN = ?, "
                            . "CONFIRMEDAT = ?,"
                            . "URLFILE=?"
                    );
                    $SMTP = "smtp.gmail.com";
                    $smtp_port = "587";
                    $typeuser = $_POST['TYPEUSER'];
                    $posteoccup = $_POST['POSTEOCCUP'];
                    $password = password_hash($_POST['PASSWORD'], PASSWORD_BCRYPT);
                    $token = strrandom(60);
                    $req->execute([
                        $_POST['NUMMAT'],
                        $typeuser,
                        $posteoccup,
                        $_POST['USERNAME'],
                        $_POST['FIRSTNAME'],
                        $_POST['USERNAME'],
                        $_POST['CIN'],
                        $_POST['DATEDENAISSANCE'],
                        $_POST['DEPARTEMENT'],
                        $_POST['DATEEMBAUCHE'],
                        $_POST['EMAIL'],
                        $password,
                        $token,
                        $_POST['CONFIRMEDAT'],
                        "inconnu.jpg"
                    ]);
                    $userid = $pdo->lastInsertId();
                    mail($_POST['EMAIL'], $SMTP, $smtp_port, 'Confirmation de votre compte', "Afin de valider votre compte merci di cliquer sur ce lien\n\n http://localhost:8081/Tazoom/signin/confirm.php?IDUSER=$userid&token=$token");
                    echo '<div class="alert alert-success">
                    <p style="font-weight:500;">Un email de confirmation vous a été envoyé pour valider votre compte.</p>
                </div>';
                    header('Location: ../welcometotazoom.php');
                    exit();
                }
            }
        }
//    }
        //debug($errors);
    }
}