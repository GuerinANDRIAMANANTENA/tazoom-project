<?php

if (isset($_GET['IDSECTION']) && !empty($_GET['IDSECTION'])) {
//    include ('../CONFIG/_DBMYSQL.php');
    $conn = mysqli_connect('localhost', 'mytazoom', 'R00t@dm!n', 'tazoomdb');
    $id = $_GET['IDSECTION'];

    $query = "SELECT * FROM tbmtype WHERE IDSECTION='$id'";
//    $query = "SELECT * FROM tbmedia WHERE IDMEDIA='$id' ";
    
    $do = mysqli_query($conn, $query);
    $count = mysqli_num_rows($do);
    if ($count > 0) {
        while ($row = mysqli_fetch_array($do)) {
            echo '<option value="' . $row['IDMTYPE'] . '">' . $row['MTYPE'] . '</option>';
        }
    } else {
        echo '<option>Aucune idMtype disponible</option>';
    }
} else {
    echo '<h1> Error, mtype </h1>';
}