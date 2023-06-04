<?php
$host = 'localhost';
$user = 'root';
$pass = '123456';
$dbname = 'COMPOZITORI';
$con_id = mysqli_connect($host, $user, $pass, $dbname)or die ('Eroare conectare');//CONECTARE DIRECTA CU DRIVERUL MySQL FARA ODBC DNS
?>
