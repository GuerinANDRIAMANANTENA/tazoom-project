<?php

/*
  Created on : 14 mars 2023, 11:28:15
  Author     : GUERIN ANDRIAMANANTENA
  Framework to SINFO 1.0 Alpha version
  Developped by : GUERIN ANDRIAMANANTENA
  e-Mail      : ghyslainguerin@gmail.com
  copyright (c) MARS 2023
  Database Configuration Class (MySqlidb)
  WordKey     : MVC, DEFINE ROOT_PATH
  WhatApps : +261(0)346266633
 */

$pdo = new PDO('mysql:dbname=tazoomdb; host=localhost', 'mytazoom', 'R00t@dm!n');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

// MySqli count
$db = new PDO(
        'mysql:host=localhost;dbname=tazoomdb', 'mytazoom', 'R00t@dm!n'
);

$connect = mysqli_connect("localhost", "mytazoom", "R00t@dm!n", "tazoomdb");

// MySqli chart
$dbchart = mysqli_connect("localhost", "mytazoom", "R00t@dm!n");
mysqli_select_db($dbchart, "tazoomdb");

$connu = mysqli_connect(
        'localhost',
        'mytazoom',
        'R00t@dm!n',
        'tazoomdb'
);
