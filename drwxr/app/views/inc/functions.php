<?php

function debug($variable) {
    echo '<pre>' . print_r($variable, true) . '</pre>';
}

function strrandom($length) {
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

function loggedonly() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION['auth'])) {
        $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
        header('Location: ../../index.php');
        exit();
    }
}

function reconnectfromcookie() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_COOKIE['remember']) && !isset($_SESSION['auth'])) {
        require_once 'db.php';

        if (!isset($pdo)) { global $pdo; }

        $remembertoken = $_COOKIE['remember'];
        $parts = explode('==', $remembertoken);
        $userid = $parts[0];
        $req = $pdo->prepare('SELECT * FROM '
                . 'tbuserrh '
                . 'WHERE IDUSER = ?');
        $req->execute([$userid]);
        $user = $req->fetch();
        if ($user) {
            $expected = $userid . '==' . $user->remembertoken . sha1($userid . 'ratonlaveurs');
            if ($expected == $remembertoken) {
                session_start();
                $_SESSION['auth'] = $user;
                setcookie('remember', $remembertoken, 60 * 60 * 24 * 7);
            } else {
                setcookie('remember', null, -1);
            }
        } else {
            setcookie('remember', null, -1);
        }
    }
}
