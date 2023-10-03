<?php

require_once 'config/config.php';
require_once 'helpers/urlhelpers.php';
require_once 'helpers/sessionhelper.php';

spl_autoload_register(function ($className) {
    require_once 'libraries/' . $className . '.php';
});

