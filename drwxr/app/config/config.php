<?php

/*
  * Created on : 14 mars 2023, 11:28:15
  * Author     : GUERIN ANDRIAMANANTENA
  * Framework to SINFO 1.0 Alpha version
  * Developped by : GUERIN ANDRIAMANANTENA
  * e-Mail      : ghyslainguerin@gmail.com
  * copyright (c) MARS 2023
  * Database Configuration Class (MySqlidb)
  * WordKey     : MVC, DEFINE ROOT_PATH
  * WhatApps    : +261(0)346266633
 */

/**
 * 
 * DATABASE CONFIGURATION
 */
define('DB_HOST', 'localhost');
define('DB_USER', 'mytazoom');
define('DB_PASS', 'R00t@dm!n');
define('DB_NAME', 'tazoomdb');

define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT','http://localhost:8081/tazoomcm/drwxr');
//define('URLROOT','192.168.88.11:8081/tazoomcm/drwxr');
//define('URLROOT','192.168.2.115:8081/tazoomcm/drwxr');
define('SITENAME', 'TAZOOM');
define('VERSION', '1.0.0');
define('DEL', 'Suppression?');
define('MSGCONFIRM', 'Voulez-vous supprimer cet element selection&eacute;e ?');
define('BY', 'Guerin ANDRIAMANANTENA');