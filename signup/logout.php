<?php

session_destroy();

session_start();

setcookie('remember', NULL, -1);

unset($_SESSION['auth']);

$_SESSION['flash']['success'] = 'Vous &ecirc;tes maintenant déconnecté';

header('Location: ../');
