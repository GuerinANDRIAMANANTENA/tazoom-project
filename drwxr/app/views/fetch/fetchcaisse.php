<?php

require APPROOT . '/config/dbmysql.php';
$datetoday = date('Y-m-d');
//    
$query = "SELECT SUM(INMONTANT) AS SUMINCAISSE FROM tbcaisse
                            WHERE TYPECAISSE='INCAISSE' 
                            AND DATETODAY ='".$datetoday."'
                            ORDER BY DATETODAY DESC";
$res = mysqli_query($conncfcf, $query);
$dt = mysqli_fetch_array($res);
$SUMINCAISSE = $dt['SUMINCAISSE'];
 
//
$query = "SELECT SUM(OUTMONTANT) AS SUMOUTCAISSE FROM tbcaisse
                            WHERE TYPECAISSE='OUTCAISSE' 
                            AND DATETODAY ='".$datetoday."'
                            ORDER BY DATETODAY DESC";
$res = mysqli_query($conncfcf, $query);
$dt = mysqli_fetch_array($res);
$SUMOUTCAISSE = $dt['SUMOUTCAISSE'];

//    
$query = "SELECT SUM(INMONTANT) AS SUMAPPROCAISSE FROM tbcaisse
                            WHERE TYPECAISSE='APPROCAISSE' 
                            AND DATETODAY ='".$datetoday."'
                            ORDER BY DATETODAY DESC";
$res = mysqli_query($conncfcf, $query);
$dt = mysqli_fetch_array($res);
$SUMAPPROCAISSE = $dt['SUMAPPROCAISSE'];
 
// SUM ALL CAISSE
$query = "SELECT SUM(INMONTANT)-SUM(OUTMONTANT) AS SUMCAISSE FROM tbcaisse
                            WHERE TYPECAISSE IN('INCAISSE', 'APPROCAISSE', 'OUTCAISSE')
                            AND DATETODAY ='".$datetoday."'
                            ORDER BY DATETODAY DESC";
$res = mysqli_query($conncfcf, $query);
$dt = mysqli_fetch_array($res);
$SUMCAISSE = $dt['SUMCAISSE'];

// SUM ALL CAISSE
$queryc = "SELECT MAX(CODECUSTOMER) AS COUNTCODECUSTOMER FROM tbcustomer";
$resc = mysqli_query($conncfcf, $queryc);
$dtc = mysqli_fetch_array($resc);
$COUNTCODECUSTOMER = $dtc['COUNTCODECUSTOMER']+1;

