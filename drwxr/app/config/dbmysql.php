<?php

//GetFetchCountConn
$conncfcf = mysqli_connect("localhost", "mytazoom", "R00t@dm!n", "tazoomdb");

//GetGraphConn
$conngraph = new mysqli("localhost", "mytazoom", "R00t@dm!n", "tazoomdb");
if (!$conngraph) {
    die("Error in connection" . $conngraph->connect_error);
}


//GetGraphConntTWO
$host = 'localhost';
$dbname = 'tazoomdb';
$usr = 'mytazoom';
$pwd = 'R00t@dm!n';

try {
    $bdgraph = new PDO('mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8', '' . $usr . '', '' . $pwd . '');
} catch (Exception $e) {
    die('[GRAPH_PLUGIN_UBRAIN] ERRO (PDO_ERR)');
    exit();
}
$host = NULL;
$dbname = NULL;
$usr = NULL;
$pwd = NULL;