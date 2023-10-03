<?php

error_reporting(0);

require_once 'drwxr/app/views/inc/functions.php';
reconnectfromcookie();

if (isset($_SESSION['auth'])) {
//    header('Location: drwxr/app/views/home.php');
    header('Location: ../../drwxr/');
    exit();
}

if (!empty($_POST) && !empty($_POST['NUMMAT']) && !empty($_POST['PASSWORD'])) {
    require 'drwxr/app/views/inc/db.php';
    //require 'View/inc/functions.php';²
    $req = $pdo->prepare('SELECT * FROM tbusers WHERE (NUMMAT = :NUMMAT OR EMAIL = :NUMMAT) AND CONFIRMEDAT IS NOT NULL');
    $req->execute(['NUMMAT' => $_POST['NUMMAT']]);
    $user = $req->fetch();

    if (password_verify($_POST['PASSWORD'], $user->PASSWORD)) {
        session_start();
        $_SESSION['auth'] = $user;
//        $_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';
        if ($_POST['remember']) {
            $remembertoken = strrandom(250);
            $pdo->prepare('UPDATE tbusers SET REMEMBERTOKEN = ? WHERE IDUSER = ?')->execute([$remembertoken, $user->id]);
            setcookie('remember', $user->id . '==' . $remembertoken . sha1($user->id . 'ratonlaveurs'), time() + 60 * 60 * 24 * 7);
        }
//        header('Location: public/product/index');
        header('Location: drwxr/');
        exit();
    } else {
        //$_SESSION['flash']['danger'] = 'Pseudo ou mot de passe incorrecte';
        echo '
                <ul class="list-group my-1">
                  <li class="list-group-item" style="padding: 3px 15px;color: #FFF;background-color: #ED1C32;font-weight: 500;border:none;">Identifiant ou mot de passe incorrect</li>
                  <li class="list-group-item" style="padding: 3px 15px;color: #FFF;background-color: #ED1C32;font-weight: 500;border:none;">Veuillez v&eacute;rifier votre mot de passe.</li>
                </ul>
';
    }
}