<?php

$userid = $_GET['IDUSER'];
$token = $_GET['token'];

require 'inc/db.php';

$pdo = $pdo->prepare('SELECT * FROM tbusers WHERE IDUSER=?');
$req->execute([$userid]);
$user->$req->fetch();

session_start();

if ($user && $user->confirmation_token == $token) {
    $pdo->prepare('UPDATE tbusers SET CONFIRMATIONTOKEN = NULL, CONFIRMEDAT = NOW() WHERE IDUSER = ?')->execute([$userid]);
echo '<div class="alert alert-success">
                    Votre compte a bien &eacute;t&eacute; valid&eacute;.
                </div>';
    $_SESSION['auth'] = $user;
    header('Location: account.php');
} else {
    echo '<div class="alert alert-success">
                    Ce token n&acute;est plus valide.
                </div>';
    header('Location: ../index.php');
}